@extends('layouts.costumerapp')
@section('content')
<style>
    .link_kembali {
      float: left; /* agar tombol "Back" berada di sisi kiri */
    }

    .next-btn {
      float: right; /* agar tombol "Next" berada di sisi kanan */
    }
  </style>
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
									<input type="hidden" name="request_id" class="qty_update" value="{{ $requestorder->request_id }}">
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
							<input type="hidden" name="RequestOrderUUID" value="{{ $requestorder->RequestOrderUUID }}">
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
												<label><input class="check-all" type="checkbox" onclick="$('input[name*=\'approved\']').prop('checked', this.checked);" checked></label>
											</th>
											<th>Price (IDR)</th>
											<th>Subtotal</th>
										</tr>
										@foreach($preorders as $p)
  <tr>
    <td align="center">
			<input type="hidden" name="qty_ori" id="qty_ori{{$loop->index}}" class="qty_ori" value="{{ $p->qty }}" min="0">
      <input type="number" name="qty[{{ $p->RequestOrderDtlUUID }}]" id="qty{{$loop->index}}" class="po_qty quantity" value="{{ $p->qty }}" min="0" data-index="{{ $loop->index }}" data-price="{{ $p->subtotal_final / $p->qty }}">
    </td>
    <td><a href="{{ $p->product_url }}" target="_blank">Link</a></td>
    <td class="product-name"><p class="product-name" style="margin: 0;">{{ $p->product_name }}</p><br></td>
    <td><p class="product-name" style="margin: 0;">{{ $p->color }}</p></td>
    <td>
      <p class="product-name" style="margin: 0;">
				{{ $p->remarks }}
      </p>
    </td>
    <td align="center">{{ $p->size }}</td>
    <td align="center"><input type="checkbox" name="approved" value="{{$p->id}}" class="po_approved" data-index="{{ $loop->index }}" checked></td>
    <td align="right">{{ $p->subtotal_final / $p->qty }}</td>
    <td align="right" class="subtotal" id="total{{$loop->index}}">{{ $p->subtotal_final }}</td>
  </tr>
	@endforeach			
	<tr class="cart_total_price">
	  <td align="left" colspan="4" style="border-top:1px solid #ddd"></td>
	  <td colspan="4" align="right" style="font-weight:bold;border-top:1px solid #ddd"><strong>Total</strong></td>
	  <td align="right" style="border-top:1px solid #ddd">
			<input type="hidden" name="total_amount" id="total_amount" value="{{ collect($preorders)->sum('subtotal_final') }}">
			<span id="grand_total">{{ collect($preorders)->sum('subtotal_final') }}</span>
		</td>
	</tr>

									</table>
									<strong>Note : {!! $requestorder->note !!} </strong>
								</div>
							</div><p>&nbsp;</p>
							<p><a href="javascript:history.go(-1)" class="link_kembali"><i class="fa fa-angle-left fa-3"></i>Back</a>
							<p><a href="#" class="link_kembali next-btn">Next <i class="fa fa-angle-right fa-3"></i></a>
							<!-- <button class="btn btn-primary next-btn">Next</button> -->
						</div>

						
						<!-- </div><p>&nbsp;</p>
							<p><a href="javascript:history.go(-1)" id="tabs-2" class="link_kembali" ><i class="fa fa-angle-left fa-3"></i>Next</a>
						</div> -->
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
													<input type="text" name='fullname' value="{{ $costumer->customer_name }}" >
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-4 col-md-3 text-right">Address*:</div>
												<div class="col-sm-8 col-md-8"><input name='address' type="textarea" value="{{ $costumer->address }}" ></div>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-4">
													<input type="text" name='address2' value="" >
												</div>
											</div>	
											<div class="form-group">
												<input type="hidden" id="costumer_provinsi" value="{{ $costumer->provinsi }}">
												<input type="hidden" id="costumer_kota" value="{{ $costumer->kota }}">
												<input type="hidden" id="costumer_kecamatan" value="{{ $costumer->kecamatan }}">
												<div class="col-sm-4 col-md-3 text-right">Provinsi:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="province-option" id="province-option" class="form-control">
														</select>
														<input type="hidden" id="nama_propinsi" name="nama_propinsi" value=''>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Kota*:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="city-option" class="form-control" id="city-option">													
														</select>
														<input type="hidden" id="nama_kota" name="nama_kota" value=''>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Kecamatan *:</div>
													<div class="col-sm-8 col-md-8">
														<select  name="subdistrict-option" class="form-control" id="subdistrict-option">				
														</select>
														<input type="hidden" id="nama_kecamatan" name="nama_kecamatan" value=''>
													</div>
												</div>		
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Courier :</div>
													<div class="col-sm-8 col-md-8">
													<select required name="courier_type" id="courier_type" class="form-control"   >									 
															<option value="jne">JNE</option>
														</select>
													<!-- <select required name="courier_type" id="courier_type" class="form-control">
														<option value="">Pilih Kurir</option>
													</select> -->
													</div>
												</div>		
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Delivery Fee :</div>
													<div class="col-sm-8 col-md-8">
														<select required name="paket_kirim" id="paket_kirim" class="form-control"   >
															<option value="">--Pilih Kecamatan Dulu--</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">ZIP Code:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name='kode_pos' value="{{ $costumer->kodepos }}" >
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Handphone 1*:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name='hp1' value="{{ $costumer->handphone }}" >
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4 col-md-3 text-right">Handphone 2:</div>
													<div class="col-sm-8 col-md-8">
														<input type="text" name='hp2' value="{{ $costumer->handphone2  }}" >
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
															<span id='subtotal_summary'>{{ collect($preorders)->sum('subtotal_final') }}</span>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-4 col-md-3 text-right">Delivery Fee</div>
														<div class="col-sm-8 col-md-8">
															<span id='delivery_fee_summary'> 0</span> &nbsp;<span id="delivery_fee_desc"></span>
															<input type="hidden" name='delivery_fee_id_summary' id='delivery_fee_id_summary' value='0'>
															<input type="hidden" name='delivery_fee_description' id='delivery_fee_description' value=''>
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
																<span id='grand_total_summary'><strong>{{ collect($preorders)->sum('subtotal_final') }}</strong></span>
																<input type='hidden' name='grand_total_summary' id='grand_total_summary2' value='0'>
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
																	<span id='total_outstanding'><strong>0</strong></span>
																	<input type='hidden' name='total_outstanding' id='total_outstanding2' value='0'>
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
											</label></td><td></td><td id="use_insurance_container" class="insurance"><input type="hidden" name="insurance_value" id="insurance_value" value="0"><span id="insurance_pricessssssssss"></span></td></tr><tr class="cart_total_price"><td class="use_packing_container text-right"><span>Block Packing</span>
											<label>
												<input type="checkbox" name="use_packing" id="use_packing" value="1" disabled>
												<span class="checkbox-material"><span class="check"></span></span>
											</label></td><td> </td><td id="use_packing_container" class="packing"><input type="hidden" name="result_packing" id="result_packing" value="0"><span id="packing_pricesssssssssssssss"></span></td></tr>
											<tr class="cart_total_price">
												<td class="use_insurance_container text-right"><span>Use E-Wallet</span>
												<label>
													<input type="checkbox" readonly name="use_ewallet" id="use_ewallet" value="1" ><span class="checkbox-material"><span class="check"></span></span>
												</label></td><td></td><td id="use_ewallet" class="insurance"><input type="hidden" name="ewallet_value" id="ewallet_value" value="0"><span id="ewallet_value_span"></span></td>
											</tr>
										</table>
									</div>	</div>	<h4>Notes</h4>
<textarea cols="50" rows="5" name="note" class="form-control" id="note" /></textarea><br />
<input type="checkbox" name="i_agree" id="i_agree" value="1" > I agree to the <a href='https://psbyhom.com/term_condition.html'>Terms and Conditions</a>
<br>
<br>
<br>
<p><a class="link_kembali" href="{{ route('home') }}"><i class="fa fa-angle-left fa-3"></i>Back</a>
<!-- <button class="btn btn-default more" onclick="myFunction()">Submit Pre Order</button> -->
<input class="btn btn-default more" type="button" id='submit_po' value="Submit Pre Order"></p>

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

@section('script')
<script>
$(document).ready(function() {
	$('.po_qty').on('keyup mouseup', function() {
		const qty =  $(this).val();
		const index = $(this).data('index');
		const price = $(this).data('price');
		
		$(`#qty_ori${index}`).val(qty);
		$(`#total${index}`).html(price * qty);
		calculateTotal();

		// var qty =  $(this).val();
		// $(this).closest('tr').find('.qty_ori').val(qty);
		// recalculate();
	});

	$('.po_approved').on('click', function() {
		const checked = $(this);
		const index = $(this).data('index');
		let qty = $(`#qty${index}`).val();
		let qty_ori = $(`#qty_ori${index}`).val();

		if (checked.is(':checked')) {
			$(`#qty${index}`).val(qty_ori);
		} else {
			$(`#qty_ori${index}`).val(qty);
			$(`#qty${index}`).val(0);
		}

		$(`#total${index}`).html($(`#qty${index}`).data('price') * $(`#qty${index}`).val());
		calculateTotal();

		// var checked = $(this);
		// // var qty = $(this).closest('tr').find('input[name="qty[]"]');
		// var qty = $(this).closest('tr').find('.po_qty');
		// var qty_ori = $(this).closest('tr').find('.qty_ori').val();
		// var temp_qty = qty.val();
		
		// if (checked.is(':checked')) 
		// {
		// 	var parent = $(this).parent().next('td').find('.po_subtotal').val();
		// 	qty.val(qty_ori);
		// } else {
		// 	var parent = $(this).parent().next('td').find('.po_subtotal').val();
		// 	temp_qty = qty.val();
		// 	qty.val(0);
		// 	$(this).parent().next('td').find('.qty_ori').val(temp_qty);
		// }
		// recalculate();
	});

	$('.check-all').on('click', function() {
		var checked = $(this);
		$('.po_qty').each(function() {
			var id = $(this);
			const index = $(this).data('index');
			let qty = $(`#qty${index}`).val();
			let qty_ori = $(`#qty_ori${index}`).val();

			if (checked.is(':checked')) {
				id.val(qty_ori);
			} else {
				id.val(0);
			}	

			$(`#total${index}`).html(id.data('price') * id.val());
		})

		calculateTotal();
	})	
});

