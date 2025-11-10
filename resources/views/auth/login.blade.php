@extends('layouts.auth')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-white">
    <div class="w-100" style="max-width: 400px;">
        <h3 class="text-center mb-4 fw-semibold">Login</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="form-label small text-muted">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0"
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                >
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label small text-muted">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0"
                    required
                >
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label small text-muted" for="remember">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="small text-muted text-decoration-none">
                        Forgot?
                    </a>
                @endif
            </div>

            <button class="btn btn-dark w-100 py-2 rounded-3">Login</button>
        </form>

        <div class="text-center mt-4">
            <p class="small text-muted mb-2">Don’t have an account?</p>
            <a href="{{ route('register.show') }}" class="btn btn-outline-dark w-100 py-2 rounded-3">Create Account</a>
        </div>
    </div>
</div>
@endsection
