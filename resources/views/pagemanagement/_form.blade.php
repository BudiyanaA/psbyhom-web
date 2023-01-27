<div class="row">
    <div class="form-group 	@if ($errors->has('page_name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Page Name</label>
		{{ Form::text('page_name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		@if ($errors->has('page_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('page_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('image')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Slideshow Image</label>
		{{ Form::file('image', null, ['class' => 'form-control', 'placeholder' => 'URL Link article']) }}
		@if ($errors->has('image')) <small class="form-text help-block" style="color:red">{{ $errors->first('image') }}</small> @endif
	</div>
	<div class="form-group @if ($errors->has('status')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Status</label>
		{{ Form::select('status', ['Enabled' => 'Enabled', 'Disabled' => 'Disabled'], null, ['class' => 'form-select '.($errors->has('gender') ? 'is-invalid':''), 'id' => 'gender-option', 'placeholder' => '-- Pilih Status --']) }}
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>
</div>
