@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                                 <li class="active"><strong>Waiting Goodies</strong> PO</li>
            </ul>
	
            <h1>View  PO : {{ $po->po_id }}</h1>
			<br>
			<br>
        </div>
<div class="row">
<div class="container">
    <div class="col-xs-12">
		<div class="panel panel-midnightblue">
			<div class="panel-heading">
				{!! Form::model($po, ['route' => ['waitinggoods.update', $po->POUUID], 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
				  <h4>
						<ul class="nav nav-tabs">
							@if (in_array($po->status, ['00', '01', '04', '05', '08']))
								<li class="active"><a href="#payment" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Payment Confirmation</span></a></li>
								<li><a href="#trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">PO Information</span></a></li>
							@elseif (in_array($po->status, ['02', '03', '06', '07', '09', '99']))
								<li class="active"><a href="#trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">PO Information</span></a></li>
								<li><a href="#payment" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Payment Confirmation</span></a></li>
								<li><a href="#log_trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Log Transaction</span></a></li>
							@else 
								<li class="active"><a href="#trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">PO Information</span></a></li>
								<li><a href="#invoice" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Invoice</span></a></li>
								<li><a href="#payment" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Payment Confirmation</span></a></li>
								<li><a href="#log_trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Log Transaction</span></a></li>
							@endif
						</ul>
					</h4>
				  <!-- <div class="options">
					<a href="javascript:;"><i class="fa fa-cog"></i></a>
					<a href="javascript:;"><i class="fa fa-wrench"></i></a> 
				  </div> -->
									
			</div>
			
				<div class="panel-body">
					<div class="tab-content">
					
						<div class="tab-pane" id="threads">
							<ul class="panel-threads">
								
							</ul>
						</div>
												
						<div class="tab-pane {{ in_array($po->status, ['02', '03', '06', '07', '09', '99']) ? 'active' : '' }}" id="trans">
													<ul class="panel-comments">
							@if (in_array($po->status, ['06', '07', '02', '03', '05', '04']))
								<div align='right'> 
									<button class="btn-primary btn" value ='print_label' id="print_label" name='submit'> Print Label</button>
								</div>
							@endif
								<br>
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											@if ($po->status == '00' || $po->status == '01')
												<th  style='width:10%'> Qty</th>
												@php
													$readonly = 'disabled';
													$readonly_refund = "";
												@endphp
											@else
												<th  style='width:3%'> Qty</th>
												@php
													$readonly = '';
													if($po->refund_flag == '11') {
														$readonly_refund = "readonly";
												 	} else if($po->refund_flag == '' && $po->status_po != '03'  ) {	
														$readonly_refund = 'disabled';
												 	}
												@endphp
											@endif
											<th style='width:5%'>URL</th>											
											<th>Name</th>
											<th>Color</th>
											<th>Info</th>	
											<th>Size/Weight </th>
											@if ($po->status == '02' || $po->status == '03')
												<th>Price(USD)</th>
											@endif
											<th>Price(IDR)</th>
											<th>Subtotal</th>											
										</tr>
									</thead>
									<tbody>
										@if(count($podetails) > 0)
										@foreach($podetails as $p)						
												<tr >
													<input type="hidden" value="{{ $p->PODtlUUID }}" name="PODtlUUID[{{ $loop->index }}]">
													<input type="hidden" value="{{ $p->price }}" id="price{{ $loop->index }}">
													<input type="hidden" value="{{ $p->qty }}" id="qty_po{{ $loop->index }}" name="qty_po[{{ $loop->index }}]">
													<input type="hidden" value="{{ $p->subtotal }}" id="subtotal_po{{ $loop->index }}" name="subtotal_po[{{ $loop->index }}]">
													<td style='width:10%'>
														@if ($po->status == '00' || $po->status == '01')
															{{ $p->qty }}
														@elseif ($po->status == '02' || $po->status == '03')
															@php
																$total_reject = 0;
																$disabled = '';
																$incoming_qty = trim($p->incoming_qty);

																if($p->status == '00')
																{
																	$disabled = 'readonly';
																	$incoming_qty = $p->qty;
																}
																else if($p->status == '02')
																{
																	$disabled = 'readonly';
																	$total_reject++;
																}
															@endphp
															<input {{ $disabled  }} style='width:55%' type='number'  class="incoming_qty" name='incoming_qty[{{ $loop->index }}]' id='incoming_qty{{ $loop->index }}' value='{{ trim($incoming_qty) }}'>
														@elseif (in_array($po->status, ['04', '05', '06', '07', '08', '09']))
															{{ $p->incoming_qty }}
														@endif
													</td>
													<td><p id="price"><a href="{{ $p->requestOrderDtl?->product_url }}">LINK</a></p></td>
														<td>{{ $p->requestOrderDtl?->product_name }}</td>
														<td>{{ $p->requestOrderDtl?->color }}</td>
														<td>{{ $p->requestOrderDtl?->remarks }}</td>
														<td>{{ $p->requestOrderDtl?->size }} </td>
														@if ($po->status == '02' || $po->status == '03')
															<td>{{ number_format($p->requestOrderDtl?->price_customer - ($p->requestOrderDtl?->price_customer * $p->requestOrderDtl?->disc_percentage / 100),2) }}</td>															
														@endif
														<td>{{ number_format($p->price) }}</td>
														<td class="po_subtotal{{ $loop->index}}">{{ number_format($p->subtotal) }}</td>
												</tr>
										@endforeach
										@else
											<tr>
												<td colspan="8">Data not found.</td>
											</tr>
										@endif
										@php
										if($po->status != '02' && $po->status != '03' ) {
											$colspan = '3';
										} else {
										 	$colspan = '4';
										}
										@endphp
										<input type="hidden" value="{{ count($podetails) }}" id="total_row" name='total_row'>	
										<tr>
											<td colspan='2' style="text-align:right"></td>
											<td colspan='2'></td>
											<td colspan='{{ $colspan }}' style="text-align:right">Subtotal</td>
											<td class="po_grandtotal">{{ number_format($po->subtotal) }}</td>
											<input type='hidden' name='total_rejects' value="{{ $po->total_reject }}">
											<input type='hidden' name='total_rejects' value="{{ $total_reject ?? 0 }}">
											<input type='hidden' id='dp_amounts' value="{{ $po->dp_amount }}">
											<input type='hidden' id='ongkir_value' value="33000">
											<input type='hidden' id='insurance_value' value="7999">
											<input type='hidden' id='package_value' value="0">
											<input type='hidden' id='disc_value' value="{{ $po->disc }}">
											<input type='hidden' id='unique_amount_value' value="{{ $po->unique_amount }}">
											<input type='hidden' id='ewallet_value' value="{{ $po->e_wallet_amount }}">
										</tr>
										
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Additional Shipping Fee</td>
										<td>
											@if ($po->status == '02' || $po->status == '03')
												<input style='width:50%' type='text' name='additional_shipping_fee' id='additional_shipping_fee' value='{{ $po->additional_shipping_fee}}'>
											@else
												{{ number_format($po->additional_shipping_fee) }}
											@endif
										</td>
									</tr>
									
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Delivery Fee ( {{ $po->ongkir_type }} )</td>
										<td>
										@if ($po->status == '02' || $po->status == '03')
											<input style='width:50%' type='text' name='delivery_fee' id='delivery_fee' value='{{ $po->ongkir}}'>
										@else
											{{ number_format($po->ongkir) }}
										@endif
										</td>
									</tr>

									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Insurance</td>
										<td>
											@if ($po->status == '02' || $po->status == '03')
												<input style='width:50%' type='text' name='insurance_fee' id='insurance_fee' value='{{ $po->insurance}}'>
											@else
												{{ number_format($po->insurance) }}
											@endif
										</td>
										<input type='hidden' id='total_outstanding' name='total_outstanding' value="{{ $po->total_outstanding }}">
										<input type='hidden' id='ori_total_outstanding' name='ori_total_outstanding' value="740504">
									</tr>

									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Block Package</td>
										<td>										
											@if ($po->status == '02' || $po->status == '03')
												<input style='width:50%' type='text' name='block_package_fee' id='block_package_fee' value='{{ $po->block_package}}'>
											@else
												{{ number_format($po->block_package) }}
											@endif
										</td>
									</tr>

									@if ($po->disc != 0)
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'> </td>
										<td colspan='{{ $colspan }}' style="text-align:right">Discount</td>
										<td>
											@if($po->disc != '')
												{{ number_format($po->disc)  }}
											@else
												0
											@endif
										</td>
									</tr>
									@endif

									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'> </td>
										<td colspan='{{ $colspan }}' style="text-align:right">Unique Amount</td>
										<td>
											@if($po->unique_amount != '')
												{{ number_format($po->unique_amount)  }}
											@else
												0
											@endif
										</td>
									</tr>
								
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Grand Total</td>
										<td class="super_grand_total"><strong>{{ number_format($po->total_trans) }}</strong></td>
										<input type="hidden" name="sub_grand_total" id='sub_grand_total' value="{{ $po->subtotal }}">
										<input type="hidden" name="super_grand_total_ori" id='super_grand_total_ori' value="{{ $po->total_trans }}">
										<input type="hidden" name="super_grand_total" id='super_grand_total' value="{{ $po->total_trans }}">
										<input type="hidden" name="total_refund" id='total_refund' value="{{ $po->refund_amount }}">
										<input type="hidden" name="e_wallet" id='e_wallet' value="0">
									</tr>

									@if ($po->dp_amount > 0)
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Down Payment</td>
										<td>{{ number_format($po->dp_amount) }}</td>																
									</tr>
									@endif

									@if ($po->use_ewallet  != 0)
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">E Wallet Ussage</td>
										<td>{{ number_format($po->e_wallet_amount)  }}</td>
									</tr>
									@endif

									@if ($po->payment_last  != 0)
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='{{ $colspan }}' style="text-align:right">Last Payment</td>
										<td>{{ number_format((float) $po->payment_last)  }}</td>															
									</tr>
									@endif	

									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										@if ($po->total_outstanding >= 0)
											<td class="remarks_kurang" colspan='{{ $colspan }}' style="text-align:right">Total Outstanding</td>
											<td class="total_kurang"><span id='total_outstandings'><strong>{{ number_format((float) $po->total_outstanding) }}</strong></span></td>
										@elseif ($po->refund_amount != '')
											<td class="remarks_kurang" colspan='{{ $colspan }}' style="text-align:right">Total Refund</td>
											<td class="total_kurang"><span id='total_outstandings'><strong>{{ number_format($po->refund_amount) }}</strong></span></td>
										@endif
									</tr>
								
								<td colspan='2' style="text-align:right">Note</td>
								<td colspan='7' rowspan='2'><textarea {{ $readonly }}  name="note2" id="note"  cols="50" rows="4" class="form-control">{{ $po->remarks }}</textarea></td>

								
								@if ($po->status == 99 || $po->addendum_fee != '')
									@php
										$read_add = '';
										if($po->status != '9999') {
											$read_add = 'readonly';
										}
									@endphp
									<tr>
										<td colspan='2' style="text-align:right">Addendum Fee</td>
										<td colspan='2'><span id='total_outstandingsawfaf' > 
											@if ($po->addendum_fee == '' && $po->addendum_fee == '0')
												<input {{ $read_add }} style='width:50%' type='text' name='addendum_fee' id='addendum_fee' value='{{ $po->addendum_fee }}'>
											@endif
										</span></td>
									</tr>

									<tr>
										<td colspan='2' style="text-align:right">Addendum Notes</td>
										<td colspan='10'><span id='total_outstandingsawfafa' >
											<textarea {{ $read_add }} cols="50" rows="4" style="width:100%" name="addendum_note">{{ $po->addendum_note }}</textarea> 	
										</span></td>
									</tr>
								@endif

									<tr>
									</tr>
									<tr>
										<td colspan='10'></td>
									</tr>
									<tr>
										<td colspan='10'><strong>General Information</strong></td>
									</tr>
									<tr>
										<td colspan='2'>Customer Name</td>
										<td colspan='8'>{{ $po->receiver_name }}</td>
									</tr>
										<tr>
										<td colspan='2'>Email</td>
										<td colspan='8'>{{ $po->msCustomer?->email }}</td>
									</tr>
								
									<tr>
										<td colspan='2'>Delivery Address</td>
										<td colspan='8'>{{ $po->receiver_address }}</td>
									</tr>
									<tr>
										<td colspan='2'>Delivery Service</td>
										<td colspan='8'>{{ strtoupper($po->courier_name) }} {{ $po->ongkir_type }}</td>
									</tr>
									
									@if ($po->status == '07')
										<tr>
											<td colspan='2'>No Resi</td>
											<td colspan='8'>{{ $po->no_resi }}</td>
										</tr>
									@elseif ($po->status == '06')
										<tr>
											<td colspan='2'>No Resi</td>
											<td colspan='8'>
												<input style='width:50%' type='text' name='no_resi' id='no_resi' value='{{ $po->no_resi }}'>
											</td>
										</tr>
									@endif

									<tr>
										<td colspan='2'>Handphone 1</td>
										<td colspan='8'>{{ $po->receiver_hp1 }}</td>
									</tr>
									<tr>
										<td colspan='2'>Handphone 2</td>
										<td colspan='8'>{{ $po->receiver_hp2 }}</td>
									</tr>
									<tr>
										<td colspan='2'>Zip Code</td>
										<td colspan='8'>{{ $po->receiver_kodepos }}</td>
									</tr>
									<tr>
										<td colspan='2'>Approved Date</td>
										<td colspan='8'>{{ formatDateTime($po->trans_date) }}</td>
									</tr>
										<tr>
										<td colspan='2'>Status</td>
										<td colspan='8'>{{ $po->msStatus?->status_name }}</td>
									</tr>
									<tr>
										<td colspan='2'>Note From Customer</td>
										<td colspan='8'>{{ $po->notes }}</td>
									</tr>

									@if ($po->is_dropshipper == '1')
										<tr>
											<td colspan='10'></td>
										</tr>
										<tr>
											<td colspan='10'><strong>Dropshipper Information</strong></td>
										</tr>
										<tr>
											<td colspan='2'>Dropshipper Name</td>
											<td colspan='8'>{{ $po->dropshipper_name }}</td>
										</tr>
										<tr>
											<td colspan='2'>Dropshipper Contact</td>
											<td colspan='8'>{{ $po->dropshipper_contact }}</td>
										</tr>
									@endif
									</tbody>
								</table>
							</ul>
						</div>
						
											<div class="tab-pane {{ in_array($po->status, ['00', '01', '04', '05', '08']) ? 'active' : '' }}" id="payment">
												<ul class="panel-comments">
								
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Pay Type</th>
											<th>Bank Info</th>
											<th>Cust.  Acct</th>
											<th>Cust. Bank</th>
											<th>Cust. Acct Name</th>
											<th>Pay Date</th>
											<th>Trx Receipt</th>	
											<th>Pay Amount</th>							
											<th>Status</th>	
										</tr>
									</thead>
									<tbody>	
									@if(count($payment) > 0)
									@foreach($payment as $pay)																						
										<tr >
											<td valign='top'>{{ $loop->index + 1 }}</td>
											<td>
											@if (substr($pay->payment_id,-4) == 'DP/1')
												Down Payment
											@elseif (substr($pay->payment_id,-4) == 'LP/1')
												Last Payment
											@else
												-
											@endif
											</td>
											<td>{{ $pay->bank?->bank_name }},{{ $pay->bank?->bank_account_no }}</td>
											<td>{{ $pay->account_no_source }}</td>
											<td>{{ $pay->bank_source }}</td>
											<td>{{ $pay->account_name_source }}</td>
											<td>{{ formatDate($pay->payment_date)  }}</td>
											<td><a target="_blank" href="#">Hyperlink</a></td>
											@if ($po->status == '00' || $po->status == '02' || ($po->status == '05' && $pay->status == '00'))
											<td style="width:15%">
												<input style="width:80%" type="text" name='payment_amount' value="{{ $pay->payment_amount }}" >
												<input type="hidden" value="{{ $pay->PaymentUUID }}" name="PaymentUUID">
												<input type="hidden" value="{{ $pay->payment_id }}" name="payment_id">
											</td>
											@else
												<td>{{ $pay->payment_amount }}</td>
											@endif
											<td>
												@if ($pay->status == '00')
													Pending Verification
												@elseif ($pay->status == '01')
													Verified
												@elseif ($pay->status == '02')
													Not Valid
												@endif
											</td>
										</tr>
									@endforeach
									@else
										<tr>
											<td colspan="8">No Payment Confirmation</td>
										</tr>
									@endif
									</tbody>
								</table>
								<input type='hidden' name="payment_type" value="DP">
							 </ul>
						</div>
												<div class="tab-pane" id="log_trans">
							<ul class="panel-comments">
								
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Log Time</th>
											<th>Action By</th>
											<th>Action Description</th>
											
										</tr>
									</thead>
									<tbody>
									@foreach($logtrans as $l)																				
										<tr>
											<td valign='top'>{{ $loop->index + 1 }}</td>
											<td>{{ $l->log_date }}</td>
											<td>{{ $l->created_by }}</td>
											<td>{{ $l->action_desc }}</td>																		
										</tr>
									@endforeach																				
									</tbody>
								</table>
								
							 </ul>
						</div>
												
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
											<input type="hidden" value="" id="type">
											@if ($po->status == '00')
												<button class="btn-primary btn" value ='verify' id="verify" name='submit'>Verify Payment</button>
												<button class="btn-primary btn" value ='cancel' id="cancel" name='submit'>Invalid Payment</button>
											@elseif ($po->status == '02' && $po->e_wallet_amount != $po->total_trans)
												<button class="btn-primary btn" value='update_payment' id="update_payment" name='submit'>Update Payment</button>
											@elseif ($po->status == '01' || $po == '04')
												<button class="btn-primary btn" value='reload_invoice' id="reload_invoice" name='submit'>Reload Invoice</button>
											@elseif ($po->status == '03')
												<button class="btn-primary btn" value='prepare_delivery' id="prepare_delivery" name='submit'>Process Order</button>
											@elseif ($po->status == '99')
												<button class="btn-primary btn" value ='cancel_trx' id="cancel_trx" name='submit'> Cancel Transaction</button>
											@elseif ($po->status == '05')
												<button class="btn-primary btn" value ='verify_last' id="verify_last" name='submit'> Verify Last Payment</button>
												<button class="btn-primary btn" value ='cancel_last' id="cancel_last" name='submit'>Invalid Last Payment</button>
											@elseif ($po->status == '06')
												<button class="btn-primary btn" value='update_no_resi' id="update_no_resi" name='submit'>Update No. Resi</button>
											@elseif ($po->status == '08')
												<button class="btn-primary btn" value='verify_addendum' id="verify_addendum" name='submit'>Verify Payment</button>
											@else
												<button class="btn-primary btn" value='back' id="back" name='button' onclick="window.history.go(-1); return false;">Back</button>
											@endif
																										<!-- <button class="btn-primary btn" value ='update_invoice_data' id="update_invoice_data" name='tombol' type='button' > Update Data</button> -->
												   <!--  <button class="btn-primary btn" value ='update_status_barang' id="update_status_barang" name='tombol' type='button' > Go to Waiting Goodies</button>-->
													<!-- -->
												
										
										  													<!--<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Update</button>
													<button class="btn-primary btn" value ='delete' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Delete</button>-->
											</div>
										</div>
									</div>
								</div>
								<input type='hidden' name='po_id'  value='{{ $po->po_id }}'>
								<input type='hidden' name='customer_name'  value='{{ $po->receiver_name }}'>
								<input type='hidden' name='delivery_address'  value='{{ $po->receiver_address }}'>
								<input type='hidden' name='jenis_proses' id='tombol' value=''>
								<input type='hidden' name='BatchUUID' id='BatchUUID' value=''>
								<input type='hidden' name='CustomerUUID' id='CustomerUUID' value='{{ $po->CustomerUUID }}'>
								<input type='hidden' name='refund_flag' id='refund_flag' value=''>
								<input type='hidden' name='RequestOrderUUID' id='RequestOrderUUID' value='{{ $po->RequestOrderUUID }}'>
							{{ Form::close() }}
					</div>


								
							
						</div>
					</div>
				</div>
		</div>
	</div>
</div>



</div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection


@section ('script')
<script>
  $(document).ready(function() {
		// recalculate();
		$('.incoming_qty').on('keyup mouseup', function() 
		{
			recalculate();
		});

		$('#additional_shipping_fee').on('keyup', function() 
		{
			var additional_shipping_fee = $("#additional_shipping_fee").val();
			if(isNaN(additional_shipping_fee))
			{
				alert("Additional Shipping Fee must be in numeric !");
				$("#additional_shipping_fee").val("0");
				$("#additional_shipping_fee").focus();
				recalculate();
			}
			else
			{
				recalculate();
			}
		});

		$('#delivery_fee').on('keyup', function() 
		{
			var delivery_fee = $("#delivery_fee").val();
			if(isNaN(delivery_fee))
			{
				alert("Delivery Fee must be in numeric !");
				$("#delivery_fee").val("0");
				$("#delivery_fee").focus();
				recalculate();
			}
			else
			{
				recalculate();
			}
		});

		$('#insurance_fee').on('keyup', function() 
		{
			var insurance_fee = $("#insurance_fee").val();
			if(isNaN(insurance_fee))
			{
				alert("Insurance Fee must be in numeric !");
				$("#insurance_fee").val("0");
				$("#insurance_fee").focus();
				recalculate();
			}
			else
			{
				recalculate();
			}
		});

		$('#block_package_fee').on('keyup', function() 
		{
			var block_package_fee = $("#block_package_fee").val();
			if(isNaN(block_package_fee))
			{
				alert("Block Package Fee must be in numeric !");
				$("#block_package_fee").val("0");
				$("#block_package_fee").focus();
				recalculate();
			}
			else
			{
				recalculate();
			}
		});		
	});

	function numberWithCommas(x)
	{
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function recalculate()
	{
		var total_row = $("#total_row").val();
		var additional_shipping_fee = $("#additional_shipping_fee").val();

		var i = 0;
		var price = 0;
		var incoming_qty = 0;
		var po_qty = 0;
		var error = 0;
		var subtotal = 0;
		var grandtotal = 0;
		var ongkir = $("#delivery_fee").val();
		var insurance = $("#insurance_fee").val();
		// var disc = $("#disc_value").val();
		var disc = 0;
		var package_value =  $("#block_package_fee").val();
		var unique_amount_value = 0;// $("#unique_amount_value").val();
		var ewallet_value = $("#ewallet_value").val();
		var total_refund = 0;
		var dp_amount = $("#dp_amounts").val();
		var total_outstanding = 0;
		var grand_total_ori = $("#super_grand_total_ori").val();

		var super_grand_total = $('#super_grand_total').val();
		
		if(insurance == '')
		{
			alert("Insurance cannot be empty !");
			insurance = 0;
			$("#insurance_fee").val('0');
		}
		
		if(ongkir == '')
		{
			alert("Delivery Fee cannot be empty !");
			ongkir = 0;
			$("#delivery_fee").val('0');
		}
		
		if(package_value == '')
		{
			alert("Block Package Fee cannot be empty !");
			package_value = 0;
			$("#block_package_fee").val('0');
		}
		
		if(additional_shipping_fee == '')
		{
			alert("Additional Shipping Fee cannot be empty !");
			additional_shipping_fee = 0;
			$("#additional_shipping_fee").val('0');
		}
		
		
		for(i = 0;i < total_row;i++)
		{
			price =  $("#price"+i).val();
			incoming_qty =  $("#incoming_qty"+i).val();
			po_qty = $("#po_qty"+i).val();

			if(parseInt(incoming_qty) > parseInt(po_qty))
			{
				alert("Incoming Qty ("+incoming_qty+") cannot more than ordered Qty ("+po_qty+") on row "+i+" !")
				$("#incoming_qty"+i).val(po_qty);
				$("#incoming_qty"+i).focus();
				error++;
			}
			else if(parseInt(incoming_qty) < 0)
			{
				alert("Incoming Qty ("+incoming_qty+") cannot less than 0 !")
				$("#incoming_qty"+i).val("0");
				$("#incoming_qty"+i).focus();
				error++;
			}
			else  
			{
				subtotal = parseInt(price) * parseInt(incoming_qty);
				$('.po_subtotal'+i).html(numberWithCommas(subtotal));
				$("#subtotal_po"+i).val(subtotal);
				grandtotal = parseInt(grandtotal) + parseInt(subtotal);
			}
		}
		
		if(error == 0)
		{ 
			
			$('.po_grandtotal').html(numberWithCommas(grandtotal));
		
			// TODO: Periksa
			if(parseInt(ewallet_value) != parseInt(grand_total_ori))
			{
				super_grand_total = (parseInt(unique_amount_value) + parseInt(grandtotal) + parseInt(ongkir) + parseInt(insurance) + parseInt(package_value) - parseInt(disc)) + parseInt(additional_shipping_fee);		
			}
			else
			{
				super_grand_total = (parseInt(unique_amount_value) + parseInt(grandtotal) + parseInt(ongkir) + parseInt(insurance) + parseInt(package_value) - parseInt(disc)) + parseInt(additional_shipping_fee);				
			}

		// var super_grand_total = $('#super_grand_total').val();
    // var dp_amount = $('#dp_amount').val();

		console.log("sgd: " + super_grand_total);
		console.log("dp: " + dp_amount);

    $('.super_grand_total').html(numberWithCommas(super_grand_total));
    var total_outstanding = parseInt(super_grand_total) - parseInt(dp_amount);
    $('#total_outstandings').html("<strong>" + numberWithCommas(total_outstanding) + "</strong>");

    if (parseInt(total_outstanding) < 0) {
        var total_refund = total_outstanding;
        $('.remarks_kurang').html("Total Refund");
        $('#total_refund').val(Math.abs(total_refund));
    } else {
        var total_refund = 0;
        $('.remarks_kurang').html("Total Outstanding");
        $('#total_refund').val('0');
    }

    $('#total_outstanding').val(total_outstanding);
    $('#super_grand_total').val(super_grand_total);
			
			$('#sub_grand_total').val(grandtotal);
		}
		
	}
</script>
@endsection