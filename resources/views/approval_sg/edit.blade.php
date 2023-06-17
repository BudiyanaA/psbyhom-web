@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                 
                <li class="active">View Order</li>
            </ul>

            <h1>View Order Singapore</h1>
			<br>
			<br>
        </div>
<div class="row">
<div class="container">
    <div class="col-xs-12">
		<div class="panel panel-midnightblue">
			<div class="panel-heading">
				  <h4>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#trans" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Order Detail</span></a></li>

			
			</ul>
				  </h4>
			</div>
				<div class="panel-body">
					<div class="tab-content">

					{!! Form::model($order, ['route' => ['preorder_sg.update', $order->RequestOrderUUID], 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
						<div class="tab-pane active" id="trans">
							<ul class="panel-comments">
							<div class="form-group">
										<label class="col-sm-3 control-label">PO ID</label>
										<div class="col-sm-6">
											<input type="text" readonly  placeholder="Required Field"  class="form-control" name='request_id' value='{{ $order->request_id }}'>
										</div>
									</div>
									<div class="form-group">
									<label for="txtarea1" class="col-sm-3 control-label">Transaction Date</label>
									<div class="col-sm-6">
										<input type="text" readonly name="request_date" id="request_date" cols="50" rows="4" class="form-control" value="{{ $order->created_date }}">
									</div>
									</div>	
							<div class="form-group">
										<label for="txtarea1" class="col-sm-3 control-label">Exchange Rate SGD - IDR</label>
										<div class="col-sm-6"><input type="text" readonly  name="ex" id="ex" cols="50" rows="4" class="form-control" value='{{ $order->forex }}'></div>
									 </div>			
				
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>Qty</th>
											<th>URL</th>
											<th >Product Name</th>
											<th>Color</th>							
											<th>Size/Weight</th>
											<th>Price(SGD)</th>
											<th>Info</th>					
											<th>Add. Fee (IDR)</th>
											<th>Disc. (%)</th>
											<th>Subtotal(IDR)</th>						
										</tr>
									</thead>
									<tbody>
									@if(count($requestorder) > 0)
								@foreach($requestorder as $r)
									@if ($order->status == "00")
										<tr>
											<input type="hidden" value="8a25b763-1113-4962-91c8-09e2d48bca9c" name="RequestOrderDtlUUID1">			
											<td style='width:7%'><input type="text"  class="form-control" name='qty[{{ $loop->index }}]' id='qty{{ $loop->index }}'  value='{{ $r->qty }}' onkeyup='calculatePrice("{{ $loop->index }}")' ></td>										
											<td style='width:10%'>
												<input type="text" class="form-control" name='product_url[{{ $loop->index }}]' id='product_url{{ $loop->index }}'  value='{{ $r->product_url }}'>
												<a href='javascript:void(0);' onclick="window.open('{{ $r->product_url }}', '_blank');">LINK</a>
											</td>
											<td style='width:20%'><input type="text" class="form-control" name='product_name[{{ $loop->index }}]' id='product_name{{ $loop->index }}'  value="{{ $r->product_name }}"></td>
											<td style='width:10%'><input type="text" class="form-control" name='color[{{ $loop->index }}]' id='color{{ $loop->index }}'  value="{{ $r->color }}"  ></td>

											<td style='width:5%'><input type="text" class="form-control" name='size[{{ $loop->index }}]' id='size{{ $loop->index }}'  value="{{ $r->size }}"></td>
											<td style='width:5%'>
												<input type="text" class="form-control" name='price_customer[{{ $loop->index }}]' id='price_customer{{ $loop->index }}'  value='{{ $r->price_customer }}'  onkeyup='calculatePrice("{{ $loop->index }}")'  >
											</td>
											<td style='width:10%'><input type="text" class="form-control" name='remarks[{{ $loop->index }}]' id='remarks{{ $loop->index }}'  value='{{ $r->remarks }}'  ></td>
											<td style='width:10%'><input type="text" class="form-control" name='additional_fee[{{ $loop->index }}]' id='additional_fee{{ $loop->index }}'  value='{{ $r->additional_fee != null && $r->additional_fee != "" ? $r->additional_fee  : 0 }}' onkeyup='calculatePrice("{{ $loop->index }}")' ></td>
											<td style='width:10%'><input type="text" class="form-control" name='disc_percentage[{{ $loop->index }}]' id='disc_percentage{{ $loop->index }}'  value='{{ $r->disc_percentage != null && $r->disc_percentage != "" ? $r->disc_percentage  : 0 }}' onkeyup='calculatePrice("{{ $loop->index }}")' ></td>
											<td>
												<input type="hidden" readonly class="form-control" name='subtotal[{{ $loop->index }}]' id='subtotal{{ $loop->index }}' value='{{ $r->subtotal_original ?? 0 }}'>
												<input type="text" readonly class="form-control" name='subtotal_label[{{ $loop->index }}]' id='subtotal_label{{ $loop->index }}' value='{{ number_format($r->subtotal_original ?? 0) }}'>
											</td>																							
										</tr>
									@else
										<tr>
											<input type="hidden" value="8a25b763-1113-4962-91c8-09e2d48bca9c" name="RequestOrderDtlUUID1">			
											<td>{{ $r->qty }}</td>
											<td><a href="{{ $r->product_url }}">LINK</a></td>
											<td>{{ $r->product_name }}</td>
											<td>{{ $r->color }}</td>																										
											<td>{{ $r->size }}</td>
											<td>{{ $r->price_customer }}</td>	
											<td>{{ $r->remarks }}</td>														
											<td>{{ $r->additional_fee ?? 0 }}</td>
											<td>{{ $r->disc_percentage ?? 0 }}</td>						
											<td>{{ number_format($r->subtotal_final ?? 0) }}</td>
											
											<!-- <td>{{ number_format($r->subtotal_original ?? 0) }}</td> -->
										</tr>
									@endif
								@endforeach
							@else
								<tr>
									<td colspan="10">Data not found</td>
								</tr>
							@endif
										<tr>
											<td colspan='9' style='text-align:right'><b>Grand Total</b></td><td class='grand_total'>{{ number_format($order->total_price) }}</td></tr>									<tr>
											<td colspan='2'>Notes From Admin</td>
											<td colspan='8'>
												@if ($order->status == "00")<textarea name="note" id="note"  cols="50" rows="4" class="ckeditor">{{ $order->note }}</textarea> 
												@else {!! $order->note !!}
												@endif
											</td>
										</tr>
									
									</tbody>
								</table>
									<input type="hidden" value="2023-02-19 13:03:51" name="trans_date" >
									<!-- <input type="hidden" value="766149" name="subtotal" > -->
							    <!-- <input type="hidden" value="TY23020170" name="request_id" > -->
									<input type="hidden" value="Aphrodita mayangsari" name="customer_name" >
									<input type="hidden" value="avoxo23@yahoo.com" name="email" id="">
									<input type="hidden" value="{{ $order->total_price }}" name="grand_totals" id="grand_totals">
									<input type="hidden" value="{{ count($requestorder) }}" name="total_row" id="total_row">
									<input type="hidden" value="{{ $order->forex }}" name="exchange_rate" id="exchange_rate">
							 </ul>
						</div>
						
						
						
						
						
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
												<input type="hidden" value="" id="type">
												@if ($order->status == "00")
													<button class="btn-primary btn" type="submit" name="submit" value="send_invoice">Send Quotation</button>
													<button class="btn-primary btn" type="submit" name="submit" value="cancel">Void</button>
												@elseif ($order->status == "01")
													<button class="btn-primary btn" type="submit" name="submit" value="cancel">Void</button>
													<a href="{{ route('dashboard') }}" class="btn-primary btn">Back</a>
												@else
													<a href="{{ route('dashboard') }}" class="btn-primary btn">Back</a>
												@endif
												<!-- <button class="btn-primary btn" value ='cancel' id="cancel" name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Send Quotation</button> -->
										  	<!--<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Update</button>
												<button class="btn-primary btn" value ='delete' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Delete</button>-->
											</div>
										</div>
									</div>
								</div>
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

@section('script')
<script type="text/javascript">
	// function calculatePrice(no) {
	// 	alert("test");
	// 	// total = ((price * exchange_rate) + (additional_fee * exchange_rate)) * qty
	// 	// calculate_grand_total()
	// }


	function format_rupiah(str) {
		var symbol = '';
		return accounting.formatMoney(str, symbol, 0, ",", ".");
	}	

	function calculatePrice(no)
	{
		var additional_fee = $("#additional_fee"+no).val();
		var disc = $("#disc_percentage"+no).val();
		var qty = $("#qty"+no).val();
		var price = $("#price_customer"+no).val();
		var exchange_rate = $("#exchange_rate").val();
		var additional_price = 0;
		// var grand_total = 0;
		
		if(isNaN(qty) || qty =='')
		{
			alert("Qty on row "+no+" is not a number !");
			$("#qty"+no).val(0);
		}
		else if(isNaN(price) || price =='')
		{
			alert("Price customer on row "+no+" is not a number !");
			$("#price_customer"+no).val(0);
		}
		else if(isNaN(additional_fee) || additional_fee == '')
		{
			alert("Additional fee on row "+no+" is not a number !");
			$("#additional_fee"+no).val(0);
		}
		else if(isNaN(disc)	|| disc == '')
		{
			alert("Discount on row "+no+" is not a number !");
			$("#disc_percentage"+no).val(0);
		}
		else
		{
			price = price - ((price * disc) / 100);
			if(additional_fee != '0' && additional_fee != '')
			{
				additional_price = (parseFloat(price)  * parseFloat(exchange_rate) * 0.07);
			}

			// total = ((price * forex) + additional - ((price * disc) / 100)) * qty
			// var price_idr = parseFloat(price) * parseFloat(exchange_rate);
      // var total = (price_idr + parseFloat(additional_fee) - (price_idr * (parseFloat(disc) / 100))) * parseFloat(qty);
			var total = ((parseFloat(price)  * parseFloat(exchange_rate) + parseFloat(additional_price)  +parseFloat(additional_fee)) * parseFloat(qty));
		
			total = Math.round(total);
			// document.getElementById("subtotal_true"+no).value = total;
			// document.getElementById("subtotal"+no).value = numberWithCommas(total);
			$("#subtotal"+no).val(total);
			$("#subtotal_label"+no).val(format_rupiah(total));
			calculate_grand_total();
		}

		function calculate_grand_total() {
			var grand_total = 0;
			var total_row = $("#total_row").val();

			for(i = 0;i < total_row; i++)
			{
				grand_total += 	parseFloat($("#subtotal"+i).val());
			}
			$("#grand_totals").val(grand_total);
			$(".grand_total").html(format_rupiah(grand_total));
		}
	}
</script>
@endsection