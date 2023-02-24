@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><div class="col-lg-12"><h3  ><strong style="color:darkgray ">Membership</strong></h3><br>
	</div><div class="col-lg-12">
		<div class="row"><div id="formlogin" class="col-xs-12 col-sm-6 col-lg-6">
		@if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
						<form class="box" action="{{ route('loginaction') }}" method="POST">
						@csrf
							<h3 class="page-subheading">Login Menu</h3>
							<div class="form_content clearfix">
								<div class="form-group">
									<label for="username">Your Registerd Email</label>
									<input type="text" value="" name="email" id="email" 
									class="is_required validate account_input form-control"/>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" value="" name="password" id="password"
									class="is_required validate account_input form-control"/>
								</div>
								<p class="lost_password form-group">
									<a id="webmember_forgot" href="https://psbyhom.com/forgot_password.html">Forgot Password?</a></p>
								<table border="0">	
								<tr>
								<td>
								<p class="submit">		
									<input type="hidden" name="check_login" value="1"/>
									<button type="submit" class="more button btn btn-default button-medium">
									<span>
											<i class="fa fa-lock left"></i>
											Login
										</span>
									</button>
										<!-- <span>
											<i class="fa fa-lock left"></i>
											Login
										</span> -->
									</button>
								</td><td>&nbsp;&nbsp;</td>
								<td valign="top"><font color="red"></font></td></tr>
								</table>
								</p>
							</div>
						</form>
					</div>
			<div class="col-xs-12 col-sm-6 col-lg-6">
				<form class="box">
					<h3 class="page-subheading">Register for Pre Order </h3>
					<div class="form_content clearfix">
						<div class="form-group"><p>Register</p>
						<a title="Register Now" class="more button-exclusive btn btn-default" href="{{ route('register_c') }}">	
							Register Now
						</a></div>
					</div>
				</form>
			</div></div>	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection

<script>
    const successMessage = "{{ session('success') }}";
    if(successMessage){
        alert(successMessage);
    }
</script>