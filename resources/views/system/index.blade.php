@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
				<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('system_params') }}">System Parameter</a></li>
                <li class="active"></li>
            </ul>

            <h1>System Parameter</h1>
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
					  <li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Website Setting</span></a></li>
				  <!-- <div class="options">
					<a href="javascript:;"><i class="fa fa-cog"></i></a>
					<a href="javascript:;"><i class="fa fa-wrench"></i></a> 
				  </div> -->
			</div>
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane active" id="threads">
						 <font color='red';size='8'> <p align='center' style="font-size:smaller"></p></font>
							<ul class="panel-threads">
								<form action="https://psbyhom.com/isms_global_config/validate_update_sys_param" class="form-horizontal row-border"  data-validate="parsley" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="validate-form">
									<div class="form-group">
										<label class="col-sm-3 control-label">Running Text</label>
										<div class="col-sm-6">
											<input type="text" required="required" class="form-control" name="running_text" id="running_text" value="PO US OPEN DAILY | NEW WEBSITE  - PO US OPEN Everyday - Personal Shopper By Houseofmakeup">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Admin Email Notification</label>
										<div class="col-sm-6">
											<input type="text" required="required" class="form-control" name="admin_email_notif" id="admin_email_notif" value="order@psbyhom.com">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Footer Email Notif</label>
										<div class="col-sm-6">
											<input type="text" required="required" class="form-control" name="footer_notif_email" id="footer_notif_email" value="info@psbyhom.com">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">USD Exhange Rate</label>
										<div class="col-sm-6">
											<input type="text" required="required" class="form-control" name="exchange_rate" id="exchange_rate" value="16000">
										</div>
									</div>		
									<div class="form-group">
										<label class="col-sm-3 control-label">SGD Exhange Rate</label>
										<div class="col-sm-6">
											<input type="text" required="required" class="form-control" name="exchange_rate" id="exchange_rate" value="16000">
										</div>
									</div>						
								</ul>
						</div>
						<div class="tab-pane active" id="footer">
							<ul class="panel-threads">
															 </ul>
						</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">					
												<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>											</div>
										</div>
									</div>
								</div>
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