@extends('user.layouts.main')

@section('content')

<div class="row mt-5">
    <div class="col-md-9">
        <div class="card shadow border-0 p-4">
            <h2 class="font-size-20 font-weight-600">Riwayat Pembayaran</h2>
            <div class="table-responsive border border-secondary rounded mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Periode Tagihan</th>
                            <th scope="col">Biaya Angsuran</th>
                            <th scope="col">Batas Waktu Pembayaran</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Bulan 1</td>
                            <td>Rp 50.000.000,00</td>
                            <td>2 Februari 2023</td>
                            <td><span class="status-green">Sudah Dibayar</span></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Bulan 2</td>
                            <td>Rp 50.000.000,00</td>
                            <td>2 Maret 2023</td>
                            <td><span class="status-green">Sudah Dibayar</span></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Bulan 3</td>
                            <td>Rp 50.000.000,00</td>
                            <td>2 April 2023</td>
                            <td><span class="status-green">Sudah Dibayar</span></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Bulan 4</td>
                            <td>Rp 50.000.000,00</td>
                            <td>2 Mei 2023</td>
                            <td><span class="status-red">Belum Bayar</span></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Bulan 5</td>
                            <td>Rp 50.000.000,00</td>
                            <td>2 Juni 2023</td>
                            <td><span class="status-red">Belum Bayar</span></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Bulan 6</td>
                            <td>Rp 50.000.000,00</td>
                            <td>2 Juli 2023</td>
                            <td><span class="status-red">Belum Bayar</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow border-0 p-4">
            <div class="d-flex align-items-center justify-content-between">
                <span class="font-size-15 font-weight-600 m-0">Tagihan Anda</span>
                <span class="status-red">Belum Dibayar</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4">
                <span class="font-size-13 font-weight-500 m-0">Periode Tagihan</span>
                <span class="font-size-13 font-weight-600">Bulan 4</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-3">
                <span class="font-size-13 font-weight-500 m-0">Biaya Angsuran</span>
                <span class="font-size-13 font-weight-600">Rp 50.000.000,00</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-3 pb-3" style="border-bottom: 1px dashed grey;">
                <span class="font-size-13 font-weight-500 m-0">Batas Waktu <br> Pembayaran</span>
                <span class="font-size-13 font-weight-600">2 Mei 2023</span>
            </div>
            <div class="text-end mt-3">
                <p class="font-size-13 font-weight-500 mb-1">Total Tagihan</p>
                <span class="font-size-17 font-weight-600">Rp 50.000.000</span>
            </div>
            <x-btn-primary-green class="py-2 mt-4">Konfirmasi Pembayaran</x-btn-primary-green>
        </div>
    </div>
</div>

@endsection