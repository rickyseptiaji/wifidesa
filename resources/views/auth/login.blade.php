@extends('layouts.app')
@section('title', 'login')
@section('auth')
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" name="email" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      </main>
  @endif
@endsection
