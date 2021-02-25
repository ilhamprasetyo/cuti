<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  @include('style')
  <title></title>
</head>
<body>
  <section id="checked">
    <div class="fixed-top" align="center">
      @include('messages')
    </div>

    <div class="card container w-50" style="margin: 100px auto">
      <div class="text-center p-3">
        <div class="row mb-3">
          <div class="col-2 bg-dark text-white p-1">
            <strong>ID</strong>
          </div>
          <div class="col bg-light p-1">
            {{ $pegawai->id }}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 bg-dark text-white p-1">
            <strong>Nama</strong>
          </div>
          <div class="col bg-light p-1">
            {{ $pegawai->nama }}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 bg-dark text-white p-1">
            <strong>Alamat</strong>
          </div>
          <div class="col bg-light p-1">
            {{ $pegawai->alamat }}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2 bg-dark text-white p-1">
            <strong>Unit</strong>
          </div>
          <div class="col bg-light p-1">
            {{ $pegawai->nama_unit }}
          </div>
        </div>
        <div class="row">
          <div class="col-2 bg-dark text-white p-1">
            <strong>Jabatan</strong>
          </div>
          <div class="col bg-light p-1">
            {{ $pegawai->nama_jabatan }}
          </div>
        </div>
      </div>

      <div class="mb-3">
        <form method="head" action="/registered">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" class="form-control" name="pegawai_id" value="{{ $pegawai->id }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="Email" class="form-control" name="email" placeholder="Your email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="Password" class="form-control" name="password" placeholder="Your password" required>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="unit_id" value="{{ $pegawai->unit_id }}">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="jabatan_id" value="{{ $pegawai->jabatan_id }}">
          </div>
          <button type="submit" class="btn btn-primary">Registrasi</button>
          <button type="reset" class="btn btn-primary">Reset</button>
          <a href="/check" class="btn btn-primary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
