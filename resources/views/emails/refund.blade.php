@include('emails.layouts.headernotifpo')

{!! $email_content !!}

<div align='center'>
	<div style='text-decoration: underline;'><font color="black"><strong style="font-size:24px; font-weight: bolder;">
		@if ($view_order->total_trans != '0')
			P R E - O R D E R
		@else
			PRE ORDER
		@endif
	</strong></font></div>
	<br>
</div>

<table style='font-family:Arial;font-size:14px; border-collapse: collapse; width: 100%;' border="1" cellpadding="5">
		<tr style=' height: 40px;background-color:black;color: white'>
			<th>Qty</th>
			<th>URL Product</th>
			<th>Product Name</th>
			<th>Color</th>
			<th>Size/Weight</th>
			<th>Info</th>
			<th>Price</th>
			<th>Subtotal (IDR)</th>
		</tr>

    @foreach ($order_dtl as $row)
    <tr style=' height: 30px;'>
      <td>{{ $row->qty }}</td>
      <td><a href="{{ $row->requestOrderDtl?->product_url }}">Link Produk</a></td>
			<td>{{ $row->requestOrderDtl?->product_name }}
				@if($row->status == '02')
					<br>
					<span style="font-size:10px"><i>Keterangan : {{ $row->keterangan }}</i></span>
				@endif
			</td>
			<td>{{ $row->requestOrderDtl?->color }}</td>
			<td>{{ $row->requestOrderDtl?->size }}</td>
			<td>{{ $row->requestOrderDtl?->remarks }}</td>
			<td>{{ number_format($row->price) }}</td>
      <td align="right">{{ number_format($row->subtotal) }}</td>
    </tr>
    @endforeach

		@php
			$colspan = "7";
		@endphp
		<tr style='height: 30px; border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Subtotal</td>
				<td style=' border: none;' align='right'>{{ number_format($view_order->subtotal) }}</td>
		</tr>

		@if($view_order->additional_shipping_fee > 0)
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}"  align='right'>Additional Shipping</td>
				<td style=' border: none;' align='right'>{{ number_format($view_order->additional_shipping_fee) }}</td>
		</tr>
		@endif

		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;'colspan="{{ $colspan  }}" align='right'>Ongkir ({{ $view_order->ongkir_type }})</td>
				<td style=' border: none;' align='right'>{{ number_format($view_order->ongkir) }}</td>
		</tr>
		
		@if($view_order->insurance > 0 )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Insurance Fee</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->insurance) }}</td>
		</tr>
		@endif
			
		@if($view_order->block_package > 0 )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Block Package</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->block_package) }}</td>
		</tr>
		@endif

		@if($view_order->disc != '0' && $view_order->disc != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Discount</td>
				<td style=' border: none;'align='right'>- {{ number_format($view_order->disc) }}</td>
		</tr>
		@endif

		@if($view_order->additional_charge != '0' && $view_order->additional_charge != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Additional Other Fee</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->additional_charge) }}</td>
		</tr>
		@endif

		@if($view_order->additional_ongkir != '0' && $view_order->additional_ongkir != '')
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Additional Delivery Fee</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->additional_ongkir) }}</td>
		</tr>
		@endif
			
		@if($view_order->unique_amount != '0' && $view_order->unique_amount != '' )	
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Unique Amount</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->unique_amount) }}</td>
		</tr>
		@endif

		<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Grand Total</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->total_trans) }}</td>
		</tr>

		@if($view_order->e_wallet_amount != '0' && $view_order->e_wallet_amount != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>E-Wallet Usage</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->e_wallet_amount) }}</td>
		</tr>
		@endif
		
		@if($view_order->payment_dp > 0)
				<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Down Payment</td>
				<td style=' border: none;'align='right'>{{ number_format(abs($view_order->payment_dp)) }}</td>
		</tr>
		@endif
		
		@if($view_order->refund_amount > 0)
		<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Refund Amount</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->refund_amount) }}</td>
		</tr>
		@endif

	</table>
	<br>
	<br>
	@if($view_order->notes != '')
		<strong><b><p>Notes : {{ $view_order->notes }}</p></b></strong>
	@endif

{!! $email_content_bottom !!}

@include('emails.layouts.footernotification')