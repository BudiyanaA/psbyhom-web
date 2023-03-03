@include('emails.layouts.headernotifpo')

{!! $email_content !!}

<div style='text-decoration: underline;'>
	<font color="black">
		<strong style="font-size:24px; font-weight: bolder;">PRE ORDER</strong>
	</font>
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

	@php
		$i = 1;
		$subtotal = 0;
	@endphp

	@foreach($order_dtl as $row)
		@php
			$subtotal = $subtotal + $row->subtotal_final;
			$colspan = '7';
		@endphp
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
		@php
			$i++;
		@endphp
	@endforeach
		<tr style='height: 30px; border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Subtotal</td>
				<td style=' border: none;' align='right'>{{ number_format($view_order->subtotal) }}</td>
		</tr>

		@if($view_order->additional_shipping_fee != '0' && $view_order->additional_shipping_fee != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}"  align='right'>Additional Shipping Fee</td>
				<td style=' border: none;' align='right'>{{ number_format($view_order->additional_shipping_fee) }}</td>
		</tr>
		@endif

		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;'colspan="{{ $colspan  }}" align='right'>Delivery Fee ({{ $view_order->ongkir_type }})</td>
				<td style=' border: none;' align='right'>{{ number_format($view_order->ongkir) }}</td>
		</tr>
		
		@if($view_order->insurance != '0' && $view_order->insurance != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Insurance</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->insurance) }}</td>
		</tr>
		@endif
			
		@if($view_order->block_package != '0' && $view_order->block_package != '' )
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
			
		@if($view_order->unique_amount != '0' && $view_order->unique_amount != '' )	
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Unique Amount</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->unique_amount) }}</td>
		</tr>
		@endif

		@if($view_order->additional_charge != '0' && $view_order->additional_charge != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Additional Insurance Fee</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->additional_charge) }}</td>
		</tr>
		@endif

		@if($view_order->additional_package != '0' && $view_order->additional_package != '' )
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Additional Package</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->additional_package) }}</td>
		</tr>
		@endif

		@if($view_order->additional_ongkir != '0' && $view_order->additional_ongkir != '')
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Additional Delivery Fee</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->additional_ongkir) }}</td>
		</tr>
		@endif
		
		<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Grand Total</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->total_trans) }}</td>
		</tr>
		
		@if($view_order->payment_dp != 0)
				<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Down Payment</td>
				<td style=' border: none;'align='right'>{{ number_format(abs($view_order->payment_dp)) }}</td>
		</tr>
		@endif
		
		@php
			$ewallet = 0;
		@endphp
		@if($view_order->e_wallet_amount != '0' && $view_order->e_wallet_amount != '' )
		@php
			$ewallet = $view_order->e_wallet_amount;
		@endphp
		<tr style=' height: 30px;border: none;'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>E-Wallet Usage</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->e_wallet_amount) }}</td>
		</tr>
		@endif
		
		@if($view_order->payment_last != 0)
		<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Last Payment</td>
				<td style=' border: none;'align='right'>{{ number_format(abs($view_order->payment_last)) }}</td>
		</tr>
		@endif

		<tr style=' height: 30px;border: none;font-weight:bolder'>
				<td style=' border: none;' colspan="{{ $colspan  }}" align='right'>Outstanding Amount</td>
				<td style=' border: none;'align='right'>{{ number_format($view_order->total_outstanding) }}</td>
		</tr>
</table>

@if($view_order->total_outstanding != '0' && $view_order->total_outstanding != '' && $view_order->total_outstanding > $view_order->total_trans * 0.5 )
	<p>Please do payment to below account information 
 	@if($EmailUUID != '6ebb641b-4028-40fd-b1b2-78fada074132') 
		at least Rp.<strong>{{ number_format( ($view_order->total_trans - $ewallet) * 0.5 )  }}</strong> (50 % of Grand Total 
		@if($view_order->e_wallet_amount != '0' && $view_order->e_wallet_amount != '' )
			- E-Wallet Amount Usage
		@endif
		) : </p>
	@endif

	@if($view_order->total_trans != '0')
		@foreach($list_of_bank as $row_bank)
			<table>
			<tr>
				<td>Bank Name</td>
				<td>: {{ $row_bank->bank_name }}</td>
			</tr>
			<tr>
				<td>Account No</td>
				<td>: {{ $row_bank->bank_account_no }}</td>	
			</tr>
			<tr>
				<td>Account Name</td>
				<td>{{ $row_bank->bank_account_name }}</td>
			</tr>
			</table>
			<br>
		@endforeach
		<p>After you have already make a payment, please do payment confirmation by accessing below link</p>
		<a href="{{ url('payment/confirm') }}">Go to Payment Confirmation</a>
		<br>
	@endif
@endif

@if($view_order->notes != '')
	<strong><b><p>Notes : {{ $view_order->notes }}</p></b></strong>
@endif

{!! $email_content_bottom !!}

@include('emails.layouts.footernotification')