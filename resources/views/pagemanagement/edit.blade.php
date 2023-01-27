@if (Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		{{ Session::get('error') }}
	</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card">
		
		{!! Form::model($page, ['route' => ['page_management.update', $page->id], 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
			<div class="card-header">
				<div class="card-title">Edit Page</div>
			</div>
			<div class="card-body">

        @include('pagemanagement._form')

      </div>

      <div class="card-action">
				<button class="btn btn-success">Submit</button>
				<a href="{{ route('page_management.index') }}" class="btn btn-danger">Cancel</a>
			</div>
		{{ Form::close() }}

    </div>
  </div>
</div>
