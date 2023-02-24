
<p>hi, {{ session('customer_name') }} Thank you interested PRE ORDER with us </hp>
<p>Here Is the price in rupiah</p>
 
<p>Please <a href="{{ route('process_order', ['uuid' => $latest_id]) }}">click here</a> to make an order</p>
<p>For check your PO detail</p>
</br>
</br>
<div class="container" id="content">
	<div class="content-wrapper">
		<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="text-align: center;">QUOTATION</h1>
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
				<div class="blockfooter">
					<div class="wrapper"></div>
				</div>
			</div>