@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                <li class="active">Voucher Management</li>
            </ol>

            <h1>Voucher Management</h1>
            <div class="options">
                <div class="btn-toolbar">
              
                    <a href="{{ route('voucher_management.create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Create New Voucher</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Voucher</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered  " id="example">
                                <thead>
                                    <tr>
										<th>No</th>
										<th>Voucher ID</th>
										<th>Created Date</th>
										<th>Expiry Date</th>
										<th>Discount Value</th>
										<th>Remarks</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach($vouchers as $v)
										<tr>
											<td>{{ $loop->index + 1 }}</td>
											<td><a href="{{ route('voucher_management.edit', $v->id) }}">{{ $v->voucher_id }}</a></td>
											<td>{{ $v->created_at }}</td>
											<td>{{ $v->expiry_date }}</td>
											<td>{{ $v->discount_amount }}</td>
											<td>{{ $v->remarks }}</td>
										</tr>
									@endforeach
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
