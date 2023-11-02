<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        return view('admin.pages.dashboard', compact('user'));
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
}
