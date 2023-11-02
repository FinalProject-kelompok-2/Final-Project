<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use App\Models\Tenor;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function landing() {
        return view('user.pages.landing');
    }

    public function home() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $cekPinjaman = Pinjaman::where('user_id', auth()->user()->id)->first();
        $pinjamans = Pinjaman::where('user_id', auth()->user()->id)->get();
        
        $tagihans = [];

        foreach ($pinjamans as $pinjaman) {
            if ($pinjaman) {
                $tagihan = Angsuran::where('pinjaman_id', $pinjaman->id)
                    ->where('status', 'Tunggak')
                    ->orderBy('periode', 'asc')
                    ->get();
            } else {
                $tagihan = [];
            }
            
            $tagihans[$pinjaman->id] = $tagihan;
        }
    
        return view('user.pages.home', compact('user', 'cekPinjaman', 'pinjamans', 'tagihans'));
    }

    public function profile() {
        $user = User::where('id', Auth::user()->id)->with('UserDetail')->first();
        return view('user.pages.profile', compact('user'));
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
            
            return redirect()->route('user.profile')->with('success', 'Berhasil update profile!');
        } catch (Throwable $th) {
            return response()->json(['status' => $th->getMessage()]);
        }
    }

    public function pengajuan_pinjaman() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $data = Tenor::all();
        $bank = Bank::all();
        if (empty($user->userDetail->nik) || empty($user->userDetail->foto_profil) || empty($user->userDetail->no_tlp) || empty($user->userDetail->alamat)) {
            return redirect()->route('user.home')->with('error', 'Lengkapi profil Anda terlebih dahulu!');
        }
        return view('user.pages.pengajuan-pinjaman', compact('user', 'data', 'bank'));
    }

    public function pengajuan_pinjaman_store(Request $request) {
        $request->validate([
            'nama_usaha' => 'required|string',
            'deskripsi_usaha' => 'required|string',
            'foto_ktp' => 'required|file|mimes:png,jpg,jpeg',
            'selfie_ktp' => 'required|file|mimes:png,jpg,jpeg',
            'kk' => 'required|file|mimes:pdf',
            'npwp' => 'required|file|mimes:pdf',
            'buku_tabungan' => 'required|file|mimes:pdf',
            'no_rekening' => 'required|string',
            'nama_rekening' => 'required|string',
            'proposal_bisnis' => 'required|file|mimes:pdf',
            'laporan_keuangan' => 'required|file|mimes:pdf,xls,xlsx',
            'siu' => 'required|file|mimes:pdf',
            'skdu' => 'required|file|mimes:pdf',
            'situ' => 'required|file|mimes:pdf',
            'jml_pinjaman' => 'required|integer',
            'tenor_id' => 'required|exists:tenor,id',
            'bank_id' => 'required|exists:bank,id',
        ]);

        try {
            $tenor = Tenor::find($request->tenor_id);
            $bank = Bank::find($request->bank_id);

            $pinjaman = new Pinjaman();
            $pinjaman->user_id = auth()->user()->id;
            $pinjaman->nama_usaha = $request->nama_usaha;
            $pinjaman->deskripsi_usaha = $request->deskripsi_usaha;
            $pinjaman->no_rekening = $request->no_rekening;
            $pinjaman->nama_rekening = $request->nama_rekening;
            $pinjaman->jml_pinjaman = $request->jml_pinjaman;
            $pinjaman->bank_id = $request->bank_id;
            $pinjaman->nama_bank = $bank->nama_bank;
            $pinjaman->tenor_id = $request->tenor_id;
            $pinjaman->tenor = $tenor->tenor;
            $pinjaman->bunga = $tenor->bunga;
            $pinjaman->status = 'Diproses';

            if ($request->hasFile('foto_ktp')) {
                $foto_ktp = $request->file('foto_ktp');
                $fotoKtpFileName = 'foto_ktp_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $foto_ktp->extension();
                $foto_ktp->storeAs('public/dokumen', $fotoKtpFileName);

                $pinjaman->foto_ktp = $fotoKtpFileName;
            }

            if ($request->hasFile('selfie_ktp')) {
                $selfie_ktp = $request->file('selfie_ktp');
                $selfieKtpFileName = 'foto_selfie_ktp_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $selfie_ktp->extension();
                $selfie_ktp->storeAs('public/dokumen', $selfieKtpFileName);

                $pinjaman->selfie_ktp = $selfieKtpFileName;
            }

            if ($request->hasFile('kk')) {
                $kk = $request->file('kk');
                $kkFileName = 'kk_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $kk->extension();
                $kk->storeAs('public/dokumen', $kkFileName);

                $pinjaman->kk = $kkFileName;
            }

            if ($request->hasFile('npwp')) {
                $npwp = $request->file('npwp');
                $npwpFileName = 'npwp_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $npwp->extension();
                $npwp->storeAs('public/dokumen', $npwpFileName);

                $pinjaman->npwp = $npwpFileName;
            }

            if ($request->hasFile('buku_tabungan')) {
                $buku_tabungan = $request->file('buku_tabungan');
                $bukuTabunganFileName = 'buku_tabungan_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $buku_tabungan->extension();
                $buku_tabungan->storeAs('public/dokumen', $bukuTabunganFileName);

                $pinjaman->buku_tabungan = $bukuTabunganFileName;
            }

            if ($request->hasFile('proposal_bisnis')) {
                $proposal_bisnis = $request->file('proposal_bisnis');
                $proposalBisnisFileName = 'proposal_bisnis_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $proposal_bisnis->extension();
                $proposal_bisnis->storeAs('public/dokumen', $proposalBisnisFileName);

                $pinjaman->proposal_bisnis = $proposalBisnisFileName;
            }

            if ($request->hasFile('laporan_keuangan')) {
                $laporan_keuangan = $request->file('laporan_keuangan');
                $laporanKeuanganFileName = 'laporan_keuangan_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $laporan_keuangan->extension();
                $laporan_keuangan->storeAs('public/dokumen', $laporanKeuanganFileName);

                $pinjaman->laporan_keuangan = $laporanKeuanganFileName;
            }

            if ($request->hasFile('siu')) {
                $siu = $request->file('siu');
                $siuFileName = 'siu_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $siu->extension();
                $siu->storeAs('public/dokumen', $siuFileName);

                $pinjaman->siu = $siuFileName;
            }

            if ($request->hasFile('skdu')) {
                $skdu = $request->file('skdu');
                $skduFileName = 'skdu_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $skdu->extension();
                $skdu->storeAs('public/dokumen', $skduFileName);

                $pinjaman->skdu = $skduFileName;
            }

            if ($request->hasFile('situ')) {
                $situ = $request->file('situ');
                $situFileName = 'situ_' . auth()->user()->id . '_' . str_replace(' ', '', $request->nama_usaha) . '.' . $situ->extension();
                $situ->storeAs('public/dokumen', $situFileName);

                $pinjaman->situ = $situFileName;
            }

            $pinjaman->save();

            return redirect()->route('user.pengajuan-pinjaman')->with('success', 'Pinjaman berhasil diajukan.');
        } catch (\Throwable $th) {
            return response()->json(['status' => $th->getMessage()]);
        }
    }

    public function konfirmasi_pinjaman($id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = 'Dikonfirmasi';
        $pinjaman->save();
    
        return redirect()->route('user.home')->with('success', 'Pinjaman berhasil dikonfirmasi.');
    }

    public function tolak_pinjaman($id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = 'Ditolak';
        $pinjaman->save();
    
        return redirect()->route('user.home')->with('success', 'Pinjaman berhasil ditolak.');
    }

    public function riwayat_pembayaran() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $cekPinjaman = Pinjaman::where('user_id', auth()->user()->id)->first();
        $pinjamans = Pinjaman::where('user_id', auth()->user()->id)->get();
        
        $tagihans = [];
        $angsurans = [];

        foreach ($pinjamans as $pinjaman) {
            if ($pinjaman) {
                $angsuran = Angsuran::where('pinjaman_id', $pinjaman->id)->get();
                $tagihan = Angsuran::where('pinjaman_id', $pinjaman->id)
                    ->where('status', 'Tunggak')
                    ->orderBy('periode', 'asc')
                    ->first();
            } else {
                $angsuran = [];
                $tagihan = [];
            }
            
            $tagihans[$pinjaman->id] = $tagihan;
            $angsurans[$pinjaman->id] = $angsuran;
        }
        return view('user.pages.riwayat-pembayaran', compact('user', 'cekPinjaman', 'pinjamans', 'angsurans', 'tagihans'));
    }

    public function konfirmasi_pembayaran($id) {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        $angsuran = Angsuran::findOrFail($id);
        return view('user.pages.konfirmasi-pembayaran', compact('user', 'angsuran'));
    }

    public function konfirmasi_pembayaran_store(Request $request, $id) {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:pdf',
        ]);
        
        $angsuran = Angsuran::findOrFail($id);
        
        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $buktiPembayaranFileName = 'bukti_pembayaran_' . $angsuran->id . '.' . $bukti_pembayaran->extension();
            $bukti_pembayaran->storeAs('public/bukti_pembayaran', $buktiPembayaranFileName);
            
            $angsuran->bukti_pembayaran = $buktiPembayaranFileName;
            $angsuran->status = 'Proses';
        }

        $angsuran->save();
        
        return redirect()->route('user.riwayat-pembayaran')->with('success', 'Bukti pembayaran berhasil dikonfirmasi.');
    }
}
