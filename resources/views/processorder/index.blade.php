@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row">
	<div class="container">
		<div class="col-xs-12">
			<div class="panel panel-midnightblue">
				<div class="panel-heading">
					<h4>
						<ul class="nav nav-tabs">
						<li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Pree Order</span></a></li>
						<li><a href="#comments" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Delivery & Summary</span></a></li>					
						</ul>
					</h4>
				</div>
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane active" id="threads">
							<h3>Pree Order</h3>
							<div style="width: 20%; float: left;">
								<h4>PO ID</h4>
							</div>
							<div style="width: 80%; float: right;">
								<h4>TR23020162</h4>
							</div>
							<div style="width: 20%; float: left;">
								<h4>Request Date</h4>
							</div>
							<div style="width: 80%; float: right;">
								<h4>20 JAN 2023</h4>
							</div>
							<div style="width: 20%; float: left;">
								<h4>Status</h4>
							</div>
							<div style="width: 80%; float: right;">
								<h4>Pending Your Approval</h4>
							</div>
							<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table stat-table table-bordered" style="text-align:left">
						<tr style="background:black;color:white">
							<th align='left'>Qty</th>
							<th align='left'>URL Product</th>
                            <th align='left'>Product Name</th>
							<th align='left'>color</th>
                            <th align='left'>Size/Weight</th>
							<th align='left'>Approved</th>
                            <th align='left'>Pice</th>
                            <th align='left'>Info</th>
							<th >Subtotal (IDR)</th>
						</tr>
						<tr>
                                @foreach($preorders as $p)
									<tr>
										<td>{{ $p->qty }}</td>
                                        <td><a href="{{ $p->link }}">Link Produk</a></td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->color }}</td>
                                        <td>{{ $p->sizeweight }}</td>
										<td>
											<input type="checkbox" name="selected[]" value="{{ $p->id }}">
										</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->info }}</td>
                                        <td>{{ $p->qty * $p->price }}</td>
									</tr>
								@endforeach
						</tr>
					</table>
				</div>
			</div>

		</div>
		<div class="tab-pane" id="comments">
			{{ Form::open(['url' => route('process_order.store'), 'class' => 'form-horizontal' ])}}
				<div class="row">
					<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Receiver Data</h5>										
									@include('processorder.create')
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Transaction Summary</h5>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Subtotal</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">0</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Delivery Fee</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">0</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Insurane</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">0</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Discount/Promo</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">0</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >Grand Total</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">0</p>
								</div>
								<div style="width: 25%; float: left;">
									<p style="margin-left: 20px;" >E-wallet</p>
								</div>
								<div style="width: 75%; float: right;">
									<p style="margin-left: 50px;">0</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				</br>
				<div class="form-group 	@if ($errors->has('nohp_2')) has-error @endif">
					<label class="col-sm-1 control-label" style="font-weight: normal;">Dropship</label>
					<div>
						<input type="checkbox" id="dropship">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Shiping Detail</h5>
								<div style="width: 30%; float: left;">
									<h5>Total Weight :</h5>
								</div>
								<div style="width: 70%; float: right;">
									<h5 style="font-weight: normal;">0</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Additional</h5>
								<div>
									<label for="cb1">Insurance</label>
									<input type="checkbox" id="cb1">
								</div>
								<div>
									<label for="cb2">Block Packing</label>
									<input type="checkbox" id="cb2">
								</div>
								<div>
									<label for="cb3">Use E-Wallet</label>
									<input type="checkbox" id="cb3">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Notes</h5>
						<textarea id="notes" name="notes" rows="4" cols="150"></textarea>
					</div>
				</div>
				<div>
					<input type="checkbox" id="dropship">
					<label style="font-weight: normal;">I agree to the terms and conditions</label>	
				</div>
				</br>
				<div class="row">
					<div class="col-sm-1">
						<div class="card">
							<div class="card-body">
								<a class="link_kembali" href="{{ route('home') }}"><i class="fa fa-angle-left fa-3"></i> Back</a></p>
							</div>
						</div>
					</div>
					<div class="col-sm-11">
						<div class="card">
							<div class="card-body">
								<button class="btn-primary btn">Submit</button>
							</div>
											
						</div>
					</div>
				</div>
			{{ Form::close() }}								
		</div>
							<!-- </div>
							</div>
						</div>
					</div>
				</div> -->
		</div>
	</div>
</div>



</div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection