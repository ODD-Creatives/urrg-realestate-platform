@extends('layouts.app')

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.jpg">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact with Us</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="contact-form-area">
        <div class="container">
            <div class="row gx-0">
                <div class="col-xl-12">
                    <div class="contact-all-wrapper">
                        <div class="contact-form-wrap">
                            <form action="https://html.themeholy.com/piller/demo/mail.php" method="POST"
                                class="contact-form ajax-contact">
                                <h3 class="form-title">Get In Touch </h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name *"></div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control" name="number" id="number" placeholder="Phone *">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address *">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="Subject" id="Subject" placeholder="Subject *">
                                    </div>
                                    <div class="form-group col-12"><textarea name="Your Messsage*" id="message"
                                            cols="30" rows="3" class="form-control"
                                            placeholder="Your Message *"></textarea></div>
                                    <div class="form-btn text-start col-12"><button class="th-btn radius">Send
                                            message</button></div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                        <div class="contact-form-thumb overflow-hidden">
                            <img src="assets/img/contact/contact-page-thumb2.jpg" alt="img"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-area-2 space-top" id="contact-sec">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-4 col-lg-6 contact-feature-wrap">
                    <div class="contact-feature">
                        <div class="contact-feature-icon"><i class="fas fa-location-dot"></i></div>
                        <div class="media-body">
                            <p class="contact-feature_label"> Address</p>
                            <a href="https://www.google.com/maps" class="contact-feature_link">
                                123 Academic Way City, State, 1234, New York City.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 contact-feature-wrap">
                    <div class="contact-feature">
                        <div class="contact-feature-icon"><i class="fas fa-phone"></i></div>
                        <div class="media-body">
                            <p class="contact-feature_label">Phone Number</p>
                            <a href="tel:+2347012894830" class="contact-feature_link">+234 701 289 4830</a> 
                            <a href="tel:+2349077649378" class="contact-feature_link">+234 907 764 9378</a>
                            <a href="tel:+2347011309844" class="contact-feature_link">+234 701 130 9844</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 contact-feature-wrap">
                    <div class="contact-feature">
                        <div class="contact-feature-icon"><i class="fas fa-envelope"></i></div>
                        <div class="media-body">
                            <p class="contact-feature_label">Email Address</p>
                            <a href="mailto:info@uniqueradiancerealtorsgroup.com" class="contact-feature_link">info@uniqueradiancerealtorsgroup.com</a> 
                            <a href="mailto:support@uniqueradiancerealtorsgroup.com" class="contact-feature_link">support@uniqueradiancerealtorsgroup.com</a>
                            <a href="mailto:helpline@uniqueradiancerealtorsgroup.com" class="contact-feature_link">helpline@uniqueradiancerealtorsgroup.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-top">
        <div class="container-fluid p-0">
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.998207725692!2d3.512199673975619!3d6.6471419217162655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103beeb42f4c7c49%3A0xc64264fa4a378607!2sFirst%20Gate!5e0!3m2!1sen!2sng!4v1751425110804!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="contact-icon"><img src="assets/img/icon/con-location-dot.svg" alt="img"></div>
            </div>
        </div>
    </div>

    
    
    
@endsection