@extends('layouts.app')

@section('content')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/breadcrumb-bg1.jpg')}}">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-1-wrapper space overflow-hidden" id="about-sec">
        <div class="shape-mockup" data-bottom="0" data-left="0">
            <img src="{{asset('assets/img/icon/about-2-shape.png')}}" alt="img">
        </div>
        <div class="shape-mockup spin d-none d-lg-block" data-bottom="11%" data-left="5%">
            <img src="{{asset('assets/img/icon/circle-start1.png')}}" alt="img">
        </div>
        <div class="container">
            <div class="row gy-40 gx-70 justify-content-center">
                <div class="col-xl-6">
                    <div class="img-box1 about-1 fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <div class="about-logo-wrap-2">
                            <div class="logo-icon-wrap">
                                <div class="logo-icon"><img src="{{asset('assets/img/favicons/android-icon-192x192.png')}}" alt="img"></div>
                                <div class="logo-icon-wrap__text"><span class="logo-animation">UNIQUE RADIANCE REALTORS * GROUP *
                                        </span></div>
                            </div>
                        </div>
                        <div class="about-left">
                            <div class="img-box"><img src="{{asset('assets/img/about/about-1-left-11.jpg')}}" alt="Image"></div>
                            <div class="img-box small"><img src="{{asset('assets/img/about/about-1-left-21.jpg')}}" alt="Image"></div>
                        </div>
                        <div class="about-middle"><img class="tilt-active" src="{{asset('assets/img/about/about-1-middle1.jpg')}}"
                                alt="Image"></div>
                        <div class="about-right">
                            <div class="img-box small"><img src="{{asset('assets/img/about/about-1-right-11.jpg')}}" alt="Image">
                            </div>
                            <div class="img-box big"><img src="{{asset('assets/img/about/about-1-right-21.jpg')}}" alt="Image"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="title-area text-left mb-5">
                        <p class="sub-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <span class="double-line"></span> About Us</p>
                        
                        <p class="sec-text fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            Unique Radiance Realtor Group (URRG) is Africa’s greatest real estate empire, dedicated to shaping global leaders and impacting the world 
                            through real estate excellence. Our platform empowers ambitious individuals to create wealth and 
                            transform lives by providing world-class training, mentorship, and a supportive community.
                        </p>
                        <p class="sec-text fadeinup wow" data-wow-duration="2.0s" data-wow-delay="1.0s">
                            Joining Unique Radiance Realtor Group (URRG) means stepping into a movement focused on leadership, growth, and lasting 
                            success — where you’re equipped to build not just a career, but a legacy.
                        </p>
                        
                    </div>
                    
                    <div class="row gy-4  mb-4">
                        <div class="col-lg-6 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                            <div class="about-1-item">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="icon"><img src="{{asset('assets/img/icon/about-1-3.svg')}}" alt="icon"></div>
                                    </div>
                                    <div class="col-8 align-items-center text-center pt-4">
                                        <h5 class="box-title" style="font-size:23px;"> Our Vission</h5>
                                    </div>
                                </div>
                                <div class="content">
                                    <p class="box-text">
                                        We are Africa’s greatest real estate empire. <br> — Shaping global leaders, empowering realtors, and partnering with visionary developers to create wealth, transform lives, and impact the world with excellence and integrity.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 fadeinup wow" data-wow-duration="2.5s" data-wow-delay="1.0s">
                            <div class="about-1-item">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="icon"><img src="{{asset('assets/img/icon/about-1-4.svg')}}" alt="icon"></div>
                                    </div>
                                    <div class="col-8 align-items-center text-center pt-4">
                                        <h5 class="box-title" style="font-size:23px;"> Our Mission</h5>
                                    </div>
                                </div>
                                
                                <div class="content">
                                    
                                    <p class="box-text">
                                        We exist to raise a generation of exceptional real estate professionals, — Building wealth, leading with purpose, and setting the standard for leadership, excellence, and transformation in the real estate industry across Africa and beyond.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="why-sec-2 bg-smoke space" id="why-sec" data-bg-src="{{asset('assets/img/shape/what-we-do-3-bg.png')}}">
        <div class="container">
            <div class="row justify-content-lg-between gy-4 justify-content-center align-items-center mb-40">
                <div class="col-lg-6">
                    <div class="title-area text-left mb-2">
                        <p class="sub-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <span class="double-line"></span> Our Goals
                        </p>
                        <h2 class="sec-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            Unique Radiance Realtor Group (URRG) Plans.
                        </h2>
                    </div>
                </div>
                
            </div>
            <div class="row gy-30 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">01</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-1.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">
                                <span>Raise Leaders of Influence<span>
                            </h3>
                            <p class="box-text">
                                Build confident, purpose-driven realtors who stand out and lead in the real estate industry.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">02</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-2.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Create Sustainable Wealth</h3>
                            <p class="box-text">
                                Provide the platform, mentorship, and opportunities for members to build lasting wealth through real estate.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">03</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-3.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Partner with Visionary Developers</h3>
                            <p class="box-text">
                                 Work with developers who build with purpose, deliver quality, 
                                 and uphold integrity to earn lasting trust.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">04</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-4.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Promote a Culture of Excellence</h3>
                            <p class="box-text">
                                Enforce high standards in professionalism, discipline, structure, and execution across every level of the team.

                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">05</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-1.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title"> Educate and Empower Our Team</h3>
                            <p class="box-text">
                               
                                Equip our members with the knowledge, skills, and mindset needed to grow in business, leadership, and life.

                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">06</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-2.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Establish Strong Brand Influence</h3>
                            <p class="box-text">
                                
                                Strengthen URRG’s presence as a respected and influential force in the real estate space — locally and globally.

                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2 style-4">
                        <h4 class="count">07</h4>
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-3.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Build Systems that Scale</h3>
                            <p class="box-text">
                                
                                Operate with structure, policies, and platforms that support growth, efficiency, and long-term impact.
                            </p>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="about-1-wrapper space overflow-hidden" id="about-sec">
        <div class="shape-mockup" data-bottom="0" data-left="0">
            <img src="{{asset('assets/img/icon/about-2-shape.png')}}" alt="img">
        </div>
        
        <div class="container">
            <div class="row gy-40 gx-70 justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="title-area text-center">
                            <p class="sub-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                <span class="double-line"></span> 
                                Platform Objectives
                            </p>
                            <p class="sec-text fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                Unique Radiance Realtors Group (URRG) is not just a team — it’s a transformational platform redefining real estate across Africa. Our goal is to empower individuals and organizations to lead, grow, and create lasting impact.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="img-box1 about-1 fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <div class="why-card-1 style-2">
                        <div class="why-card-1__content">
                            <h3 class="box-title">For Realtors</h3>
                            
                            <div class="check-list mb-10">
                                <ul>
                                    <li>Equip realtors with leadership, sales, and business skills to stand out in a competitive industry</li>
                                    <li>Provide structured mentorship, real estate education, and community support</li>
                                    <li>Create a high-performing culture that drives personal growth, professionalism, and financial success</li>
                                    <li>Connect realtors to verified, profitable projects and ensure they earn with confidence</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="img-box1 about-1 fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <div class="why-card-1 style-2">
                            <div class="why-card-1__content">
                                <h3 class="box-title">For Developers:</h3>
                                <div class="check-list mb-10">
                                    <ul>
                                        <li>Offer a reliable sales force backed by training, structure, and integrity</li>
                                        <li>Partner only with developers who uphold quality, vision, and timely delivery</li>
                                        <li>Help developers sell out their projects faster with focused marketing and trusted realtor networks</li>
                                        <li>Build long-term relationships that prioritize trust, reputation, and results</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="why-sec-2 bg-smoke space" id="why-sec">
        <div class="shape-mockup jump d-none d-md-block" style="top: 20%; right: 5%;">
            <img src="{{asset('assets/img/shape/why-2-shape.png')}}" alt="img">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="title-area text-center">
                        <p class="sub-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <span class="double-line"></span> 
                            Who We Serve
                        </p>
                        <p class="sec-text fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            At URRG, we are building Africa’s greatest real estate empire by empowering realtors and partnering with visionary developers to create global impact.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gy-30 align-items-center justify-content-center ps-md-5 pe-md-5">
                <div class="col-xl-6 col-lg-6 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2">
                        <div class="hover-icon"><img src="{{asset('assets/img/icon/why-hover-icon-1.png')}}" alt="img"></div>
                        
                        <div class="why-card-1__icon"><img src="{{asset('assets/img/icon/why-icon-1-1.svg')}}" alt="image"></div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">For Realtors</h3>
                            <p class="box-text">
                                We provide a platform where realtors grow into world-class professionals and leaders. 
                                Through intensive training, mentorship, and a winning team culture, we equip our members 
                                with the knowledge, confidence, and support to close high-value deals, build wealth, and 
                                transform lives — starting with their own.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2">
                        <div class="hover-icon">
                            <img src="{{asset('assets/img/icon/why-hover-icon-1.png')}}" alt="img">
                        </div>
                        <div class="why-card-1__icon">
                            <img src="{{asset('assets/img/icon/why-icon-1-2.svg')}}" alt="image">
                        </div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">For Developers</h3>
                            <p class="box-text">
                                We collaborate with developers who share our commitment to excellence, vision, 
                                and integrity. If you’re building with quality, transparency, and purpose, 
                                we’re the sales force you need. URRG helps you sell out your projects faster 
                                by leveraging a trusted, well-trained team with a strong network, deep market 
                                understanding, and a reputation for delivering results.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2">
                        <div class="hover-icon">
                            <img src="{{asset('assets/img/icon/why-hover-icon-1.png')}}" alt="img">
                        </div>
                        <div class="why-card-1__icon">
                            <img src="{{asset('assets/img/icon/why-icon-1-2.svg')}}" alt="image">
                        </div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Referral System</h3>
                            <p class="box-text">
                                We rewards team members for introducing new realtors or clients to the platform. <br>
                                        You earn bonuses or commissions when someone you refer joins URRG, closes a deal, 
                                        or brings in business. It encourages teamwork and growth through networking.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 fadeinup wow">
                    <div class="why-card-1 style-2">
                        <div class="hover-icon">
                            <img src="{{asset('assets/img/icon/why-hover-icon-1.png')}}" alt="img">
                        </div>
                        <div class="why-card-1__icon">
                            <img src="{{asset('assets/img/icon/why-icon-1-2.svg')}}" alt="image">
                        </div>
                        <div class="why-card-1__content">
                            <h3 class="box-title">Commission System</h3>
                            <p class="box-text">
                                Unique Radiance Realtors Group (URRG) operates a structured, transparent commission system for all deals. <br>
                                        Realtors earn clearly defined percentages on sales, and bonuses on performance. 
                                        There are no hidden terms — just real opportunities to earn and grow.
                            </p>
                        </div>
                        
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
    <section class="team-area-1 space overflow-hidden">
        <div class="shape-mockup jump d-none d-lg-block" style="top: 6%; right: 4%;"><img
                src="{{asset('assets/img/shape/team-2-shape.png')}}" alt="img"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="title-area text-center mt-1">
                        <p class="sub-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s"><span
                                class="double-line"></span>Team Members</p>
                        <h2 class="sec-title fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            Meet Our Team Leaders
                        </h2>
                    </div>
                </div>
            </div>
            <div class="slider-area mb-20">
                <div class="swiper th-slider has-shadow" id="teamSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}, "autoHeight": "true"}'>
                    <div class="swiper-wrapper">
                    
                    <!-- Member 1 -->
                    <div class="swiper-slide">
                        <div class="team-card style-2 d-flex flex-column justify-content-between" data-bg-src="{{asset('assets/img/shape/team-2-bg-shape.png')}}">
                            <div class="team-img"><img src="{{asset('assets/img/team/mike.png')}}" alt="Team"></div>
                            <div class="team-content d-flex justify-content-between align-items-start">
                                <div class="left-contet">
                                    <h3 class="box-title">
                                        <a href="team-details.html"> Amb. Adejare Micheal Adetomiwa</a>
                                    </h3>
                                    <span class="team-desig">President</span>
                                </div>
                                <div class="team-social">
                                    <div class="th-social">
                                        <a target="_blank" href="https://www.instagram.com/adejaremichael_adetomiwa?igsh=dml0MnB0MDQ3bzBm"><i class="fab fa-instagram"></i></a> 
                                        <a target="_blank" href="https://linkedin.com/"><i class="fa-solid fa-envelope"></i></a>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalMike">View Profile</button>

                            </div>
                        </div>
                    </div>
                    <!-- Member 2 -->
                    <div class="swiper-slide">
                        <div class="team-card style-2 d-flex flex-column justify-content-between" data-bg-src="{{asset('assets/img/shape/team-2-bg-shape.png')}}">
                            <div class="team-img">
                                <img src="{{asset('assets/img/team/ade.png')}}" alt="Team">
                            </div>
                            <div class="team-content d-flex justify-content-between align-items-start">
                                <div class="left-contet">
                                    <h3 class="box-title"><a href="team-details.html">Mr. Adega Adeleye Isaac</a></h3>
                                    <span class="team-desig">Head of Administration</span>
                                </div>
                                <div class="team-social">
                                    <div class="th-social">
                                        <a target="_blank" href="https://www.instagram.com/adehhhomes?igsh=MWUxZmJ6NWoyZWY2bg%3D%3D&utm_source=qr "><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="https://linkedin.com/"><i class="fa-solid fa-envelope"></i></a>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalAde">View Profile</button>

                            </div>
                            
                        </div>
                    </div>

                    <!-- Member 3 -->
                    <div class="swiper-slide">
                        <div class="team-card style-2 d-flex flex-column justify-content-between" data-bg-src="{{asset('assets/img/shape/team-2-bg-shape.png')}}">
                            <div class="team-img">
                                <img src="{{asset('assets/img/team/peter.png')}}" alt="Team">
                            </div>
                            <div class="team-content d-flex justify-content-between align-items-start">
                                <div class="left-contet">
                                    <h3 class="box-title"><a href="team-details.html">Mr. Babalola Olaniyi Peter</a></h3>
                                    <span class="team-desig">Chief Operating Officer</span>
                                </div>
                                <div class="team-social">
                                    <div class="th-social">
                                        <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="https://linkedin.com/"><i class="fa-solid fa-envelope"></i></a>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalPeter">View Profile</button>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
            </div>
            
        </div>
    </section>
    <!-- Modal: Mike -->
    <div class="modal fade" id="modalMike" tabindex="-1" aria-labelledby="modalMikeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
            <h5 class="modal-title" id="modalMikeLabel">Amb. Adejare Micheal Adetomiwa</h5>
            <p>

                AdeJare Michael Adetomiwa is a visionary entrepreneur and real estate strategist, dedicated to transforming Africa’s property landscape. <br>
                As CEO of Mikeland Homes and founder of Unique Radiance Realtors Group (URRG), he leads with purpose—mentoring leaders, driving innovation, and creating generational wealth through real estate. <br>
                A graduate of Lagos State Polytechnic and a student at Lagos State University of Science and Technology, he balances academic growth with hands-on experience.<br> 
                He also advances food sustainability through Amagreen Farms. Purpose-driven and resilient, AdeJare is not just building a brand—he’s building a legacy.<br>           
            </p>
            </div>
        </div>
    </div>

    <!-- Modal: Ade -->
    <div class="modal fade" id="modalAde" tabindex="-1" aria-labelledby="modalAdeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
            <h5 class="modal-title" id="modalAdeLabel">Mr. Adega Adeleye Isaac</h5>
            <p>
                Adega Adeleye Isaac is the MD/CEO of Adeh Homes and Head of Administration at Unique Radiance Realtors Group (URRG). <br>
                Since beginning his real estate career in June 2022, he has earned recognition as an award-winning realtor, celebrated for his consistency, professionalism, and personalized service. <br>
                A proud graduate of Lagos State Polytechnic (now LASUSTECH), Isaac is passionate about more than just property—he is committed to leaving a lasting legacy, creating meaningful impact, and empowering the next generation to aim higher. <br> 
                His leadership reflects a deep sense of vision, purpose, and excellence in the real estate industry. <br>
            </p>
            </div>
        </div>
    </div>

    <!-- Modal: Peter -->
    <div class="modal fade" id="modalPeter" tabindex="-1" aria-labelledby="modalPeterLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
            <h5 class="modal-title" id="modalPeterLabel">Mr. Babalola Olaniyi Peter</h5>
            <p>
                    
                Babalola Olaniyi Peter is a visionary entrepreneur, real estate expert, and creative professional. 
                He is the CEO of P-Rock Homes, a real estate brand helping individuals secure genuine and profitable properties across Nigeria. <br> 
                A graduate of Lagos State University of Science and Technology, he blends academic knowledge with hands-on experience. 
                As a skilled graphic designer and real estate consultant, he has assisted over 50 investors in acquiring valuable assets. <br> 
                Olaniyi also serves as COO of Unique Radial Realtor Group, driving leadership and team development. 
                Beyond business, he mentors young people and contributes as a church sound engineer, embodying integrity, excellence, and a passion for impact.
            </div>
        </div>
    </div>

    
    
    
@endsection