<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">\

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Profile</title>
</head>
<body>

  <!-- Navbar   -->
  @include('navbar')

  <section class="margin-top" id="profile">
    <div class="container">
      <div class="card p-3">

        <!-- Title -->
        <div class="mb-3 bg-light text-center">
          <h1 class="display-4">Profile</h1>
        </div>

        <!-- Content -->
        <div class="mobile row">

          <!-- Photo Section -->
          <div class="col-lg-5 col-md-4 col-12 text-center">

            <!-- Option Modal Button -->
            <div class="mb-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#photo-profile">Option</button>
            </div>

            <div class="">
              @if ($pegawai->file == null)
              <div class="profile m-auto">

              </div>
              @else
              <!-- Photo -->
              <img class="photo-profile" src="/file/{{$pegawai->file}}">
              @endif
            </div>
          </div>

          <!-- Biodata -->
          <div class="test col-lg-6 col-md col-sm col-12 m-auto col-6 text-center">
            <div class="text-center p-3">
              <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 bg-dark text-white p-1">
                  <strong>ID</strong>
                </div>
                <div class="col-lg-9 col-md col-sm col bg-light p-1">
                  {{ $pegawai->id }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 bg-dark text-white p-1">
                  <strong>Nama</strong>
                </div>
                <div class="col-lg-9 col-md col-sm col bg-light p-1">
                  {{ $pegawai->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 bg-dark text-white p-1">
                  <strong>Alamat</strong>
                </div>
                <div class="col-lg-9 col-md col-sm col bg-light p-1">
                  {{ $pegawai->alamat }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 bg-dark text-white p-1">
                  <strong>Unit</strong>
                </div>
                <div class="col-lg-9 col-md col-sm col bg-light p-1">
                  {{ $pegawai->nama_unit }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 bg-dark text-white p-1">
                  <strong>Jabatan</strong>
                </div>
                <div class="col-lg-9 col-md col-sm col bg-light p-1">
                  {{ $pegawai->nama_jabatan }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 bg-dark text-white p-1">
                  <strong>Cuti</strong>
                </div>
                <div class="col-lg-9 col-md-0 col-sm col bg-light p-1">
                  {{ $pegawai->cuti }} hari
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Option Modal -->
      <div class="modal fade" id="photo-profile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Photo Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>

            <!-- Content -->
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <form id="upload_photo" action="/upload_photo/{{$pegawai->id}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="customFile" accept="image/*" required>
                        <label class="custom-file-label" for="customFile"></label>
                      </div>
                    </div>
                  </form>
                  <form id="delete_photo" action="/delete_photo/{{ $pegawai->id }}">
                  </form>
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('upload_photo').submit();">Upload</button>
                  @if ($pegawai->file == null)

                  @else
                  <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_photo').submit();">Delete</button>
                  @endif
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
