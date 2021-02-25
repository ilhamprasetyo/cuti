<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  @include('style')
  <title></title>
</head>
<body>
  <section class="margin-top" id="form-check">
    <div class="fixed-top" align="center">
      @include('messages')
    </div>

    <div class="check container">
      <div class="card p-3">
        <form action="/request" method="get">
          <div class="form-group">
            <label>Check your ID</label>
            <input type="number" class="form-control" name="check" length="10" placeholder="ID pegawai">
          </div>
          <button type="submit" class="btn btn-primary">Check</button>
          <button type="reset" class="btn btn-primary">Reset</button>
          <a href="/" class="btn btn-dark">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
