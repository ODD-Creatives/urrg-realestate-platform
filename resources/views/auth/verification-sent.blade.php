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
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
</head> 
<body>
    <div class="email-container">
        <div class="header"> 
            <img src="{{ asset('assets/img/urrglogo1.png')}}" alt="URRG Logo">
            <h1>Verify Your Email Address</h1>
        </div> 

        <div class="content">
            {{-- @if(session('success')) --}}
                <div class="alert alert-success">
                    {{ session('success') }}
                    {{-- @if(session('whatsapp_link')) --}}
                        <br>
                        <a href="https://chat.whatsapp.com/K8z72O68OL9IjpvXfKa5uN?mode=ac_t" target="_blank" class="button mt-2">
                            Join our WhatsApp group
                        </a>
                    {{-- @endif --}}
                </div>
            {{-- @endif --}}

            <div class="alert alert-info">
                <h3>📧 Verification Email Sent</h3>
                <p>We've sent a verification link to <strong>{{ session('email') ?? 'your email address' }}</strong>. Please check your inbox and click the verification link to activate your account.</p>
            </div>

            <p><strong>Didn't receive the email?</strong></p>
            <ul>
                <li>Check your spam or junk folder</li>
                <li>Make sure you entered the correct email address</li>
                <li>Wait a few minutes and try again</li>
                
                <!-- Pass the email as a query parameter to pre-fill the form -->
                <li>
                    <a href="{{ route('verification.resend-form', ['email' => session('email')]) }}">
                        Request a new verification email
                    </a>
                </li>
            </ul>

            <p style="text-align: center; margin-top: 30px;">
                <a href="{{ route('signin') }}" class="button">Proceed to Login</a>
            </p>
 
            <p style="text-align: center;">
                <small>Once you verify your email, you can log in to your account.</small>
            </p>
        </div>
    </div>
</body>
</html>