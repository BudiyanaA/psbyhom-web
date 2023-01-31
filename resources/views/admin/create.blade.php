

@if (Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		{{ Session::get('error') }}
	</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card">

		{{ Form::open(['url' => route('admin_management.store'), 'class' => 'form-horizontal' ])}}
			<div class="card-header">
				<div class="card-title">Tambah Admin</div>
			</div>
			<div class="card-body">

        @include('admin._form')

      </div>

      <div class="card-action">
				<button class="btn btn-success">Submit</button>
				<a href="{{ route('admin_management.index') }}" class="btn btn-danger">Cancel</a>
			</div>
		{{ Form::close() }}

    </div>
  </div>
</div>