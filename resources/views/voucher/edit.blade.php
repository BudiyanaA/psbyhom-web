@if (Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		{{ Session::get('error') }}
	</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card">
		
		{!! Form::model($voucher, ['route' => ['voucher_management.update', $voucher->id], 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
			<div class="card-header">
				<div class="card-title">Edit Voucher</div>
			</div>
			<div class="card-body">

        @include('voucher._form')

      </div>

      <div class="card-action">
				<button class="btn btn-success">Submit</button>
				<a href="{{ route('voucher_management.index') }}" class="btn btn-danger">Cancel</a>
			</div>
		{{ Form::close() }}

    </div>
  </div>
</div>
