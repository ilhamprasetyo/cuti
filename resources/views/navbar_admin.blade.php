<div class="fixed-top mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="row mr-1">
      <div class="col my-auto">
        <div class="bg-white rounded"><img class="img-thumbnail" width="50" src="/images/logo.jpg"></div>
      </div>
      <div class="col my-auto">
        <span class="text-white"><strong>Admin</strong></span>
      </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="show">
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

        @isset($pengajuan)

        @endisset

        @empty($pengajuan)
        <div class="">
          <div class="my-auto mr-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#input">Tambah Data</button>
          </div>
        </div>
        @endempty

        <div class="my-auto">
          <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Admin</strong></button>
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
  <div class="relative" align="center" id="messages">
    @include('messages')
  </div>
</div>
