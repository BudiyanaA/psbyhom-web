@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><div class="col-lg-12"><h3  ><strong style="background:#56cfe1; padding: 0 25px 5px ; border-radius: 5px 5px;color:white">Information</strong></h3><br>
	</div><div class="col-lg-12">
<ul class="success">
<li>Activation Failed, <br> This account has already been activated !</li>
</ul>
<br>
<br>
<br>
<br>
<p><a class="link_kembali" href="{{ route('home') }}"><i class="fa fa-angle-left fa-3"></i> Back to Home</a></p>

	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection