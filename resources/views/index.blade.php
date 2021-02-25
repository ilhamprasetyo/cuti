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
    <div class="container-fluid fixed-top">
      <div class="bg-light">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">

          <!-- Navbar Logo -->
          <div class="mr-3">
            <img width="50" src="/file/logo.jpg" alt="">
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
              <button type="button" class="btn btn-outline-dark mr-sm-2" data-toggle="modal" data-target="#welcome_message">Welcome Message</button>
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
    <div class="container-fluid">
      <div class="mb-3">
        <div class="login-header mb-3 p-1 text-center">
          <h1 class="display-4">Login</h1>
        </div>
        <div class="login-body">
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
      <div class="login-footer">
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

  <!-- Deskripsi -->
  <section class="content" id="deskripsi"> <hr>
    <div class="container-fluid">
      <div class="deskripsi-header mb-3 bg-secondary p-1 text-center text-white">
        <h1 class="display-4">Deskripsi</h1>
      </div>
      <div class="deskripsi-body">
        <div class="bg-light p-3">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A arcu cursus vitae congue mauris rhoncus aenean. Sed ullamcorper morbi tincidunt ornare massa. Ultricies tristique nulla aliquet enim tortor at. Commodo odio aenean sed adipiscing. Feugiat in fermentum posuere urna nec tincidunt praesent. Quam vulputate dignissim suspendisse in est ante in nibh mauris. Suspendisse faucibus interdum posuere lorem ipsum. Nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Urna neque viverra justo nec ultrices. Id velit ut tortor pretium. Aliquam vestibulum morbi blandit cursus risus at ultrices mi tempus. Nunc sed velit dignissim sodales ut. Risus feugiat in ante metus dictum at tempor commodo ullamcorper. Nec dui nunc mattis enim ut tellus elementum sagittis vitae. Eu scelerisque felis imperdiet proin fermentum.
          </p>

          <p>
            At tellus at urna condimentum mattis pellentesque id nibh tortor. Ac felis donec et odio pellentesque diam volutpat commodo sed. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Viverra ipsum nunc aliquet bibendum enim facilisis. Lorem sed risus ultricies tristique nulla aliquet. Nibh cras pulvinar mattis nunc. Euismod nisi porta lorem mollis aliquam ut porttitor leo. Volutpat odio facilisis mauris sit amet massa vitae tortor condimentum. Amet consectetur adipiscing elit duis. Orci nulla pellentesque dignissim enim sit amet. Fringilla urna porttitor rhoncus dolor purus. Porttitor leo a diam sollicitudin tempor id eu nisl. Condimentum mattis pellentesque id nibh tortor id aliquet. Nulla pharetra diam sit amet nisl suscipit. Sed arcu non odio euismod lacinia at quis risus.
          </p>

          <p>
            Cras ornare arcu dui vivamus arcu felis bibendum. Vel fringilla est ullamcorper eget nulla facilisi. Iaculis nunc sed augue lacus viverra. Bibendum enim facilisis gravida neque convallis a cras. Lorem donec massa sapien faucibus et molestie ac. Risus commodo viverra maecenas accumsan. Et netus et malesuada fames ac turpis. Duis tristique sollicitudin nibh sit amet. Pretium fusce id velit ut tortor pretium viverra suspendisse potenti. Neque sodales ut etiam sit amet nisl purus. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus.
          </p>

          <p>
            Est ultricies integer quis auctor elit sed vulputate mi sit. Ipsum nunc aliquet bibendum enim facilisis gravida neque. Enim diam vulputate ut pharetra. Ac tortor dignissim convallis aenean et tortor at risus viverra. Dictum sit amet justo donec enim diam vulputate ut. Et netus et malesuada fames ac turpis. Lacus sed viverra tellus in hac habitasse platea dictumst. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Nulla porttitor massa id neque aliquam vestibulum morbi blandit cursus. Purus in mollis nunc sed id semper risus in hendrerit. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Nascetur ridiculus mus mauris vitae. Nulla at volutpat diam ut. Vel turpis nunc eget lorem dolor sed viverra. Hendrerit gravida rutrum quisque non tellus orci ac auctor. Risus in hendrerit gravida rutrum quisque non tellus orci ac.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Ulasan -->
  <section class="content" id="ulasan"> <hr>
    <div class="container-fluid">
      <div class="ulasan-header mb-3 bg-secondary p-1 text-center text-white">
        <h1 class="display-4">Ulasan</h1>
      </div>
      <div class="ulasan-body bg-light">
        <div class="">
          <form action="/review" method="head">
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
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<section id="footer">
  <div class="footer-body container-fluid bg-dark">
    <div class="row m-auto text-center justify-content-sm-center">
      <div class="col-lg-auto col-md col-sm col">
        <div class="p-3 text-white">
          <a class="text-white text-decoration-none" href="https://www.linkedin.com/in/ilhamprasetyo11/"><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
      </div>
      <div class="col-lg-auto col-md col-sm col">
        <div class="p-3 text-white">
          <a class="text-white text-decoration-none" href="https://github.com/ilhamprasetyo"><i class="fab fa-github-square fa-3x"></i></a>
        </div>
      </div>
      <div class="col-lg-auto col-md col-sm col">
        <div class="p-3 text-white">
          <a class="text-white text-decoration-none" href="mailto:ilhamprasetyobaru@gmail.com"><i class="fas fa-envelope-square fa-3x"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <div class="p-3 text-white">
          Copyright Ilham Prasetyo
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- Modal Welcome Message -->
<div class="modal fade" id="welcome_message" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-auto m-auto">
            <h1 class="display-3">Welcome!</h1>
          </div>
          <div class="col-auto m-auto">
            <h5>Terima kasih sudah mengunjungi</h5>
          </div>
        </div>
        <div class="col-auto p-auto m-auto">
          <p>Selamat datang di aplikasi CutiKu. CutiKu adalah aplikasi cuti berbasis web yang bertujuan untuk memudahkan karyawan dalam mengajukan cuti.</p>
          <p>Aplikasi ini adalah portofolio <i>Web Developer</i> saya yang dibuat menggunakan bahasa pemrograman HTML, CSS dan JavaScript dengan library Bootstrap 4.6 (Front-End) dan PHP 8 dengan framework Laravel 8 (Back-End).</p>
          <p>Jika ada bug, kritik dan saran silahkan beritahu saya via</p>
          <ul>
            <li>E-mail : ilhamprasetyobaru@gmail.com</li>
            <li>Melalui kotak pesan di web ini</li>
          </ul>
          <div class="" align="center">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript CDN and Custom JavaScript -->
@include('behavior')

</body>
</html>
