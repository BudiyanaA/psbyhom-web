{!! $email_content !!}

<div align='center'>
	<div style='text-decoration: underline;'><font color="black"><strong style="font-size:24px; font-weight: bolder;">Q U O T A T I O N</strong></font></div>
	<br>
</div>

<table style='font-family:Arial;font-size:14px; border-collapse: collapse; width: 100%;' border="1" cellpadding="5">
		<tr style=' height: 40px;background-color:black;color: white'>
			<th>Qty</th>
			<th>URL Product</th>
			<th>Product Name</th>
			<th>Color</th>
			<th>Size/Weight</th>
			<th>Price</th>
			<th>Info</th>
			<th>Subtotal (IDR)</th>
		</tr>
    @foreach ($order_dtl as $row)
    <tr style=' height: 30px;'>
      <td>{{ $row->qty }}</td>
      <td><a href="{{ $row->product_url }}">Link Produk</a></td>
      <td>{{ $row->product_name }}</td>
      <td>{{ $row->color }}</td>
      <td>{{ $row->size }}</td>
      <td>{{ $row->price_customer }}</td>
      <td>{{ $row->remarks }}</td>
      <td align="right">{{ $row->subtotal_final }}</td>	
    </tr>
    @endforeach

		<tr style=' height: 30px;font-weight:bolder;'>
				<td colspan="7" align='right'>Grand Total (IDR)</td>
				<td align='right'>{{ collect($order_dtl)->sum('subtotal_final') }}</td>
		</tr>
	</table>

  @if($note != '')
	<strong><b><p>delivery address : {!! $delivery_address !!}</p></b></strong>
	@endif

{!! $email_content_bottom !!}

<p>House of Makeup</p>
<!-- <p>Line@ : <a href="https://line.me/R/ti/p/%40houseofmakeup">@houseofmakeup</a></p> -->
<p>Email : <a href="mailto:{{ $email_notif }}">{{ $email_notif }}</a></p>