@extends('layouts.costumerapp')
<body>
	    <!-- Navigation -->
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
														<li class="public-li"> 
								<a href="../../../webmember/register.html">Register</a> 
							</li>
							<li class="public-li"> 
								<a class="dropdown-toggle" id="login-ddl-link" href="../../../webmember/login.html">Login</a> 
							</li>
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
		<li><a href="#">Home</a></li>
		<li><a href="#">About Us</a></li>
		<li><a href="#">Pre Order</a></li>
		<li><a href="#">Terms & Conditions</a></li>
		<li><a href="#">FAQ</a></li>
		<li><a href="#">How to Order</a></li>
		<li><a href="#">Contact Us</a></li>

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
		
    <div class="index-space"></div>
		<div class="container slider">
			<div id="slide-home" class="owl-carousel owl-theme">
						<div class="item"><a href="https://psbyhom.com/login_user.html" target="_blank"><img src="{{ url('assets/img/Slide1.jpg') }}" alt="" /></a></div>
						<div class="item"><a href="https://psbyhom.com/login_user.html" target="_blank"><img src="{{ url('assets/img/Slide2.jpg') }}" alt="" /></a></div>
				
			</div>
		</div>
		
	
	
    <!-- /.container -->
	<!-- Footer -->
	<footer>
				<!-- AWeber Web Form Generator 3.0.1 -->

<!-- /AWeber Web Form Generator 3.0.1 -->
		
		<div class="footerlink">
			<div class="container">
				<div class="row">
		
				<div class="col-sm-3 col-md-3">
					<p>&nbsp;</p>
					<p><img  src="http://readybyhom.com/wp-content/uploads/2019/04/new-logo-e1555158496556.png" alt=""/>
</p>
<p><br />&nbsp;</p>
				</div>
				<div class="col-sm-3 col-md-3">
					<h3>Menu</h3>
					<p><a href="https://psbyhom.com/">Home</a></p>
					<p><a href="#">About Us</a></p>
					<p><a href="#">Pre Order<br /></a></p>
					<p><a href="#">FAQ<br /></a></p>
					<p><a href="#">Terms & Conditions<br /></a></p>
					<p><a href="#">Contact Us</a></p>
				</div>
				<div class="col-sm-3 col-md-3">
					<h3>Contact Us&nbsp;</h3>
<ul class="footer-social">
<li><a href="mailto:info@myhouseofmakeup.com"><img src="https://psbyhom.com/design/socmed-mail.png" alt="socmed-mail" /> info@psbyhom.com</a></li>
<li><a href="https://line.me/R/ti/p/%40houseofmakeup"><img src="https://psbyhom.com/design/socmed-line.png" alt="socmed-line" /> @houseofmakeup</a></li>
</ul>
<h3>Open Hours</h3>
<p>Monday - Friday 8 AM - 4 PM</p>
<p>Saturday 8 AM - 1 PM</p>
				</div>
				<div class="col-sm-3 col-md-3">
					<h3>Follow Us</h3>
<ul class="list-inline footer-social">
<li><a href="https://www.facebook.com/pages/House-of-Make-Up/120124324716348?ref=hl"><img src="{{ url('assets/img/facebook.png') }}" alt="socmed-FB" /></a></li>
<li><a href="https://www.instagram.com/houseofmakeup/"><img src="{{ url('assets/img/ig.png') }}" alt="socmed-IG" /></a></li>
</ul>
<table class="mceItemTable" border="0">
<tbody>
<tr>
<td><img src="{{ url('assets/img/bca.png') }}" alt="bca" /></td>
<td>&nbsp;</td>
<td><img src="{{ url('assets/img/mandiri.png') }}" alt="logo mandiri" /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<form action="https://www.cekresi.com/" method="get" target="_BLANK"><input name="noresi" type="text" placeholder="Masukkan no resi..." /> <input type="submit" value="cek resi" /> <br />
<div style="margin-top: 5px; float: left; font: 13px 'Lucida sans', Arial, Helvetica;"><a href="https://www.cekresi.com/" target="_BLANK">www.cekresi.com</a></div>
</form>
				</div>
				</div>
			</div>
		</div>
				<div class="copyright">
			<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="footerkanan">
<p>All Rights Reserved. Design by&nbsp;<a href="https://www.fiesto.com/" target="_blank"><img src="../../../../myhouseofmakeup.com/file/media/source/logo-fiesto-footer%20%5b1%5d.png" alt="logo-fiesto-footer [1]" /></a></p>
</div>				</div>
			</div>
			</div>
		</div>
	</footer>
    <!-- Bootstrap Core JavaScript -->
	
    </body>


<!-- Mirrored from myhouseofmakeup.co/template/zuta/js/hoverzoom.css by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 13:57:28 GMT -->
</html>
