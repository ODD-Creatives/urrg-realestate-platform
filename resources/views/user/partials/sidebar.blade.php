    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="{{ asset('assets/user/assets/images/faces/face1.jpg') }}" alt="profile">
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                <span class="fw-semibold mb-1 mt-2 text-center">Antonio Olson</span>
                <span class="text-secondary icon-sm text-center">₦35,499.00</span>
              </div>
            </a>
          </li>
          
          <li class="nav-item " style="background-color:black;">
            <a class="nav-link " href="{{route('user.dashboard')}}">
              <i class="mdi mdi-compass-outline menu-icon text-white"></i>
              <span class="menu-title text-white">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('user.profile')}}">My Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('user.bank')}}">Bank Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('user.changepassword')}}">Change Password</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{route('user.referral')}}" aria-expanded="false" aria-controls="forms">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Referral</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{route('user.commission')}}" aria-expanded="false" aria-controls="forms">
              <i class="fa fa-briefcase menu-icon"></i>
              <span class="menu-title">Commission</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{route('user.properties')}}" aria-expanded="false" aria-controls="forms">
              <i class="mdi mdi-castle menu-icon"></i>
              <span class="menu-title">Properties</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{route('signin')}}" aria-expanded="false" aria-controls="forms">
              <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
         
        </ul>
      </nav>