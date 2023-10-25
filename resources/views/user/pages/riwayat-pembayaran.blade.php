@extends('user.layouts.main')

@section('content')

@if ($cekPinjaman)

    <div class="dropdown mt-5">
        <x-btn-primary-green class="dropdown-toggle py-2 px-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span id="selectedToko">{{ $pinjamans[0]->nama_usaha }}</span>
        </x-btn-primary-green>
        <ul class="dropdown-menu" id="pills-tab" role="tablist">
            @foreach ($pinjamans as $index => $pinjaman)
            <li role="presentation">
                <a class="dropdown-item {{ $index === 0 ? 'active' : '' }}" id="pills-{{ $pinjaman->id }}" data-bs-toggle="pill" data-bs-target="#pill-{{ $pinjaman->id }}" role="tab" aria-controls="pill-{{ $pinjaman->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}" onclick="updateSelectedToko('{{ $pinjaman->nama_usaha }}')">
                    {{ $pinjaman->nama_usaha }}
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        @foreach ($pinjamans as $index => $pinjaman)
            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="pill-{{ $pinjaman->id }}" role="tabpanel" aria-labelledby="pills-{{ $pinjaman->id }}">
                <h1 class="font-size-30 font-weight-700 text-dark mt-4">Riwayat Pembayaran {{ $pinjaman->nama_usaha }}</h1>
                <div class="row mt-4">
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
                                        <?php $no = 1;?>
                                        @foreach ($angsurans[$pinjaman->id] as $data)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>Bulan {{ $data->periode }}</td>
                                                <td>Rp {{ number_format($data->biaya_angsuran, 2) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->jatuh_tempo)->format('d F Y') }}</td>
                                                <td>
                                                    @if ($data->status)
                                                        <span class="font-size-13 font-weight-600 status-green">Sudah Dibayar</span>
                                                    @else
                                                        <span class="font-size-13 font-weight-600 status-red">Belum Dibayar</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
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
                                <span class="font-size-13 font-weight-600">Bulan {{ $tagihans[$pinjaman->id]->periode }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <span class="font-size-13 font-weight-500 m-0">Biaya Angsuran</span>
                                <span class="font-size-13 font-weight-600">Rp {{ number_format($tagihans[$pinjaman->id]->biaya_angsuran, 2) }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3 pb-3" style="border-bottom: 1px dashed grey;">
                                <span class="font-size-13 font-weight-500 m-0">Batas Waktu <br> Pembayaran</span>
                                <span class="font-size-13 font-weight-600">{{ \Carbon\Carbon::parse($tagihans[$pinjaman->id]->jatuh_tempo)->format('d F Y') }}</span>
                            </div>
                            <div class="text-end mt-3">
                                <p class="font-size-13 font-weight-500 mb-1">Total Tagihan</p>
                                <span class="font-size-17 font-weight-600">Rp {{ number_format($tagihans[$pinjaman->id]->biaya_angsuran, 2) }}</span>
                            </div>
                            <x-btn-primary-green class="py-2 mt-4">Konfirmasi Pembayaran</x-btn-primary-green>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@else

    <div class="card shadow border-0 mx-auto w-50 p-5 mt-5">
        <img src="{{ asset('assets/img/logo.png') }}" class="d-block mx-auto" width="118" alt="Logo">
        <img src="{{ asset('assets/img/information-img.png') }}" class="d-block mx-auto mt-3" width="320">
        <h1 class="font-size-20 font-weight-700 text-center mt-3">Anda belum mengajukan pinjaman</h1>
        <x-btn-primary-green onclick="location.href = '{{ route('user.pengajuan-pinjaman') }}'" class="py-2 mt-4">Ajukan Pinjaman</x-btn-primary-green>
    </div>

    <div class="modal" tabindex="-1" id="errorModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('assets/img/validation-img.png') }}" class="d-block mx-auto" width="200">
                    <h1 class="font-size-17 font-weight-700 text-center mt-3">{{ session('error') }}</h1>
                    <x-btn-primary-green onclick="location.href = '{{ route('user.profile') }}'" class="d-block mx-auto py-2 px-4 my-3">Lengkapi Data Diri</x-btn-primary-green>
                </div>
            </div>
        </div>
    </div>

@endif

<script>
    @if(session('error'))
        document.addEventListener("DOMContentLoaded", function () {
            var modal = new bootstrap.Modal(document.getElementById('errorModal'));
            modal.show();
        });
    @endif
</script>

<script>
    function updateSelectedToko(namaToko) {
        document.getElementById('selectedToko').textContent = namaToko;
    }
</script>

@endsection