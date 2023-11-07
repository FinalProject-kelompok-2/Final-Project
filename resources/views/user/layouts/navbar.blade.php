<nav class="navbar navbar-expand-lg bg-white fixed-top">
    <div class="container">
        @if (Auth::check())
            <a class="navbar-brand" href="{{ route('user.home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="115" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto text-center">
                    <a class="nav-link nav-hover me-3 {{ (request()-> is('user/home')) ? 'active' : '' }}" href="{{ route('user.home') }}">Home</a>
                    <a class="nav-link nav-hover me-3 {{ (request()-> is('user/riwayat-pembayaran')) ? 'active' : '' }}" href="{{ route('user.riwayat-pembayaran') }}">Riwayat Pembayaran</a>
                    <a class="nav-link nav-hover {{ (request()-> is('user/pengajuan-pinjaman')) ? 'active' : '' }}" href="{{ route('user.pengajuan-pinjaman') }}">Pengajuan Pinjaman</a>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-transparant dropdown-toggle m-0" data-bs-toggle="dropdown" aria-expanded="false">
                        Hello, {{Auth::user()->nama}}
                        <img height="25" width="25" class="rounded-circle ms-2" src="{{ $user->userDetail->foto_profil ? asset('profile/' . $user->userDetail->foto_profil) : asset('assets/img/profile.svg') }}">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        @else
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="115" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto text-center">
                    <a class="nav-link nav-hover me-3" href="#tentang_kami">Tentang Kami</a>
                    <a class="nav-link nav-hover me-3" href="#hubungi_kami">Hubungi Kami</a>
                    <a class="nav-link nav-hover" href="{{ route('user.pengajuan-pinjaman') }}">Pengajuan Pinjaman</a>
                </div>
                <x-btn-primary-green class="py-2 px-3 d-block mx-auto mx-md-1 mb-1 mb-md-0" onclick="location.href = '{{ route('login') }}'">Login</x-btn-primary-green>
                <x-btn-primary-green class="py-2 px-3 d-block mx-auto mx-md-0" onclick="location.href = '{{ route('register') }}'">Register</x-btn-primary-green>
            </div>
        @endif          
    </div>
</nav>

<script>
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function () {
      if(window.pageYOffset > 50) {
        nav.classList.add('shadow');
      }else{
        nav.classList.remove('shadow', );
      }
    });
</script>