@extends('layouts.main')

@section('container')


<div class="container-login100">
  <div class="wrap-login100">
      <div class="login100-pic js-tilt" data-tilt>
          <img src="img/img-01.png" alt="IMG">
      </div>

      <form class="login100-form validate-form" method="post" action="/register">
        @csrf
          <span class="login100-form-title">
                Register Warga
          </span>

          <div class="wrap-input100 ">
            <div class="input-container">
                <input class="input100 @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" required value="{{ old('username') }}" >
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                @error('username')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>
            </div>
              {{-- 
                #1. di bagian input class bisa dimasukkin 
                @error('username') is-invalid @enderror 
              #2. terus bisa masukin atribut 
              value="{{ old('username') }}" 
              biar dia gunain nilai sebelumnya.
              
              di sini gapake itu karena udah ada bawaan dari template
              --}}

              {{-- @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror --}}
          <div class="wrap-input100" >
              <input class="input100" type="text" name="name" placeholder="Nama Lengkap" required>
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
              </span>
          </div>
          <div class="wrap-input100 " >
              <input class="input100" type="number" name="nik" placeholder="NIK Pribadi" required>
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-list-ol" aria-hidden="true"></i>
              </span>
          </div>

          <div class="wrap-input100 " >
              <input class="input100" type="email" name="email" placeholder="Email" required>
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
          </div>
          <div class="wrap-input100 " >
              <input class="input100" type="tel" name="telephone" placeholder="No. Handphone" required>
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-phone" aria-hidden="true"></i>
              </span>
          </div>
          <div class="wrap-input100 " >
              <input class="input100" type="password" name="pass" placeholder="Password" required>
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
          </div>
          
          <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                  Register
              </button>
          </div>

          <div class="text-center p-t-60
          ">
              <span class="txt1">
                  Already have an account? 
              </span>
              <a class="txt2" href="/login">
                  Log in here
              </a>
          </div>

          
      </form>
  </div>
</div>
</div>

@endsection