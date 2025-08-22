@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg1.jpg') }}">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Meet Our Team Leads</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Team Leads</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="space-top space-extra-bottom">
        
        <div class="container">
            <div class="pb-5 text-center justify-content-center ">
                <h3 class="">Meet The Team Leads</h3>
                <h6 id="typewriter-heading" class="text-center fw-bold text-warning"></h6>
                <script>
                    const typePhrases = [
                        "The driving force behind our success.",
                        "Visionary leaders who inspire, guide, and deliver excellence in every project.",
                        "Passionate professionals dedicated to turning your real estate dreams into reality.",
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
            <div class="row justify-content-center">
                
                @forelse($teamLeads as $lead)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center shadow-sm h-100 border-0">
                            <div class="card-body">
                                <div class="mb-3">
                                    @if($lead->picture)
                                        <img src="{{ asset($lead->picture) }}" 
                                            alt="{{ $lead->fullname }}" 
                                            class="rounded-circle img-fluid" 
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('public/assets/img/default-profile.png') }}" 
                                            alt="No Image" 
                                            class="rounded-circle img-fluid" 
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                    @endif
                                </div>
                                <h5 class="fw-bold mb-0">{{ $lead->fullname }}</h5>
                                <p class="text-muted mb-0">{{ $lead->post }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No team leads have been added yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
