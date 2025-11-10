@extends('layouts.auth')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-white">
    <div class="w-100" style="max-width: 400px;">
        <h3 class="text-center mb-4 fw-semibold">Create Account</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="form-label small text-muted">Full Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0"
                    value="{{ old('name') }}" 
                    required
                >
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label small text-muted">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0"
                    value="{{ old('email') }}" 
                    required
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

            <div class="mb-4">
                <label class="form-label small text-muted">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control border-0 border-bottom rounded-0 shadow-none p-2 px-0"
                    required
                >
            </div>

            <button class="btn btn-dark w-100 py-2 rounded-3">Register</button>
        </form>

        <div class="text-center mt-4">
            <p class="small text-muted mb-2">Already have an account?</p>
            <a href="{{ route('login') }}" class="btn btn-outline-dark w-100 py-2 rounded-3">Login</a>
        </div>
    </div>
</div>
@endsection
