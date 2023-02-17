@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li><a href="https://psbyhom.com/admin_user_management/list_of_user.html">User Management</a></li>
                <li class="active">My Profile</li>
            </ul>

            <h1>myadmin's Profile</h1>
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
					  <li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">General Information</span></a></li>
					  <li><a href="#comments" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Log Activity</span></a></li>					</ul>
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
							 <font color='red';size='8'> <p align='center' style="font-size:smaller"></p></font>
								
							 {{ Form::open(['url' => route('profil.store'), 'class' => 'form-horizontal', 'files' => true ])}}
								@if (Session::has('success'))
									<div class="alert alert-success alert-dismissible" role="alert">
										{{ Session::get('success') }}
									</div>
								@endif
									<div class="form-group">
										<label class="col-sm-3 control-label">User ID</label>
										<div class="col-sm-6">
											<input type="text" readonly = TRUE placeholder="Required Field" required="required" class="form-control" name='user_id' id='user_id' value='{{ Auth::user()->id }}'>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Username</label>
										<div class="col-sm-6">
											<input type="text"  placeholder="Required Field" required="required" class="form-control" name='username' value='{{ Auth::user()->name }}'>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label"> Profile Image</label>
										<div class="col-sm-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
												<img src="" alt="myadmin" class="post_images" width="200" height="150" title="myadmin" rel="lightbox"/>
											</div>
												<div>
												  <span class="btn btn-default btn-file"><span class="fileinput-new">Browse image</span><span class="fileinput-exists">Change</span><input type="file"  name="image_thumbnail" id='image_thumbnail' value=''></span>

												  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Email</label>
										<div class="col-sm-6">
											<input type="text"  data-type="email" placeholder="Email address" required="required" class="form-control" name='email' value='{{ Auth::user()->email }}'>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Status</label>
											<div class="col-sm-6">
														<div class="col-sm-6">
														<select name="status" class="form-control">
												<option value="">Please select</option>
												<option value="01" selected="selected">Active</option>
												<option value="02">Blocked</option>
												<option value="03">Deleted</option>
												</select>											</div>
									</div>
									</div>
								</ul>
						</div>
						<div class="tab-pane" id="comments">
							<ul class="panel-comments">
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Actify Type</th>
											<th>Menu Name</th>
											<th>Log Time</th>
											<th>Audit Log</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td valign='top'>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
										</tr>
									</tbody>
								</table>
								</ul>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
											
												<button class="btn-primary btn"  value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
												
											</div>
										</div>
									</div>
								</div>
								{{ Form::close() }}
							</div>
							</div>
					</div>
				</div>
		</div>
	</div>
</div>
</div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->
<script>
    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>

@endsection