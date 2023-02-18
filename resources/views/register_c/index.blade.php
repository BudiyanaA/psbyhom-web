@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

	<div class="row"><div class="col-lg-12"><h3  ><strong style="color:darkgray ">Register</strong></h3><br>
	
		
	</div><div class="col-lg-12">
<div class="form-checkout">
		<div class="form-register">
		@include('register_c.create')
		</div>
		</div>	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection

<script>
    const errorMessage = "{{ session('error') }}";
    if(errorMessage){
        alert(errorMessage);
    }
</script>