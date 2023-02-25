@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12"><h3 ><strong style="color:darkgray ">Process Pre Order</strong></h3>
		</div>
		@if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
	</div>
	{{ Form::open(['url' => route('process_order.store'), 'class' => 'form-horizontal checkout-form', 'id' => 'checkout-form2' ])}}
		<div id="tabs">
  			<ul>
    			<li><a href="#tabs-1">Pre Order</a></li>
    			<li><a href="#tabs-2">Delivery & Summary</a></li>
  			</ul>
    		<div id="tabs-1">
    			<div class="row">
					<div class="col-lg-12">
						<h3>Pre Order </h3>
							<table class="table stat-table number-order-table">
								<tr>
									<td>PO ID</td>
									<td>{{ $requestorder->request_id }}</td>
								</tr> 
								<tr>
									<td>Request Date</td>
									<td>{{ date('d M Y', strtotime($requestorder->created_date)) }}</td>
								</tr> 
								<tr>
									<td valign="top" class="status_pre_order">Status</td>
									<td>
										@switch($requestorder->status)
											@case('00')
												Pending Admin Verification
												@break
											@case('01')
												Pending Your Approval
												@break
											@case('02')
												Processed
												@break
											@case('03')
												Rejected
												@break
											@default
												Unknown Status
										@endswitch
									</td>
								</tr>
							</table>
							<h3>Pre Order Details</h3>
							<div id="checkout-form" class="checkout-form">
								<div class="table-responsive table-small-gap">
									<table width="100%" id="pre-order-cart" class="table table-bordered" border="0" cellpadding="3">
										<tr style="background:#eee;font-weight:bold">
											<th>Qty</th>
											<th>Link</th>
											<th>Product Name</th>
											<th>Color</th>
											<th>Info</th>
											<th>Size / Weight</th>
											<th>Approved
												<label><input class="check-all" type="checkbox" onclick="$('input[name*=\'approved\']').prop('checked', this.checked);"></label>
											</th>
											<th>Price (IDR)</th>
											<th>Subtotal</th>
										</tr>
										@foreach($preorders as $p)
  <tr>
    <td align="center">
      <input type="number" name="qty" class="po_qty" value="{{ $p->qty }}" min="0" class="quantity" data-price="{{ $p->price_customer }}" data-id="{{ $p->id }}">
    </td>
    <td><a href="{{ $p->product_url }}" target="_blank">Link</a></td>
    <td class="product-name"><p class="product-name" style="margin: 0;">{{ $p->product_name }}</p><br></td>
    <td><p class="product-name" style="margin: 0;">{{ $p->color }}</p></td>
    <td>
      <p class="product-name" style="margin: 0;">
        @switch($p->status)
          @case('00')
            Pending Admin Verification
            @break
          @case('01')
            Pending Your Approval
            @break
          @case('02')
            Processed
            @break
          @case('03')
            Rejected
            @break
          @default
            Unknown Status
        @endswitch
      </p>
    </td>
    <td align="center">{{ $p->size }}</td>
    <td align="center"><input type="checkbox" name="approved" value="{{$p->id}}" class="po_approved"></td>
    <td align="right">{{ $p->price_customer }}</td>
    <td align="right" class="subtotal" id="total{{$p->id}}">{{ $p->qty * $p->price_customer }}</td>
  </tr>
  <tr class="cart_total_price">
  <td align="left" colspan="4" style="border-top:1px solid #ddd"></td>
  <td colspan="4" align="right" style="font-weight:bold;border-top:1px solid #ddd"><strong>Total</strong></td>
  <td align="right" style="border-top:1px solid #ddd"><span id="grand_total"></span></td>
</tr>
@endforeach			
									</table>
									<strong>Note : {{ $requestorder->note }} </strong>
								</div>
							</div><p>&nbsp;</p>
							<p><a href="javascript:history.go(-1)" class="link_kembali"><i class="fa fa-angle-left fa-3"></i>Back</a>
						</div>
					</div>
  				</div>
  				<div id="tabs-2">
    				<div class="row"><div class="col-lg-12">
						<div id="dropshipper">
							<div class="row">
								<div class="col-sm-6">
									<div id="billing_customer" class="dropsipper-content">
										<h4>Receiver Data</h4>
										<fieldset>
											<div class="form-group">
												<div class="col-sm-4 col-md-3 text-right">Full Name:</div>
												<div class="col-sm-8 col-md-8">
													<input type="text" name='receiver_name' value="{{ $costumer->customer_name }}" >
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-4 col-md-3 text-right">Address*:</div>
												<div class="col-sm-8 col-md-8"><input name='receiver_address' type="textarea" value="{{ $costumer->address }}" ></div>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-4">
													<input type="text" name='address2' value="" >
												</div>
											</div>	
											<div class="form-group">
												<div class="col-sm-4 col-md-3 text-right">Province:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="receiver_province" id="provinsi" class="form-control"   = "" >
															<option value="">-Select Province-</option>
															<option  value="1">Bali</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">City*:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="receiver_city" class="form-control" id="city"   = "" >
															<option value="">-Select City-</option>
															<option  value="23">Bandung</option>													
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Kecamatan *:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="receiver_kecamatan" class="form-control" id="kecamatan"   = "" >	
															<option value="">-Select Kecamatan-</option>
															<option  value="23">Cilawu</option>				
														</select>
													</div>
												</div>		
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Courier :</div>
													<div class="col-sm-8 col-md-8">
														<select required name="ongkir_type" id="courier_type" class="form-control"   >									 
															<option value="jne">JNE</option>
														</select>
													</div>
												</div>		
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Delivery Fee :</div>
													<div class="col-sm-8 col-md-8">
														<select required name="paket_kirim" id="paket_kirim" class="form-control"   >
															<option value="1">--Select City First--</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">ZIP Code:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name='kode_pos' value="123" >
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Handphone 1*:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name='receiver_hp1' value="{{ $costumer->handphone }}" >
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Handphone 2:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name='receiver_hp2' value="{{ $costumer->handphone2  }}" >
													</div>
												</div>
											</fieldset>
										</div>
										<div id="receiver_customer" class="dropsipper-content mfp-hide">		
											<h4>Receiver Data</h4>
											<fieldset>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Full Name*:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name="fullname_dropship" id="fullname_dropship" class="elem_attr_req" >
													</div>
												</div>
												<div class="form-group"><div class="col-sm-4 col-md-3 text-right">Address*:</div>
												<div class="col-sm-8 col-md-8"><input type="text" name="address_dropship" id="address_dropship" class="elem_attr_req" ></div>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-4">
													<input type="text" name="address2_dropship">
												</div>
											</div>				
											<div class="form-group"><div class="col-sm-4 col-md-3 text-right">Province*:</div>
											<div class="col-sm-8 col-md-8">
												<select  name="provinsi_dropship" id="provinsi_dropship" class="form-control"   = "" >
													<option value="">-Select Province-</option>
													<option value="1">Bali</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4 col-md-3 text-right">City*:</div>
												<div class="col-sm-8 col-md-8">
													<select  name="city_dropship" id="city_dropship" class="form-control"   = "" >
															<option value="">-Select City-</option>								
								 					</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-4 col-md-3 text-right">Kecamatan*:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="kecamatan_dropship" id="kecamatan_dropship" class="form-control"   = "" >
															<option value="">-Select Kecamatan-</option>								
								 						</select>
													</div>
												</div>					
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Courier :</div>
													<div class="col-sm-8 col-md-8">
														<select required name="courier_type_dropship" id="courier_type_dropship" class="form-control"   >												 
															<option value="jne">JNE</option>
														</select>
													</div>
												</div>				
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Delivery Fee *:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="paket_kirim_dropship" id="paket_kirim_dropship" class="form-control"   = "" >
															<option value="">-Select Delivery Package-</option>							
								 						</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">ZIP Code:</div>
														<div class="col-sm-8 col-md-8">
															<input type="text" name="kode_pos_dropship">
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4 col-md-3 text-right">Handphone 1*:</div>
														<div class="col-sm-8 col-md-8">
															<input type="text" name="hp1_dropship" id="hp1_dropship" class="elem_attr_req" >
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4 col-md-3 text-right">Handphone 2:</div>
														<div class="col-sm-8 col-md-8"><input type="text" name="hp2_dropship"></div>
													</div>
												</fieldset>
											</div>
											<div class="block-dropship">Dropship
												<input type="checkbox" name="use_dropship" id="use_dropship" value="1"></div>
											</div>
											<div class="col-sm-6">
												<div id="dropship_customer" class="dropsipper-content mfp-hide">
													<h4>Dropship</h4>
													<fieldset>
														<div class="form-group"><div class="ol-sm-4 col-md-3 text-right">Name/Store*:</div>
														<div class="col-sm-8 col-md-8">
															<input type="text" name="dropshipper_name" id="dropshipper_name" class="elem_attr_req" >
														</div>
														</div>
														<div class="form-group">
															<div class="col-sm-4 col-md-3 text-right">Shipper Telephone*:</div>
															<div class="col-sm-8 col-md-8">
																<input type="text" name="dropshipper_contact" id="dropshipper_contact" class="elem_attr_req" >
															</div>
														</div>
													</fieldset>
												</div>
											</div>
											<div class="col-sm-6">
												<div id="transaction_summary" class="">
													<h4>Transaction Summary</h4>
													<fieldset> 
														<div class="form-group"><div class="ol-sm-4 col-md-3 text-right">Subtotal</div>
														<div class="col-sm-8 col-md-8">
															<span id='subtotal'>1,910,320 </span>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4 col-md-3 text-right">Delivery Fee</div>
														<div class="col-sm-8 col-md-8">
															<span id='delivery_fee_summary'> 0</span> &nbsp;<span id="delivery_fee_desc"></span>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4 col-md-3 text-right">Insurance</div>
														<div class="col-sm-8 col-md-8">
															<span id='insurance'>0 </span>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4 col-md-3 text-right">Block Packing</div>
															<div class="col-sm-8 col-md-8"> 
																<span id='packing_summary'> 0</span>
															</div>
														</div>			
														<div class="form-group">
															<div class="col-sm-4 col-md-3 text-right">Discount/Promo</div>
															<div class="col-sm-8 col-md-8">
																<span id='discount_promo_summary'>0</span>
															</div>
														</div>	
														<div class="form-group">
															<div class="col-sm-4 col-md-3 text-right"><strong>Grand Total</strong></div>
															<div class="col-sm-8 col-md-8">
																<span id='grand_total_summary'><strong> 1,910,320</strong></span>
															</div>
														</div>					
														<div class="form-group">
															<div class="col-sm-4 col-md-3 text-right">E-Wallet</div>
															<div class="col-sm-8 col-md-8">
																<span id='e_wallet_summary'>0 </span>		
															</div>
														</div>		
														<div class="form-group" style="display:none" id='div_outstanding'>
															<div class="col-sm-4 col-md-3 text-right"><strong>Outstanding</strong></div>
																<div class="col-sm-8 col-md-8">
																	<span id='total_outstanding'><strong>1,910,320</strong></span>
																</div>
															</div>						
													</fieldset>
												</div>
											</div>
										</div>
										<p>Field with asterisk (*) are required</p>
									</div>	
								</div>
								<div class="row">
									<div class="col-sm-6 col-md-4"><h4>Shipping Detail</h4>
										<img id="loader" class="mfp-hidex" src="https://www.myhouseofmakeup.co/images/ajax-loader.gif" alt="loader" style="display:none">
										<div id="form-ongkir" class="hide_divx"></div>	<!-- /#form-ongkir --><strong>Total Weight</strong>: Asumption 1 Kg
										<br/><br/>
									</div>
									<div class="col-sm-6 col-md-4"><h4>Additional</h4>
										<table class="addditional-cart"><tr class="cart_total_price"><td class="use_insurance_container text-right"><span>Insurance</span>
											<label>
												<input type="checkbox" name="isurance" id="use_insurance" value="1" ><span class="checkbox-material"><span class="check"></span></span>
											</label></td><td></td><td id="use_insurance_container" class="insurance"><span id="insurance_pricessssssssss"></span></td></tr><tr class="cart_total_price"><td class="use_packing_container text-right"><span>Block Packing</span>
											<label>
												<input type="checkbox" name="use_packing" id="use_packing" value="1"  disabled="">
												<span class="checkbox-material"><span class="check"></span></span>
											</label></td><td> </td><td id="use_packing_container" class="packing"><span id="packing_pricesssssssssssssss"></span></td></tr>
											<tr class="cart_total_price">
												<td class="use_insurance_container text-right"><span>Use E-Wallet</span>
												<label>
													<input type="checkbox" readonly name="use_ewallet" id="use_ewallet" value="1" ><span class="checkbox-material"><span class="check"></span></span>
												</label></td><td></td><td id="use_ewallet" class="insurance"><span id="ewallet_value_span"></span></td>
											</tr>
										</table>
									</div>	</div>	<h4>Notes</h4>
