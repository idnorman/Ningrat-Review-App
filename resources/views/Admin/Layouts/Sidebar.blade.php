@include('Admin.Layouts.Header')
@include('Admin.Component.LogoutModal')
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
		<div class="navbar-wrapper ">
			<div class="navbar-brand header-logo">
				<a href="index.html" class="b-brand">
					<img src="{{asset('Admin/assets/images/logo.svg')}}" alt="" class="logo images">
					<img src="{{asset('Admin/assets/images/logo-icon.svg')}}" alt="" class="logo-thumb images">
				</a>
				<a class="mobile-menu" id="mobile-collapse" href=""><span></span></a>
			</div>
			<div class="navbar-content scroll-div">
				<ul class="nav pcoded-inner-navbar">
					<li class="nav-item pcoded-menu-caption">
						<label>Dashboard</label>
					</li>
					<li class="nav-item">
						<a href="{{ route('AdminDashboard') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Master Data</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Master</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="{{ route('adminMenu') }}" class="">Menu</a></li>
							<li class=""><a href="{{ route('adminParam') }}" class="">Parameter</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Forms &amp; table</label>
					</li>
					<li class="nav-item">
						<a href="{{ route('adminOrder') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Order</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('adminTransaction') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Transaction</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('adminCustomer') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Customer</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Others</label>
					</li>
					<li class="nav-item">
						<a href="{{ route('adminContract') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Contact & Detail</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Review</label>
					</li>
					<li class="nav-item">
						<a href="{{ route('adminContract') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Review List</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('logout') }}" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
							<span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
							<span class="pcoded-mtext">Logout</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
