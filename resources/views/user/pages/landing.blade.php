@extends('user.layouts.landing')

@section('content')

<div class="container">
    <div class="d-flex align-items-center justify-content-between margin-top-120">
        <div class="text-center text-md-start me-3">
            <h1 class="font-size-30 font-weight-700">Memberikan Pinjaman Untuk Usaha Anda</h1>
            <p class="font-size-18 font-weight-500">UMKMPLUS ada untuk membantu anda mencapai tujuan bisnis anda dengan menyediakan pinjaman modal usaha yang dilakukan secara fleksibel dan terjangkau</p>
            <x-btn-primary-green class="font-size-18 py-3 px-4 mt-2" onclick="location.href = '{{ route('user.pengajuan-pinjaman') }}'">Ajukan Pinjaman</x-btn-primary-green>
        </div>
        <div class="d-md-block d-none">
            <img src="{{ asset('assets/img/landing-img.png') }}" width="550">
        </div>
    </div>
</div>

<div id="tentang_kami" class="margin-top-120 bg-primary-3 padding-y-80">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <h2 class="font-size-30 font-weight-600 text-white mb-4">Tentang Kami</h2>
                    <p class="font-size-20 font-weight-500 text-white">PT. UMKMPLUS adalah institusi keuangan terkemuka yang berdedikasi untuk memberikan layanan perbankan dan pinjaman yang unggul kepada pelanggan kami. Didirikan pada tahun 2010, kami telah tumbuh dan berkembang seiring dengan masyarakat dan ekonomi Indonesia</p>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none">
                <img src="{{ asset('assets/img/about-us-img.png') }}" class="d-block mx-auto" width="500">
            </div>
        </div>
    </div>
</div>

<div class="padding-y-150">
    <div class="container">
        <h2 class="font-size-30 font-weight-600 text-center color-primary-3 mb-5">Keuntungan Menggunakan UMKMPLUS</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary-3 shadow border-0 p-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/keuntungan-img-1.png') }}">
                        <p class="font-size-18 font-weight-500 text-white mt-3">Suku bunga yang kompetitif dan terjangkau</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary-3 shadow border-0 p-3 my-3 my-md-0">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/keuntungan-img-2.png') }}">
                        <p class="font-size-18 font-weight-500 text-white mt-3">Proses persetujuan yang cepat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary-3 shadow border-0 p-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/keuntungan-img-3.png') }}" height="244">
                        <p class="font-size-18 font-weight-500 text-white mt-3">Pinjaman Tanpa Angunan </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-primary-3 padding-y-150">
    <div class="container">
        <h2 class="font-size-30 font-weight-600 text-center text-white mb-5">Bagaimana Cara Kerja UMKMPLUS</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0 p-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/cara-kerja-img-1.png') }}">
                        <p class="font-size-18 font-weight-500 mt-2"><span class="fw-bold">1</span> <br> Ajukan pinjaman dengan mengisi form Pengajuan Pinjaman</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 p-3 my-3 my-md-0">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/cara-kerja-img-2.png') }}">
                        <p class="font-size-18 font-weight-500 mt-2"><span class="fw-bold">2</span> <br> Admin UMKMPLUS akan memproses dokumen yang sudah anda berikan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 p-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/cara-kerja-img-3.png') }}">
                        <p class="font-size-18 font-weight-500 mt-2"><span class="fw-bold">3</span> <br>Admin menyetujui dokumen pengajuan pinjaman dan modal dicairkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="hubungi_kami" class="margin-y-120">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-md-block d-none">
                <img src="{{ asset('assets/img/contact-us-img.png') }}" class="d-block mx-auto" width="400">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <h2 class="font-size-30 font-weight-600 mb-4">Apakah Anda Butuh Bantuan ?</h2>
                    <h3 class="font-size-24 font-weight-600 mb-4">Hubungi Kami</h3>
                    <p class="font-size-20 font-weight-500">
                        <i class="fa-solid fa-phone me-2" style="color: #1899A3;"></i>
                        <span>+62864357364</span>
                    </p>
                    <p class="font-size-20 font-weight-500">
                        <i class="fa-solid fa-envelope me-2" style="color: #1899A3;"></i>
                        <span>umkmplus@gmail.com</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection