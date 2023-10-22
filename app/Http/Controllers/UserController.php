<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function landing() {
        return view('user.pages.landing');
    }

    function home() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        return view('user.pages.home', compact('user'));
    }

    function profile() {
        $user = User::where('id', Auth::user()->id)->with('UserDetail')->first();
        return view('user.pages.profile', compact('user'));
    }

    function edit_profile(Request $request) {
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
                $userDetail ->foto_profil = 'photo'.time().'.'.$request->file->extension();
                $request->file->move(public_path('profile'), 'photo'.time().'.'.$request->file->extension());
            }
            $userDetail->save();
            
            return redirect()->route('user.profile')->with('success', 'Berhasil update profile!');
        } catch (Throwable $th) {
            return response()->json(['status' => $th->getMessage()]);
        }
    }

    function pengajuan_pinjaman() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        return view('user.pages.pengajuan-pinjaman', compact('user'));
    }

    function riwayat_pembayaran() {
        $user = User::where('id', Auth::user()->id)->with('userDetail')->first();
        return view('user.pages.riwayat-pembayaran', compact('user'));
    }
}