function calculateTotal() {
  var subtotal = 0;
  $('.subtotal').each(function() {
    subtotal += parseInt($(this).text());
  });
  $('#grand_total').text(subtotal);
	$('#total_amount').val(subtotal);

	$('#subtotal_summary').text(subtotal);
}

	// function recalculate() {
	// 	var is_insurance		= $('#use_insurance');
	// 	var insurance_value		= parseFloat($('#insurance_value').val()).toFixed(2);
	// 	var temp_ongkir 		= $('.po_ongkir').val();
	// 	var delivery_fee 		= $('#delivery_fee_id_summary').val();
	// 	var ongkir 				= parseInt(temp_ongkir);
	// 	var insurance			= $('#insurance');
	// 	var packing				= $('#packing');
	// 	var is_packing			= $('#use_packing');
	// 	var packing_value		= parseFloat($('#result_packing').val()).toFixed(2);
	// 	var total_price 		= 0;
	// 	var subtotal 			= 0;
	// 	var tcfg_po_tax			= parseFloat($('input[name="cfg_po_tax[]"]').val()).toFixed(2);
	// 	var tkursdolar			= parseFloat($('input[name="cfg_kursusdidr[]"]').val());
	// 	var voucher_diskon		= $('#voucher_diskon');
	// 	var tipe_diskon			= $('#tipe_diskon');
	// 	var extended_price		= 0;
	// 	var count_valid			= 0;
	// 	var not_valid			= 0;
	// 	var is_ewallet			= $('#use_ewallet');
	// 	var e_wallet			= $('#customer_ewallet').val(); 
	// 	var disc				= 0 ;
		
	// 	// $('input[name="qty[]"]').each(function() {
	// 	$('.po_qty').each(function() {
	// 		var quantity = $(this).val();
	// 		// var price_idr = $('.po_subtotal').val();
	// 		// var price_idr = $(this).closest('tr').find('.po_subtotal').val();
	// 		// var unit_price = parseInt(price_idr);
				
	// 		var data_id			= $(this).closest('tr').attr('data-id');
	// 		var priceidrplus 	= parseFloat($(this).closest('tr').find('.priceidrplus').val());
	// 		var price 			= $(this).closest('tr').find('.price').val();
	// 		var qty_update 		= $(this).closest('tr').find('.qty_update');
	// 		var pricetotal 		= $(this).closest('tr').find('td:last-child');
	// 		var check_item		= $(this).closest('tr').find('input[name="approved['+data_id+']"]');
	// 		var disc_percentage = parseFloat($(this).closest('tr').find('.disc_percentage').val());
			
	// 		price = price - ((price * disc_percentage) / 100);
	// 		count_valid++;
        
	// 		//if (!check_item.is(':checked')) not_valid++;
	// 		// console.log(check_item.length);
			
	// 		if (quantity == 0) //Validate Quantity
	// 		{
	// 			extended_price = (quantity * price);
	// 			check_item.attr('checked', false);
	// 			not_valid++;
	// 		}
	// 		else if(isNaN(quantity))
	// 		{
	// 		  alert("Qty must be in numeric only !");
	// 		  $(this).val("0");
	// 		  not_valid++;
	// 		}
	// 		else if(/^[a-zA-Z0-9- ]*$/.test(quantity) == false) {
  //       alert('Your search string contains illegal characters.');
  //       $(this).val("0");
	// 			novalid++;
  //     }

	// 		else if(priceidrplus == "0") //Check Additional Fee
	// 		{
	// 			extended_price = (parseInt(quantity) * parseInt(price) * parseInt(tkursdolar));
	// 		}
	// 		else 
	// 		{
	// 			check_item.attr('checked', true);
	// 			// extended_price = (quantity * price * tcfg_po_tax * tkursdolar) + priceidrplus;
	// 			if (quantity == 1) 
	// 			{
	// 				extended_price = (quantity * price * tcfg_po_tax * tkursdolar + priceidrplus);
	// 				// console.log("quantity: 1 => [" + quantity + " * " + price + " * " + tcfg_po_tax + " * " + " * " + tkursdolar + " * " + priceidrplus + "]" + " result: " + extended_price);
	// 			} 
	// 			else 
	// 			{
	// 				extended_price = quantity * (price * tcfg_po_tax * tkursdolar + priceidrplus);
	// 				// console.log("quantity: 2 => " + quantity + " * " + "["+ price + " * " + tcfg_po_tax + " * " + " * " + tkursdolar + " * " + priceidrplus + "]" + " result: " + extended_price);
	// 			}
	// 		}
	// 		// console.log(quantity + ' ' + price + ' ' + tcfg_po_tax + ' ' + tkursdolar + ' ' + priceidrplus);
	// 		// extended_price = (quantity * price * tcfg_po_tax * tkursdolar) + priceidrplus;
	// 		pricetotal.text(format_rupiah(extended_price));
	// 		qty_update.val(quantity);
	// 		//alert(disc_percentage);
	// 		total_price += parseInt(extended_price);
	// 		subtotal += parseInt(extended_price);
	// 	});
			
	// 		// console.log(count_valid+' | '+not_valid);
	// 	if (not_valid < count_valid) {
	// 		$('#is_valid').attr('disabled', false);
	// 	} else {
	// 		$('#is_valid').attr('disabled', true);
	// 	}
			
	// 	$('.subtotal').html('<strong>'+format_rupiah(total_price)+'</strong>');
			
	// 	// Delivery Summary

	// 	// Ongkir
	// 	if (delivery_fee > 0) {
	// 		total_price += parseInt(delivery_fee);
	// 	}

	// 	// Insurance
	// 	if (is_insurance.is(':checked')) {
	// 		insurance_value = (parseInt(subtotal) * 0.002)  + 5000;
	// 		//$('#insurance_price').html(format_rupiah(insurance_value));
	// 		$('#insurance_summary').html(format_rupiah(insurance_value));
	// 		$('#insurance_value').val(insurance_value);
	// 		total_price += parseInt(insurance_value);
	// 	} else {
	// 		insurance.html(0);
	// 		$('#insurance_price').html("0");
	// 		$('#insurance_summary').html("0");
	// 		$('#insurance_value').val("0"); 
	// 	}

	// 	// Packing 
	// 	if (is_packing.is(':checked')) {
	// 		var packing_price = $('#delivery_fee_id_summary').val();
	// 		//$('#packing_price').html(format_rupiah(packing_price));
	// 		$('#result_packing').val(packing_price);
	// 		$('#packing_summary').html(format_rupiah(packing_price));
	// 		//packing.html(accounting.format(packing_value));
	// 		total_price += parseInt(packing_price);
	// 	} else {
	// 		packing.html(0);
	// 		$('#packing_price').html("0");
	// 		$('#result_packing').val("0");
	// 		$('#packing_summary').html("0");
	// 	}
		
	// 	// Disc
	// 	if(disc != '')
	// 	{
	// 		total_price -= parseInt(disc);
	// 	}
			
	// 	if (voucher_diskon.val() != '' && typeof voucher_diskon.val() != 'undefined') {
	// 		if (tipe_diskon.val() == 2) {
	// 			var disc = (total_price * voucher_diskon.val())/ 100;
	// 			total_price = total_price - parseInt(disc);
	// 		} else {
	// 			total_price = total_price - voucher_diskon.val();
	// 		}
	// 	} 
		
	// 	// E-Wallet
	// 	var grand_total = total_price;
	// 	if (is_ewallet.is(':checked')) 
	// 	{
	// 		//alert(total_price);
	// 		if(e_wallet == 0)
	// 		{
	// 			alert("Your E-Wallet value is empty !");
	// 			$('#use_ewallet').prop('checked', false);
	// 		}
	// 		else if(e_wallet >= total_price)
	// 		{
	// 			e_wallet = total_price;
	// 			total_price -= parseInt(e_wallet);
	// 			//$('#insurance_price').html(format_rupiah(insurance_value));
	// 			$('#e_wallet_summary').html('- ' +format_rupiah(e_wallet));
	// 			$('#ewallet_value').val(e_wallet);
	// 			$("#div_outstanding").show();
	// 		}
	// 		else 
	// 		{
	// 			total_price -= parseInt(e_wallet);
	// 			$('#e_wallet_summary').html('- ' +format_rupiah(e_wallet));
	// 			$('#ewallet_value').val(e_wallet);
	// 			$("#div_outstanding").show();
	// 		}
	// 	}
	// 	else {
	// 		$('#e_wallet_summary').html("0");
	// 		$('#ewallet_value').val("0"); 
	// 		$("#div_outstanding").hide();
	// 	} 

	// 	$('#total_amount').val(parseFloat(grand_total).toFixed(2));
	// 	$('#amount').html(format_rupiah(subtotal));
	// 	$('#subtotal_summary').html(format_rupiah(subtotal));
	// 	$('#grand_total_summary').html('<strong>'+ format_rupiah(grand_total) +'</strong>');
	// 	$('#total_outstanding').html('<strong>'+ format_rupiah(total_price) +'</strong>');
	// 	$('#total_outstanding2').val(total_price);
	// }

