@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
    @if(session()->has('user_id'))
	    <div class="row">
            <div class="col-lg-12"><h3 ><strong style="color:darkgray ">Request Pre Order</strong></h3><br></div>
                <div class="col-lg-12">
                    <div class="row">
                    @if(Session::has('error'))
						<script>
							alert("{{ Session::get('error') }}");
						</script>
					@endif
                        <div class="col-md-12">
                        {{ Form::open(['url' => route('preorder_sg.store'), 'class' => 'form-horizontal' ])}}
                                <div class="table-responsive">
                                    <table id="pre-order" class="tablex table-borderedx">	
                                        <tr>
                                            <td>Qty</td>
                                            <td>URL/Product Link</td>
                                            <td>Product Name</td>
                                            <td>Color</td>
                                            <td>Size / Weight</td>
                                            <td>Price (USD)</td>
                                            <td>Info</td>
                                        </tr>
                                        <tr>
                                        @include('preorder_sg._form')
                                            
                                        </tr>
                                    </table>
                                </div><br/>
																<div class="button-container">
																	<a id="tambahpo" href="javascript:void(0)" class="btn btn-default more">Add</a>
																	<button class="btn btn-default more">Submit</button>
																</div>
                                {{ Form::close() }}
                            <div class="poalert">
                                <input type="hidden" name="counter" id='counter' value="1">
                                <i><center>This is the request order list to get the quotation from us in IDR. <br>For each items you requested, you can choose either to continue order or not based on our Quotation.<br> We will send the Quotation to your registered email or you can check <a href="{{ route('orderlist.index') }}" >Request Order List</a> menu..<br> Thank You.</i></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row"><div class="col-lg-12"><h3  ><strong style="color:darkgray ">Membership</strong></h3><br>
	</div><div class="col-lg-12">
		<div class="row"><div id="formlogin" class="col-xs-12 col-sm-6 col-lg-6">
						
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
									<button type="submit" class="more button btn btn-default button-medium">Log In</button>
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
			</div>
        </div>
        @endif
    </div>
</div>
            
@endsection