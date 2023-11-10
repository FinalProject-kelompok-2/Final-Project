<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $pinjamanAktif = Pinjaman::where('status', 'Diterima')->count();
        $totalPinjaman = Pinjaman::where('status', 'Diterima')->sum('jml_pinjaman');
        $pengajuanPinjaman = Pinjaman::where('status', 'Diproses')->count();
        $prosesPenawaran = Pinjaman::where('status', 'Penawaran')->count();
        $menungguPencairan = Pinjaman::where('status', 'Dikonfirmasi')->count();
        $angsuranLunas = Angsuran::where('status', 'Lunas')->count();
        $uangDikembalikan = Angsuran::where('status', 'Lunas')->sum('biaya_angsuran');
        $angsuranTunggak = Angsuran::where('status', 'Tunggak')->count();
        $uangBelumDikembalikan = Angsuran::where('status', '!=', 'Lunas')->sum('biaya_angsuran');
        $angsuranDiproses = Angsuran::where('status', 'Proses')->count();
        return view('admin.pages.dashboard', compact('user', 'pinjamanAktif', 'pengajuanPinjaman', 'prosesPenawaran', 'menungguPencairan', 'angsuranLunas', 'angsuranTunggak', 'totalPinjaman', 'uangDikembalikan', 'uangBelumDikembalikan', 'angsuranDiproses'));
    }

    public function profile() {
        $user = User::where('id', Auth::user()->id)->with('UserDetail')->first();
        return view('admin.pages.profile', compact('user'));
    }

    public function edit_profile(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
        ]);

        try {
            $user = User::where('id', Auth::user()->id)->first();
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->save();

            $userDetail = UserDetail::where('user_id', Auth::user()->id)->first();
            $userDetail->nik = $request->nik;
            $userDetail->no_tlp = $request->no_tlp;
            $userDetail->alamat = $request->alamat;
            if($request->hasFile('file')){
                $userDetail->foto_profil = 'foto_profil_'. auth()->user()->id . '_' . str_replace(' ', '', auth()->user()->nama) . '.' . $request->file->extension();
                $request->file->move(public_path('profile'), 'foto_profil_'. auth()->user()->id . '_' . str_replace(' ', '', auth()->user()->nama) . '.' . $request->file->extension());
            }
            $userDetail->save();
            
            return redirect()->route('admin.profile')->with('success', 'Berhasil update profile!');
        } catch (Throwable $th) {
            return response()->json(['status' => $th->getMessage()]);
        }
    }

    public function kelola_pinjaman() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $pinjamans = Pinjaman::all();
        return view('admin.pages.kelola-pinjaman', compact('user', 'pinjamans'));
    }

    public function detail_pinjaman($id) {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $pinjaman = Pinjaman::findOrFail($id);
        $data_peminjam = User::with('userDetail')->find($pinjaman->user_id);
        return view('admin.pages.detail-pinjaman', compact('user', 'pinjaman', 'data_peminjam'));
    }

    public function konfirmasi_pinjaman($id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = 'Dikonfirmasi';
        $pinjaman->save();
    
        return redirect()->route('admin.kelola-pinjaman')->with('success', 'Pinjaman berhasil dikonfirmasi.');
    }

    public function tolak_pinjaman($id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = 'Ditolak';
        $pinjaman->save();
    
        return redirect()->route('admin.kelola-pinjaman')->with('success', 'Pinjaman berhasil ditolak.');
    }

    public function edit_pinjaman(Request $request, $id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->jml_pinjaman = $request->input('jml_pinjaman');
        $pinjaman->tenor = $request->input('tenor');
        $pinjaman->bunga = $request->input('bunga');
        $pinjaman->status = 'Penawaran';
        $pinjaman->save();
        
        return redirect()->route('admin.kelola-pinjaman')->with('success', 'Penawaran berhasil dikirim.');
    }

    public function pencairan_dana($id) {
        $pinjaman = Pinjaman::findOrFail($id);

        $total_bunga = ($pinjaman->bunga * $pinjaman->tenor) / 12;
        $jml_bunga = ($total_bunga / 100) * $pinjaman->jml_pinjaman;
        $biaya_angsuran = ($pinjaman->jml_pinjaman + $jml_bunga) / $pinjaman->tenor;
        $today = now();
        for ($periode = 1; $periode <= $pinjaman->tenor; $periode++) {
            $angsuran = new Angsuran();
            $angsuran->pinjaman_id = $pinjaman->id;
            $angsuran->periode = $periode;
            $angsuran->biaya_angsuran = $biaya_angsuran;

            $jatuhTempo = $today->addMonth(1);

            $angsuran->jatuh_tempo = $jatuhTempo;
            $angsuran->status = 'Tunggak';
            $angsuran->save();
        }

        $pinjaman->status = 'Diterima';
        $pinjaman->save();

        return redirect()->route('admin.kelola-pinjaman')->with('success', 'Dana pinjaman berhasil dicairkan.');
    }

    public function kelola_pembayaran() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $angsurans = Angsuran::all();
        return view('admin.pages.kelola-pembayaran', compact('user', 'angsurans'));
    }

    public function konfirmasi_pembayaran($id) {
        $angsuran = Angsuran::findOrFail($id);
        $angsuran->status = 'Lunas';
        $angsuran->save();
    
        return redirect()->route('admin.kelola-pembayaran')->with('success', 'Pembayaran Angsuran berhasil dikonfirmasi.');
    }

    public function invalid_pembayaran($id) {
        $angsuran = Angsuran::findOrFail($id);
        $angsuran->status = 'Invalid';
        $angsuran->save();
    
        return redirect()->route('admin.kelola-pembayaran')->with('success', 'Berhasil mengirim konfirmasi bahwa pembayaran tidak valid.');
    }
}
