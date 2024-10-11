@extends('layouts.app')

@section('content')






@extends('auth.layouts.head')

@section('content')
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
              <h4>Password Reset</h4>
              <h6 class="font-weight-light">Input Password Untuk Mereset Password.</h6>
                </center>
                <br>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf


            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
          
            
            </div>
            <div class="form-group">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
                <div class="mt-3 d-grid gap-2">
                      <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                    </button>
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
</body>

</html>
@endsection











