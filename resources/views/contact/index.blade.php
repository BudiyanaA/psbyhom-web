@extends('layouts.costumerapp')
@section('content')	
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><div class="col-lg-12"><h3  ><strong style="color:darkgray ">Contact Us</strong></h3><br>
	</div><div class="col-lg-12">
<div id="contactall">
<div id="notebefore">
<p><strong>OPEN HOURS</strong><br />
Monday-Friday 8am - 4pm<br />
Saturday 8am - 1pm</p>

<p><strong>INSTAGRAM</strong><br />
@houseofmakeup</p>

</div>
<div id="contactform">
	@if (Session::has('success'))
				<div class="alert alert-success alert-dismissible" role="alert">
					{{ Session::get('success') }}
				</div>
			@endif
{{ Form::open(['url' => route('contac.store'), 'class' => 'form-horizontal' ])}}
<fieldset>
@include('contact._form')
<div class="selang form-group">
    <span class="col-sm-2 text-right">Recaptcha :</span>
    <div class="col-sm-10 col-md-8">
        {!! app('captcha')->display() !!}
    </div>
</div>                    
         <br><br>
<div class="seling form-group">
	<div class="col-md-10 col-md-offset-2 col-sm-offset-2">
	<button class="btn btn-default more">Submit </button>
		<p>Field with asterisk (*) are required</p>
	</div>
	</fieldset>
{{ Form::close() }}
{!! NoCaptcha::renderJs() !!}
</div>
</div>
	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
    @endsection