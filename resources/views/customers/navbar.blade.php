<div class="header">

    <div class="header-left active">
        <a href="{{ url('index.html') }}" class="logo logo-normal">
            <img src="{{ asset('images/pos-brand-2.png') }}" alt="">
        </a>
        <a href="{{ url('index.html') }}" class="logo logo-white">
            <img src="{{ asset('assets/img/logo-white.png') }}" alt="">
        </a>
        <a href="{{ url('index.html') }}" class="logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>

  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
  <span class="bar-icon">
  <span></span>
  <span></span>
  <span></span>
  </span>
  </a>

  <ul class="nav user-menu">

  <li class="nav-item nav-searchinputs">
  <div class="top-nav-search">
  <a href="javascript:void(0);" class="responsive-search">
  <i class="fa fa-search"></i>
  </a>
  <form action="#">
  <div class="searchinputs">
  <input type="text" placeholder="Search">
  <div class="search-addon">
  <span><i data-feather="search" class="feather-14"></i></span>
  </div>
  </div>

  </form>
  </div>
  </li>



  <li class="nav-item nav-item-box">
  <a href="javascript:void(0);" id="btnFullscreen">
  <i data-feather="maximize"></i>
  </a>
  </li>



  <li class="nav-item nav-item-box">
  <a href="generalsettings.html"><i data-feather="settings"></i></a>
  </li>

  <li class="nav-item dropdown has-arrow main-drop">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-info">
            <span class="user-letter">
                <img src="{{ asset('images/avatar.png') }}" alt="" class="img-fluid" style="background-color: white;">

            </span>
            <span class="user-detail">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-role">{{ Auth::user()->role }}</span>
            </span>
        </span>
    </a>
    <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
            <div class="profileset">
                <span class="user-img">
                    <img src="{{ asset('images/avatar.png') }}" alt="{{ Auth::user()->name }}" class="img-fluid">
                    <span class="status online"></span>
                </span>
                <div class="profilesets">
                    <h6>{{ Auth::user()->name }}</h6>
                    <h5>{{ Auth::user()->role }}</h5>
                </div>
            </div>
            <hr class="m-0">
            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                <i class="me-2" data-feather="user"></i> My Profile
            </a>
            <hr class="m-0">
            <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</li>

  </ul>


  <div class="dropdown mobile-user-menu">
  <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
  <div class="dropdown-menu dropdown-menu-right">
  <a class="dropdown-item" href="profile.html">My Profile</a>
  <a class="dropdown-item" href="signin.html">Logout</a>
  </div>
  </div>

  </div>
