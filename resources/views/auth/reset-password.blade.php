@extends('auth.master')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <h2 class="auth-title">Reset Password</h2>

            @if (Session::has('msg'))
                <div class="alert alert-danger">
                    {{ Session::get('msg') }}
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{ route('admin.forget.update') }}" method="POST" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Enter your new password"
                        required minlength="8">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="id" value="{{ $id }}">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Reset Password
                    </button>
                </div>
            </form>

            <div class="auth-footer">
                <a href="{{ route('admin.login') }}" class="auth-link">
                    Back to Login
                </a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }

        .auth-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .auth-title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .auth-form .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e1e5e9;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .alert {
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-block {
            width: 100%;
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
        }

        .auth-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .auth-card {
                padding: 1.5rem;
            }

            .auth-title {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection
