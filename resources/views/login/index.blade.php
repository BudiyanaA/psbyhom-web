
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>House of Makeup | Admin Management Console</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kingstone">
    <meta name="author" content="The Kingstone Team">

	 <link rel="shortcut icon" href="https://psbyhom.com/images/favicon.png" />
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
			<h4 class="text-center" style="margin-bottom: 25px;">Administrator Login</h4>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
				<form action="{{ route('actionlogin') }}" class="form-horizontal" method='post'>
                @csrf
					<div class="form-group">
						<label for="email" class="control-label col-sm-4" style="text-align: left;">User ID</label>
						<div class="col-sm-8">
                        <input type="name" name="name" class="form-control" placeholder="User Id" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="control-label col-sm-4" style="text-align: left;">Password</label>
						<div class="col-sm-8">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
						</div>
					</div>
					
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</form>
				<font color='red';size='8'>
							 	</font>
		</div>
		<div class="panel-footer">
			<a href="{{ route('forgot_password') }}" class="pull-left btn btn-link" style="padding-left:0">Forgot password?</a>
			
		
		</div>
	</div>
 </div>

      
</body>
</html>
