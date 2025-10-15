<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <!-- Your existing styles -->
</head>
<body>
    <div class="email-container">
        <!-- Header Section with Logo -->
        <div class="header">
            <!-- For emails, use embedded image or absolute URL -->
            <img src="https://uniqueradiancerealtorsgroup.com/assets/img/urrglogo1.png" alt="URRG Logo" style="max-width: 150px;">
            <h1>Welcome to URRG</h1>
        </div> 
 
        <!-- Content Section -->
        <div class="content">
            <p>Dear {{ $first_name ?? '' }} {{ $last_name ?? '' }},</p>
            
            <!-- Your existing email content (welcome message, core values, etc.) -->
            
            @if(isset($verifyUrl))
            <p>To complete your registration and gain access to your exclusive property dashboard, please verify your email address by clicking the button below:</p>
            
            <p style="text-align: center;">
                <a href="{{ $verifyUrl }}" target="_blank" class="button">Verify Your Email</a>
            </p>
            
            <p>This link will expire in 60 minutes, so please verify your email promptly to continue exploring our available properties and services.</p>
            @endif

            <!-- REMOVE THE FORM SECTION FROM EMAIL TEMPLATE -->
            <!-- Email templates should not have forms that require web sessions -->

            @if(isset($referralCode))
                <p>Your Referral code is <strong>{{ $referralCode }}</strong>. Share it with your friends and earn rewards when they sign up.</p>
            @endif
            
            <!-- Rest of your email content -->
        </div>
    </div>
</body>
</html>