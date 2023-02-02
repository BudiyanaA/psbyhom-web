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

<p><strong>LINE@</strong><br />
@houseofmakeup</p>
</div>
<div id="contactform">
<form class="form-horizontal" method="POST" id='form_contact' action="https://psbyhom.com/process_send_contact.html">
<fieldset>
<div class="selang form-group"><span class="col-sm-2 text-right">Name * :</span><div class="col-sm-10 col-md-8"><input class="form-control" type="text" name="name" id='name' size="40" max_length="50" /></div></div>
<div class="seling form-group"><span class="col-sm-2 text-right">PO Number  :</span><div class="col-sm-10 col-md-8"><input class="form-control" type="text" name="po_id" id='po_id' size="50" max_length="50" /></div></div>
<div class="selang form-group"><span class="col-sm-2 text-right">Phone Number * :</span><div class="col-sm-10 col-md-8"><input class="form-control" type="text" name="phone" id='phone' size="20" max_length="20" /></div></div>
<div class="seling form-group"><span class="col-sm-2 text-right">Email * :</span><div class="col-sm-10 col-md-8"><input class="form-control" type="text" name="email" size="40" id='email' max_length="50" /></div></div>
<div class="selang form-group"><span class="col-sm-2 text-right">Messages * :</span><div class="col-sm-10 col-md-8"><textarea class="form-control" name="message" id='message' cols="40" rows="5" class="notiny"></textarea></div></div>
<!-- <div class="selang form-group"><span class="col-sm-2 text-right">Recaptcha :</span><div class="col-sm-10 col-md-8"> <div class="g-recaptcha" data-sitekey="6LcZCvYUAAAAAH4X7uFtV3npk9UICuUeXo_jUiO_"></div>
            <script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script></div> -->
        
         
         <br><br>
<div class="seling form-group"><div class="col-md-10 col-md-offset-2 col-sm-offset-2"><input class="btn btn-default more" type="button" name="button_contact" id='button_contact' value="Submit" /><p>Field with asterisk (*) are required</p></div></fieldset>
</form>
</div>
</div>
	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
    @endsection