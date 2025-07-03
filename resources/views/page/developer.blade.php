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
                <h1 class="breadcumb-title">Developers</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Developers</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-12 p-5">
        <div class="p-4">
            <h3 id="typewriter-heading" class="text-center fw-bold text-dark"></h3>
            <p class="text-center fw-bold ">
                There are many rewarding benefits for developers who partner with us.
            </p>
            <script>
                const typePhrases = [
                    "Access Exclusive Opportunities",
                    "Unlock Premium Advantages",
                    "Experience Elite Opportunities",
                    "Tap into High-Value Prospects"
                ];

                let typeIndex = 0, charIndex = 0, isDeleting = false;
                const typeHeading = document.getElementById("typewriter-heading");

                function typeEffect() {
                    const fullPhrase = typePhrases[typeIndex];
                    const words = fullPhrase.split(" ");
                    const lastWord = words.pop(); // removes and gets the last word
                    const staticPart = words.join(" ");
                    const fullStatic = staticPart ? staticPart + " " : ""; // avoid trailing space if empty
                    const currentPhrase = fullStatic + lastWord;
                    const displayText = currentPhrase.substring(0, charIndex);

                    // Determine where to insert the colored span
                    let html;
                    if (displayText.length >= fullStatic.length) {
                        const visibleStatic = displayText.substring(0, fullStatic.length);
                        const visibleLast = displayText.substring(fullStatic.length);
                        html = `${visibleStatic}<span style="color:#FFC000;">${visibleLast}</span>`;
                    } else {
                        html = displayText;
                    }

                    typeHeading.innerHTML = html + (charIndex % 2 === 0 ? "|" : "");

                    if (!isDeleting) {
                        if (charIndex < currentPhrase.length) {
                            charIndex++;
                        } else {
                            isDeleting = true;
                            setTimeout(typeEffect, 2000); // pause before deleting
                            return;
                        }
                    } else {
                        if (charIndex > 0) {
                            charIndex--;
                        } else {
                            isDeleting = false;
                            typeIndex = (typeIndex + 1) % typePhrases.length;
                        }
                    }

                    setTimeout(typeEffect, isDeleting ? 40 : 100);
                }

                typeEffect();
            </script>

        </div>
            
        <div class="row gy-40 gx-70 justify-content-center">
            <div class="col-lg-4 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                <div class="about-1-item">
                    <div class="row">
                        <div class="col-2">
                            <div class="icon text-center">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="#FFC000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/>
                                    <path d="M16.5 9.5l-4.25 4.25-2.25-2.25L8.5 13l3.75 3.75L18 11.5l-1.5-2z" fill="#424242"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-8 align-items-center text-center pt-4">
                            <h5 class="box-title" style="font-size:20px;"> Reliable Property Sales</h5>
                        </div>
                    </div>
                    <div class="content">
                        <p class="box-text">
                            
                            Our platform has a proven history of helping registered developers successfully sell out their projects.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                <div class="about-1-item">
                    <div class="row">
                        <div class="col-2">
                            <div class="icon text-center">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="#FFC000" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L3 6V11C3 16.55 7.2 21.74 12 23C16.8 21.74 21 16.55 21 11V6L12 2ZM11 17L6.5 12.5L7.91 11.09L11 14.17L16.59 8.59L18 10L11 17Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-8 align-items-center text-center pt-4">
                            <h5 class="box-title" style="font-size:20px;"> Build with Confidence</h5>
                        </div>
                    </div>
                    
                    <div class="content">
                        
                        <p class="box-text">
                            Join a trusted network designed for long-term growth and a secure foundation for your real estate success.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                <div class="about-1-item">
                    <div class="row">
                        <div class="col-2">
                            <div class="icon">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="#FFC000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 4H18V2H16V4H8V2H6V4H5C3.9 4 3 4.9 3 6V20C3 
                                    21.1 3.9 22 5 22H19C20.1 22 21 21.1 21 20V6C21 
                                    4.9 20.1 4 19 4ZM19 20H5V9H19V20ZM19 7H5V6H19V7Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-8 align-items-center text-center pt-4">
                            <h5 class="box-title" style="font-size:20px;"> Access to Our Events</h5>
                        </div>
                    </div>
                    
                    <div class="content">
                        
                        <p class="box-text">
                            Present your projects at our real estate summits, expos, and academy programs for enhanced exposure.
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
                                        <span style="font-size: 2rem;">👷‍♂️</span> Developer Benefits Overview
                                    </h5>
                                    <p class="sec-text fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                       At Unique Radiance Realtors Group (URRG), we partner with developers to maximize project visibility, accelerate sales, and build lasting impact.
                                    </p>
                                </div>
                                <div class="check-list mb-10">
                                    <ul>
                                        <li> 
                                             Targeted Sales Network: <br>
                                            Access a trusted network of trained, high-performing realtors ready to market and sell your projects.
                                        </li>
                                        <li> 
                                            Verified Buyer Pipeline: <br>
                                            Connect with pre-qualified leads and serious investors actively seeking new opportunities.
                                        </li>
                                        <li> 
                                            Project Promotion & Visibility: <br>
                                            Showcase your developments across URRG’s channels, events, and exclusive realtor trainings.
                                        </li>
                                        <li> 

                                            Dedicated Sales Support: <br>
                                            Enjoy structured marketing campaigns, site inspections, and personalized sales strategies for your listings.
                                        </li>
                                        <li> 
                                            Reputation & Brand Strengthening: <br>
                                            Build credibility through strategic partnerships with a respected, value-driven organization.
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form-wrap">
                            <form action="#" method="POST" class="contact-form ajax-contact" enctype="multipart/form-data">
                                <h3 class="form-title">Join URRG as a Developer</h3>
                                <div class="row">
                                    <!-- Developer/Company Name -->
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name *">
                                    </div>

                                    <!-- Contact Person -->
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person *">
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone *">
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address *">
                                    </div>

                                    <!-- Subject -->
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject *">
                                    </div>

                                    

                                    <!-- File Uploads -->
                                    <div class="form-group col-md-12">
                                        <label for="letter_of_intent" class="form-label">Attach Letter of Intent *</label>
                                        <input type="file" class="form-control" name="letter_of_intent" id="letter_of_intent" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="company_profile" class="form-label">Attach Company Profile *</label>
                                        <input type="file" class="form-control" name="company_profile" id="company_profile" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="property_details" class="form-label">Attach Property Details *</label>
                                        <input type="file" class="form-control" name="property_details" id="property_details" required>
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