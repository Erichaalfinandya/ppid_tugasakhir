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
                  <h4>REGISTER</h4>
                    </center>
                    <br>
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" placeholder="Enter your fullname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   <div class="form-group">

                     <input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                </div>
                    <div class="form-group">
                        <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">


                           <input id="password-confirm" placeholder="Enter your password confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                     </div>
                    <div class="mt-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">


                    </div>
                    {{-- <div class="mb-2 d-grid gap-2">
                      <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="mdi mdi-facebook me-2"></i>Connect using facebook
                      </button>
                    </div> --}}
                    <div class="text-center mt-4 font-weight-light">
                        Already have an account? <a href="{{ url('/login') }}" class="text-primary">Login</a>
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
      <!-- plugins:js -->
      @extends('auth.layouts.footer')
      <!-- endinject -->
    </body>

    </html>
@endsection


