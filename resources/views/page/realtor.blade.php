@extends('layouts.app')

@section('content')
    <style>
        #rotating-heading {
            transition: opacity 0.5s ease-in-out;
            font-size: 2rem;
        }
    </style>
    <div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/bg/breadcrumb-bg1.jpg')}}">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Realtors</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Realtors</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-12 p-5">
        <div class="p-4">
            <h3 id="typewriter-heading-realtor" class="text-center fw-bold text-dark"></h3>
            <p class="text-center fw-bold">
                There are many rewarding benefits for realtors who Join and receive training at URRG .
            </p>
            <div class="text-center mt-3 mb-5">
                <a href="#realtor-form" class="btn btn-warning text-dark fw-bold">
                    Register Now and Become One of Our Realtors
                </a>
            </div>

            <script>
                const realtorPhrases = [
                    "Gain Verified Leads",
                    "Earn Referral Commissions",
                    "Access Exclusive Projects",
                    "Sharpen Skills with URRG Academy",
                    "Grow Wealth through Real Estate",
                    "Be Mentored into Leadership"
                ];

                let realtorIndex = 0, realtorCharIndex = 0, isRealtorDeleting = false;
                const realtorHeading = document.getElementById("typewriter-heading-realtor");

                function typeRealtorEffect() {
                    const fullPhrase = realtorPhrases[realtorIndex];
                    const words = fullPhrase.split(" ");
                    const lastWord = words.pop();
                    const staticPart = words.join(" ");
                    const fullStatic = staticPart ? staticPart + " " : "";
                    const currentPhrase = fullStatic + lastWord;
                    const displayText = currentPhrase.substring(0, realtorCharIndex);

                    // Coloring the last word
                    let html;
                    if (displayText.length >= fullStatic.length) {
                        const visibleStatic = displayText.substring(0, fullStatic.length);
                        const visibleLast = displayText.substring(fullStatic.length);
                        html = `${visibleStatic}<span style="color:#FFC000;">${visibleLast}</span>`;
                    } else {
                        html = displayText;
                    }

                    realtorHeading.innerHTML = html + (realtorCharIndex % 2 === 0 ? "|" : "");

                    if (!isRealtorDeleting) {
                        if (realtorCharIndex < currentPhrase.length) {
                            realtorCharIndex++;
                        } else {
                            isRealtorDeleting = true;
                            setTimeout(typeRealtorEffect, 2000);
                            return;
                        }
                    } else {
                        if (realtorCharIndex > 0) {
                            realtorCharIndex--;
                        } else {
                            isRealtorDeleting = false;
                            realtorIndex = (realtorIndex + 1) % realtorPhrases.length;
                        }
                    }

                    setTimeout(typeRealtorEffect, isRealtorDeleting ? 40 : 100);
                }

                typeRealtorEffect();
            </script>
        </div>

            
        <div class="row gy-40 gx-70 justify-content-center">
            <!-- Verified Leads -->
            <div class="col-lg-4 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                <div class="about-1-item">
                    <div class="row">
                        <div class="col-2">
                            <div class="icon text-center">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="#FFC000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 
                                    0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2.33 
                                    0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zM8 
                                    13c-.29 0-.62.02-.97.05C6.65 13.64 6 14.57 6 
                                    15.5V17h5v-1.5c0-.93-.65-1.86-1.03-2.45-.35-.03-.68-.05-.97-.05z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-8 align-items-center text-center pt-4">
                            <h5 class="box-title" style="font-size:20px;"> Verified Leads</h5>
                        </div>
                    </div>
                    <div class="content">
                        <p class="box-text">
                            Get access to pre-qualified, high-intent leads ready to convert into active clients.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Leadership Development -->
            <div class="col-lg-4 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                <div class="about-1-item">
                    <div class="row">
                        <div class="col-2">
                            <div class="icon text-center">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="#FFC000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L4 5v6c0 5.25 3.66 10.74 8 12 4.34-1.26 8-6.75 8-12V5l-8-3zm0 
                                    2.18L18 6v4c0 4.42-3.13 9.23-6 10.74C9.13 19.23 6 14.42 6 
                                    10V6l6-1.82zM11 14h2v2h-2v-2zm0-8h2v6h-2V6z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-8 align-items-center text-center pt-4">
                            <h5 class="box-title" style="font-size:20px;"> Leadership Development</h5>
                        </div>
                    </div>
                    <div class="content">
                        <p class="box-text">
                            Be mentored into influence — we don’t just train agents, we raise leaders for the industry.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Incentives & Recognition -->
            <div class="col-lg-4 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                <div class="about-1-item">
                    <div class="row">
                        <div class="col-2">
                            <div class="icon text-center">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="#FFC000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 
                                    10-4.48 10-10S17.52 2 12 2zm3.29 
                                    13.89L12 13.5l-3.29 2.39 1-3.9-3.01-2.6 
                                    3.95-.33L12 5.5l1.35 3.56 3.95.33-3.01 
                                    2.6 1 3.9z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-8 align-items-center text-center pt-4">
                            <h5 class="box-title" style="font-size:20px;"> Incentives & Recognition</h5>
                        </div>
                    </div>
                    <div class="content">
                        <p class="box-text">
                            Enjoy rewards, bonuses, and recognition for your performance and leadership within the URRG network.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
        
    <div class="contact-form-area">
        <div class="container">
            <div class="row gx-0">
                <div class="col-xl-12">
                    <div class="contact-all-wrapper">
                        <div class="contact-form-wrap bg-light">
                            <div class="row justify-content-center">
                                <div class="title-area ">
                                    <h5 class="sub-title1 fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s">   
                                         <span style="font-size: 2rem;">👤</span> Realtor Benefits Overview
                                    </h5>
                                    <p class="sec-text fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                       At Unique Radiance Realtors Group (URRG), we empower realtors to grow in sales, leadership, and wealth — not just close deals.

                                    </p>
                                </div>
                                <div class="check-list mb-10">
                                    <ul>
                                        <li>
                                            Verified Leads: <br>
                                            Access quality, ready-to-convert leads.
                                        </li>
                                        <li>
                                            Referral Commissions: <br>
                                            Earn from introducing new clients and realtors.
                                        </li>
                                        <li>
                                            Exclusive Projects: <br>
                                            Sell top-tier, verified projects from trusted developers.
                                        </li>
                                        <li>
                                            URRG Academy Training: <br>
                                            Sharpen your sales, business, and leadership skills.
                                        </li>
                                        <li>
                                            Incentives & Recognition: <br>
                                            Enjoy rewards, bonuses, and team leadership opportunities.
                                        </li>
                                        <li>
                                            Wealth & Financial Growth: <br>
                                            Learn how to build long-term wealth through real estate.
                                        </li>
                                        <li>
                                            Leadership Development: <br>
                                            Be mentored into influence — we don’t just train agents, we raise leaders.
                                        </li>                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form-wrap">
                            <form id="realtor-form" action="#" method="POST" class="contact-form ajax-contact" enctype="multipart/form-data">
                                <h3 class="form-title">Join Us as a Realtor</h3>
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname *" required>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname *" required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone *" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address *" required>
                                    </div>

                                    <!-- State of Residence -->
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="state_of_residence" id="state_of_residence" placeholder="State of Residence *" required>
                                    </div>

                                    <!-- Referral Code -->
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="referral_code" id="referral_code" placeholder="Referral Code *" required>
                                            <small class="form-text text-muted mt-1">
                                                Don't have a referral code? <a href="https://wa.me/2347075620563" target="_blank" style="color: #25D366; font-weight: 500;">Click here to message the admin on WhatsApp</a>.
                                            </small>
                                        </div>

                                    

                                    <!-- Experience in Real Estate -->
                                    <div class="form-group col-12">
                                        <label for="experience" class="form-label">How long have you been in the Real Estate Industry?</label>
                                        <select class="form-control" name="experience" id="experience" required>
                                            <option value="">Select experience range</option>
                                            <option value="Below 6 months">Below 6 months</option>
                                            <option value="6 months - 1 year">6 months - 1 year</option>
                                            <option value="1 year - 3 years">1 year - 3 years</option>
                                            <option value="3 years - 5 years">3 years - 5 years</option>
                                            <option value="5 years - 7 years">5 years - 7 years</option>
                                            <option value="Above 7 years">Above 7 years</option>
                                        </select>
                                    </div>
                                    

                                    <!-- Password -->
                                    <div class="form-group col-md-6">
                                        <label for="password" class="form-label">Password *</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group col-md-6">
                                        <label for="confirm_password" class="form-label">Confirm Password *</label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-btn text-start col-12 mt-3">
                                        <button class="th-btn radius">Submit Application</button>
                                    </div>
                                </div>

                                <p class="form-messages mb-0 mt-3"></p>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    

    
    
    
@endsection