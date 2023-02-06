
@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="dashboard">Dashboard</a></li>
                <li class="active">Page Management</li>
            </ol>

            <h1>Page Management</h1>
            
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Pages</h4>
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
                                        <th>Page Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>		
                                    @foreach($pages as $p)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="{{ route('page_management.edit', $p->id) }}">{{ $p->page_name }}</a></td>
                                        <td>{{ $p->status }}</td>
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
<!-- <div class="row">
        <div class="col-md-12">					
			@if (Session::has('success'))
				<div class="alert alert-success alert-dismissible" role="alert">
					{{ Session::get('success') }}
				</div>
			@endif
			<div class="card">
				<div class="card-header">
                    <div class="d-flex align-items-center">
						<h4 class="card-title"> Page Management</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                    <table border="1">
		<tr>
			<th>No</th>
			<th>Page Name</th>
			<th>Status</th>
		</tr>
		@foreach($pages as $p)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td><a href="{{ route('page_management.edit', $p->id) }}">{{ $p->page_name }}</a></td>
			<td>{{ $p->status }}</td>
		</tr>
		@endforeach
	</table>
					</div>
				</div>
			</div>
		</div>
    </div> -->
