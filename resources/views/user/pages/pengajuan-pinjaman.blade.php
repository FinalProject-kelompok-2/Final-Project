@extends('user.layouts.main')

@section('content')

<div class="card shadow border-0 mx-auto my-5 p-4" style="width: 800px;">
    <a href="{{ route('user.home') }}" class="font-weight-500 color-primary-1 mb-4">
        <i class="fa-solid fa-arrow-left me-1" style="color: #006973;"></i>
        Kembali ke Halaman Home
    </a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1 class="font-size-24 font-weight-600 text-center mb-4">Pengajuan Pinjaman</h1>
    <ul class="nav nav-justified mb-5" id="pills-tab" role="tablist">
        <li class="nav-item nav-item-form-pinjaman" role="presentation">
            <a class="nav-link nav-link-form-pinjaman active" id="pills-identitas-peminjam" data-bs-toggle="pill" data-bs-target="#identitas-peminjam" type="button" role="tab" aria-controls="identitas-peminjam" aria-selected="true">Identitas Peminjam</a>
        </li>
        <li class="nav-item nav-item-form-pinjaman" role="presentation">
            <a class="nav-link nav-link-form-pinjaman" id="pills-identitas-usaha" data-bs-toggle="pill" data-bs-target="#identitas-usaha" type="button" role="tab" aria-controls="identitas-usaha" aria-selected="false">Identitas Usaha</a>
        </li>
        <li class="nav-item nav-item-form-pinjaman" role="presentation">
            <a class="nav-link nav-link-form-pinjaman" id="pills-informasi-pinjaman" data-bs-toggle="pill" data-bs-target="#informasi-pinjaman" type="button" role="tab" aria-controls="informasi-pinjaman" aria-selected="false">Informasi Pinjaman</a>
        </li>
    </ul>

    <form enctype="multipart/form-data" action="{{ route('user.pengajuan-pinjaman_store') }}" method="POST">
        @csrf
        <div class="tab-content mx-auto w-75" id="pills-tabContent">
            <div class="tab-pane fade show active" id="identitas-peminjam" role="tabpanel" aria-labelledby="pills-identitas-peminjam">
                <div class="mb-3">
                    <label class="form-label">Foto KTP <span class="text-danger fw-bold">*</span></label>
                    <input name="foto_ktp" class="form-control @error('foto_ktp') is-invalid @enderror" type="file" accept=".png, .jpg, .jpeg">
                    @error('foto_ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Selfie Dengan KTP <span class="text-danger fw-bold">*</span></label>
                    <input name="selfie_ktp" class="form-control @error('selfie_ktp') is-invalid @enderror" type="file" accept=".png, .jpg, .jpeg">
                    @error('selfie_ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kartu Keluarga <span class="text-danger fw-bold">*</span></label>
                    <input name="kk" class="form-control @error('kk') is-invalid @enderror" type="file" accept=".pdf">
                    @error('kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">NPWP <span class="text-danger fw-bold">*</span></label>
                    <input name="npwp" class="form-control @error('npwp') is-invalid @enderror" type="file" accept=".pdf">
                    @error('npwp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="form-label">Buku Tabungan <span class="text-danger fw-bold">*</span></label>
                    <input name="buku_tabungan" class="form-control @error('buku_tabungan') is-invalid @enderror" type="file" accept=".pdf">
                    @error('buku_tabungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <x-btn-primary-green id="simpanPeminjam" type="button" class="w-100 py-2">Simpan</x-btn-primary-green>
                </div>
            </div>
            <div class="tab-pane fade" id="identitas-usaha" role="tabpanel" aria-labelledby="pills-identitas-usaha">
                <div class="form-group mb-3">
                    <label class="mb-2">Nama Usaha <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" value="{{ old('nama_usaha') }}" placeholder="Masukkan nama toko atau nama usaha Anda">
                    @error('nama_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Deskripsi Singkat Tentang Usaha <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="deskripsi_usaha" class="form-control @error('deskripsi_usaha') is-invalid @enderror" value="{{ old('deskripsi_usaha') }}" placeholder="Tuliskan deskripsi singkat mengenai usaha Anda">
                    @error('deskripsi_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Proposal Bisnis <span class="text-danger fw-bold">*</span></label>
                    <input name="proposal_bisnis" class="form-control @error('proposal_bisnis') is-invalid @enderror" type="file" accept=".pdf">
                    @error('proposal_bisnis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Laporan Keuangan <span class="text-danger fw-bold">*</span></label>
                    <input name="laporan_keuangan" class="form-control @error('laporan_keuangan') is-invalid @enderror" type="file" accept=".pdf, .xls, .xlsx">
                    @error('laporan_keuangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Surat Izin Usaha (SIU) <span class="text-danger fw-bold">*</span></label>
                    <input name="siu" class="form-control @error('siu') is-invalid @enderror" type="file" accept=".pdf">
                    @error('siu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Surat Keterangan Domisili Usaha (SKDU) <span class="text-danger fw-bold">*</span></label>
                    <input name="skdu" class="form-control @error('skdu') is-invalid @enderror" type="file" accept=".pdf">
                    @error('skdu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="form-label">Surat Izin Tempat Usaha (SITU) <span class="text-danger fw-bold">*</span></label>
                    <input name="situ" class="form-control @error('situ') is-invalid @enderror" type="file" accept=".pdf">
                    @error('situ')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <x-btn-primary-green id="simpanUsaha" type="button" class="w-100 py-2">Simpan</x-btn-primary-green>
                </div>
            </div>
            <div class="tab-pane fade" id="informasi-pinjaman" role="tabpanel" aria-labelledby="pills-informasi-pinjaman">
                <div class="form-group mb-3">
                    <label class="mb-2">Jumlah Pinjaman <span class="text-danger fw-bold">*</span></label>
                    <input type="number" name="jml_pinjaman" class="form-control @error('jml_pinjaman') is-invalid @enderror" placeholder="Contoh : 50000000">
                    @error('jml_pinjaman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="tenor_id" id="tenorId">
                <div class="form-group mb-3">
                    <label class="mb-2">Pilih Tenor <span class="text-danger fw-bold">*</span></label>
                    <select class="form-select @error('tenor_id') is-invalid @enderror" id="tenorSelect">
                        <option disabled value selected>-- Pilih Tenor --</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}" data-bunga="{{ $item->bunga }}">{{ $item->tenor }} Bulan</option>  
                        @endforeach
                    </select>
                    @error('tenor_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <label class="mb-2">Suku Bunga <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" id="bungaInput" type="text" disabled readonly>
                </div>
                <div class="form-group mb-5">
                    <x-btn-primary-green type="submit" class="w-100 py-2">Ajukan Pinjaman</x-btn-primary-green>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    var tombolSimpanPeminjam = document.getElementById('simpanPeminjam');
    var tombolSimpanUsaha = document.getElementById('simpanUsaha');

    tombolSimpanPeminjam.addEventListener('click', function(event) {
        event.preventDefault();
        var tabIdentitasUsaha = document.querySelector('.nav-link-form-pinjaman[data-bs-target="#identitas-usaha"]');
        tabIdentitasUsaha.click();
        var tabIdentitasPeminjam = document.querySelector('.nav-link-form-pinjaman[data-bs-target="#identitas-peminjam"]');
        tabIdentitasPeminjam.classList.add('completed');

        var tabIcon = document.createElement('img');
        tabIcon.src = '/assets/img/checklist-icon.svg';
        tabIcon.style.marginLeft = '5px';
        tabIdentitasPeminjam.appendChild(tabIcon);
    });

    tombolSimpanUsaha.addEventListener('click', function(event) {
        event.preventDefault();
        var tabInformasiPinjaman = document.querySelector('.nav-link-form-pinjaman[data-bs-target="#informasi-pinjaman"]');
        tabInformasiPinjaman.click();
        var tabIdentitasUsaha = document.querySelector('.nav-link-form-pinjaman[data-bs-target="#identitas-usaha"]');
        tabIdentitasUsaha.classList.add('completed');

        var tabIcon = document.createElement('img');
        tabIcon.src = '/assets/img/checklist-icon.svg';
        tabIcon.style.marginLeft = '5px';
        tabIdentitasUsaha.appendChild(tabIcon);
    });

    document.getElementById('tenorSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var bunga = selectedOption.getAttribute('data-bunga');
        document.getElementById('bungaInput').value = bunga + '%';
        document.getElementById('tenorId').value = selectedOption.value;
    });
</script>

@endsection

{{-- <div class="card shadow border-0 w-50 mx-auto my-5">
    <a href="{{ route('user.home') }}" class="font-weight-500 color-primary-1 m-3">
        <i class="fa-solid fa-arrow-left me-1" style="color: #006973;"></i>
        Back
    </a>
    <div class="p-5 pt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form enctype="multipart/form-data" action="{{ route('user.pengajuan-pinjaman_store') }}" method="POST">
            @csrf
            <div class="mt-3">
                <div class="form-group mb-3">
                    <label class="mb-2">Nama Usaha <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" value="{{ old('nama_usaha') }}" placeholder="Masukkan nama toko atau nama usaha Anda">
                    @error('nama_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Deskripsi Singkat Tentang Usaha <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="deskripsi_usaha" class="form-control @error('deskripsi_usaha') is-invalid @enderror" value="{{ old('deskripsi_usaha') }}" placeholder="Tuliskan deskripsi singkat mengenai usaha Anda">
                    @error('deskripsi_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto KTP <span class="text-danger fw-bold">*</span></label>
                    <input name="foto_ktp" class="form-control @error('foto_ktp') is-invalid @enderror" type="file" accept=".pdf">
                    @error('foto_ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Selfie Dengan KTP <span class="text-danger fw-bold">*</span></label>
                    <input name="selfie_ktp" class="form-control @error('selfie_ktp') is-invalid @enderror" type="file" accept=".pdf">
                    @error('selfie_ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kartu Keluarga <span class="text-danger fw-bold">*</span></label>
                    <input name="kk" class="form-control @error('kk') is-invalid @enderror" type="file" accept=".pdf">
                    @error('kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">NPWP <span class="text-danger fw-bold">*</span></label>
                    <input name="npwp" class="form-control @error('npwp') is-invalid @enderror" type="file" accept=".pdf">
                    @error('npwp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Buku Tabungan <span class="text-danger fw-bold">*</span></label>
                    <input name="buku_tabungan" class="form-control @error('buku_tabungan') is-invalid @enderror" type="file" accept=".pdf">
                    @error('buku_tabungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Proposal Bisnis <span class="text-danger fw-bold">*</span></label>
                    <input name="proposal_bisnis" class="form-control @error('proposal_bisnis') is-invalid @enderror" type="file" accept=".pdf">
                    @error('proposal_bisnis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Laporan Keuangan <span class="text-danger fw-bold">*</span></label>
                    <input name="laporan_keuangan" class="form-control @error('laporan_keuangan') is-invalid @enderror" type="file" accept=".pdf">
                    @error('laporan_keuangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Surat Izin Usaha (SIU) <span class="text-danger fw-bold">*</span></label>
                    <input name="siu" class="form-control @error('siu') is-invalid @enderror" type="file" accept=".pdf">
                    @error('siu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Surat Keterangan Domisili Usaha (SKDU) <span class="text-danger fw-bold">*</span></label>
                    <input name="skdu" class="form-control @error('skdu') is-invalid @enderror" type="file" accept=".pdf">
                    @error('skdu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Surat Izin Tempat Usaha (SITU) <span class="text-danger fw-bold">*</span></label>
                    <input name="situ" class="form-control @error('situ') is-invalid @enderror" type="file" accept=".pdf">
                    @error('situ')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Jumlah Pinjaman <span class="text-danger fw-bold">*</span></label>
                    <input type="number" name="jml_pinjaman" class="form-control @error('jml_pinjaman') is-invalid @enderror" placeholder="Contoh : 50000000">
                    @error('jml_pinjaman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="tenor_id" id="tenorId">
                <div class="form-group mb-3">
                    <label class="mb-2">Pilih Tenor <span class="text-danger fw-bold">*</span></label>
                    <select class="form-select @error('tenor_id') is-invalid @enderror" id="tenorSelect">
                        <option disabled value selected>-- Pilih Tenor --</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}" data-bunga="{{ $item->bunga }}">{{ $item->tenor }} Bulan</option>  
                        @endforeach
                    </select>
                    @error('tenor_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Suku Bunga <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" id="bungaInput" type="text" disabled readonly>
                </div>
                <div class="form-group mb-3">
                    <x-btn-primary-green type="submit" class="w-100 py-2 px-3 mt-4">Ajukan Pinjaman</x-btn-primary-green>
                </div>
            </div>
        </form>
    </div>
</div> --}}