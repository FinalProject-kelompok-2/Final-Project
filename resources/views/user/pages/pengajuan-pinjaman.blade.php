@extends('user.layouts.main')

@section('content')

<div class="card shadow border-0 w-50 mx-auto my-5">
    <a href="{{ route('user.home') }}" class="font-weight-500 color-primary-1 m-3">
        <i class="fa-solid fa-arrow-left me-1" style="color: #006973;"></i>
        Back
    </a>
    <div class="p-5 pt-4">
        <form enctype="multipart/form-data" action="" method="POST">
            @csrf
            <div class="mt-3">
                <div class="form-group mb-3">
                    <label class="mb-2">Nama Usaha <span class="text-danger fw-bold">*</span></label>
                    <input type="text" class="form-control" name="nama_usaha" placeholder="Masukkan nama toko atau nama usaha Anda">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto KTP <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Kartu Keluarga <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">NPWP <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Buku Tabungan <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Proposal Bisnis <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Surat Izin Usaha (SIU) <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Surat Keterangan Domisili Usaha (SKDU) <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Surat Izin Tempat Usaha (SITU) <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Jumlah Pinjaman <span class="text-danger fw-bold">*</span></label>
                    <input type="number" class="form-control" name="jml_pinjaman" placeholder="Contoh : 500.000.000">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Pilih Tenor <span class="text-danger fw-bold">*</span></label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">6 Bulan</option>
                        <option value="2">12 Bulan</option>
                        <option value="3">24 Bulan</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Suku Bunga <span class="text-danger fw-bold">*</span></label>
                    <input class="form-control" type="text" value="6%" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="form-group mb-3">
                    <x-btn-primary-green type="submit" class="w-100 py-2 px-3 mt-5">Ajukan Pinjaman</x-btn-primary-green>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection