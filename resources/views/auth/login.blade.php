@extends('auth.master')
@section('content')
    @if (Session::has('msg'))
        <p class="text-danger">{{ Session::get('msg') }}</p>
    @endif
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-options">


            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>


            <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
@endsection