<textarea cols="50" rows="5" name="note" class="form-control" id="note" /></textarea><br />
<input type="checkbox" name="i_agree" id="i_agree" value="1" > I agree to the <a href='https://psbyhom.com/term_condition.html'>Terms and Conditions</a>
<br>
<br>
<br>
<p><a class="link_kembali" href="{{ route('home') }}"><i class="fa fa-angle-left fa-3"></i>Back</a>
<button class="btn btn-default more" onclick="myFunction()">Submit</button>
<!-- <input class="btn btn-default more" type="button" id='submit_po' value="Submit Pre Order""></p> -->

{{ Form::close() }}	
	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>


  </div>
  
	
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Hitung total subtotal dan tampilkan
  var subtotal = 0;
  $('.subtotal').each(function() {
    subtotal += parseInt($(this).text());
  });
  $('#grand_total').text(subtotal);
});

$(document).on('input', '.po_qty', function() {
  // Hitung ulang subtotal dan total keseluruhan saat input diubah
  var qty = $(this).val();
  var price = $(this).data('price');
  var total = qty * price;
  var id = $(this).data('id');
  $('#total' + id).text(total);

  var subtotal = 0;
  $('.subtotal').each(function() {
    subtotal += parseInt($(this).text());
  });
  $('#grand_total').text(subtotal);
});
</script>