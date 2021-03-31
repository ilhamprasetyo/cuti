<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <div class="row mobile">

          <!-- Photo Section -->
          <div class="col-md-6 col-sm-12 m-auto text-center">
            <div class="biodata mobile p-3">
              <div class="photo-profile m-auto mb-3">
                @if ($pegawai->file === null)
                <div class="photo-null">

                </div>
                @else

                <!-- Photo -->
                <img class="photo-profile img-thumbnail" src="photos/{{$pegawai->file}}">

                @endif
              </div>

              <!-- Option Modal Button -->
              <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#photo-profile">Change Photo</button>
              </div>
            </div>
          </div>

          <!-- Biodata -->
          <div class="col m-auto">
            <div class="biodata mobile p-3">
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>ID</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->id }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Nama</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Email</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ auth()->user()->email }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Alamat</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->alamat }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Unit</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->nama_unit }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Jabatan</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->nama_jabatan }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Cuti</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->cuti }} hari
                </div>
              </div>
              <div class="row">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pegawai_edit"
                data-id="{{ $pegawai->id }}"
                data-nama="{{ $pegawai->nama }}"
                data-email="{{ auth()->user()->email }}"
                data-alamat="{{ $pegawai->alamat }}"
                data-simpan="/profile/update/{{$pegawai->id}}">Edit Profile</button>
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
                  <form id="delete_photo" action="/delete_photo/{{ $pegawai->id }}"></form>
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

  <!-- Modal form edit data -->
  @include('pegawai_edit')

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

</body>
</html>
