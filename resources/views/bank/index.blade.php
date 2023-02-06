@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                <li class="active">Bank Management</li>
            </ol>

            <h1>Bank Management</h1>
            <div class="options">
                <div class="btn-toolbar">
              
                    <a href="{{ route('bank_management.create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Create New Bank</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Bank</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
										<th>No</th>
										<th>Bank Name</th>
										<th>Bank Account No</th>
										<th>Bank Account Name</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach($banks as $b)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td><a href="{{ route('bank_management.edit', $b->id) }}">{{ $b->bank_name }}</a></td>
										<td>{{ $b->bank_account_no }}</td>
										<td>{{ $b->bank_account_name }}</td>
										<td>{{ $b->status }}</td>
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