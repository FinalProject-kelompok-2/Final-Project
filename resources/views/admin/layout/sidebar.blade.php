  <!-- Sidebar-->
  <div class="bg-white border-end" id="sidebar-wrapper">
    <div class="sidebar-heading text-center display-2 border-bottom">
        <img src="{{ asset('assets/img/logo.png') }}" width="98" alt="Logo">
    </div>
    <div class="list-group list-group-flush ">
      <a class="list-group-item list-group-item-action border-0 color-primary-1 p-3" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-house me-2" style="color: #006973;"></i>
        Dashboard
      </a>
      <a class="list-group-item list-group-item-action border-0 color-primary-1 p-3" href="{{ route('admin.kelola-pinjaman') }}">
        <i class="fa-solid fa-house me-2" style="color: #006973;"></i>
        Kelola Pinjaman
      </a>
      {{-- <a class="list-group-item list-group-item-action border border-0 sideBarHover list-group-item-light p-3  text-white {{ Request::is('admin/admin*')? 'custom-active':'innerjoyMain'}}" href="{{ route('admin.admin') }}">
        <i class="fa-solid fa-users me-3" style="color: #ffffff;"></i>  
        Kelola Admin
      </a>
      <a class="list-group-item list-group-item-action border border-0 sideBarHover list-group-item-light p-3  text-white {{ Request::is('admin/user*')? 'custom-active':'innerjoyMain'}}" href="{{ route('admin.user') }}">
        <i class="fa-solid fa-user me-3" style="color: #ffffff;"></i>  
        Kelola Pengguna
      </a>
      <a class="list-group-item list-group-item-action border border-0 sideBarHover list-group-item-light p-3  text-white {{ Request::is('admin/posting*')? 'custom-active':'innerjoyMain'}}" href="{{ route('admin.posting') }}">
        <i class="fa-solid fa-paper-plane me-3" style="color: #ffffff;"></i>  
        Kelola Posting
      </a> --}}
    </div>
</div>