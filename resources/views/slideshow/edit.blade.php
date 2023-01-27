@if (Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		{{ Session::get('error') }}
	</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card">
		
		{!! Form::model($slide, ['route' => ['slideshow_management.update', $slide->id], 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
			<div class="card-header">
				<div class="card-title">Edit Slide</div>
			</div>
			<div class="card-body">

        @include('slideshow._form')

      </div>

      <div class="card-action">
				<button class="btn btn-success">Submit</button>
				<a href="{{ route('slideshow_management.index') }}" class="btn btn-danger">Cancel</a>
			</div>
		{{ Form::close() }}

    </div>
  </div>
</div>
