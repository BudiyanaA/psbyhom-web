@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Home</a></li>
                 
                <li class="active">View Orderl</li>
            </ul>

            <h1>View Order</h1>
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

						<form action="https://psbyhom.com/request_order_controller/validate_update/5cc52d59-eae2-44db-a31a-9a93dc968c30/" class="form-horizontal row-border"  data-validate="parsley" id="validate-form" method='post'>
						<div class="tab-pane active" id="trans">
							<ul class="panel-comments">
							<div class="form-group">
										<label class="col-sm-3 control-label">PO ID</label>
										<div class="col-sm-6">
											<input type="text" readonly  placeholder="Required Field"  class="form-control" name='request_id' value='TY23020170'>
										</div>
									</div>
							<div class="form-group">
										<label for="txtarea1" class="col-sm-3 control-label">Transaction Date</label>
										<div class="col-sm-6"><input type="text" readonly  name="request_date" id="request_date" cols="50" rows="4" class="form-control" value='19 Feb 2023 13:03:51'></div>
									 </div>		
							<div class="form-group">
										<label for="txtarea1" class="col-sm-3 control-label">Exchange Rate USD - IDR</label>
										<div class="col-sm-6"><input type="text" readonly  name="ex" id="ex" cols="50" rows="4" class="form-control" value='16,000'></div>
									 </div>			
				
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>Qty</th>
											<th>URL</th>
											<th >Product Name</th>
											<th>Color</th>
											
											<th>Size/Weight</th>
											<th>Price(USD)</th>
											<th>Info</th>
																				 
																						
												
								
											<th>Add. Fee (IDR)</th>
											<th>Disc. (%)</th>
											<th>Subtotal(IDR)</th>
											
										</tr>
									</thead>
									<tbody>
																							
														<tr >
														<input type="hidden" value="8a25b763-1113-4962-91c8-09e2d48bca9c" name="RequestOrderDtlUUID1">
															
															
																														<td>1</td>
															<td><a href="https://www.amazon.com/dp/B08BCH841V?linkCode=ssc&tag=onamzalixearl-20&creativeASIN=B08BCH841V&asc_item-id=amzn1.ideas.M60OPFSJFZ1K&ref_=aip_sf_list_spv_ofs_mixed_m_asin">LINK</a></td>
															<td>Newmowa light</td>
															<td>-</td>
															
															<td>-</td>
															<td>36</td>
															<td></td>
															
															
															
															<td>150,000</td>
															<td>0</td>
															
															
															<td>766,149</td>
														
																														
														</tr>
														<tr><td colspan='9' style='text-align:right'><b>Grand Total</b></td><td class='grand_total'>766,149</td></tr>									<tr>
										<td colspan='2'>Notes From Admin</td>
										<td colspan='8'>
																				
									</td>
									</tr>
									</tbody>
								</table>
									<input type="hidden" value="2023-02-19 13:03:51" name="trans_date" >
									<input type="hidden" value="766149" name="subtotal" >
							    	<input type="hidden" value="TY23020170" name="request_id" >
									<input type="hidden" value="Aphrodita mayangsari" name="customer_name" >
									<input type="hidden" value="avoxo23@yahoo.com" name="email" id="">
									<input type="hidden" value="0" name="grand_totals" id="grand_totals">
									<input type="hidden" value="1" name="total_row" id="total_row">
									<input type="hidden" value="16000" name="exchange_rate" id="exchange_rate">
							 </ul>
						</div>
						
						
						
						
						
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
											<input type="hidden" value="" id="type">
													<button class="btn-primary btn" value ='cancel' id="cancel" name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Void</button>
													<button class="btn-primary btn" value ='back' id="back" name='submit' >Back</button>
												
										  	

										  													<!--<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Update</button>
													<button class="btn-primary btn" value ='delete' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Delete</button>-->
											</div>
										</div>
									</div>
								</div>
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