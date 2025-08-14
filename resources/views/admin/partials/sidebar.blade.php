<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.realtors.index') }}" >
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Realtors</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.developers.index') }}">
        <i class="mdi mdi-domain menu-icon"></i>
        <span class="menu-title">Developers</span>
        </a>
    
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.commissions.index') }}">
        <i class="mdi mdi-wallet menu-icon"></i>
        <span class="menu-title">Comission</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.properties.index') }}">
        <i class="mdi mdi-shape-plus menu-icon"></i>
        <span class="menu-title">Properties</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.projects.index') }}">
        <i class="mdi mdi-shape-plus menu-icon"></i>
        <span class="menu-title">Projects</span>
        </a>
    </li>
    {{--
    @if(Auth::guard('admin')->user()->email == 'admin@gmail.com')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.referrals.code.generator') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Referral Code Generator</span>
            </a>
        </li>
    @endif
    --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.referrals.index') }}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Referrals</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.events.index') }}">
            <i class="mdi mdi-newspaper menu-icon"></i>
            <span class="menu-title">Events</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.accademyEvents.index') }}">
            <i class="mdi mdi-newspaper menu-icon"></i>
            <span class="menu-title">URRG Accademy</span>
        </a>
    </li>
   

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="error">
        <i class="mdi mdi-shape-plus menu-icon"></i>
        <span class="menu-title">Settings</span>
        <i class="menu-arrow"></i>
        </a> 
        <div class="collapse" id="settings"> 
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.menu.index') }}">Menu Items</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Lands </a></li>
        </ul>
        </div>
    </li>
    
    </ul>
</nav>