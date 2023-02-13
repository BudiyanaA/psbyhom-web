@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
            {{ Form::open(['url' => route('payment_c.store'), 'class' => 'form-horizontal' ])}}
                @include('payment_c._form')
                <div class="card-action">
				<button class="btn btn-primary">Submit Confirmation</button>
			</div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection