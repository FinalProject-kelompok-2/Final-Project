<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UMKMPLUS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/template.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    </head>
    <body>
        <div class="row w-100">
            <div class="col-md-6 bg-primary-1 d-none d-md-block" style="height: 100vh">
                <div class="row margin-top-120">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 class="text-white text-center font-size-30 font-weight-700">UMKMPLUS</h2>
                        <p class="text-white text-center font-size-20 font-weight-500">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                        <img src="{{ asset('assets/img/img-auth.png') }}" class="d-block mx-auto mt-5" width="480">
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="layout-logo">
                    <a href="{{ route('landing') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" class="d-block ms-auto mt-4" width="125" alt="Logo">
                    </a>
                </div>
                <div class="layout-logo position-absolute mt-2">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif ($errors->any())
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger" role="alert">{{ $err }}</div>
                        @endforeach
                    @elseif(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
                <div class="layout-login">
                    <h2 class="text-black font-size-30 font-weight-700">Login</h2>
                    <form action="{{ route('login_action') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label font-weight-500">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda">
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-500">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda">
                        </div>

                        <x-btn-primary-green type="submit" class="w-100 py-2 mt-3">Login</x-btn-primary-green>
                        <h6 class="text-option mt-4">
                            <span>Atau login dengan</span>
                        </h6>
                        <x-btn-primary-white type="submit" class="w-100 py-2 mt-3">Google</x-btn-primary-white>
                        
                        <div class="text-center font-weight-500 link-register">
                            Tidak punya akun? 
                            <a href="{{ route('register') }}" class="color-primary-1">Buat akunmu!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>