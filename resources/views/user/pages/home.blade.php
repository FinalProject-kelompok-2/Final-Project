@extends('user.layouts.main')

@section('content')

@if ($cekPinjaman)

    <div class="dropdown margin-top-100">
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

    @if(session('success'))
        <div class="alert alert-success d-block mx-auto w-75 mt-3">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger d-block mx-auto w-75 mt-3">{{ session('error') }}</div>
    @endif

    
    <div class="tab-content margin-bottom-70" id="pills-tabContent">
        @foreach ($pinjamans as $index => $pinjaman)
            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="pill-{{ $pinjaman->id }}" role="tabpanel" aria-labelledby="pills-{{ $pinjaman->id }}">
                @if ($pinjaman->status == 'Diterima')
                    <h1 class="font-size-30 font-weight-700 text-dark mt-4">Pinjaman {{ $pinjaman->nama_usaha }}</h1>
                    <div class="row mt-4">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card shadow border-0 p-4">
                                        <span class="font-size-13 font-weight-600">Jumlah Pinjaman</span>
                                        <h2 class="font-size-24 font-weight-700 my-3">Rp {{ number_format($pinjaman->jml_pinjaman, 2) }}</h2>
                                        <span class="text-success font-size-11 font-weight-600">Jumlah uang yang sudah diterima oleh Anda</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card shadow border-0 p-4 mt-3 mt-md-0">
                                        <span class="font-size-13 font-weight-600">Hutang Belum Dibayar</span>
                                        <h2 class="font-size-24 font-weight-700 my-3">Rp {{ number_format($pinjaman->angsuran->where('status', '!=', 'Lunas')->sum('biaya_angsuran'), 2) }}</h2>
                                        <span class="text-primary font-size-11 font-weight-600">Total hutang sudah termasuk bunga {{ $pinjaman->bunga }}% per tahun</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card shadow border-0 p-4 mt-3 mt-md-0">
                                        <span class="font-size-13 font-weight-600">Hutang Sudah Dibayar</span>
                                        <h2 class="font-size-24 font-weight-700 my-3">Rp {{ number_format($pinjaman->angsuran->where('status', 'Lunas')->sum('biaya_angsuran'), 2) }}</h2>
                                        <span class="text-success font-size-11 font-weight-600">Jumlah uang yang sudah dikembalikan</span>
                                    </div>
                                </div>
                            </div>
                
                            <div class="card shadow border-0 p-4 mt-4">
                                <h2 class="font-size-20 font-weight-700">Angsuran Belum Dibayar</h2>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="text-secondary font-size-13 font-weight-500">Month</span>
                                    <span class="text-secondary font-size-13 font-weight-500">Amount</span>
                                </div>
                                @foreach ($tagihans[$pinjaman->id] as $data)
                                    <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-4 pb-2">
                                        <div>
                                            <p class="font-size-15 font-weight-600 m-0">Bulan {{ $data->periode }}</p>
                                            <p class="text-secondary font-size-13 font-weight-600 m-0 mt-2">
                                                {{ \Carbon\Carbon::parse($data->jatuh_tempo)->format('d F Y') }}
                                            </p>
                                        </div>
                                        <div>
                                            <span class="font-size-15 font-weight-600">Rp {{ number_format($data->biaya_angsuran, 2) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow border-0 p-4 mt-4 mt-md-0">
                                <h2 class="font-size-17 font-weight-600">{{ $pinjaman->nama_usaha }}</h2>
                                <div class="mt-2 border border-secondary rounded p-2">
                                    <span class="font-size-15 font-weight-600">Deskripsi Usaha</span>
                                    <p class="font-size-15 font-weight-500 mt-2 mb-1">{{ $pinjaman->deskripsi_usaha }}.</p>
                                </div>
                                <h3 class="font-size-15 font-weight-600 mt-5">Informasi Pinjaman</h3>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-2 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Bunga</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->bunga }}% Per Tahun</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tenor</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->tenor }} Bulan</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tanggal <br> Penerimaan Dana</span>
                                    <span class="font-size-13 font-weight-600">{{ \Carbon\Carbon::parse($pinjaman->updated_at)->format('j F Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tanggal <br> Pelunasan Akhir</span>
                                    <span class="font-size-13 font-weight-600">{{ \Carbon\Carbon::parse($pinjaman->created_at)->addMonths($pinjaman->tenor)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif ($pinjaman->status == 'Diproses')
            
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 p-4 mt-4 mt-md-0">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/toko-icon.svg') }}" class="me-2" width="45">
                                    <span class="font-size-17 font-weight-600">{{ $pinjaman->nama_usaha }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <span class="font-size-15 font-weight-600">Status</span>
                                    <span class="status-orange">{{ $pinjaman->status }}</span>
                                </div>
                                <h3 class="font-size-15 font-weight-600 mt-4">Informasi Pinjaman</h3>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-2 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Jumlah Pinjaman</span>
                                    <span class="font-size-13 font-weight-600">{{ number_format($pinjaman->jml_pinjaman, 2) }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Bunga</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->bunga }}% Per Tahun</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tenor</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->tenor }} Bulan</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tanggal <br> Pengajuan Pinjaman</span>
                                    <span class="font-size-13 font-weight-600">{{ \Carbon\Carbon::parse($pinjaman->created_at)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow text-center border-0 p-4">
                                <img src="{{ asset('assets/img/cara-kerja-img-2.png') }}" class="d-block mx-auto" width="320">
                                <h1 class="font-size-20 font-weight-700 mt-3">Pinjaman Diproses</h1>
                                <p class="font-size-15 font-weight-500 mt-2">Pinjaman Anda sedang diproses oleh admin UMKMPLUS.</p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    

                @elseif ($pinjaman->status == 'Penawaran')
        
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 p-4 mt-4 mt-md-0">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/toko-icon.svg') }}" class="me-2" width="45">
                                    <span class="font-size-17 font-weight-600">{{ $pinjaman->nama_usaha }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <span class="font-size-15 font-weight-600">Status</span>
                                    <span class="status-blue">{{ $pinjaman->status }}</span>
                                </div>
                                <div class="mt-2 border border-secondary rounded p-2 mt-4">
                                    <span class="font-size-15 font-weight-600">Note</span>
                                    <p class="font-size-15 font-weight-500 text-secondary mt-1 mb-1">Jika penawaran pinjaman belum dikonfirmasi sampai tanggal yang sudah ditentukan, maka pengajuan pinjaman akan dibatalkan.</p>
                                </div>
                                <h3 class="font-size-15 font-weight-600 mt-4">Pinjaman yang Ditawarkan</h3>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-2 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Jumlah Pinjaman</span>
                                    <span class="font-size-13 font-weight-600">{{ number_format($pinjaman->jml_pinjaman, 2) }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Bunga</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->bunga }}% Per Tahun</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tenor</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->tenor }} Bulan</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Batas Tanggal <br> Konfirmasi Pinjaman</span>
                                    <span class="font-size-13 font-weight-600">{{ \Carbon\Carbon::parse($pinjaman->updated_at->addDay(2))->format('j F Y') }}</span>
                                </div>
                                <button type="button" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#modalKonfirmasiPinjaman{{ $pinjaman->id }}">Setuju</button>
                                <button type="button" class="btn btn-danger w-100 mt-2" data-bs-toggle="modal" data-bs-target="#modalTolakPinjaman{{ $pinjaman->id }}">Tolak</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow text-center border-0 p-4">
                                <img src="{{ asset('assets/img/keuntungan-img-2.png') }}" class="d-block mx-auto" width="320">
                                <h1 class="font-size-20 font-weight-700 mt-3">Admin Megajukan Penawaran</h1>
                                <p class="font-size-15 font-weight-500 mt-2">Pihak UMKMPLUS mengajukan penwaran pinjaman yang bisa diberikan.</p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="modal fade" id="modalKonfirmasiPinjaman{{ $pinjaman->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pinjaman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('user.konfirmasi-pinjaman', ['id' => $pinjaman->id]) }}">
                                    <div class="modal-body">
                                        @csrf
                                        <p>Pastikan penawaran jumlah pinjaman, tenor, dan bunga sudah sesuai dengan keinginan Anda sebelum melanjutkan.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="modalTolakPinjaman{{ $pinjaman->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Pinjaman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('user.tolak-pinjaman', ['id' => $pinjaman->id]) }}">
                                    <div class="modal-body">
                                        @csrf
                                        <p>Anda yakin ingin menolak penawaran pinjaman?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @elseif ($pinjaman->status == 'Dikonfirmasi')
        
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 p-4 mt-4 mt-md-0">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/toko-icon.svg') }}" class="me-2" width="45">
                                    <span class="font-size-17 font-weight-600">{{ $pinjaman->nama_usaha }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <span class="font-size-15 font-weight-600">Status</span>
                                    <span class="status-blue">{{ $pinjaman->status }}</span>
                                </div>
                                <div class="mt-2 border border-secondary rounded p-2 mt-4">
                                    <span class="font-size-15 font-weight-600">Note</span>
                                    <p class="font-size-15 font-weight-500 text-secondary mt-1 mb-1">Pinjaman sudah dikonfirmasi oleh kedua belah pihak. Pinjaman anda sedang dalam proses pencairan dana</p>
                                </div>
                                <h3 class="font-size-15 font-weight-600 mt-4">Informasi Pinjaman</h3>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-2 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Jumlah Pinjaman</span>
                                    <span class="font-size-13 font-weight-600">{{ number_format($pinjaman->jml_pinjaman, 2) }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Bunga</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->bunga }}% Per Tahun</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tenor</span>
                                    <span class="font-size-13 font-weight-600">{{ $pinjaman->tenor }} Bulan</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom border-secondary-subtle mt-3 pb-2">
                                    <span class="font-size-13 font-weight-500 m-0">Tanggal <br> Pengajuan Pinjaman</span>
                                    <span class="font-size-13 font-weight-600">{{ \Carbon\Carbon::parse($pinjaman->created_at)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow text-center border-0 p-4">
                                <img src="{{ asset('assets/img/thanks-img.png') }}" class="d-block mx-auto" width="320">
                                <h1 class="font-size-20 font-weight-700 mt-3">Pinjaman Sudah Dikonfirmasi</h1>
                                <p class="font-size-15 font-weight-500 mt-2">Pihak UMKMPLUS sedang memproses pencairan dana.</p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
            
                @else
            
                    <div class="card shadow border-0 mx-auto w-50 p-5 mt-4 mb-5">
                        <img src="{{ asset('assets/img/logo.png') }}" class="d-block mx-auto" width="118" alt="Logo">
                        <img src="{{ asset('assets/img/validation-img.png') }}" class="d-block mx-auto mt-3" width="270">
                        <h1 class="font-size-20 font-weight-700 text-center mt-3">Pinjaman Ditolak</h1>
                        <p class="font-size-15 font-weight-500 text-center mt-2">Pinjaman Anda Ditolak karena alasan tertentu.</p>
                        <x-btn-primary-green onclick="location.href = '{{ route('user.pengajuan-pinjaman') }}'" class="py-2 mt-4">Ajukan Pinjaman Lagi</x-btn-primary-green>
                    </div>
            
                @endif
            </div>

        @endforeach

    </div>


@else

    <div class="card shadow margin-bottom-70 border-0 margin-top-100 mx-auto w-50 p-5">
        <img src="{{ asset('assets/img/logo.png') }}" class="d-block mx-auto" width="118" alt="Logo">
        <img src="{{ asset('assets/img/information-img.png') }}" class="d-block mx-auto mt-3" width="320">
        <h1 class="font-size-20 font-weight-700 text-center mt-3">Anda belum mengajukan pinjaman</h1>
        <x-btn-primary-green onclick="location.href = '{{ route('user.pengajuan-pinjaman') }}'" class="py-2 mt-4">Ajukan Pinjaman</x-btn-primary-green>
    </div>

@endif

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