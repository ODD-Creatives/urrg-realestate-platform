<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend Verification - URRG</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
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
            width: 100%;
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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ asset('assets/img/urrglogo1.png')}}" alt="URRG Logo">
            <h1>Resend Verification Email</h1>
        </div>

        <div class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <p>Enter your email address to receive a new verification link.</p>

            <form method="POST" action="{{ route('verification.resend-by-email') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="button">Resend Verification Email</button>
            </form>

            <p style="text-align: center; margin-top: 20px;">
                <a href="{{ route('signin') }}">Back to Login</a>
            </p>
        </div>
    </div>
</body>
</html>