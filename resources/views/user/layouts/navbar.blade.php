<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        @if (Auth::check())
            <a class="navbar-brand" href="{{ route('user.home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="115" alt="Logo">
            </a>
        @else
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="115" alt="Logo">
            </a>
        @endif
            
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link me-3" href="#">Home</a>
                <a class="nav-link me-3" href="#">Features</a>
                <a class="nav-link" href="#">Pricing</a>
            </div>
            @if (Auth::check())
                <div class="btn-group">
                    <button type="button" class="btn btn-transparant dropdown-toggle m-0" data-bs-toggle="dropdown" aria-expanded="false">
                        Hello, {{Auth::user()->nama}}
                        <img height="25" width="25" class="rounded-circle ms-2" src="{{ $user->userDetail->foto_profil ? asset('profile/' . $user->userDetail->foto_profil) : asset('assets/img/profile.svg') }}">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            @else
                <div class="float-end">
                    <x-btn-primary-green class="py-2 px-3 me-1" onclick="location.href = '{{ route('login') }}'">Login</x-btn-primary-green>
                    <x-btn-primary-green class="py-2 px-3" onclick="location.href = '{{ route('register') }}'">Register</x-btn-primary-green>
                </div>
            @endif
        </div>
    </div>
</nav>