 <!-- Top navigation-->
 <nav class="navbar navbar-expand-lg navbar-white bg-white border-bottom">
    <div class="container-fluid">
        <button class="btn btn-primary bg-transparent border border-0 text-black" id="sidebarToggle"> 
            <i class="fa-solid fa-bars"></i>    
        </button>
        
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
            <div class="btn-group">
                <button type="button" class="btn btn-transparant dropdown-toggle m-0" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->nama}}
                    <img height="25" width="25" class="rounded-circle ms-2" src="{{ $user->userDetail->foto_profil ? asset('profile/' . $user->userDetail->foto_profil) : asset('assets/img/profile.svg') }}">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </ul>
    </div>
</nav>