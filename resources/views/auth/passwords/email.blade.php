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
              <h4>Input Email Anda</h4>
              <h6 class="font-weight-light">Kode akan dikirimkan ke email anda.</h6>
                </center>
                <br>

                <form method="POST" action="{{ route('password.email') }}">
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
               
                <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
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
