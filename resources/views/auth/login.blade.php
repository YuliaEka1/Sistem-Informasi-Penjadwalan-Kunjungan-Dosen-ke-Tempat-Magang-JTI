@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="{{ route('login') }}" class="h1" style="color: orange;"><b>SIP </b>KUDOTEMA</a>

    </div>
    <div class="card-body">
    <p class="login-box-msg" style="color: blue;">Jurusan Teknologi Informasi </p>
      <p class="login-box-msg">silahkan login untuk masuk sistem </p>
      <form action="{{route('login')}}" method="post">
      @csrf
        <div class="input-group mb-3">
        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          <!-- /.col -->
        </div>
      </form>
      
      <p class="mb-1">
        <a href="">Lupa Password?</a>
      </p>
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Belum punya akun? Daftar</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection