@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li><a href="https://psbyhom.com/email_controller/list_of_email.html">Email Management</a></li>
                <li class="active">View Email</li>
            </ul>

            <h1>View Email</h1>
        </div>
<div class="container">

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-midnightblue">
            <div class="panel-heading"><h4>View Email</h4></div>
            <div class="panel-body">
                 <font color='red';size='12'> </font>
				<form action="https://psbyhom.com/email_controller/validate_update_email.html?EmailUUID=609cd8c1-eb0b-4256-b2c6-e0942abd234e" class="form-horizontal row-border"  data-validate="parsley" id="validate-form"  method="post" accept-charset="utf-8" enctype="multipart/form-data" >

					<div class="form-group">
                        <label class="col-sm-3 control-label">Email Name</label>
                        <div class="col-sm-6">
                        <input type="text" placeholder="Email name.." required="required" class="form-control" name='email_name' value='{{ $emails->email_name }}'>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Email Title</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Email title.."  required="required" class="form-control" name='email_title' value='{{ $emails->email_title }}'>
                        </div>
                    </div>
					
						
				<div class="form-group">
						<label for="txtarea1" class="col-sm-3 control-label">Main Content</label>
						<div class="col-sm-6">
						 <textarea name="email_content" id="email_content" cols="80" rows="20" class="ckeditor" ><p>{{ $emails->email_content }}</p>

</textarea>
						</div>
					 </div>
					 <div class="form-group">
						<label for="txtarea1" class="col-sm-3 control-label">Bottom Content</label>
						<div class="col-sm-6">
						 <textarea name="email_content_bottom" id="email_content_bottom" cols="80" rows="20" class="ckeditor" ><p>{{ $emails->email_content_bottom }}</p></textarea>
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
     
                </form>
            </div>
    </div>
</div>


</div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection