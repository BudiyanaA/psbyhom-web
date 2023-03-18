@extends('layouts.costumerapp')
@section('content')

<!-- TODO: refactor -->
   <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
    <!-- Page Content -->
	
  <div class="container" id="content">
  
	<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12"><h3  ><strong style="color:darkgray ">View Pre Order</strong></h3><br>
	</div>
	</div>
	<form id="checkout-form2" method="POST" action="#" class="form-horizontal checkout-form">

		<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Pre Order</a></li>
    <li><a href="#tabs-2">Delivery Information</a></li>

  </ul>
    <div id="tabs-1">
    <div class="row">

		
	<div class="col-lg-12">
<h3>Pre Order </h3>
<table class="table stat-table number-order-table">
<tr>
	<td>PO ID</td>
	<td><?php echo $view_po->po_id ?></td>
</tr> 

<tr>
	<td>Trans Date</td><td>{{ formatDate($view_po->trans_date) }}</td>
</tr> 
<tr>
	<td valign="top" class="status_pre_order">Status</td>
	<td>{{ $view_po->msStatus?->status_name }}</td>
</tr>
<?php if($view_po->status_po == '07')
{

?>

<tr>
	<td>No Resi</td>
	<td><?php echo $view_po->no_resi ?></td>
</tr>
<?php
}
?>
</table>

<h3>Pre Order Details</h3>
<input type="hidden" name="RequestOrderUUID" value="<?php echo $view_po->RequestOrderUUID ?>">
<input type="hidden" name="orderno" value="WX19030396">
<input type="hidden" name="member_uid" value="shandy.kingstone@gmail.com">
<input type="hidden" name="biaya_ongkir" value="">
<input type="hidden" name="temp_biaya_ongkir" value="">
<input type="hidden" name="biaya_packing" value="">
<input type="hidden" name="status" value="2">
<input type="hidden" name="cfg_po_tax[]" id="cfg_po_tax" value="<?php echo $view_po->factor ?>">
<input type="hidden" name="cfg_kursusdidr[]" id="cfg_kursusdidr" value="<?php echo $view_po->forex ?>">
<input type="hidden" name="step1" id="step1" value="1">
<div id="checkout-form" class="checkout-form">
<div class="table-responsive table-small-gap">
	<table width="100%" id="pre-order-cart" class="table table-bordered" border="0" cellpadding="3">
		<tr style="background:#eee;font-weight:bold">
			<th>Qty</th>
			<th>Link</th>
			<th width="20%">Product Name</th>
			<th width="10%">Color</th>
			<th width="10%">Info</th>
			<th>Size / Weight</th>
			
	<th>Price (IDR)</th>
	<th>Amount</th></tr>
