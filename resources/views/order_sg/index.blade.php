@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                
                <li class="active">List of Pre Orders</li>
            </ol>
							 <h1>New Pre Orders Singapore</h1>
			            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
						                            <h4>New Pre Orders</h4>
						                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						<form method="get" action="{{ route('preorder_sg.index') }}">
								<table class="search-table">
									<tr>
										<td>Order Date Start &nbsp; &nbsp; </td>
										<td><input type="text" class="form-control mask" name="trans_date_start" value="" data-inputmask="'alias': 'date'"></td>
									</tr>
									<tr>
										<td>Order Date End &nbsp;  &nbsp; </td>
										<td><input type="text" class="form-control mask" name="trans_date_end"  value="" data-inputmask="'alias': 'date'"></td>
									</tr>
									
									<tr>
										<td>PO ID  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Request No" class="form-control" value="" name='request_id' autocomplete="off"></td>
									</tr>

									<!--<tr>
										<td>Status &nbsp; &nbsp;</td>
										<td width="250px">
										<select class="form-control" name="status">
												<option value="">--All Status--</option>
												<option value="00">Pending Admin Verification</option> <!-- Status awal saat customer submit 
												<option value="01">Pending Customer Approval</option> <!-- Status saat admin kirim penawaran 
												<option value="02">Customer Approved</option> <!-- Status saat customer submit checkout 
												<option value="03">Rejected</option>
											</select>
										
										</td>
									</tr>
									-->
									<input type="hidden" name="status" value='00'>
									<!--<tr>
										
										<td>Nama Customer  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Customer Name" class="form-control" name='customer_name'  value="" autocomplete="off"></td>
									</tr>
									--
								
									
									<!--pilihan untuk sorting data 21-12-2015-->
									<tr>
										<td>Order By &nbsp; &nbsp; </td>
										<td width="250px">
										<select class="form-control" name="order_by">
												<option value="ASC">Ascending</option>
												<option selected value="DESC">Descending</option>
												
											</select>
										
										</td>
									</tr>
									<tr>
										<td>&nbsp; &nbsp;  </td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<input type="submit" class="btn-primary btn" value='Search'>
										</td>
									</tr>
								</table>
								<br>
								<br>
							</form>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered " id="example">
                                <thead>
                                    <tr>
										<th>No</th>
                                        <th>PO ID</th>
                                        <th>Customer Name</th>
										<th>Created Date</th>
										<th>Variety Items</th>
										<th>Total Price</th>
										<th>Status</th>										
                                    </tr>
                                </thead>
                                <tbody>
								@if(count($orders) > 0)
								@foreach($orders as $o)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td><a href="{{ route('preorder_sg.detail', $o->RequestOrderUUID) }}">{{ $o->request_id }}</a></td>
									<td><a href="{{ route('customer.detail', $o->CustomerUUID) }}">{{ $o->customer?->customer_name }}</a></td>
									<td>{{ formatDate($o->created_date) }}</td>
									<td>{{ $o->total_items }}</td>
									<td>{{ number_format($o->total_price) }}</td>
									<td>
										@if ($o->status === '00')
											Pending Admin Verification
										@elseif ($o->status === '01')
											Pending Customer Approval
										@elseif ($o->status === '02')
											Pending Payment
										@elseif ($o->status === '03')
											Rejected
										@elseif ($o->status === '04')
											Processed
										@else
											Unknown
										@endif
									</td>
								</tr>
									@endforeach
									@else
								<tr>
									<td colspan="10">Data not found</td>
								</tr>
							@endif
								</tbody>
                            </table>
							                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection