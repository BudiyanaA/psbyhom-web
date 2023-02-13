<html>
  <head>
    <style>
      .content {
        display: flex;
        justify-content: space-between;
      }

      .left {
        text-align: left;
        width: 30%;
      }

      .right {
        text-align: right;
        width: 70%;
      }
    </style>
  </head>
  <body>
    <div class="content">
      <div class="left">
      <img class='resize' src="{{ url('assets/img/logo.jpg') }}" border="0" />
      </div>
      <div class="right">
      </div>
    </div>

<p>dear, {{ Auth::user()->name }}</hp>
</br>
</br>
<p>You orders has ben successfully delivered</p>
<p>Here's your tracking number 12345678</p>
<p>Thank you for order in House of Makeup we looking forward your next order</p>
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
    </body>
</html>