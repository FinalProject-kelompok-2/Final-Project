@extends('user.layouts.main')

@section('content')

<div class="card shadow border-0 w-50 mx-auto my-5">
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
                <div class="mb-3">
                    <label class="form-label">Foto KTP <span class="text-danger fw-bold">*</span></label>
                    <input name="foto_ktp" class="form-control @error('foto_ktp') is-invalid @enderror" type="file" accept=".pdf">
                    @error('foto_ktp')
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
</div>

<script>
    document.getElementById('tenorSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var bunga = selectedOption.getAttribute('data-bunga');
        document.getElementById('bungaInput').value = bunga + '%';
        document.getElementById('tenorId').value = selectedOption.value;
    });
</script>

@endsection