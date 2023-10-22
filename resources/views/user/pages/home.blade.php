@extends('user.layouts.main')

@section('content')

<div class="row mt-5">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0 p-4">
                    <span class="font-size-13 font-weight-600">Jumlah Pinjaman</span>
                    <h2 class="font-size-24 font-weight-700 my-3">Rp 500.000.000,00</h2>
                    <span class="text-success font-size-11 font-weight-600">Jumlah uang yang sudah diterima oleh Anda</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 p-4 mt-3 mt-md-0">
                    <span class="font-size-13 font-weight-600">Hutang Belum Dibayar</span>
                    <h2 class="font-size-24 font-weight-700 my-3">Rp 400.000.000,00</h2>
                    <span class="text-primary font-size-11 font-weight-600">Total hutang sudah termasuk bunga 6%</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 p-4 mt-3 mt-md-0">
                    <span class="font-size-13 font-weight-600">Hutang Sudah Dibayar</span>
                    <h2 class="font-size-24 font-weight-700 my-3">Rp 150.000.000,00</h2>
                    <span class="text-success font-size-11 font-weight-600">Jumlah uang yang sudah dikembalikan</span>
                </div>
            </div>
        </div>

        <div class="card shadow border-0 p-4 mt-4">
            <h2 class="font-size-20 font-weight-700">Due Date</h2>
            <div class="d-flex justify-content-between mt-2">
                <span class="text-secondary font-size-13 font-weight-500">Month</span>
                <span class="text-secondary font-size-13 font-weight-500">Amount</span>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-4 pb-2">
                <div>
                    <p class="font-size-15 font-weight-600 m-0">Bulan 1</p>
                    <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">2 Februari 2023</p>
                </div>
                <div>
                    <span class="font-size-15 font-weight-600">Rp 50.000.000,00</span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <div>
                    <p class="font-size-15 font-weight-600 m-0">Bulan 2</p>
                    <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">2 Maret 2023</p>
                </div>
                <div>
                    <span class="font-size-15 font-weight-600">Rp 50.000.000,00</span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <div>
                    <p class="font-size-15 font-weight-600 m-0">Bulan 3</p>
                    <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">2 April 2023</p>
                </div>
                <div>
                    <span class="font-size-15 font-weight-600">Rp 50.000.000,00</span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <div>
                    <p class="font-size-15 font-weight-600 m-0">Bulan 4</p>
                    <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">2 Mei 2023</p>
                </div>
                <div>
                    <span class="font-size-15 font-weight-600">Rp 50.000.000,00</span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <div>
                    <p class="font-size-15 font-weight-600 m-0">Bulan 5</p>
                    <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">2 Juni 2023</p>
                </div>
                <div>
                    <span class="font-size-15 font-weight-600">Rp 50.000.000,00</span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <div>
                    <p class="font-size-15 font-weight-600 m-0">Bulan 6</p>
                    <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">2 Juli 2023</p>
                </div>
                <div>
                    <span class="font-size-15 font-weight-600">Rp 50.000.000,00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 p-4 mt-4 mt-md-0">
            <h2 class="font-size-17 font-weight-600">Usaha Toko Baju</h2>
            <div class="mt-2 border border-secondary rounded p-2">
                <span class="font-size-15 font-weight-600">Deskripsi Usaha</span>
                <p class="font-size-15 font-weight-500 mt-2 mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quia praesentium quos optio molestiae quis perspiciatis a.</p>
            </div>
            <h3 class="font-size-15 font-weight-600 mt-5">Informasi Pinjaman</h3>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-2 pb-2">
                <span class="font-size-13 font-weight-500 m-0">Bunga</span>
                <span class="font-size-13 font-weight-600">6%</span>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <span class="font-size-13 font-weight-500 m-0">Teneur</span>
                <span class="font-size-13 font-weight-600">12 Bulan</span>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <span class="font-size-13 font-weight-500 m-0">Tanggal <br> Penerimaan Dana</span>
                <span class="font-size-13 font-weight-600">2 Februari 2023</span>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                <span class="font-size-13 font-weight-500 m-0">Tanggal <br> Pelunasan Akhir</span>
                <span class="font-size-13 font-weight-600">2 Juli 2023</span>
            </div>
        </div>
    </div>
</div>

@endsection