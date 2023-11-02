@extends('admin.layout.main')

@section('contents')

<h1 class="font-size-30 font-weight-600 mb-4">Detail Pinjaman</h1>

<div class="card shadow border-0 p-5 mb-4">
    <h2 class="font-size-20 font-weight-600 border-bottom pb-2 mb-4">Identitas Peminjam</h2>
    <div class="row margin-bottom-70">
        <div class="col-md-6 pe-4">
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Nama</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $data_peminjam->nama }}</p>
            </div>
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">NIK</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $data_peminjam->userDetail->nik }}</p>
            </div>
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Email</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $data_peminjam->email }}</p>
            </div>
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Nomor Telepon</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $data_peminjam->userDetail->no_tlp }}</p>
            </div>
            <div class="mb-4">
                <label class="font-size-15 font-weight-500 mb-2">Alamat</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $data_peminjam->userDetail->alamat }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded mb-3 px-3 py-2">
                <span class="font-size-15 font-weight-600">Kartu Keluarga</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->kk) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded mb-3 px-3 py-2">
                <span class="font-size-15 font-weight-600">NPWP</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->npwp) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded px-3 py-2">
                <span class="font-size-15 font-weight-600">Buku Tabungan</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->buku_tabungan) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 ps-4">
            <div class="mb-3">
                <p class="font-size-15 font-weight-500 mb-2">Foto Profil</p>
                <img src="{{ asset('profile/' . $data_peminjam->userDetail->foto_profil) }}" width="115">
                <a href="{{ asset('profile/' . $data_peminjam->userDetail->foto_profil) }}" class="ms-3" download>
                    <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                </a>
            </div>
            <div class="mb-3">
                <p class="font-size-15 font-weight-500 mb-2">Foto KTP</p>
                <img src="{{ Storage::url('dokumen/' . $pinjaman->foto_ktp) }}" width="115">
                <a href="{{ Storage::url('dokumen/' . $pinjaman->foto_ktp) }}" class="ms-3" download>
                    <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                </a>
            </div>
            <div class="mb-3">
                <p class="font-size-15 font-weight-500 mb-2">Selfie KTP</p>
                <img src="{{ Storage::url('dokumen/' . $pinjaman->selfie_ktp) }}" width="115">
                <a href="{{ Storage::url('dokumen/' . $pinjaman->selfie_ktp) }}" class="ms-3" download>
                    <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                </a>
            </div>
        </div>
    </div>

    <h2 class="font-size-20 font-weight-600 border-bottom pb-2 mb-4">Identitas Usaha</h2>
    <div class="row margin-bottom-70">
        <div class="col-md-6 pe-4">
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Nama Usaha</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->nama_usaha }}</p>
            </div>
            <div class="mb-4">
                <label class="font-size-15 font-weight-500 mb-2">Deskripsi Usaha</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->deskripsi_usaha }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded mb-3 px-3 py-2">
                <span class="font-size-15 font-weight-600">Proposal Bisnis</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->proposal_bisnis) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded px-3 py-2">
                <span class="font-size-15 font-weight-600">Laporan Keuangan</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->laporan_keuangan) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 ps-4">
            <div class="d-flex align-items-center justify-content-between border rounded mb-3 px-3 py-2">
                <span class="font-size-15 font-weight-600">Surat Izin Usaha (SIU)</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->siu) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded mb-3 px-3 py-2">
                <span class="font-size-15 font-weight-600">Surat Keterangan Domisili Usaha (SKDU)</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->skdu) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded px-3 py-2">
                <span class="font-size-15 font-weight-600">Surat Izin Tempat Usaha (SITU)</span>
                <div>
                    <a href="{{ Storage::url('dokumen/' . $pinjaman->situ) }}" target="_blank">
                        <x-btn-primary-green class="font-size-13 py-2 px-3">Download</x-btn-primary-green>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="font-size-20 font-weight-600 border-bottom pb-2 mb-4">Informasi Pinjaman</h2>
    <div class="row">
        <div class="col-md-6 pe-4">
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Jumlah Pinjaman</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ number_format($pinjaman->jml_pinjaman, 2) }}</p>
            </div>
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Tenor</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->tenor }} Bulan</p>
            </div>
            <div>
                <label class="font-size-15 font-weight-500 mb-2">Bunga</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->bunga }}%</p>
            </div>
        </div>
        <div class="col-md-6 ps-4">
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">No. Rekening Pencairan Dana</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->no_rekening }}</p>
            </div>
            <div class="mb-3">
                <label class="font-size-15 font-weight-500 mb-2">Atas Nama Rekening Pencairan Dana</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->nama_rekening }}</p>
            </div>
            <div>
                <label class="font-size-15 font-weight-500 mb-2">Bank</label>
                <p class="font-size-15 font-weight-600 border-bottom">{{ $pinjaman->nama_bank }}</p>
            </div>
        </div>
    </div>

    @if ($pinjaman->status == 'Diproses')
    
        <div class="d-flex align-items-center justify-content-between margin-top-80 border-top pt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPenawaran">Ajukan Penawaran</button>
            <x-btn-primary-green type="submit" class="py-2 px-4" data-bs-toggle="modal" data-bs-target="#modalKonfirmasiPinjaman">Konfirmasi</x-btn-primary-green>
            <button type="submit" class="btn btn-danger px-5" data-bs-toggle="modal" data-bs-target="#modalTolakPinjaman">Tolak</button>
        </div>

    @elseif ($pinjaman->status == 'Dikonfirmasi')

        <div class="margin-top-80 text-center border-top pt-3">
            <x-btn-primary-green type="button" class="py-2 px-4" data-bs-toggle="modal" data-bs-target="#modalKonfirmasiPencairan">Konfirmasi Pencairan Dana</x-btn-primary-green>
        </div>

    @else
        
        <div></div>
        
    @endif

    <div class="modal fade" id="modalTolakPinjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Pinjaman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.tolak-pinjaman', ['id' => $pinjaman->id]) }}">
                    <div class="modal-body">
                        @csrf
                        <p>Anda yakin ingin menolak pinjaman?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonfirmasiPinjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pinjaman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.konfirmasi-pinjaman', ['id' => $pinjaman->id]) }}">
                    <div class="modal-body">
                        @csrf
                        <p>Pastikan identitas peminjam, identitas usaha, dan informasi pinjaman sudah sesuai dengan kebijakan perusahaan sebelum melanjutkan. Konfirmasi pinjaman ini bersifat permanen dan tidak dapat dibatalkan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonfirmasiPencairan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pencairan Dana</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.pencairan-dana', ['id' => $pinjaman->id]) }}">
                    <div class="modal-body">
                        @csrf
                        <p>Pastikan uang telah di transfer ke rekening {{ $pinjaman->no_rekening }} atas nama {{ $pinjaman->nama_rekening }} sebelum melanjutkan. Konfirmasi pembayaran ini bersifat permanen dan tidak dapat dibatalkan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPenawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Penawaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formId" method="POST" action="{{ route('admin.edit-pinjaman', ['id' => $pinjaman->id]) }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="edit_jml_pinjaman">Jumlah Pinjaman</label>
                            <input type="text" id="jml_pinjaman" name="jml_pinjaman" class="form-control" value="{{ number_format($pinjaman->jml_pinjaman, 0, ',', '.') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_tenor">Tenor (bulan)</label>
                            <input type="number" name="tenor" class="form-control" value="{{ $pinjaman->tenor }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_bunga">Bunga (%)</label>
                            <input name="bunga" type="number" id="bunga" class="form-control" value="{{ $pinjaman->bunga }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajukan Penawaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    document.getElementById("jml_pinjaman").addEventListener("input", function (e) {
        let inputValue = e.target.value.replace(/\D/g, '');

        e.target.value = formatNumber(inputValue);
    });

    function formatNumber(number) {
        return new Intl.NumberFormat("id-ID").format(number);
    }

    document.getElementById("formId").addEventListener("submit", function () {
        let jml_pinjamanInput = document.getElementById("jml_pinjaman");
        jml_pinjamanInput.value = jml_pinjamanInput.value.replace(/\D/g, '');
    });

    document.getElementById("bunga").addEventListener("input", function (e) {
        let inputValue = e.target.value.replace(/\D/g, '');
    });
</script>

@endsection