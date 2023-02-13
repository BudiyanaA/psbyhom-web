
<p>Thank Ypu so much for your patience</hp>
<p>Your goodies has been arrived we'll sgip them once you pay the call</p>
 <p>We Will seed you the tracking number THE DAY AFTER we ship the goodies</p>
<p>To make a full payment confirmation<a href="{{ route('confirm.index') }}">click here</a></p>
<p>Please check your order details below</p>
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
                                        <td><a href="{{ $p->link }}">Link Produk</a></td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->color }}</td>
                                        <td>{{ $p->sizeweight }}</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->info }}</td>
                                        <td>{{ $p->qty * $p->price }}</td>
									</tr>
								@endforeach
						</tr>
					</table>
				</div>
				<div class="blockfooter">
					<div class="wrapper"></div>
				</div>
			</div>