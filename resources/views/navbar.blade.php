<div class="fixed-top mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="row mr-1">
      <div class="col my-auto">
        <div class="bg-white rounded"><img class="img-thumbnail" width="50" src="images/logo.jpg"></div>
      </div>
      <div class="col my-auto text-nowrap">
        <span class="text-white"><strong>{{$pegawai->nama_jabatan}}</strong></span>
      </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="show">
      <ul class="navbar-nav ms-auto mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/user">Home</a>
        </li>
        @if (auth()->user()->jabatan_id === 2)
        <li class="nav-item">
          <a class="nav-link" href="/approval">Approval</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/karyawan">Karyawan </a>
        </li>
        @endif
        <li class="nav-item">

        </li>
      </ul>
      <ul class="navbar-nav ml-md-auto">

        @isset($disable)

        @endisset


        @empty($disable)
        <div class="" align="">
          <div class="p-2 my-auto mr-1">
            <span class="text-white"><strong>Cuti : {{$pegawai->cuti}} hari</strong>
            </div>
          </div>
          <div class="my-auto mr-3">
            @if ($pegawai->cuti === 0)
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" disabled>Pengajuan Cuti</button>
            @else
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Pengajuan Cuti</button>
            @endif
          </div>
          @endempty


          <div class="my-auto">
            <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$pegawai->nama}}</button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/profile">Profile</a>
              <button class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </button>
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
