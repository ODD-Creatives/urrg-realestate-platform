<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - URRG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px; 
        }  
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .content {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #47008E;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #3a0073;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
        }
        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .expired-section {
            background-color: #fff3cd;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #ffc107;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section with Logo -->
        <div class="header">
            <img src="{{ asset('assets/img/urrglogo1.png')}}" alt="URRG Logo">
            <h1>Verify Your Email Address</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    ✅ A new verification link has been sent to your email address.
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            <!-- Show this section if there's an expired link error -->
            @if (session('error') && str_contains(session('error'), 'expired'))
            <div class="expired-section">
                <h3 style="color: #856404; margin-top: 0;">🔗 Verification Link Expired</h3>
                <p>Your verification link has expired. This usually happens when:</p>
                <ul>
                    <li>The link is more than 60 minutes old</li>
                    <li>You've already used the link to verify your email</li>
                    <li>There was an issue with the link</li>
                </ul>
                <p><strong>Solution:</strong> Request a new verification email using the button below.</p>
            </div>
            @endif

            <p>Dear {{ auth()->user()->firstname ?? '' }} {{ auth()->user()->lastname ?? '' }},</p>
            
            <p>Thank you for registering with Unique Radiance Realtor Group!</p>
            
            <p>Before accessing your dashboard, please verify your email address by clicking the link we sent to <strong>{{ auth()->user()->email ?? '' }}</strong>.</p>
            
            <p>If you didn't receive the email, or if the verification link has expired, you can request a new verification link by clicking the button below:</p>
            
            <form method="POST" action="{{ route('verification.send') }}" style="text-align: center;">
                @csrf
                <button type="submit" class="button">📧 Resend Verification Email</button>
            </form>

            <p style="text-align: center; margin-top: 20px;">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   style="color: #666; text-decoration: none;">
                    🚪 Logout
                </a>
            </p>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <div class="footer">
                <p>&copy; {{ date('Y') }} URRG. All rights reserved.</p>
                <p>Your Gateway to Landed Properties!</p>
            </div>
        </div>
    </div>
</body>
</html>