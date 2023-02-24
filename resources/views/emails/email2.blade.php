
<p>hi, {{ session('customer_name') }}</hp>
<p>You order has been received and will be processed once down payment is confirmed (minimum 50%)</p>
 
<p>Dont forget to confirm your payment after make a down payment <a href="{{ route('payment_c.create') }}">here</a></p>
</br>
</br>
<div class="container" id="content">
	<div class="content-wrapper">
		<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="text-align: center;">Pree Order</h1>
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
                            <th align='left'>Pice</th>
                            <th align='left'>Info</th>
							<th >Subtotal (IDR)</th>
						</tr>
						<tr>
                                @foreach($preorders as $p)
									<tr>
										<td>{{ $p->qty }}</td>
                                        <td><a href="{{ $p->product_url }}">Link Produk</a></td>
                                        <td>{{ $p->product_name }}</td>
                                        <td>{{ $p->color }}</td>
                                        <td>{{ $p->size }}</td>
                                        <td>{{ $p->price_customer }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>{{ $p->qty * $p->price_customer }}</td>
									</tr>
								@endforeach
						</tr>
					</table>
				</div>
				<div class="container" id="content">
	<div class="content-wrapper">
	    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12">
						<div class="card">
							<div class="card-body">
							@foreach($preorders as $p)
								<h5 class="card-title">Please do You payment to bellow account information at least Rp {{ $p->qty * $p->price_customer / 2}} (50% of grand total)</h5>
								@endforeach
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
				<div class="blockfooter">
					<div class="wrapper"></div>
				</div>
			</div>