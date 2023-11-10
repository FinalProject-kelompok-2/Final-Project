@extends('admin.layout.main')

@section('contents')

<h1 class="font-size-30 font-weight-600 mb-4">Kelola Pembayaran</h1>

<div class="card shadow border-0 p-5">
    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Usaha</th>
                <th>Periode</th>
                <th>Biaya Angsuran</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach ($angsurans as $angsuran)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $angsuran->pinjaman->nama_usaha }}</td>
                    <td>Bulan {{ $angsuran->periode }}</td>
                    <td>{{ number_format($angsuran->biaya_angsuran, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($angsuran->jatuh_tempo)->format('d F Y') }}</td>
                    <td>
                        @if ($angsuran->status == 'Proses')
                            <span class="status-orange">Diproses</span>
                        @elseif ($angsuran->status == 'Lunas')
                            <span class="status-green">Sudah Dibayar</span>
                        @elseif ($angsuran->status == 'Tunggak')
                            <span class="status-red">Belum Dibayar</span>
                        @elseif ($angsuran->status == 'Invalid')
                            <span class="status-red">Invalid Payment</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($angsuran->status == 'Tunggak')
                            <span>-</span>
                        @else
                            <a href="{{ Storage::url('bukti_pembayaran/' . $angsuran->bukti_pembayaran) }}" target="_blank">
                                <x-btn-primary-white class="font-size-13 py-2 px-3">Bukti Pembayaran</x-btn-primary-white>
                            </a>
                        @endif
                    </td>
                    <td class="d-flex">
                        <x-btn-primary-green type="button" class="font-size-15 py-2 px-3" data-bs-toggle="modal" data-bs-target="#modalKonfirmasiPembayaran{{ $angsuran->id }}">
                            <i class="fa-solid fa-check"></i>
                        </x-btn-primary-green>
                        <x-btn-primary-green type="button" style="background-color: #dc3545" class="font-size-15 py-2 px-3 ms-1" data-bs-toggle="modal" data-bs-target="#modalInvalid{{ $angsuran->id }}">
                            <i class="fa-solid fa-xmark"></i>
                        </x-btn-primary-green>
                    </td>
                </tr>

                <div class="modal fade" id="modalKonfirmasiPembayaran{{ $angsuran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran Angsuran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.konfirmasi-pembayaran', ['id' => $angsuran->id]) }}">
                                <div class="modal-body">
                                    @csrf
                                    <p>Pastikan pembayaran sudah berhasil masuk ke rekening <span class="fw-bold">112783654453</span> atas nama <span class="fw-bold">PT UMKMPLUS</span> sebelum melanjutkan.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalInvalid{{ $angsuran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran Tidak Valid</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.invalid-pembayaran', ['id' => $angsuran->id]) }}">
                                <div class="modal-body">
                                    @csrf
                                    <p>Pastikan kembali bahwa pembayaran angsuran benar-benar tidak valid dan pembayaran tidak masuk ke rekening <span class="fw-bold">112783654453</span> atas nama <span class="fw-bold">PT UMKMPLUS</span> sebelum melanjutkan.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Invalid Payment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    new DataTable('#example');
</script>

@endsection