// $(document).on('input', '.po_qty', function() {
  // // Hitung ulang subtotal dan total keseluruhan saat input diubah
  // var qty = $(this).val();
  // var price = $(this).data('price');
  // var total = qty * price;
  // var id = $(this).data('id');
  // $('#total' + id).text(total);

  // var subtotal = 0;
  // $('.subtotal').each(function() {
  //   subtotal += parseInt($(this).text());
  // });
  // $('#grand_total').text(subtotal);
// });loadCourier
</script>
<script type="text/javascript">
	$(document).ready( function () {
		const costumerProvinsi = $("#costumer_provinsi").val();
		const costumerKota = $("#costumer_kota").val();
		const costumerKecamatan = $("#costumer_kecamatan").val();

    $.ajax({
        url: '/api/rajaongkir/provinces',
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(data)
        {
          if(data.provinces){
            $('#province-option').empty();
            $('#province-option').prop('disabled', false);
            $('#city-option').empty();
            $('#city-option').prop('disabled', true);
            $('#subdistrict-option').empty();
            $('#subdistrict-option').prop('disabled', true);
						$('#paket_kirim').empty();
						$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>'); 

            $('#province-option').append('<option value="" selected disabled>Pilih Provinsi</option>'); 
            $.each(data.provinces, function(key, province){
								let selected = "";
								if (province.province_id == costumerProvinsi) {
									selected = "selected";
									$('#nama_propinsi').val(province.province);
								}
                $('#province-option').append('<option value="'+ province.province_id +'" '+ selected + '>' + province.province+ '</option>');
            });
        }else{
            $('#province-option').empty();
            $('#province-option').prop('disabled', true);
            $('#city-option').empty();
            $('#city-option').prop('disabled', true);
            $('#subdistrict-option').empty();
            $('#subdistrict-option').prop('disabled', true);
						$('#paket_kirim').empty();
						$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>'); 
        }
      }
    });
		loadCity(costumerProvinsi, costumerKota);
		loadSubdistrict(costumerKota, costumerKecamatan);
		loadCosts(costumerKecamatan);

		$('#province-option').on('change', function() {
			loadCity($(this).val(), null);
			$('#nama_propinsi').val($("#province-option option:selected").text() );
    });

		$('#city-option').on('change', function() {
			loadSubdistrict($(this).val(), null);
			$('#nama_kota').val($("#city-option option:selected").text() );
    });

		$('#subdistrict-option').on('change', function() {
			loadCosts($(this).val());
			$('#nama_kecamatan').val($("#subdistrict-option option:selected").text() );
			$('input[name=use_packing]').attr('disabled', true);
			$('input[name=use_packing]').attr('checked', false);
    });

		$('#paket_kirim').on('change', function() {
			let selected_text = $("#paket_kirim option:selected").text();
			selected_text = selected_text.substring(0, selected_text.indexOf("="));

			$('#delivery_fee_summary').html($(this).val());
			$('#delivery_fee_id_summary').val($(this).val());
			$('#delivery_fee_description').val(selected_text);
			$('input[name=use_packing]').attr('disabled', false);
			calculateGrandTotal();
    });

		$('#use_insurance').on('click', function() {
			const subtotal = parseFloat($('#subtotal_summary').text());
			if ($(this).is(':checked')) {
				insurance_value = (parseInt(subtotal) * 0.002)  + 5000;
				$('#insurance').html(insurance_value);
				$('#insurance_value').val(insurance_value);
			} else {
				$('#insurance').html(0);
				$('#insurance_value').val(0);
			}
			calculateGrandTotal(); 
		});

		$('#use_packing').on('click', function() {
			const ongkir = parseFloat($('#delivery_fee_summary').text());
			if ($(this).is(':checked')) {
				$('#packing_summary').html(ongkir);
				$('#result_packing').val(ongkir);
			} else {
				$('#packing_summary').html(0);
				$('#result_packing').val(0);
			}
			calculateGrandTotal(); 
		});	

		$('#use_ewallet').on('click', function() {
			let ewallet = parseInt($('#customer_ewallet').val());
			let total_price = parseInt($('#grand_total_summary').text());
			if ($(this).is(':checked')) 
			{
				if(ewallet == 0)
				{
					alert("Your E-Wallet value is empty !");
					$('#use_ewallet').prop('checked', false);
				}
				else if(ewallet >= total_price)
				{
					ewallet = total_price;
					total_price -= parseInt(ewallet);
					$('#e_wallet_summary').html('- ' + ewallet);
					$('#ewallet_value').val(ewallet);
					$("#div_outstanding").show();
				}
				else 
				{
					total_price -= parseInt(ewallet);
					$('#e_wallet_summary').html('- ' + ewallet);
					$('#ewallet_value').val(ewallet);
					$("#div_outstanding").show();
				}
				$('#total_outstanding').html('<strong>'+ total_price +'</strong>');
				$('#total_outstanding2').val(total_price);
			}
			else {
				$('#e_wallet_summary').html("0");
				$('#ewallet_value').val(0);
				$("#div_outstanding").hide();
			}
			calculateGrandTotal();
		});	

		$('#submit_po').click(function() {
			if(!$('#i_agree').is(':checked') )
			{
				alert("You must agree with our term and conditions first before submit your Pre Orders !");
				return false;
			}
			else
			{
				var r = confirm("Are you sure you want to process this transaction ?");
				if (r == true)
				{
					$("#checkout-form2").submit();
					return true;
				}
				else
				{
					return false;
				}
			}
		});
	});

	function calculateGrandTotal() {
	  const subtotal = parseFloat($('#subtotal_summary').text());
		const ongkir = parseFloat($('#delivery_fee_summary').text());
		const insurance = parseFloat($('#insurance').text());
		const packing = parseFloat($('#packing_summary').text());
		const discount = parseFloat($('#discount_promo_summary').text());
		const ewallet = parseFloat($('#ewallet_value').val());

		const grandTotal = subtotal + ongkir + insurance + packing - discount;
	  $('#grand_total_summary').html(grandTotal);
		$('#grand_total_summary2').val(grandTotal);
		$('#total_outstanding').html('<strong>'+ (grandTotal - ewallet) +'</strong>');
		$('#total_outstanding2').val(grandTotal - ewallet);
	}

	function loadCosts(subdistrictId) {
		if(subdistrictId) {
          $.ajax({
              url: `/api/rajaongkir/costs?subdistrict=${subdistrictId}&courier=jne`,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.costs){
                  $('#paket_kirim').empty();
                  $('#paket_kirim').prop('disabled', false);

                  $('#paket_kirim').append('<option value="" selected disabled>--Pilih Paket Kirim--</option>'); 
                  $.each(data.costs, function(key, cost){
                    $('#paket_kirim').append('<option value="'+ cost.cost[0].value +'">' + cost.service  + ' = ' + cost.cost[0].value + ' / kg</option>');
                  });
              }else{
                  $('#paket_kirim').empty();
                  $('#paket_kirim').prop('disabled', true);
									$('input[name=use_packing]').attr('disabled', true);
									$('input[name=use_packing]').attr('checked', false);
              }
            }
          });
      }else{
				$('#paket_kirim').empty();
        $('#paket_kirim').prop('disabled', true);
				$('input[name=use_packing]').attr('disabled', true);
				$('input[name=use_packing]').attr('checked', false);
      }
	}

	function loadCity(provinceId, cityId) {
			if(provinceId) {
          $.ajax({
              url: '/api/rajaongkir/cities/'+provinceId,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.cities){
                  $('#city-option').empty();
                  $('#city-option').prop('disabled', false);
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', true);
									$('#paket_kirim').empty();
									$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>');
									$('input[name=use_packing]').attr('disabled', true); 
									$('input[name=use_packing]').attr('checked', false);

                  $('#city-option').append('<option value="" selected disabled>Pilih Kota</option>'); 
                  $.each(data.cities, function(key, city){
										let selected = "";
										if (city.city_id == cityId) {
											selected = "selected";
											$('#nama_kota').val(`${city.type} ${city.city_name}`);
										}
                    $('#city-option').append('<option value="'+ city.city_id +'" '+ selected + '>' + city.type + ' ' + city.city_name+ '</option>');
                  });
              }else{
                  $('#city-option').empty();
                  $('#city-option').prop('disabled', true);
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', true);
									$('#paket_kirim').empty();
									$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>');
									$('input[name=use_packing]').attr('disabled', true); 
									$('input[name=use_packing]').attr('checked', false);
              }
            }
          });
      }else{
        $('#city-option').empty();
        $('#city-option').prop('disabled', true);
        $('#subdistrict-option').empty();
        $('#subdistrict-option').prop('disabled', true);
				$('#paket_kirim').empty();
				$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>');
				$('input[name=use_packing]').attr('disabled', true); 
				$('input[name=use_packing]').attr('checked', false);
      }
	}



	function loadSubdistrict(cityId, subdistrictId) {
			if(cityId) {
          $.ajax({
              url: '/api/rajaongkir/subdistricts/'+cityId,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.subdistricts){
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', false);
                  $('#subdistrict-option').append('<option value="" selected disabled>Pilih Kecamatan</option>');
									$('#paket_kirim').empty(); 
									$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>'); 
									$('input[name=use_packing]').attr('disabled', true);
									$('input[name=use_packing]').attr('checked', false);

                  $.each(data.subdistricts, function(key, district){
										let selected = "";
										if (district.subdistrict_id == subdistrictId) {
											selected = "selected";
											$('#nama_kecamatan').val(district.subdistrict_name);
										}
										$('#subdistrict-option').append('<option value="'+ district.subdistrict_id +'" '+ selected + '>' + district.subdistrict_name+ '</option>');
                  });
              }else{
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', true);
									$('#paket_kirim').empty();
									$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>'); 
									$('input[name=use_packing]').attr('disabled', true);
									$('input[name=use_packing]').attr('checked', false);
              }
            }
          });
      }else{
        $('#subdistrict-option').empty();
        $('#subdistrict-option').prop('disabled', true);
				$('#paket_kirim').empty();
				$('#paket_kirim').append('<option value="" selected disabled>--Pilih Kecamatan Dulu--</option>'); 
				$('input[name=use_packing]').attr('disabled', true);
				$('input[name=use_packing]').attr('checked', false);
      }
	}
	
	$(document).ready(function() {
    // Hide the second tab initially
    $('#tabs-2').hide();

    // When the Next button is clicked, switch to the second tab
    $('.next-btn').click(function() {
      $('#tabs-1').hide();
      $('#tabs-2').show();
    });
  });

		

</script>
<!-- <script>
$(document).ready(function() {
  $.ajax({
    url: '/api/rajaongkir/couriers',
    type: 'GET',
    success: function(data) {
      // Mengisi daftar pilihan dengan opsi kurir yang diterima
      var couriers = data.couriers;
      var options = '<option value="">Pilih Kurir</option>';
      for (var i = 0; i < couriers.length; i++) {
        options += '<option value="' + couriers[i] + '">' + couriers[i] + '</option>';
      }
      $('#courier_type').html(options);
    },
    error: function(xhr, status, error) {
      console.error("Error: ", error);
    }
  });
});
</script> -->
@endsection