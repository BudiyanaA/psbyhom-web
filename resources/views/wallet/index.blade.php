@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><h3  ><strong style="color:darkgray ">Latest E-Wallet History</strong></h3><br>
	
	</div><div class="col-lg-12">
<div class="table-responsive">
<table class="table stat-table table-bordered" style="text-align:left">
<tr style="background:#56cfe1;color:white">
	<th align='left'>No.</th>
	<th align='left'>PO ID</th>
	<th align='left'>Trans. Date</th>
	<th align='left'>Amount</th>
	<th >Description</th>
</tr>
<tr>
<td colspan='5' style="text-align:center">No E-Wallet History </td>
</tr>
	</table>
</div>
<input type="checkbox" name="use_withdrawal" id="use_withdrawal" value="1"> Withdraw E-Wallet</div>
<br>
<br>
<br>
<div id='withdrawal_form' style="display:none">
<br>
<br>
<br>
<div class="col-sm-6">
						<div id="dropship_customer" class="dropsipper-content">
						<h4>Withdrawal Form</h4>
						<fieldset>
					<div class="form-group"><div class="ol-sm-6 col-md-3 text-right">Bank Name:</div>
					<div class="col-sm-8 col-md-8">
					<input type="text" name="dropshipper_name" id='bank_name' class="elem_attr_req" ></div>
					</div>
					<div class="form-group">
					<div class="col-sm-6 col-md-3 text-right">Account No :</div>
					<div class="col-sm-8 col-md-8">
						<input type="text" name="account_no" id='account_no' class="elem_attr_req" ></div>
					</div>
					<div class="form-group">
					<div class="col-sm-6 col-md-3 text-right">Account Name :</div>
					<div class="col-sm-8 col-md-8">
						<input type="text" name="account_name" id='account_name' class="elem_attr_req" ></div>
					</div>
					<div class="form-group">
					<div class="col-sm-6 col-md-3 text-right"></div>
					<div class="col-sm-8 col-md-8">
						<button class="btn btn-default more" type="button" name="withdraw" id="withdraw">Withdraw E-Wallet</button></div>
					</div>
					<div class="form-group">
					<div class="col-sm-6 col-md-3 text-right"></div>
					
					</div>
					</fieldset>
					<br>
					
					
					<p>Note : Other than Bank Mandiri/Bank BCA, you will be charged Rp. 6.500 as transaction fee.</p>
					</div>
					</div>

<p></p>
</div>
	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection