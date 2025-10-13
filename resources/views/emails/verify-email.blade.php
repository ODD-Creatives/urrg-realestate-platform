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
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #3a0073;
        }
        .button-secondary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .button-secondary:hover {
            background-color: #5a6268;
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
        .core-values {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #47008E;
        }
        .core-values h3 {
            color: #47008E;
            margin-top: 0;
        }
        .core-values ul {
            padding-left: 20px;
        }
        .core-values li {
            margin-bottom: 8px;
        }
        .motto {
            font-weight: bold;
            font-style: italic;
            text-align: center;
            margin: 15px 0;
            color: #47008E;
        }
        .resend-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #ffc107;
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
        <!-- Header Section with Logo -->
        <div class="header">
            <img src="{{ asset('assets/img/urrglogo1.png')}}" alt="URRG Logo">
            <h1>Welcome to URRG</h1>
        </div> 
 
        <!-- Content Section -->
        <div class="content">
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <p>Dear {{ $first_name ?? '' }} {{ $last_name ?? '' }},</p>
            <p>
                Welcome to Unique Radiance Realtor Group (URRG) — your trusted partner in connecting clients with premium landed properties. We're excited to have you as part of our network of real estate professionals, and we look forward to supporting you in closing deals faster, building lasting client relationships, and thriving in today's competitive property market.
            </p>
            
            <div class="core-values">
                <h3>URRG – Core Values</h3>
                <p class="motto">"One Vision. One Standard. One Success."</p>
                <ul>
                    <li><strong>Integrity</strong> – We tell the truth, keep our word, and build trust that lasts.</li>
                    <li><strong>Professionalism</strong> – We handle every deal with excellence, structure, and respect.</li>
                    <li><strong>Collaboration</strong> – We win together by uniting realtors, developers, and clients as one team.</li>
                    <li><strong>Accountability</strong> – We take ownership of our actions and deliver on every promise.</li>
                    <li><strong>Value Creation</strong> – We ensure every deal benefits all parties — developers, agents, and clients.</li>
                    <li><strong>Continuous Growth</strong> – We keep learning, innovating, and improving to stay ahead in the market.</li>
                    <li><strong>Excellence in Service</strong> – We go beyond expectations to deliver top-notch results every time.</li>
                    <li><strong>Mutual Respect</strong> – We honor every partner's role and treat each other with dignity.</li>
                </ul>
            </div>
            
            @if(isset($verifyUrl))
            <p>To complete your registration and gain access to your exclusive property dashboard, please verify your email address by clicking the button below:</p>
            
            <p style="text-align: center;">
                <a href="{{ $verifyUrl }}" target="_blank" class="button">Verify Your Email</a>
            </p>
            
            <p>This link will expire in 60 minutes, so please verify your email promptly to continue exploring our available properties and services.</p>
            @endif

            <!-- Resend Verification Section -->
            <div class="resend-section">
                <h3 style="color: #856404; margin-top: 0;">Need a new verification email?</h3>
                <p>If you didn't receive the verification email, or if the link has expired, you can request a new one by clicking the button below:</p>
                
                <form method="POST" action="{{ route('verification.send') }}" style="text-align: center;">
                    @csrf <!-- THIS IS THE FIX - ADD CSRF TOKEN -->
                    <button type="submit" class="button-secondary">Resend Verification Email</button>
                </form>
                
                <p style="font-size: 14px; margin-top: 10px; color: #666;">
                    <strong>Note:</strong> Please check your spam folder before requesting a new verification email.
                </p>
            </div>

            @if(isset($referralCode))
                <p>Your Referral code is <strong>{{ $referralCode }}</strong>. Share it with your friends and earn rewards when they sign up.</p>
            @endif
            
            @if(isset($realtorId))
                <p>Your Realtor ID is <strong>{{ $realtorId }}</strong>. You can use this for identification within our platform.</p>
            @endif
            
            <p>If you did not initiate this request, please disregard this email.</p>

            <p>We are also excited to inform you that your virtual account has been successfully created with us!</p>

            <p>If you have any questions or need further assistance, please don't hesitate to reach out to us.</p>

            <p>Thank you for choosing URRG!</p>

            <p>Warm regards,</p>
            <p><strong>The URRG Team</strong></p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} URRG. All rights reserved.</p>
            <p>Your Gateway to Landed Properties!</p>
            <p><a href="{{ config('app.url') }}" style="color: #555; text-decoration: none;">https://uniqueradiancerealtorsgroup.com/</a></p>
        </div>
    </div>
</body>
</html>