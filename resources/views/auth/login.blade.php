@extends('auth.layouts.head')

@section('content')
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo" style="justify-content: center; align-items: center;">
                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                </div>
                <center>
              <h4>LOGIN</h4>
                </center>
                <br>
              <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="form-group">
                    <input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                </div>
                <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check" style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="form-check-label text-muted" style="margin-right: 10px;">Keep me signed in</label>
                    <input type="checkbox" class="form-check-input">
                </div>
                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                </div>
                {{-- <div class="mb-2 d-grid gap-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook me-2"></i>Connect using facebook
                  </button>
                </div> --}}
                <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="{{ url('/register') }}" class="text-primary">Register</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @extends('auth.layouts.footer')
  <!-- endinject -->
</body>
</html>
@endsection
