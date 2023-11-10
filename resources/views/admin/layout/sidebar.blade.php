  <!-- Sidebar-->
  <div class="bg-white border-end" id="sidebar-wrapper">
    <div class="sidebar-heading text-center display-2 border-bottom">
        <img src="{{ asset('assets/img/logo.png') }}" width="98" alt="Logo">
    </div>
    <div class="list-group list-group-flush ">
      <a class="list-group-item list-group-item-action sidebar-menu border-0 color-primary-1 p-3 {{ (request()-> is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-house me-2"></i>
        Dashboard
      </a>
      <a class="list-group-item list-group-item-action sidebar-menu border-0 color-primary-1 p-3 {{ (request()-> is('admin/kelola-pinjaman')) ? 'active' : '' }}" href="{{ route('admin.kelola-pinjaman') }}">
        <i class="fa-solid fa-chart-simple me-2"></i>
        Kelola Pinjaman
      </a>
      <a class="list-group-item list-group-item-action sidebar-menu border-0 color-primary-1 p-3 {{ (request()-> is('admin/kelola-pembayaran')) ? 'active' : '' }}" href="{{ route('admin.kelola-pembayaran') }}">
        <i class="fa-solid fa-wallet me-2"></i>
        Kelola Pembayaran
      </a>
    </div>
</div>