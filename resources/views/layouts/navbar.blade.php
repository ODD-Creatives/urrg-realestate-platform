
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/urrglogo1.png') }}" class="img-fluid w-75" alt="Unique Radiance Realtors Group"></a>
            </a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                @foreach($menuItems as $menu)
                    <li class="{{ $menu->allDropdownItems->isNotEmpty() ? 'menu-item-has-children' : '' }}">
                        <a href="{{ url(Str::slug($menu->name)) }}">{{ $menu->name }}</a>

                        @if($menu->allDropdownItems->isNotEmpty())
                            <ul class="sub-menu">
                                @foreach($menu->allDropdownItems as $dropdown)
                                    @include('partials.menu-item', ['item' => $dropdown])
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<header class="th-header header-default header-layout1">
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ route('home')}}">
                                <img src="{{ asset('assets/img/urrglogo1.png')}}" class="img-fluid w-75" alt="Unique Radiance Realtors Group">
                            </a>
                        </div> 
                    </div>

                    <div class="col-auto d-flex align-items-center gap-3">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                @foreach($menuItems as $menu)
                                    <li class="{{ $menu->allDropdownItems->isNotEmpty() ? 'menu-item-has-children' : '' }}">
                                        <a href="{{ url('/' . $menu->slug) }}">{{ $menu->name }}</a>

                                        @if($menu->allDropdownItems->isNotEmpty())
                                            <ul class="sub-menu">
                                                @foreach($menu->allDropdownItems as $dropdown)
                                                    @include('partials.menu-item', ['item' => $dropdown])
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
 
                        @if(Auth::check())
                            <button type="button" class="btn btn-sm btn-signin" style="margin-right: -27px;">
                                <a href="{{ route('user.dashboard') }}" class="text-white">Dashboard</a>
                            </button>
                        @else
                            <div class="btn-group capsule-buttons" role="group">
                                <button type="button" class="btn btn-sm btn-signin" style="margin-right: -27px;">
                                    <a href="{{ route('signup') }}" class="text-white">Join Us</a>
                                </button>
                                <button type="button" class="btn btn-sm btn-signup">
                                    <a href="{{ route('signin') }}" class="text-white">Sign In</a>
                                </button>
                            </div>
                        @endif 
                        </div>

                        <button type="button" class="th-menu-toggle d-block d-lg-none">
                            <i class="far fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
