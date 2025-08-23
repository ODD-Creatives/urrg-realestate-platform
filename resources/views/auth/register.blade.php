@extends('layouts.app')

@section('title', 'Sign Up - Unique Radiance Realtors Group')

@section('content')
<div class="container pt-5 mt-5">
     <br/><br/>
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
            @if(session('whatsapp_link'))
            <script>
                window.onload = function() {
                    window.open('{{ session('whatsapp_link') }}', '_blank');
                };
            </script>
            @endif
            
            <div class="col-lg-6 col-md-6 p-3 shadow-sm">
                <form action="{{ route('register')}}" method="POST" class="contact-form form-contact" enctype="multipart/form-data">
                    @csrf
                    <h3 class="form-title">Join URRG as a Realtor</h3>
                    
                    <!-- Display general form errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="row"> 
                        <!-- First Name -->
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" placeholder="Firstname *" value="{{ old('firstname') }}" required>
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname" placeholder="Lastname *" value="{{ old('lastname') }}" required>
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group col-md-6">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address *" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- State of Residence -->
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control @error('state_of_residence') is-invalid @enderror" name="state_of_residence" id="state_of_residence" placeholder="State of Residence *" value="{{ old('state_of_residence') }}" required>
                            @error('state_of_residence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Referral Code -->
                        <div class="form-group col-md-12">
                            <input readonly type="text" class="form-control @error('referral_code') is-invalid @enderror" name="referral_code" id="referral_code" 
                            value="{{ isset($referralDetails) ? ($referralDetails->code ?? $referralDetails->referral_code) : old('referral_code') }}" 
                            placeholder="Referral Code *" required>
                            @error('referral_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted mt-1">
                                Don't have a referral code? <a href="https://wa.me/2349077649378" target="_blank" style="color: #25D366; font-weight: 500;">Click here to message the admin on WhatsApp</a>.
                            </small>
                        </div>

                        <!-- Experience in Real Estate -->
                        <div class="form-group col-12">
                            <label for="experience" class="form-label">How long have you been in the Real Estate Industry?</label>
                            <select class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience" required>
                                <option value="">Select experience range</option>
                                <option value="Below 6 months" {{ old('experience') == 'Below 6 months' ? 'selected' : '' }}>Below 6 months</option>
                                <option value="6 months - 1 year" {{ old('experience') == '6 months - 1 year' ? 'selected' : '' }}>6 months - 1 year</option>
                                <option value="1 year - 3 years" {{ old('experience') == '1 year - 3 years' ? 'selected' : '' }}>1 year - 3 years</option>
                                <option value="3 years - 5 years" {{ old('experience') == '3 years - 5 years' ? 'selected' : '' }}>3 years - 5 years</option>
                                <option value="5 years - 7 years" {{ old('experience') == '5 years - 7 years' ? 'selected' : '' }}>5 years - 7 years</option>
                                <option value="Above 7 years" {{ old('experience') == 'Above 7 years' ? 'selected' : '' }}>Above 7 years</option>
                            </select>
                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group col-md-6">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
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
<br/><br/>

@endsection