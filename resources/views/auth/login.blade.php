@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <form action="/login" method="post">
              @csrf
              <div class="form-floating">
                <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" 
                placeholder="Username" autofocus required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" 
                placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
          </main>
    </div>
</div>
@endsection
