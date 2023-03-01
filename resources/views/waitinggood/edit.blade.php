@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                                 <li class="active"><strong>Waiting Goodies</strong> PO</li>
            </ul>
	
            <h1>View  PO : {{ $waitinggoods->po_id }}</h1>
			<br>
			<br>
        </div>
<div class="row">
<div class="container">
    <div class="col-xs-12">
		<div class="panel panel-midnightblue">
			<div class="panel-heading">
				  <h4>
				  
				  	<form action="https://psbyhom.com/po_invoice_controller/validate_update/e4abd4f4-dd96-464d-a66e-a18bac84b62a/" class="form-horizontal row-border"  data-validate="parsley" id="validate-form" method='post'>
						<ul class="nav nav-tabs">
							@if ($podetails->status == '00' || $podetails->status == '01' || $podetails->status == '04' || $podetails->status == '05' || $podetails->status == '08')
								<li class="active"><a href="#payment" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Payment Confirmation</span></a></li>
								<li><a href="#trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">PO Information</span></a></li>
							@elseif ($podetails->status == '02' || $podetails->status == '03' || $podetails->status == '06' || $podetails->status == '07' || $podetails->status == '09' || $podetails->status == '99')
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
					
											<div class="tab-pane active" id="threads">
							<ul class="panel-threads">
								
							</ul>
						</div>
												
						<div class="tab-pane active" id="trans">
													<ul class="panel-comments">
							@if ($podetails->status == '06' || $podetails->status == '07' || $podetails->status == '02' || $podetails->status == '03' || $podetails->status == '05' || $podetails->status == '04')
								<div align='right'> <button class="btn-primary btn" value ='print_label' id="print_label"  type="button" name='tombol' > Print Label</button> </div>
							@endif
								<br>
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								 
									<thead>
										<tr>
											<th  style='width:3%' > Qty</th>
											
											<th style='width:5%'>URL</th>											
											<th>Name</th>
																															
											<th>Color</th>
											<th>Info</th>	
											<th>Size/Weight </th>
											@if ($podetails->status == '02' || $podetails->status == '03')
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
														<input type="hidden" value="79c4a860-878a-4bb7-b5af-1ea064871bd4" name="PODtlUUID1">
														<input type="hidden" value="1499408" id="price1">
														<input type="hidden" value="1" id="po_qty1">
														<input type="hidden" value="1499408" id="subtotal_po1" name="subtotal_po1">
														<td style='width:10%'>
															@if ($p->status == '00' || $p->status == '01')
																{{ $p->qty_po }}
															@elseif ($p->status == '02' || $p->status == '03')
																<input readonly style='width:55%' type='number' class="incoming_qty" name='incoming_qty1' id='incoming_qty1' value='{{ $p->qty_po }}' disabled>
															@else
																<input readonly style='width:55%' type='number' class="incoming_qty" name='incoming_qty1' id='incoming_qty1' value='{{ $p->qty_po }}'>
															@endif
														</td>
														<td><p id="price"><a href="{{ $p->product_url }}">LINK</a></p></td>
															<td>{{ $p->product_name }}</td>
															
															<td>{{ $p->color }}</td>
															<td>{{ $p->remarks }}</td>
															<td>{{ $p->size }} </td>
															@if ($waitinggoods->status == '02' || $waitinggoods->status == '03')
															<td>{{ $p->price_customer - ($p->price_customer * $p->disc_percentage / 100) }}</td>															<td>1,499,408</td>
															@endif
												
															
															<td class="po_subtotal1">{{ $p->subttal_original }}</td>
														</tr>
											@endforeach
											@else
								<tr>
									<td colspan="8">Data not found.</td>
								</tr>
							@endif
								<input type="hidden" value="1" id="total_row" name='total_row'>
								@foreach($waitinggoods as $w)	
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td  colspan='4' style="text-align:right">Subtotal</td>
										<td class="po_grandtotal">{{ $w->subtotal}}</td>
										<input type='hidden' name='total_rejects' value="0">
										<input type='hidden' id='dp_amounts' value="800000">
										<input type='hidden' id='ongkir_value' value="33000">
										<input type='hidden' id='insurance_value' value="7999">
										<input type='hidden' id='package_value' value="0">
										<input type='hidden' id='disc_value' value="0">
										<input type='hidden' id='unique_amount_value' value="98">
										<input type='hidden' id='ewallet_value' value="0">
										
									</tr>
									<tr>
										
									<td colspan='2' style="text-align:right"></td>
									<td colspan='2'></td>
									<td colspan='4' style="text-align:right">Additional Shipping Fee</td>
									<td>
										@if ($w->status == '02' || $w->status == '03')
											<input style='width:50%' type='text' name='additional_shipping_fee' id='additional_shipping_fee' value='{{ $p->additional_shipping_fee}}'>
										@else
											<input style='width:50%' type='text' name='additional_shipping_fee' id='additional_shipping_fee' value='{{ $p->additional_shipping_fee}}' disabled>
										@endif
									</td>
									
									<tr>
										
									<td colspan='2' style="text-align:right"></td>
									<td colspan='2'></td>
										<td colspan='4' style="text-align:right">Delivery Fee ( OKE )</td>
										<td>
										@if ($w->status == '02' || $w->status == '03')
											<input style='width:50%' type='text' name='ongkir_type' id='ongkir_type' value='{{ $p->ongkir_type}}'>
										@else
											<input style='width:50%' type='text' name='ongkir_type' id='ongkir_type' value='{{ $p->ongkir_type}}' disabled>
										@endif
									</td>
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'>
										</td>
										<td colspan='4' style="text-align:right">Insurance</td>
										<td>
											<input style='width:50%' type='text' name='insurance' id='insurance' value='{{ $p->insurance}}'>
										</td>
										<input type='hidden' id='total_outstanding' name='total_outstanding' value="740504">
										<input type='hidden' id='ori_total_outstanding' name='ori_total_outstanding' value="740504">
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
											<td colspan='4' style="text-align:right">Block Package</td>
										<td>										
											<input style='width:50%' type='text' name='block_package' id='block_package' value='{{ $p->block_package}}'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'> </td>
								
										@if ($w->disc != 0)
											<td colspan='4' style="text-align:right">Discount</td>
											<td>{{ $w->disc }}</td>
										@endif
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'> </td>
								
										<td colspan='4' style="text-align:right">Unique Amount</td>
										<td>{{ $w->unique_amount}}</td>
									</tr>
								
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										<td colspan='4' style="text-align:right">Grand Total</td>
										
										<td class="super_grand_total"><strong>{{ $w->total_trans}}</strong></td>
										<input type="hidden" name="sub_grand_total" id='sub_grand_total' value="1499408">
										<input type="hidden" name="super_grand_total_ori" id='super_grand_total_ori' value="1540504">
										<input type="hidden" name="super_grand_total" id='super_grand_total' value="1540504">
										<input type="hidden" name="total_refund" id='total_refund' value="">
										<input type="hidden" name="e_wallet" id='e_wallet' value="0">
										 
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										@if ($w->dp_amount != 0)
											<td colspan='4' style="text-align:right">Down Payment</td>
											<td>{{ $w->dp_amount }}</td>
										@endif																	
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										@if ($w->use_ewallet  != 0)
											<td colspan='4' style="text-align:right">E Wallet Ussage</td>
											<td>{{ $w->use_ewallet  }}</td>
										@endif																	
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										@if ($w->payment_last  != 0)
											<td colspan='4' style="text-align:right">Last Payment</td>
											<td>{{ $w->payment_last  }}</td>
										@endif																	
									</tr>
									<tr>
										<td colspan='2' style="text-align:right"></td>
										<td colspan='2'></td>
										@if ($w->total_outstanding >= 0)
											<td class="remarks_kurang" colspan='4' style="text-align:right">Total Outstanding</td>
											<td class="total_kurang"><span id='total_outstandings'><strong>{{ $p->total_outstanding }}</strong></span></td>
										@elseif ($w->refund_amount != '')
											<td class="remarks_kurang" colspan='4' style="text-align:right">Total Refund</td>
											<td class="total_kurang"><span id='total_outstandings'><strong>{{ $p->refund_amount }}</strong></span></td>
										@endif
									</tr>
								
							<td colspan='2' style="text-align:right">Note</td>
							<td colspan='7' rowspan='2'><textarea  name="remarks" id="remarks"  cols="50" rows="4" class="form-control"></textarea></td>										
							<tr>
							@if ($w->status == 99 || $w->addendum_fee != '')
								@if ($w->addendum_fee != '')
									<td>Ada Addendum Fee</td>
									<td>{{ $w->addendum_fee }}</td>
								@endif
								@if ($p->addendum_note != '')
									<td>Ada Addendum Notes</td>
									<td>{{ $w->addendum_note }}</td>
								@endif
							@endif
							</tr>
										
									<tr>
										<td colspan='10'></td>
									</tr>
									<tr>
										<td colspan='10'><strong>General Information</strong></td>
									</tr>
									<tr>
										<td colspan='2'>Customer Name</td>
										<td colspan='8'>{{ $w->receiver_name }}</td>
									</tr>
										<tr>
										<td colspan='2'>Email</td>
										<td colspan='8'>{{ $w->msCustomer?->email }}</td>
									</tr>
								
									<tr>
										<td colspan='2'>Delivery Address</td>
										<td colspan='8'>{{ $w->receiver_address }}</td>
									</tr>
									<tr>
										<td colspan='2'>Delivery Service</td>
										<td colspan='8'>{{ $w->courier_name }} {{ $w->ongkir_type }}</td>
									</tr>
																			<tr>
										<td colspan='2'>Handphone 1</td>
										<td colspan='8'>{{ $w->receiver_hp1 }}</td>
									</tr>
									<tr>
										<td colspan='2'>Handphone 2</td>
										<td colspan='8'>{{ $w->receiver_hp2 }}</td>
									</tr>
									
									@if ($w->status == '07')
										<tr>
											<td colspan='2'>No Resi</td>
											<td colspan='8'>{{ $p->no_resi }}</td>
										</tr>
									@elseif ($w->status == '06')
										<tr>
											<td colspan='2'>No Resi</td>
											<td colspan='8'>
												<input style='width:50%' type='text' name='no_resi' id='no_resi' value='{{ $p->no_resi }}'>
											</td>
										</tr>
									@endif
									<tr>
										<td colspan='2'>Approved Date</td>
										<td colspan='8'>{{ $w->trans_date }}</td>
									</tr>
										<tr>
										<td colspan='2'>Status</td>
										<td colspan='8'>{{ $w->status }}</td>
									</tr>
									<tr>
										<td colspan='2'>Note From Customer</td>
										<td colspan='8'>{{ $w->notes }}</td>
									</tr>
									@if ($is_drpshipper == 1)
										<tr>
											<td>Dropshipper Name</td>
											<td>{{ $w->dropshipper_name }}</td>
										</tr>
										<tr>
											<td>Dropshipper Contact</td>
											<td>{{ $w->dropshipper_contact }}</td>
										</tr>
									@endif
									@endforeach
								
								
										</tbody>
								</table>
								
							 </ul>
						</div>
						
											<div class="tab-pane" id="payment">
												<ul class="panel-comments">
								
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Pay Type</th>
											<th>Bank Info</th>
											<!-- <th>Cust.  Acct</th>
											<th>Cust. Bank</th>
											<th>Cust. Acct Name</th>
											<th>Pay Date</th>	 -->
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
											@if ($pay == 'DP/1')
												Down Payment
											@elseif ($pay == 'LP/1')
												Last Payment
											@else
												Unknown
											@endif
										</td>
											<td>{{ $pay->bank?->bank_name }},{{ $pay->bank?->bank_account_no }}</td>
											<!-- <td>3422984418</td>
											<td>BCA</td>
											<td>Ririe Agustina</td>
											<td>27 Feb 2023</td> -->
											<td><a target="_blank" href="#">-</a></td>
											<td style="width:15%">
												@if ($status == '00' || $status == '02' || $status == '05')
													<input style="width:80%" type="text" name='payment_amount' value="{{ $pay->payment_amount }}" >
												@else
													<span>Payment Amount</span>
												@endif
											</td>
											<input type="hidden" value="5f33485b-1876-435c-b520-ed29165bd78c" name="PaymentUUID">
											<input type="hidden" value="PAY/EX23020183/DP/1" name="payment_id">
											<td>
												@if ($pay->status == '00')
													Pending Verification
												@elseif ($pay->status == '01')
													Verified
												@elseif ($pay->status == '02')
													Not Valid
												@endif
											</td>
												</select>
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
																							
														<tr >
															<td valign='top'>1</td>
															<td>27 Feb 2023 15:55:34</td>
															<td>Admin</td>
															<td>Admin Verify Payment ID : PAY/EX23020183/DP/1</td>
															
															
														</tr>
																												
														<tr >
															<td valign='top'>2</td>
															<td>27 Feb 2023 10:40:35</td>
															<td>Customer</td>
															<td>Customer Submit Payment Confirmation : PAY/EX23020183/DP/1</td>
															
															
														</tr>
																												
														<tr >
															<td valign='top'>3</td>
															<td>27 Feb 2023 10:36:43</td>
															<td>Riri Agustina</td>
															<td>Customer Submit Pre Order Transaction with PO ID : EX23020183</td>
															
															
														</tr>
																							</tbody>
								</table>
								
							 </ul>
						</div>
												
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
											<input type="hidden" value="" id="type">
											@if ($payment->status == '00')
												<button class="btn-primary btn" value='verify_payment' id="verify_payment" name='tombol'>Verify Payment & Invalid Payment</button>
											@elseif ($payment->status == '01' || $status == '04')
												<button class="btn-primary btn" value='reload_invoice' id="reload_invoice" name='tombol'>Reload Invoice</button>
											@elseif ($payment->status == '02' && $e_wallet_amount != $total_trans)
												<button class="btn-primary btn" value='update_payment' id="update_payment" name='tombol'>Update Payment</button>
											@elseif ($payment->status == '03')
												<button class="btn-primary btn" value='process_order' id="process_order" name='tombol'>Process Order</button>
											@elseif ($payment->status == '05')
												<button class="btn-primary btn" value='verify_last_payment' id="verify_last_payment" name='tombol'>Verify Last Payment & Invalid Last Payment</button>
											@elseif ($payment->status == '06')
												<button class="btn-primary btn" value='update_no_resi' id="update_no_resi" name='tombol'>Update No. Resi</button>
											@elseif ($payment->status == '08')
												<button class="btn-primary btn" value='verify_payment' id="verify_payment" name='tombol'>Verify Payment</button>
											@else
												<button class="btn-primary btn" value='back' id="back" name='tombol'>Back</button>
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
								<input type='hidden' name='po_id'  value='EX23020183'>
								<input type='hidden' name='customer_name'  value='Riri Agustina'>
								<input type='hidden' name='delivery_address'  value='Banua Anyar Permai No.57 Komplek Banua Anyar Permai , Jalan Banua Anyar Permai No.57, RT.3/RW.1 , Banua Anyar, Banjarmasin Timur Banjarmasin Timur - Kota Banjarmasin - Kalimantan Selatan - 70239 , Banjarmasin Timur  , Banjarmasin, Kalimantan Selatan'>
								<input type='hidden' name='jenis_proses' id='tombol' value=''>
								<input type='hidden' name='BatchUUID' id='BatchUUID' value=''>
								<input type='hidden' name='CustomerUUID' id='CustomerUUID' value='ad578dbf-4627-4f83-94a5-f468f34464cd'>
								<input type='hidden' name='refund_flag' id='refund_flag' value=''>
								<input type='hidden' name='RequestOrderUUID' id='RequestOrderUUID' value='0ec2d39a-b361-4cf6-b24b-ca59341c251c'>
			                </form>
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