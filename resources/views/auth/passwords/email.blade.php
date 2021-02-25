@include('extension')

@if (session('status'))
<div class="fixed-top" align="center">
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
</div>
@endif

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="card w-25" style="margin: 100px auto">
  <div class="card-header">Reset Password</div>
  <div class="card-body">
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
          <div class="form-group">
              <label for="email">Your email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          </div>
          <button type="submit" class="btn btn-primary">Send Link</button>
          <button type="reset" class="btn btn-primary">Reset</button>
          <a href="/" class="btn btn-dark">Kembali</a>
      </form>
  </div>
</div>
