@extends('admin.layout.main')

@section('contents')

<div class="card shadow mx-auto border-0 w-50 my-4">
    <a href="{{ route('admin.dashboard') }}" class="font-weight-500 color-primary-1 m-3">
        <i class="fa-solid fa-arrow-left me-1" style="color: #006973;"></i>
        Kembali ke Dashboard
    </a>
    <div class="p-5 pt-4">
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @elseif(session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        <form enctype="multipart/form-data" action="{{ route('admin.edit_profile') }}" method="POST">
            @csrf
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img src="{{ $user->userDetail->foto_profil ? asset('profile/' . $user->userDetail->foto_profil) : asset('assets/img/profile.svg') }}" id="preview" class="rounded-circle" height="120px" width="120px" alt="Foto Profil" style="object-fit: cover">
                <x-btn-primary-green type="button" class="py-2 px-3 mt-3" onclick="document.getElementById('file').click()">Pilih Foto</x-btn-primary-green>
                <input name="file" class="d-none" type="file" accept=".png, .jpg, .jpeg" id="file">
            </div>
            <div class="mt-5">
                <div class="form-group mb-3">
                    <label class="mb-2">NIK <span class="text-danger fw-bold">*</span></label>
                    <input name="nik" class="form-control" type="text" value="{{ $user->userDetail->nik }}">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Nama Lengkap <span class="text-danger fw-bold">*</span></label>
                    <input name="nama" class="form-control @error('nama') is-invalid @enderror" type="text" value="{{ $user->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Email <span class="text-danger fw-bold">*</span></label>
                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Telepon <span class="text-danger fw-bold">*</span></label>
                    <input name="no_tlp" class="form-control" type="text" value="{{ $user->userDetail->no_tlp }}">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Alamat <span class="text-danger fw-bold">*</span></label>
                    <textarea name="alamat" class="form-control" rows="3">{{ $user->userDetail->alamat }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <x-btn-primary-green type="submit" class="w-100 py-2 px-3 mt-5">Simpan</x-btn-primary-green>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("file").addEventListener("change", function() {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById("preview").src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection