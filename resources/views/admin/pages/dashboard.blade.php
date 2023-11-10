@extends('admin.layout.main')

@section('contents')

<h1 class="font-size-30 font-weight-600 mb-4">Dashboard</h1>

<div class="row">
    <h2 class="font-size-24 font-weight-600 mb-3">Pinjaman</h2>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Pinjaman Aktif</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $pinjamanAktif }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Pengajuan Pinjaman</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $pengajuanPinjaman }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Proses Penawaran Pinjaman</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $prosesPenawaran }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Menunggu Pencairan Dana</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $menungguPencairan }}</h3>
        </div>
    </div>
</div>

<div class="row mt-4">
    <h2 class="font-size-24 font-weight-600 mb-3">Angsuran</h2>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Angsuran Sudah Dibayar</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $angsuranLunas }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Angsuran Belum Dibayar</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $angsuranTunggak }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 text-center p-3">
            <span class="font-size-13 font-weight-600">Menunggu Konfirmasi Pembayaran</span>
            <h3 class="font-size-24 font-weight-700 mt-3">{{ $angsuranDiproses }}</h3>
        </div>
    </div>
</div>

<div class="row mt-4">
    <h2 class="font-size-24 font-weight-600 mb-3">Dana Pinjaman</h2>
    <div class="col-md-4">
        <div class="card shadow border-0 p-4">
            <span class="font-size-13 font-weight-600">Total Uang Dipinjamkan</span>
            <h3 class="font-size-24 font-weight-700 mt-3">Rp {{ number_format($totalPinjaman, 2) }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow border-0 p-4">
            <span class="font-size-13 font-weight-600">Total Uang Dikembalikan</span>
            <h3 class="font-size-24 font-weight-700 mt-3">Rp {{ number_format($uangDikembalikan, 2) }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow border-0 p-4">
            <span class="font-size-13 font-weight-600">Total Uang Belum Dikembalikan</span>
            <h3 class="font-size-24 font-weight-700 mt-3">Rp {{ number_format($uangBelumDikembalikan, 2) }}</h3>
        </div>
    </div>
</div>

@endsection