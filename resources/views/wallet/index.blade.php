@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><h4>
					<ul class="nav nav-tabs">				  
					  <li class='active'><a href="#wallet" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Wallet</span></a></li>
					   <li><a href="#withdrawal" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Withdrawal</span></a></li>	
					</ul>	
								  </h4><br>
	
	</div><div class="col-lg-12">
	<div class="panel-body">
					<div class="tab-content">
					<div class="tab-pane active" id="wallet">
                        <div class="panel-body collapse in">
						<div class="table-responsive">
						<table class="table stat-table table-bordered" style="text-align:left">
                                <thead>
								<tr style="background:#56cfe1;color:white">
									<th align='left'>No.</th>
									<th align='left'>PO ID</th>
									<th align='left'>Trans. Date</th>
									<th align='left'>Amount</th>
									<th >Description</th>
								</tr>
                                </thead>
                                <tbody>
								@if(count($wallet) > 0)
						@foreach($wallet as $e)
                                    <tr>
                                        <td colspan='5' >{{ $loop->index + 1 }}</td>
                                        <td colspan='5'>{{ $e->msCustomer?->customer_name}}</td>
                                        <td colspan='5'>{{ $e->trans_date}}</td>
                                        <td colspan='5'>{{ $e->amount}}</td>
                                        <td colspan='5'>{{ $e->description}}</td>
                                        <td colspan='5'>{{ $e->po?->request_id}}</td>
                                    </tr>
                                    @endforeach
									@else
								<tr>
								<td colspan='5' style="text-align:center">No E-Wallet History </td>
								</tr>
							@endif
                                </tbody>
                            </table>
</div>
                        </div>
						<input type="checkbox" name="use_withdrawal" id="use_withdrawal" value="1" onchange="toggleWithdrawalForm()"> Withdraw E-Wallet

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
						</div>
</div>

						<div class="tab-pane" id="withdrawal">
                                                <div class="panel-body collapse in">
												<div class="table-responsive">
												<table class="table stat-table table-bordered" style="text-align:left">
                                <thead>
								<tr style="background:#56cfe1;color:white">
									<th align='left'>No.</th>
									<th align='left'>PO ID</th>
									<th align='left'>Trans. Date</th>
									<th align='left'>Amount</th>
									<th >Description</th>
								</tr>
                                </thead>
                                <tbody>
								@if(count($wallet) > 0)
						@foreach($wallet as $e)
                                    <tr>
                                        <td colspan='5' >{{ $loop->index + 1 }}</td>
                                        <td colspan='5'>{{ $e->msCustomer?->customer_name}}</td>
                                        <td colspan='5'>{{ $e->trans_date}}</td>
                                        <td colspan='5'>{{ $e->amount}}</td>
                                        <td colspan='5'>{{ $e->description}}</td>
                                        <td colspan='5'>{{ $e->po?->request_id}}</td>
                                    </tr>
                                    @endforeach
									@else
								<tr>
								<td colspan='5' style="text-align:center">No E-Wallet History </td>
								</tr>
							@endif
                                </tbody>
                            </table>
</div>
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

<script>
function toggleWithdrawalForm() {
  var withdrawalForm = document.getElementById("withdrawal_form");
  if (document.getElementById("use_withdrawal").checked) {
    withdrawalForm.style.display = "block";
  } else {
    withdrawalForm.style.display = "none";
  }
}
</script>