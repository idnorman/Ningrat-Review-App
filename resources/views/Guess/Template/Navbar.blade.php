@include('Guess.Template.Header')
<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset ('Admin/images/Logo.png')}}" alt="">
        {{-- <h1 class="sitename"></h1> --}}
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li>
              <a href="{{ route('homePage') }}" class="{{ request()->routeIs('homePage') ? 'active' : '' }}">
                  Beranda
              </a>
          </li>
      
          <li>
              <a href="{{ route('menuPage') }}" class="{{ request()->routeIs('menuPage') ? 'active' : '' }}">
                  Menu
              </a>
          </li>
      
          <li>
              <a href="{{ route('reservasiPage') }}" class="{{ request()->routeIs('reservasiPage') ? 'active' : '' }}">
                  Reservasi
              </a>
          </li>
      </ul>
      
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="d-flex align-items-center gap-2">
        <a class="btn-getstarted d-none d-sm-block" href="{{ route('reservasiPage') }}">Reservasi</a>
        <a class="btn-getstarted d-none d-sm-block" href="{{ route('login') }}">Login</a>
    </div>
    

    </div>
  </header>

  <body class="index-page">