<?php
$subtotal = 0;
foreach($view_po_dtl as $row)
{
	$subtotal = $subtotal + $row->subtotal_final;
?>	

<tr id="<?php echo $view_po->request_id  ?>-<?php echo $row->RequestOrderDtlUUID ?>" data-id="170302e1-22d8-447c-9feb-f4dae56274df" class="data-content">
	<td align="center">
	<?php echo $row->incoming_qty ?>
	<input type="hidden" name="qty_update<?php echo $row->RequestOrderDtlUUID ?>" class="qty_update" value="<?php echo $row->incoming_qty ?>">
	<input type="hidden" name="product_id" class="product_id" value="<?php echo $row->RequestOrderDtlUUID ?>">
	<input type="hidden" name="price[<?php echo $row->RequestOrderDtlUUID ?>]" class="price" value="<?php

	if($row->status_item != '02')
	{
		echo $row->price_customer; 
	}
	else
	{
		echo "0";
	}
	?>
	">
	<input type="hidden" name="priceidrplus[<?php echo $row->RequestOrderDtlUUID ?>]" class="priceidrplus" value="<?php echo $row->additional_fee ?>">
	<input type="hidden" name="disc_percentage[<?php echo $row->RequestOrderDtlUUID ?>]" class="disc_percentage" value="<?php echo $row->disc_percentage ?>">
	</td>
	<td><a href="{{ $row->requestOrderDtl?->product_url }}" target="_blank">Link</a></td>
	<td class="product-name"><p class="product-name" style="margin: 0;">{{ $row->requestOrderDtl?->product_name }}</p><br><?php 
	if($row->keterangan != '')
	{
		echo "<p style='font-size:smaller'><i>Keterangan: ".$row->keterangan."</i></p>";
	
	?>
	
	<?php
	}
	?>
	</td>
	<td><p class="product-name" style="margin: 0;">{{ $row->requestOrderDtl?->color  }}</p></td>
	<td><p class="product-name" style="margin: 0;">{{ $row->requestOrderDtl?->remarks }}</p></td>
	<td align="center">{{ $row->requestOrderDtl?->size }}</td>
	
	<td style="text-align:right"><?php echo number_format($row->price) ?></td>
	<td style="text-align:right"><?php echo number_format($row->subtotal) ?></td>
</tr>
<?php
}
?>

	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right" style="font-weight:bold;border-top:1px solid #ddd">Subtotal</td>
		<td align="right" style="border-top:1px solid #ddd">
			<input type="hidden" name="total_amount" id="total_amount" value="1174784">
			<input type="hidden" name="temp_total_amount" id="temp_total_amount" value="1174784">
			<span id="amounts"><?php echo number_format($view_po->subtotal) ?></span>
		</td>

	</tr>
	
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Additional Shipping Fee</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->additional_shipping_fee) ?> </span>
		</td>

	</tr>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Delivery Fee (<?php echo $view_po->ongkir_type ?>)</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->ongkir) ?> </span>
		</td>

	</tr>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Insurance</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->insurance) ?></span>
		</td>

	</tr>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Block Package</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->block_package) ?></span>
		</td>

	</tr>
		<?php if($view_po->disc >0)
		{
		?>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Discount</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->disc) ?></span>
		</td>

	</tr>
	<?php
	}
	
		if($view_po->unique_amount >0)
		{
	?>

	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Unique Amount</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->unique_amount) ?></span>
		</td>

	</tr>
	<?php
		}
	?>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right"><strong>Grand Total</strong></td>
		<td align="right">

			<span id="amounts"><strong><?php echo number_format($view_po->total_trans) ?></strong></span>
		</td>

	</tr>
		<?php if($view_po->dp_amount >0)
		{
		?>
	<tr>

		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Down Payment</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->dp_amount) ?></strong></span>
		</td>

	</tr>
	<?php
		}
		
	if($view_po->e_wallet_amount >0)
	{
		?>
	<tr>

		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">E-Wallet Usage</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->e_wallet_amount) ?></span>
		</td>

	</tr>
	<?php
	}
	
	?>
	<?php if($view_po->payment_last >0)
	{
		?>
	<tr>

		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right">Last Payment</td>
		<td align="right">

			<span id="amounts"><?php echo number_format($view_po->payment_last) ?></span>
		</td>

	</tr>
	<?php
	}
	
	if($view_po->total_outstanding  != 0 && $view_po->refund_flag != '11')
	{
	?>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right"><strong>Outstanding</strong></td>
		<td align="right">

			<span id="amounts"><strong><?php echo number_format($view_po->total_outstanding) ?></strong></span>
		</td>

	</tr>
	<?php
	}
	
	
	if($view_po->refund_amount  > 0 && $view_po->refund_flag == '11')
	{
	?>
	<tr>
		<td align="left" colspan="4">
		
		</td>
		<td colspan="3" align="right"><strong>Refund Amount</strong></td>
		<td align="right">

			<span id="amounts"><strong><?php echo number_format($view_po->refund_amount) ?></strong></span>
		</td>

	</tr>
	<?php
	}
	?>
	</table>
</div></div><p>&nbsp;</p>
<p><a href="javascript:history.go(-1)" class="link_kembali"><i class="fa fa-angle-left fa-3"></i>Back</a>


	</div>
</div>
  </div>
  <div id="tabs-2">
    <div class="row"><div class="col-lg-12">

