<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 28px;
            font-weight: 300;
        }

        .content {
            margin-bottom: 30px;
        }

        .content p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.5;
        }

        .reset-button {
            display: inline-block;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: #ffffff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            transition: all 0.3s ease;
        }

        .reset-button:hover {
            background: linear-gradient(135deg, #2980b9, #1f618d);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .button-container {
            text-align: center;
            margin: 30px 0;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
            font-size: 14px;
            color: #95a5a6;
            text-align: center;
        }

        .security-note {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
        }

        .security-note strong {
            color: #2980b9;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                padding: 20px;
            }

            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset Request</h1>
        </div>

        <div class="content">
            <p>Hello,</p>

            <p>We received a request to reset your password for your account on <strong>{{ date('F j, Y \a\t g:i A') }}</strong>. If you made this request, please click the button below to reset your password:</p>

            <div class="button-container">
                <a href="{{ route('admin.reset.password', ['id' => $id]) }}" class="reset-button">
                    Reset My Password
                </a>
            </div>

            <p>If the button above doesn't work, you can copy and paste the following link into your browser:</p>
            <p style="word-break: break-all; color: #3498db;">
                {{ route('admin.reset.password', ['id' => $id]) }}
            </p>

            <div class="security-note">
                <strong>Security Notice:</strong> This password reset link will expire in 60 minutes for your security. If you did not request a password reset on {{ date('M j, Y \a\t g:i A') }}, please ignore this email and your password will remain unchanged.
            </div>
        </div>

        <div class="footer">
            <p>If you're having trouble with the password reset, please contact our support team.</p>
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
