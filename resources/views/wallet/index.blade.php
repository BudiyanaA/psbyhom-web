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
						<table class="table stat-table table-bordered" style="text-align:left;font-size: 13px;">
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
                                    <tr >
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="{{ url('po/view/' .$e->po?->POUUID) }}">{{ $e->po?->po_id }}</a></td> <!-- TODO: customer view_po-->
                                        <td>{{ formatDate($e->trans_date) }}</td>
                                        <td style="color:green">{{ number_format($e->amount) }}</td>
                                        <td>{{ str_replace("</b>", "", $e->description) }}</td>
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

<div id='withdrawal_form' style="display:none">

<div class="col-sm-6">
			{{ Form::open(['url' => route('withdrawal.store'), 'class' => 'form-horizontal' ])}}
						<div id="dropship_customer" class="dropsipper-content">
						<h4>Withdrawal Form</h4>
						@if(Session::has('success'))
			<script>
				alert("{{ Session::get('success') }}");
			</script>
		@endif

		@if(Session::has('error'))
			<script>
				alert("{{ Session::get('error') }}");
			</script>
		@endif
						<fieldset>
					<div class="form-group"><div class="ol-sm-6 col-md-3 text-right">Bank Name:</div>
					<div class="col-sm-8 col-md-8">
					<input type="text" name="bank_name" id='bank_name' class="elem_attr_req" ></div>
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
					<button class="btn btn-default more">Withdraw E-Wallet</button>
						<!-- <button class="btn btn-default more" type="button" name="withdraw" id="withdraw">Withdraw E-Wallet</button></div> -->
					</div>
					<div class="form-group">
					<div class="col-sm-6 col-md-3 text-right"></div>
					</div>
					</fieldset>
					<br>
					
					
					<p>Note : Other than Bank Mandiri/Bank BCA, you will be charged Rp. 6.500 as transaction fee.</p>
					</div>
					</div>
					{{ Form::close() }}
						</div>
</div>

						<div class="tab-pane" id="withdrawal">
                                                <div class="panel-body collapse in">
												<div class="table-responsive">
												<table class="table stat-table table-bordered" style="text-align:left;font-size: 13px;">
                                <thead>
								<tr style="background:#56cfe1;color:white">
									<th align='left'>No.</th>
									<th align='left'>Trans Date</th>
									<th align='left'>Amount</th>
									<th align='left'>Status</th>
								</tr>
                                </thead>
                                <tbody>
								@if(count($withdrawal) > 0)
						@foreach($withdrawal as $w)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ formatDate($w->trans_date) }}</td>
                                        <td>{{ number_format($w->amount) }}</td>
                                        <td>
											@if($w->status == '00')
												Pending
											@elseif($w->status == '01')
												Finish
											@elseif($w->status == '02')
												Reject
											@endif
											</td>
                                    </tr>
                                    @endforeach
									@else
								<tr>
								<td colspan='5' style="text-align:center">No Withdrawal </td>
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