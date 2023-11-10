@extends('user.layouts.main')

@section('content')

<form enctype="multipart/form-data" method="POST" action="{{ route('user.konfirmasi-pembayaran-store', ['id' => $angsuran->id]) }}">
@csrf
    <div class="card shadow border-0 w-50 margin-bottom-70 mx-auto margin-top-100 p-5">
        <div class="d-flex align-items-center justify-content-between border-bottom pb-1 mb-5">
            <span class="font-size-17 font-weight-600">{{ $angsuran->pinjaman->nama_usaha }}</span>
            <span class="font-size-17 font-weight-600">Bulan {{ $angsuran->periode }}</span>
        </div>
        <div class="mb-4">
            <label class="form-label mb-1">Bukti Pembayaran <span class="text-danger fw-bold">*</span></label>
            <p class="font-size-12 font-weight-500 text-danger mb-1">Kirim bukti pembayaran Anda dengan format file .pdf</p>
            <input name="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror" type="file" accept=".pdf">
            @error('bukti_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <x-btn-primary-green type="button" class="py-2 w-100" data-bs-toggle="modal" data-bs-target="#modalKonfirmasiPinjaman">Konfirmasi</x-btn-primary-green>
    </div>

    <div class="modal fade" id="modalKonfirmasiPinjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pinjaman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Pastikan uang telah di transfer ke rekening <span class="fw-bold">112783654453</span> atas nama <span class="fw-bold">PT UMKMPLUS</span> sebelum melanjutkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection