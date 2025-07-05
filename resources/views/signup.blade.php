@extends('layouts.app')

@section('title', 'Sign Up - Unique Radiance Realtors Group')

@section('content')
<div class="container pt-5 mt-5">
    <div class="card p-5 shadow">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 p-3 shadow-sm">
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
            <div class="col-lg-6 col-md-6 p-3 shadow-sm">
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
@endsection