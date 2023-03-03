<nav class="navbar navbar-inverse header1" role="navigation">
	<div id="top-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-part alignleft">
						<!-- <a class="cart" href="../../../cart.html">
							<span>0</span> <img src="../images/cart.png">
						</a> -->
						<ul class="topbar-nav login-menu list-inline" id="b-nav">
						@if(session()->has('user_id'))
						
							<li>
							<i class="fa fa-money"></i>
							<span><a href="{{ route('wallet') }}">{{ getUserEwallet() }}</a><input type="hidden" value='{{ getUserEwallet() }}' name='customer_ewallet' id='customer_ewallet'></span>
							</li>
							<li class="dropdown dropdown-right logged-in-li">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="fas fa-user"></i>
							</a>
							<ul aria-labelledby="dropdownMenu" role="menu" class="dropdown-menu dropdown-basic">
								<li><a href="{{ route('profile') }}">My Profile</a></li>
								<li><a href="{{ route('preorderlist') }}">Pre Order List</a></li>
								<li><a href="https://psbyhom.com/confirm_payment.html">Confirm Payment</a></li>
								<li><a href="{{ route('changepassword') }}">Change Password</a></li>
								<li><a href="{{ route('logoutaction') }}"><i class="fa fa-power-off"></i>Log out</a></li>
							</ul>
							</li>
							<li class="public-li">
							Halo, {{ session('customer_name') }} &nbsp &nbsp &nbsp
							</li>
						@else
							<li class="public-li"> 
							<a href="{{ route('register_c') }}">Register</a>
							</li>
							<li class="public-li"> 
							<a class="dropdown-toggle" id="login-ddl-link" href="{{ route('loginaction') }}">Login</a> 
							</li>
						@endif
						</ul> 
					</div>
				</div>
				<div class="col-sm-6">
					<div class="right-part">
						<div id="searchproduct" align="center">
							<!-- <form action="https://myhouseofmakeup.co/catalog/search" method="GET">
								<input type="text" name="keyword" id="keyword" class="searchtext" placeholder="Search.."> 
								<button type="submit" class="searchubmit" value="Cari"><i class="fa fa-search"></i></button>
							</form> -->
							<div id="close-search-icon">
								<span>
									<i class="fa fa-close"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div id="search-icon">
			<span>
				<i class="fa fa-search"></i>
			</span>
		</div>
		<a class="navbar-brand" href="https://psbyhom.com/"><img class='resize' src="{{ url('assets/img/logo.jpg') }}" border="0" /><!--<img src="https://myhouseofmakeup.co/template/zuta/img/logo.png" alt="logo" />--></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse top-menu" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
		<li><a href="{{ route('home') }}">Home</a></li>
		<li><a href="{{ route('about_us') }}">About Us</a></li>
		<li><a href="{{ route('preorder.create') }}">Pre Order</a></li>
		<li><a href="{{ route('term_condition') }}">Terms & Conditions</a></li>
		<li><a href="{{ route('faq') }}">FAQ</a></li>
		<li><a href="{{ route('how_order') }}">How to Order</a></li>
		<li><a href="{{ route('contact_us.index') }}">Contact Us</a></li>
		<li><a href="{{ route('payment_c.create') }}">Confirm Payment</a></li>

	</div><!--/.nav-collapse -->
	<!-- /.container -->
	<style> 
      marquee {
        width: 100%;
        padding: 10px 0;
		color:#8a5c47;
        background-color: #fde1da;
      }
    </style>
	<marquee direction="scroll">PO US OPEN DAILY | NEW WEBSITE  - PO US OPEN Everyday - Personal Shopper By Houseofmakeup</marquee>
    </nav>