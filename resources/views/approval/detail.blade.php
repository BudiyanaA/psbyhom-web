@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <!-- <li><a href="https://psbyhom.com/isms_customer_management/list_of_customer.html">Customer Management</a></li> -->
                <li class="active">View Customer Detail</li>
            </ul>

            <h1>Customer Information</h1>
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
					  <li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Member Information</span></a></li>
						<li><a href="#trx" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Transaction</span></a></li>
						<li><a href="#ewallet" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">E-Wallet History</span></a></li>
						<li><a href="#comments" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Log Activity</span></a></li>
						
					 
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
								<form action="{{ route('customer.update', $customer->CustomerUUID) }}" class="form-horizontal row-border"  method="post" data-validate="parsley" id="validate-form">
																		<div class="form-group">
										<label for="inputFN" class="col-sm-2 control-label">Customer Name<span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" readonly required class="form-control" id="inputFN" name="customer_name"  value="{{ $customer->customer_name }}">
										</div>
									</div>
									
						
									<div class="form-group">
										<label for="inputCN" class="col-sm-2 control-label">Address</label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="inputCN"  name="nama_comp" value="{{ $customer->address }}">
										</div>
									</div>
									<div class="form-group">
										<label for="inputCN" class="col-sm-2 control-label">Handphone No.</label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="inputCN" name="no_hp" value="{{ $customer->handphone }}">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAdd" class="col-sm-2 control-label">Email <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="email" readonly class="form-control" id="inputAdd" name="email" value="{{ $customer->email }}">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputAdd" class="col-sm-2 control-label">Dropshipper Name <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="dropshipper_name" name="dropshipper_name" value="">
										</div>
									</div>
									
										<div class="form-group">
										<label for="inputAdd" class="col-sm-2 control-label">Dropshipper Contact <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="dropshipper_hp" name="dropshipper_hp" value="">
										</div>
									</div>
								
									
									</ul>
									
									<div class="btn-toolbar">
										<div class="col-sm-6 col-sm-offset-3">	
											<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
											@if ($customer->status != '02') <button class="btn-primary btn" value ='locked' name='submit' >Banned/Lock</button> @endif
											@if ($customer->status == '02') <button class="btn-primary btn" value ='active' name='submit' >UnLock</button> @endif
											@if ($customer->status == '09') 
												<button class="btn-primary btn" value ='accept' name='submit' >Acc</button> 
												<button class="btn-primary btn" value ='decline' name='submit' >Tolak</button> 
											@endif
										</div>
									</div>
							</div>
							<div class="tab-pane" id="trx">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Invoice No</th>
											<th>Trx Date</th>
											<th>Grand Total</th>
											

										</tr>
									</thead>
									<tbody>
																						<tr >
															<td valign='top' colspan='5' align='center'>No Record Found</td>
															
														</tr>
																			</tbody>
								</table>
							</div>
							<div class="tab-pane" id="ewallet">

							<div class="page-heading">
                  <div class="options">   
											<div class="btn-toolbar">
												<a href="{{ route('customer_ewallet_history.create', ['user_id' => $user_id]) }}" class="btn btn-default"><i class="fa fa-plus"></i> Create New History</a>				
											</div>
                  </div>
              </div>
							<br>

							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Trans Date</th>			
											<th>Amount</th>
											<th>Description</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									@foreach($wallet as $e)
										<tr>
											<td>{{ $loop->index + 1 }}</td>
											<td>{{ formatDate($e->trans_date) }}</td>
											<td>{{ number_format($e->amount) }}</td>
											<td>{{ str_replace("</b>", "", $e->description) }}</td>
											<td>
												<form action="{{ route('customer_ewallet_history.delete', ['user_id' => $user_id, 'id' => $e->EWalletUUID]) }}" method="POST">
												    @csrf
												    <button type="submit" class="btn btn-outline-danger">Hapus</button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							Total Current E-Wallet Amount :
							
							<strong>{{ number_format($ewallet) }}</strong>
													</div>
							<div class="tab-pane" id="comments">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Log Time</th>
											<th>Function Name</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($log_actv as $row)
											<tr>
												<td valign='top'>{{ $loop->index + 1 }}</td>
												<td>{{ $row->log_time }}</td>
												<td>{{ $row->menu_nm }}</td>
												<td>{{ $row->description }}</td>
											</tr>
										@endforeach								
									</tbody>
								</table>
							</div>
						</div>
								<!--<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
											
													<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
											
													<button class="btn-primary btn" value ='delete' name='submit' onclick="ConfirmDelete()">Delete</button>
											
											</div>
										</div>
									</div>
								</div>-->
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