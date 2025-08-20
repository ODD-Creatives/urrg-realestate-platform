<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to URRG</title>
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
            <p>Dear {{ $developer->contact_person }},</p>
            <p>
                We are excited to welcome you to Unique Radiance Realtors Group (URRG)! 
                Your registration as a developer has been received and successfully approved.
            </p>
            
            <br>
            
            <p>As a registered developer, you now have access to :</p>
            
            <ul>
                <li>✅ Showcase your property listings</li>
                <li>✅ Connect with trusted realtors and clients</li>
                <li>✅ Benefit from our marketing network and visibility</li>
                <li>✅ Grow your portfolio with integrity, professionalism, and excellence</li>
            </ul>

            <p>Our team will reach out to guide you through the next steps.</p>
            <p>This link will expire in 24 hours, so please verify your email promptly to continue exploring our available properties and services.</p>
            <p>
                <a href="{{ route('developer.verify', $developer->id) }}" class="button">Verify Email Address</a>
            </p>
            <p>If you need assistance, please don’t hesitate to reach us at:
            <p>📧 support@uniqueradiancerealtorsgroup.com</p>

            <p>📞 +234 707 562 0563</p>

            <p>We look forward to achieving great success together.
            </p>
            
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} URRG. All rights reserved.</p>
            <p>Your Gateway to Landed Properties!</p>
            <p> “One Vision. One Standard. One Success.”</p>
            <p><a href="{{ config('app.url') }}" style="color: #555; text-decoration: none;">https://uniqueradiancerealtorsgroup.com/</a></p>
        </div>
    </div>
</body>
</html>