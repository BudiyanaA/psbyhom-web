@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
            {{ Form::open(['url' => route('confirm_payment.store'), 'class' => 'form-horizontal' ])}}
                @include('confirm_payment._form')
                <div class="card-action">
				<button class="btn btn-primary">Submit Confirmation</button>
			</div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection