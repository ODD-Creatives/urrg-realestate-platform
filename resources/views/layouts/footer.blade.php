<footer class="footer-wrapper ">
    <div class="widget-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-all-widget-item">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="index.html">
                                        <img src="{{ asset('assets/img/urrglogo2.png') }}" class="img-fluid w-50" alt="Unique Radiance Realtors Group"></a>

                                    </a>
                                </div>
                                <p class="about-text">
                                    Unique Radiance Realtors Group (URRG) is Africa’s greatest real estate empire, dedicated to shaping global 
                                    leaders and impacting the world through real estate excellence. 
                                    

                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-all-widget-item">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="footer-item">
                                    <div class="widget widget_nav_menu footer-widget">
                                        <h3 class="widget_title">Quick Links</h3>
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <li><a href="{{ route('signin') }}">Realtor Signin</a></li>
                                                <li><a href="#">URRG Academy</a></li>
                                                <li><a href="#">Developer Project</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="footer-item">
                                    <div class="widget widget_nav_menu footer-widget">
                                        <h3 class="widget_title">Support</h3>
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <li><a href="#">Contact Us</a></li>
                                                <li><a href="#">About Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="footer-item">
                                    <div class="widget widget_banner footer-widget">
                                        <h3 class="widget_title">Location</h3>
                                        <div class="widget-map">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m12!1m3!1d126838.30628938336!2d3.2505855999999995!3d6.5598705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m4!3e6!4m0!4m1!2s51%20Oluwu%20Street%20off%20Awolowo%20Way%2C%20Ikeja%C2%A0Lagos!5e0!3m2!1sen!2sng!4v1753528590971!5m2!1sen!2sng"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap ps-5 pe-5">
        <div class="row gy-3 justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-7">
                <p class="copyright-text">
                    Copyright <i class="fal fa-copyright"></i> 2025 
                    <a href="index.html">Unique Radiance Realtors Group </a>. All Rights Reserved.
                </p>
            </div>
            <div class="col-auto">
                <div class="footer-default-copy-right">
                    <p>Social Media:</p>
                    <div class="th-social">
                        <a href="https://www.facebook.com/share/15mDCMedN9/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a> 
                        <a href="https://x.com/urrg_realtors?s=21"><i class="fab fa-twitter"></i></a> 
                        <a href="https://www.linkedin.com/in/unique-radiance-realtors-group-35b17a362?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app "><i class="fab fa-linkedin-in"></i></a> 
                        <a href="https://www.instagram.com/urrg_realtorsgroup?igsh=MWxzZzgxZ2pqemtmcQ%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
  <!-- Add Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style>
    /* Increase font size of Toastr */
    #toast-container > .toast {
        font-size: 20px; /* You can change 18px to any size you want */
    } 
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "3000",
            "positionClass": "toast-top-right"
        };

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        
        @if(session('status'))
            toastr.success("{{ session('status') }}");
        @endif

        @if(session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if($errors->any()) 
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    });
</script>
