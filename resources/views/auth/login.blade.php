@extends('layouts.app')
@section('title', 'Login')
@section('auth')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="#" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-heading fw-bold">Wifi</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Welcome to Pema Bersama! 👋</h4>
          <p class="mb-6">Please sign-in to your account and start the adventure</p>

          <form id="formAuthentication" class="mb-6" action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-6">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email"
                autofocus />
            </div>
            <div class="mb-6 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-6">
              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
            <x-error-messages :errors="$errors" />
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
