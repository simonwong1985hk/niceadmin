@extends('layouts.app')

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="/" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your email & password to login or<br />
                <span class="text-center small text-danger">Just login with the preset account</span>
              </p>
            </div>

            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
              @csrf

              <div class="col-12">
                <label for="yourEmail" class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" id="yourEmail" value="{{ old('email', 'admin@example.com') }}" required>
                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                @error('email')
                <div class="invalid-feedback d-inline">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" value="password" required>
                <div class="invalid-feedback">Please enter your password!</div>
                @error('password')
                <div class="invalid-feedback d-inline">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>

              <div class="col-12">
                <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

</section>
@endsection