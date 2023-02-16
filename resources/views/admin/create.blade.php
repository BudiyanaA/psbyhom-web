@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('user.index') }}">Admin Management</a></li>
                <li class="active">Create New Admin</li>
            </ul>

            <h1>Create New Admin</h1>
        </div>
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-midnightblue">
            <div class="panel-heading">
			 <h4>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Tambah Admin</span></a></li>
					
					 </ul>
				  </h4>
			</div>
            <div class="panel-body">
				<div class="tab-content">
						<div class="tab-pane active" id="threads">
							<ul class="panel-threads">
								 <font color='red';size='8'> <p align='center' style="font-size:smaller"></p></font>
	@if (Session::has('error'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			{{ Session::get('error') }}
		</div>
	@endif

		{{ Form::open(['url' => route('admin_management.store'), 'class' => 'form-horizontal' ])}}
			
        @include('admin._form')

		</ul>
      </div>
	  </div>					
				</div>	
      <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="btn-toolbar">
						
                            <button class="btn-primary btn" onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		{{ Form::close() }}

    </div>
  </div>
</div>
@endsection