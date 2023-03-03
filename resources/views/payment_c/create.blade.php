@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
        <div class="row"><h3  ><strong style="color:darkgray ">Confirm Payment</strong></h3><br>
	    </div>
        <div class="col-lg-12">
            <div class="form-checkout">
    		    <div class="form-register">
                    {{ Form::open(['url' => route('payment.store'), 'class' => 'form-horizontal' ])}}
                        <div class="row col-sm-6">
                            @include('payment_c._form')
                            <div class="card-action">
                                <input class="btn btn-default more" type="submit" id="submit_payments" name="submitButton" value="Submit Confirmation">
		                    </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="blockfooter"><div class="wrapper"></div></div>
    </div>
</div>
<div class="blockseparator"></div>
</div>
@endsection