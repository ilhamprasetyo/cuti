<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Home</title>
</head>
<body>
  <section id="navbar">
    <div class="fixed-top">
      <div class="bg-dark">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">

          <!-- Navbar Logo -->
          <div class="mr-3">
            <img width="50" src="/images/logo.jpg" alt="">
          </div>

          <!-- Navbar Toggle  -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar content -->
          <div class="collapse navbar-collapse" id="show">
            <ul class="navbar-nav ms-auto mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#deskripsi">Deskripsi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#ulasan">Ulasan</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <button type="button" class="btn btn-outline-light mr-sm-2" data-toggle="modal" data-target="#welcome_message">Welcome Message</button>
            </form>
            <form class="form-inline my-2 my-lg-0">
              <button type="button" class="btn btn-outline-light mr-sm-2" data-toggle="modal" data-target="#ulasan_modal">Ulasan</button>
            </form>
          </div>
        </nav>
      </div>

      <!-- Bootstrap Messages Alert -->
      <div class="relative" align="center">
        @include('messages')
      </div>

    </div>
  </section>

  <!-- Form Login -->
  <section class="content" id="login">
    <div class="container">
      <div class="mb-3">
        <div class="login-header mb-3 p-1 text-center">
          <h1 class="display-4">Login</h1>
        </div>
        <div class="mobile login-body">
          <div class="login-card card">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Your email" required>
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Your password" required>
              </div>
              <button type="submit" class="btn btn-primary form-control" name="button">Login</button>
            </form>
          </div>
        </div>
      </div>
      <div class="mobile login-footer">
        <div class="row">
          <div class="col-lg col-md col-sm p-3 text-center">
            <label for="">Belum punya akun?</label>
            <a href="/check" class="btn btn-success form-control" role="button">Registrasi</a>
          </div>
          <div class="col-lg col-md col-sm p-3 text-center">
            <label for="">Lupa password?</label>
            <a href="{{ route('password.request') }}" class="btn btn-success form-control" role="button">Reset</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr id="deskripsi" class="text-secondary">

  <!-- Deskripsi -->
  <section class="content">
    <div class="container">
      <div class="deskripsi-header text-center">
        <h1 class="display-4">Deskripsi</h1>
      </div>
      <div class="deskripsi-body">
        <div>
          <div class="row content-description">
            <div class="col">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh venenatis cras sed felis eget velit. Sed viverra tellus in hac habitasse. Eu facilisis sed odio morbi quis commodo odio aenean sed. Ultrices sagittis orci a scelerisque purus semper. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus. Malesuada fames ac turpis egestas integer eget. Sed lectus vestibulum mattis ullamcorper. Gravida neque convallis a cras semper auctor neque vitae tempus. Commodo elit at imperdiet dui accumsan sit amet nulla. Senectus et netus et malesuada. Odio pellentesque diam volutpat commodo. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Nisl tincidunt eget nullam non nisi est sit. Lectus proin nibh nisl condimentum id venenatis. Mi bibendum neque egestas congue quisque egestas diam in. Mi quis hendrerit dolor magna. Turpis egestas integer eget aliquet nibh praesent tristique.
              </p>
              <p>
                Sed vulputate mi sit amet mauris commodo quis imperdiet. Viverra justo nec ultrices dui sapien eget mi proin. Blandit aliquam etiam erat velit scelerisque in. Tempor id eu nisl nunc mi. Facilisis gravida neque convallis a. Ullamcorper a lacus vestibulum sed arcu. Egestas sed tempus urna et pharetra pharetra massa massa ultricies. Pharetra massa massa ultricies mi quis hendrerit dolor magna. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper. Diam quam nulla porttitor massa id neque aliquam vestibulum morbi. Bibendum at varius vel pharetra vel. Donec massa sapien faucibus et molestie ac feugiat sed lectus. Hendrerit dolor magna eget est lorem ipsum dolor sit amet. In mollis nunc sed id. Dui faucibus in ornare quam viverra orci. Tincidunt ornare massa eget egestas purus. Morbi tincidunt augue interdum velit euismod in pellentesque. Interdum posuere lorem ipsum dolor sit.
              </p>
              <p>
                At risus viverra adipiscing at in tellus. Vulputate eu scelerisque felis imperdiet proin fermentum. Auctor augue mauris augue neque gravida in fermentum et sollicitudin. Sapien pellentesque habitant morbi tristique senectus. Sed enim ut sem viverra aliquet eget sit amet tellus. Faucibus a pellentesque sit amet. Ac orci phasellus egestas tellus. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet proin. Eget nullam non nisi est sit amet facilisis. Condimentum vitae sapien pellentesque habitant morbi. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Feugiat scelerisque varius morbi enim nunc faucibus. Nunc scelerisque viverra mauris in aliquam sem. Accumsan tortor posuere ac ut.
              </p>
            </div>
          </div>
          <div class="row content-description">
            <div class="col-md-6 col-sm-12">
              <strong><h3>1. Form Pengajuan Cuti</h3></strong>
              <hr>
              <img class="img-thumbnail" width="100%" src="/images/pengajuan.png" alt="">
            </div>
            <div class="col m-auto">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </div>

          <div class="row content-description">
            <div class="col-md-6 col-sm-12">
              <strong><h3>2. Menu Approval cuti</h3></strong>
              <hr>
              <img class="img-thumbnail" width="100%" src="/images/approval.png" alt="">
            </div>
            <div class="col m-auto">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </div>

          <div class="row content-description">
            <div class="col-md-6 col-sm-12">
              <strong><h3>3. Halaman Profile</h3></strong>
              <hr>
              <img class="img-thumbnail" width="100%" src="/images/profile.png" alt="">
            </div>
            <div class="col m-auto">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </div>

          <div class="row content-description">
            <div class="col-md-6 col-sm-12">
              <strong><h3>4. Halaman Admin</h3></strong>
              <hr>
              <img class="img-thumbnail" width="100%" src="/images/admin.png" alt="">
            </div>
            <div class="col m-auto">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr id="ulasan" class="text-secondary">

  <!-- Ulasan -->
  <section class="content">
    <div class="container">
      <div class="ulasan-header mb-3 text-center">
        <h1 class="display-4">Ulasan</h1>
      </div>
      <div class="ulasan-body">
        @foreach($review as $data)
          <strong>{{ $data->name }}</strong>
          <div class="">
            <p>{{ $data->message }}</p>
          </div>
          <hr>
        @endforeach
        <div class="text-center">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#show-all">Lihat lebih banyak</button>
        </div>
      </div>
    </div>
  </section>

<!-- Footer -->
<section id="footer">
  <div class="footer-body container-fluid bg-dark">
    <div class="row m-auto text-center justify-content-sm-center">
      <div class="col-md-auto col-sm-auto col-4">
        <div class="p-3 text-white">
          <a class="text-white text-decoration-none" href="https://www.linkedin.com/in/ilhamprasetyo11/"><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
      </div>
      <div class="col-md-auto col-sm-auto col-4">
        <div class="p-3 text-white">
          <a class="text-white text-decoration-none" href="https://github.com/ilhamprasetyo"><i class="fab fa-github-square fa-3x"></i></a>
        </div>
      </div>
      <div class="col-md-auto col-sm-auto col-4">
        <div class="p-3 text-white">
          <a class="text-white text-decoration-none" href="mailto:ilhamprasetyobaru@gmail.com"><i class="fas fa-envelope-square fa-3x"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <div class="p-3 text-white">
          Copyright Ilham Prasetyo
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Welcome Message -->
<div class="modal fade" id="welcome_message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-auto m-auto">
            <h1 class="display-4">Welcome!</h1>
          </div>
          <div class="col-auto m-auto">
            <h5>Terima kasih sudah mengunjungi</h5>
          </div>
        </div>
        <div class="col-auto p-auto m-auto">
          <p>Selamat datang di aplikasi CutiKu. CutiKu adalah aplikasi cuti berbasis web yang bertujuan untuk memudahkan karyawan dalam mengajukan cuti.</p>
          <p>Aplikasi ini adalah portofolio <i>Web Developer</i> saya yang dibuat menggunakan :</p>
          <span>Front-End</span>
          <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>Bootstrap 4.6</li>
          </ul>
          <span>Back-End</span>
          <ul>
            <li>PHP</li>
            <li>Laravel 8</li>
          </ul>
          <span>DBMS</span>
          <ul>
            <li>MySQL</li>
          </ul>
          <p>Berikan kritik dan saran melalui :</p>
          <ul>
            <li>E-mail : ilhamprasetyobaru@gmail.com</li>
            <li>Melalui form ulasan yang ada di web ini</li>
          </ul>
          <p>Terima kasih!</p>
          <p>Ilham Prasetyo</p>
          <div class="" align="center">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal form ulasan -->
<div class="modal fade" id="ulasan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-auto m-auto text-center">
            <h1 class="display-4">Beri Ulasan!</h1>
          </div>
          <div class="col-auto m-auto text-center">
            <h5>Berikan kritik dan saran anda</h5>
          </div>
        </div>
        <div class="col-auto p-auto m-auto">
          <div class="p-3">
            <form action="/review_input" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label>Ulasan</label>
                <textarea type="text" class="form-control" name="message" required></textarea>
              </div>
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal semua ulasan -->
<div class="modal fade" id="show-all" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-auto m-auto text-center">
          <h1 class="display-4">Ulasan</h1>
        </div>
      </div>
      <div class="modal-body">
        @foreach($all_review as $data)
          <strong>{{ $data->name }}</strong>
          <div class="">
            <p>{{ $data->message }}</p>
          </div>
          <hr>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript CDN and Custom JavaScript -->
@include('behavior')

</body>
</html>
