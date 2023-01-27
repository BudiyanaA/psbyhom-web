<div class="row">
    <div class="form-group 	@if ($errors->has('slideshow_name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Slideshow Name</label>
		{{ Form::text('slideshow_name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		@if ($errors->has('slideshow_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('slideshow_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('hyperlink')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">hyperlink</label>
		{{ Form::text('hyperlink', null, ['class' => 'form-control', 'placeholder' => 'URL Link article']) }}
		@if ($errors->has('hyperlink')) <small class="form-text help-block" style="color:red">{{ $errors->first('hyperlink') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('image')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Slideshow Image</label>
		{{ Form::file('image', null, ['class' => 'form-control', 'placeholder' => 'URL Link article']) }}
		@if ($errors->has('image')) <small class="form-text help-block" style="color:red">{{ $errors->first('image') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('slideshow_no')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Slideshow No </label>
		{{ Form::number ('slideshow_no', null, ['class' => 'form-control', 'placeholder' => 'slideshow_no']) }}
		@if ($errors->has('slideshow_no')) <small class="form-text help-block" style="color:red">{{ $errors->first('slideshow_no') }}</small> @endif
	</div>  
    <div class="form-group @if ($errors->has('notes')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Catatan</label>
		{{ Form::text ('notes', null, ['class' => 'form-control', 'placeholder' => 'notes']) }}
		@if ($errors->has('notes')) <small class="form-text help-block" style="color:red">{{ $errors->first('notes') }}</small> @endif
	</div>
	<div class="form-group @if ($errors->has('status')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Status</label>
		{{ Form::select('status', ['enable' => 'Enable', 'disable' => 'Disable'], null, ['class' => 'form-select '.($errors->has('gender') ? 'is-invalid':''), 'id' => 'gender-option', 'placeholder' => '-- Pilih Status --']) }}
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>
</div>
