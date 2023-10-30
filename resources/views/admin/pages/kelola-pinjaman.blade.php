@extends('admin.layout.main')

@section('contents')

<h1 class="font-size-30 font-weight-600 mb-4">Kelola Pinjaman</h1>

<div class="card shadow border-0 p-5">
    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama Usaha</th>
                <th>Jumlah Pinjaman</th>
                <th>Tenor</th>
                <th>Bunga</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjamans as $pinjaman)
                <tr>
                    <td>{{ $pinjaman->nama_usaha }}</td>
                    <td>{{ number_format($pinjaman->jml_pinjaman, 2) }}</td>
                    <td>{{ $pinjaman->tenor }} Bulan</td>
                    <td>{{ $pinjaman->bunga }}%</td>
                    <td>{{ \Carbon\Carbon::parse($pinjaman->created_at)->format('d F Y') }}</td>
                    <td>
                        @if ($pinjaman->status == 'Diproses')
                            <span class="status-orange">{{ $pinjaman->status }}</span>
                        @elseif ($pinjaman->status == 'Penawaran')
                            <span class="status-blue">{{ $pinjaman->status }}</span>
                        @elseif ($pinjaman->status == 'Dikonfirmasi')
                            <span class="status-blue">{{ $pinjaman->status }}</span>
                        @elseif ($pinjaman->status == 'Diterima')
                            <span class="status-green">{{ $pinjaman->status }}</span>
                        @elseif ($pinjaman->status == 'Ditolak')
                            <span class="status-red">{{ $pinjaman->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.detail-pinjaman', ['id' => $pinjaman->id]) }}">
                            <x-btn-primary-green class="font-size-15 py-2 px-3">Detail Pinjaman</x-btn-primary-green>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    new DataTable('#example');
</script>

@endsection