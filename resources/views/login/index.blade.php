@extends('layouts.main')

@section('container')


<div class="container-login100">
{{--     
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif --}}
    
    
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="img/img-01.png" alt="IMG">
        </div>
        

      <form class="login100-form form-signin" action="/login" method="post">
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        {{-- kasih @csrf biar login nya aman dari csrf --}}
        @csrf
          <span class="login100-form-title">
                Login Warga
          </span>

          <div class="form-floating" >
              <input class="input100 @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" required value="{{ old('username') }}">
              @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-user" aria-hidden="true"></i>
              </span>

          </div>

          <div class="form-floating" >
              <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required >
              @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
          </div>
          
          <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                  Login
              </button>
          </div>

          <div class="text-center p-t-12">
              <span class="txt1">
                  Forgot
              </span>
              <a class="txt2" href="#">
                  Username / Password?
              </a>
          </div>

          <div class="text-center p-t-60">
              <a class="txt2" href="/">
                  Go to <b>Home</b>
                  <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
          </div>
      </form>
  </div>
</div>
</div>

@endsection