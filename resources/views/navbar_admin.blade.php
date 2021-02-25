<div class="fixed-top mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="bg-white rounded p-2 mr-3"><strong>Aplikasi Cuti</strong></div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/pegawai">Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/unit">Unit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/jabatan">Jabatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pengajuan">Pengajuan</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-md-auto">
        <div class="dropdown">
          @isset($pengajuan)

          @endisset
          @empty($pengajuan)
          <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#tambah">Tambah Data</button>
          @endempty
          <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</button>
          <div class="dropdown-menu dropdown-menu-lg-right">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </ul>
    </div>
  </nav>
</div>
