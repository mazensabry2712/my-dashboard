<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            color: #667eea;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 5px;
        }

        .logo p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
            cursor: pointer;
        }

        .remember-me label {
            color: #666;
            cursor: pointer;
            margin: 0;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #999;
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
            z-index: 1;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        .social-login {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
            color: #666;
        }

        .social-btn:hover {
            border-color: #667eea;
            color: #667eea;
            transform: translateY(-2px);
        }

        .signup-link {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .signup-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .logo h1 {
                font-size: 2rem;
            }

            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="logo">
        <h1>Focus</h1>
        <p>Stay focused, stay productive</p>
    </div>

    @yield('content')

    {{-- <div class="divider">
        <span>or continue with</span>
    </div> --}}

{{--    <div class="social-login">--}}
{{--        <button class="social-btn">Google</button>--}}
{{--        <button class="social-btn">Facebook</button>--}}
{{--    </div>--}}

    {{-- <div class="signup-link">
        Don't have an account? <a href="#">Sign up</a>
    </div> --}}
</div>

{{--<script>--}}
{{--    // Form submission handler--}}
{{--    document.getElementById('loginForm').addEventListener('submit', function(e) {--}}
{{--        e.preventDefault();--}}

{{--        const email = document.getElementById('email').value;--}}
{{--        const password = document.getElementById('password').value;--}}
{{--        const remember = document.getElementById('remember').checked;--}}

{{--        // Basic validation--}}
{{--        if (!email || !password) {--}}
{{--            alert('Please fill in all fields');--}}
{{--            return;--}}
{{--        }--}}

{{--        // Show loading state--}}
{{--        const loginBtn = document.querySelector('.login-btn');--}}
{{--        const originalText = loginBtn.textContent;--}}
{{--        loginBtn.textContent = 'Logging in...';--}}
{{--        loginBtn.disabled = true;--}}

{{--        // Simulate login process--}}
{{--        setTimeout(() => {--}}
{{--            alert(`Login attempt for: ${email}\nRemember me: ${remember ? 'Yes' : 'No'}`);--}}
{{--            loginBtn.textContent = originalText;--}}
{{--            loginBtn.disabled = false;--}}
{{--        }, 1500);--}}
{{--    });--}}

{{--    // Forgot password handler--}}
{{--    document.querySelector('.forgot-password').addEventListener('click', function(e) {--}}
{{--        e.preventDefault();--}}
{{--        const email = prompt('Please enter your email address:');--}}
{{--        if (email) {--}}
{{--            alert(`Password reset link has been sent to: ${email}`);--}}
{{--        }--}}
{{--    });--}}

{{--    // Social login handlers--}}
{{--    document.querySelectorAll('.social-btn').forEach(btn => {--}}
{{--        btn.addEventListener('click', function() {--}}
{{--            alert(`${this.textContent} login clicked`);--}}
{{--        });--}}
{{--    });--}}

{{--    // Input field animations--}}
{{--    document.querySelectorAll('input[type="email"], input[type="password"]').forEach(input => {--}}
{{--        input.addEventListener('focus', function() {--}}
{{--            this.parentElement.classList.add('focused');--}}
{{--        });--}}

{{--        input.addEventListener('blur', function() {--}}
{{--            this.parentElement.classList.remove('focused');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
