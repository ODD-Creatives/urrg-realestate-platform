<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
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
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section with Logo -->
        <div class="header">
            <img src="{{ asset('assets/img/urrglogo1.png')}}" alt="URRG Logo">
            <h1>Welcome to URRG</h1>
        </div> 
 
        <!-- Content Section -->
        <div class="content">
            <p>Dear {{ $first_name}} {{ $last_name }},</p>
            <p>Welcome to URRG, your trusted partner in finding premium landed properties. We are excited to have you on board and look forward to helping you make informed decisions in the real estate market.</p>
            
            <p>To complete your registration and gain access to your exclusive property dashboard, please verify your email address by clicking the button below:</p>
            
            <p style="text-align: center;">
                <a href="{{ $verifyUrl }} " target="_blank" class="button">Verify Your Email</a>
                {{-- <a href="{{ route('verification.notice', ['user_id' => encrypt($user_id)]) }} " target="_blank" class="button">Verify Your Account</a> --}}
                
            </p>
            
            <p>This link will expire in 24 hours, so please verify your email promptly to continue exploring our available properties and services.</p>

            @if(isset($referralCode))
                <p>Your referral code is <strong>{{ $referralCode }}</strong>. Share it with your friends and earn rewards when they sign up.</p>
            @endif
            
            <p>{{ $verifyUrl }}</p>

            <p>If you did not initiate this request, please disregard this email.</p>

            <p>We are also excited to inform you that your virtual account has been successfully created with us! Below are your account details:</p>

            
            <p>If you have any questions or need further assistance, please don't hesitate to reach out to us.</p>

            <p>Thank you for choosing URRG!</p>

            <p>Warm regards,</p>
            <p><strong>The URRG Team</strong></p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} URRG. All rights reserved.</p>
            <p> Your Gateway to Landed Properties!</p>
            <p><a href="https://uniqueradiancerealtorsgroup.com" style="color: #555; text-decoration: none;">https://uniqueradiancerealtorsgroup.com/</a></p>
        </div>
    </div>
</body>
</html>
