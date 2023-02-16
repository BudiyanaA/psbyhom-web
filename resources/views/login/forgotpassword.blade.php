<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bukabeli | Digital Management Console</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avant">
    <meta name="author" content="The Red Team">

	 <link rel="shortcut icon" href="https://psbyhom.com/images/bukabeli_icon2.ico" />
     <link href="{{ url('assets/less/styles.less') }}" rel="stylesheet/less" media="all"> 
    <!-- <link rel="stylesheet" href="assets/css/styles.min.css?=120"> -->
    <link href='https://psbyhom.com/assets/css/font.css' rel='stylesheet' type='text/css'>
    
    <script type="text/javascript" src="https://psbyhom.com/assets/js/less.js"></script>
</head>
<body class="focusedform">
<div class="verticalcenter">
<a href=""><img src="https://psbyhom.com/images/hom_logo.png" alt="Logo" class="brand" /></a>
	<div class="panel panel-primary">
		<div class="panel-body">
			<h4 class="text-center" style="margin-bottom: 25px;">Reset Password</h4>
			<font color="red"></font>
				<form method="post" action="https://psbyhom.com/login_admin_cpanel/validate_forgot_pass" class="form-horizontal" data-validate="parsley" id="validate-form">
						<div class="form-group">
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" name="username" required="required"  class="form-control" id="username" placeholder="Username">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
									<input type="text" name="email" data-type="email" required="required" class="form-control" id="email" placeholder="Email">
								</div>
							</div>
						</div>
				
					
		</div>
		<div class="panel-footer">
			<div class="pull-left">
				<a href="{{ route('login') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
			<div class="pull-right">
				<button name="submit" class="btn btn-primary btn-block" onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
			</div>
		</div>
		</form>
	</div>
 </div>
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-parsley/parsley.min.js'></script>
<script type='text/javascript' src='https://psbyhom.com/assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/bootstrap.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/enquire.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/jquery.cookie.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/js/jquery.nicescroll.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/codeprettifier/prettify.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/easypiechart/jquery.easypiechart.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/sparklines/jquery.sparklines.min.js'></script> 
<script type='text/javascript' src='https://psbyhom.com/assets/plugins/form-toggle/toggle.min.js'></script>  
</body>
</html>