<div class="fixed-top mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="row mr-1">
      <div class="col my-auto">
        <div class="bg-white rounded"><img class="img-thumbnail" width="50" src="{{ url('/file/logo.jpg') }}"></div>
      </div>
      <div class="col my-auto">
        <div class="p-2 bg-white rounded"><strong>{{$pegawai->nama_jabatan}}</strong></div>
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
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>
      </ul>
      <div class="">
        <ul class="navbar-nav ml-md-auto">
          <li class="row mr-3">
              @isset($disable)

              @endisset

              @empty($disable)
              <div class="text-white mr-3 my-auto">Cuti : {{$pegawai->cuti}} hari</div>
              @endempty

              <div class="" align="">

                @isset($disable)

                @endisset

                @empty($disable)
                @if ($pegawai->cuti === 0)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" disabled>Pengajuan Cuti</button>
                @else
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Pengajuan Cuti</button>
                @endif
                @endempty
              </div>
            </div>
          </li>
          <div class="dropdown">
            <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$pegawai->nama}}</button>
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
  <div class="relative" align="center">
    @include('messages')
  </div>
</div>
