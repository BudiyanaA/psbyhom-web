@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="#">Update Request Order</a></li>
                <li class="active">
				Update Request Order	
				</li>
            </ul>

            <h1>Update Request Order</h1>
        </div>
<div class="container">


<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-midnightblue">
            <div class="panel-heading"><h4>Information</h4></div>
            <div class="panel-body" align='center'>

				 <p align='center'>A new Request Order has been successfully updated</p>
			  
				<a href="{{ route('dashboard') }}">Go to Homepage</a>
            </div>
    </div>
</div>

</div>
</div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection