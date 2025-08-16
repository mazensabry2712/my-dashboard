@extends('auth.master')
@section('content')

       @if (Session::has('msg'))
           <p class="text-danger">{{ Session::get('msg') }}</p>
       @endif
    <form action="{{route('admin.forget.password')}}" method="POST">
        @csrf
        <div class="form-group">

            
            <label for="email">Forgot Password</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="login-btn">Send Reset Link</button>
    </form>
@endsection