<input type="hidden" name="orderno" value="WX19030396">
<input type="hidden" name="status" value="2"><div class="block-dropshipper">
	<div id="dropshipper">
		<div class="row">
			<div class="col-sm-6">
			<div id="billing_customer" class="dropsipper-content">
				<h4>Receiver Data</h4>
		<fieldset>
		<div class="form-group">
		<div class="col-sm-4 col-md-3 text-right">Full Name:</div>
		<div class="col-sm-8 col-md-8">
		<input type="text" name='fullname' value="<?php echo $view_po->receiver_name ?>" readonly></div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-md-3 text-right">Address*:</div>
			<div class="col-sm-8 col-md-8"><input name='address' type="text" value="<?php echo $view_po->receiver_address ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-4">
				<input type="text" value="" readonly></div>
			</div>
		
	
			
			
		
			</div>
			<div class="form-group">
			<div class="col-sm-4 col-md-3 text-right">ZIP Code:</div>
			<div class="col-sm-8 col-md-8">
				<input type="text" name='kode_pos' value="<?php echo $view_po->receiver_kodepos ?>" readonly></div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-md-3 text-right">Handphone 1*:</div>
			<div class="col-sm-8 col-md-8">
				<input type="text" name='hp1' value="<?php echo $view_po->receiver_hp1 ?>" readonly></div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-md-3 text-right">Handphone 2:</div>
			<div class="col-sm-8 col-md-8">
			<input type="text" name='hp2' value="<?php echo $view_po->receiver_hp2 ?>" readonly></div>
			</div>
			
			<?php
			if($view_po->is_dropshipper == '1')
			{
				
		
			?>
			<div class="form-group">
				<div class="col-sm-4 col-md-3 text-right">Dropshipper Name:</div>
			<div class="col-sm-8 col-md-8">
				<input type="text" name='hp1' value="<?php echo $view_po->dropshipper_name ?>" readonly></div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-md-3 text-right">Dropshipper Contact:</div>
			<div class="col-sm-8 col-md-8">
			<input type="text" name='hp2' value="<?php echo $view_po->dropshipper_contact ?>" readonly></div>
			</div>
			<?php
			}
			?>
			
			</fieldset>
			</div>

			<div id="receiver_customer" class="dropsipper-content mfp-hide">
			
			
			
			<h4>Receiver Data</h4>
			<fieldset>
				<div class="form-group">
				<div class="col-sm-4 col-md-3 text-right">Full Name*:</div>
				<div class="col-sm-8 col-md-8">
					<input type="text" name="fullname_dropship" class="elem_attr_req" >
				</div>
				</div>
				<div class="form-group"><div class="col-sm-4 col-md-3 text-right">Address*:</div>
				<div class="col-sm-8 col-md-8"><input type="text" name="address_dropship" class="elem_attr_req" ></div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-4">
						<input type="text" name="address2_dropship"></div>
				</div>
				
					<div class="form-group"><div class="col-sm-4 col-md-3 text-right">Province*:</div>
					<div class="col-sm-8 col-md-8">
					<select  name="provinsi_dropship" id="provinsi_dropship" class="form-control"   = "" >
											<option value="">-Select Province-</option>
										</select>
					</div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">City*:</div>
					<div class="col-sm-8 col-md-8">
								<select  name="city_dropship" id="city_dropship" class="form-control"   = "" >
											<option value="">-Select Province First-</option>
								
								 		</select>
					</div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Kecamatan*:</div>
					<div class="col-sm-8 col-md-8">
								<select  name="kecamatan_dropship" id="kecamatan_dropship" class="form-control"   = "" >
											<option value="">-Select City First-</option>
								
								 		</select>
					</div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Delivery Fee *:</div>
					<div class="col-sm-8 col-md-8">
								<select  name="paket_kirim_dropship" id="paket_kirim_dropship" class="form-control"   = "" >
											<option value="">-Select Kecamatan First-</option>
								
								 		</select>
					</div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">ZIP Code:</div>
					<div class="col-sm-8 col-md-8">
						<input type="text" name="kode_pos_dropship"></div></div>
					<div class="form-group">
						<div class="col-sm-4 col-md-3 text-right">Handphone 1*:</div>
					<div class="col-sm-8 col-md-8">
					<input type="text" name="hp1_dropship" class="elem_attr_req" ></div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Handphone 2:</div>
					<div class="col-sm-8 col-md-8"><input type="text" name="hp2_dropship">
					</div></div></fieldset></div>
						<div id="transaction_summary" class=" mfp-hide">
						<h4>Transaction Summary</h4>
						<fieldset> 
					<div class="form-group"><div class="ol-sm-4 col-md-3 text-right">Subtotal</div>
					<div class="col-sm-8 col-md-8">
					<span id='subtotal_summaryss'><?php echo number_format($view_po->subtotal_po) ?> </span></div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Delivery Fee</div>
					<div class="col-sm-8 col-md-8">
						<span id='delivery_fee_summary'> <?php echo number_format($view_po->ongkir) ?> (<?php echo $view_po->ongkir_type ?>)</span> &nbsp;<span id="delivery_fee_desc"></span></div>
						<input type="hidden" name='delivery_fee_id_summary' id='delivery_fee_id_summary' value='0'>
						<input type="hidden" name='delivery_fee_description' id='delivery_fee_description' value=''>
						</div>
						<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Insurance</div>
					<div class="col-sm-8 col-md-8">
						<span id='insurance_summarysss'><?php echo number_format($view_po->insurance) ?></span></div>
						</div>
					
							<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Additional Shipping Fee</div>
					<div class="col-sm-8 col-md-8">
						<span id='insurance_summarysss'><?php echo number_format($view_po->additional_shipping_fee) ?></span></div>
						</div>
					
						<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Block Packing</div>
					<div class="col-sm-8 col-md-8"> 
						<span id='packing_summaryssss'> <?php echo number_format($view_po->block_package) ?></span></div>
						</div>	
						
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Discount/Promo</div>
					<div class="col-sm-8 col-md-8">
						<span id='discount_promo_summarysss'><?php echo number_format($view_po->disc) ?></span></div>
						</div>	
						
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">E-Wallet</div>
					<div class="col-sm-8 col-md-8">
						<span id='e_wallet_summaryssss'><?php echo number_format($view_po->e_wallet_amount) ?> </span>
			
						</div>
						</div>

	<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Unique Amount</div>
					<div class="col-sm-8 col-md-8">
						<span id='e_wallet_summaryssss'><?php echo number_format($view_po->unique_amount) ?> </span>
			
						</div>
						</div>							
						
							<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right"><strong>Grand Total</strong></div>
					<div class="col-sm-8 col-md-8">
						<span id='grand_total_summaryss'><strong> <?php echo number_format($view_po->total_trans) ?></strong></span></div>
						</div>	
					</fieldset>
					</div>
					</div>
					</div>
					<div class="col-sm-6">
						<div id="dropship_customer" class="dropsipper-content mfp-hide">
						<h4>Dropship</h4>
						<fieldset>
					<div class="form-group"><div class="ol-sm-4 col-md-3 text-right">Name/Store*:</div>
					<div class="col-sm-8 col-md-8">
					<input type="text" name="dropshipper_name" class="elem_attr_req" ></div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-md-3 text-right">Shipper Telephone*:</div>
					<div class="col-sm-8 col-md-8">
						<input type="text" name="dropshipper_contact" class="elem_attr_req" ></div>
						</div>
					</fieldset>
					</div>
					</div>
					<div class="col-sm-6">
					
					</div>
					<p>Field with asterisk (*) are required</p>
					</div>	<!-- /#dropshipper -->
					</div>	<!-- /.block-dropshipper -->
					<!-- /.row --><h4>Notes</h4>
<textarea cols="50" rows="5" name="note" class="form-control" id="note" /><?php echo $view_po->notes ?></textarea><br /><p><a class="link_kembali" href="javascript:history.go(-1)"><i class="fa fa-angle-left fa-3"></i>Back</a>

</p>

</form>	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>


  </div>
  
	
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>

@endsection