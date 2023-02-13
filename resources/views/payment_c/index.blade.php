@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Please do You payment to bellow account information at least Rp {{ ($data['preorders'][0]->qty * $data['preorders'][0]->price) / 2 }} (50% of grand total)</h5>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Bank Name</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">TR23020162</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Account No</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">TR23020162</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Account Name</p>
								</div>
                                <div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">TR23020162</p>
								</div>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    <div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Bank Name</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">TR23020162</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Account No</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">TR23020162</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Account Name</p>
								</div>
                                <div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">TR23020162</p>
								</div>
                                <p>After You have already make a payment,please do you payment condirmation by accessing bellow link </p>
                                    </br>
                                <h4><a href="{{ route('payment_c.create') }}" style="color: blue">Go to payment confirmation</a></h4>
							</div>
						</div>
					</div>
                    </div>
                </div>
            </div>
	    </div>
    </div>
</div>
@endsection