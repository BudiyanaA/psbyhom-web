
    <div class="form-group 	@if ($errors->has('slideshow_name')) has-error @endif">
		<label class="col-sm-3 control-label">Slideshow Name</label>
		<div class="col-sm-6">
		{{ Form::text('slideshow_name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		</div>
		@if ($errors->has('slideshow_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('slideshow_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('hyperlink')) has-error @endif">
		<label class="col-sm-3 control-label">Hyperlink</label>
		<div class="col-sm-6">
			{{ Form::text('hyperlink', null, ['class' => 'form-control', 'placeholder' => 'URL Link article']) }}
		</div>
		@if ($errors->has('hyperlink')) <small class="form-text help-block" style="color:red">{{ $errors->first('hyperlink') }}</small> @endif
	</div>
	<div class="form-group 	@if ($errors->has('image')) has-error @endif">
		<label class="col-sm-3 control-label">Slideshow Image</label>
		<div class="col-sm-6">
		{{ Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image']) }}
		</div>
		@if ($errors->has('image')) <small class="form-text help-block" style="color:red">{{ $errors->first('image') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('slideshow_no')) has-error @endif">
		<label class="col-sm-3 control-label">Slideshow No </label>
		<div class="col-sm-6">
			{{ Form::number ('slideshow_no', null, ['class' => 'form-control', 'placeholder' => 'slideshow_no']) }}
		</div>
		@if ($errors->has('slideshow_no')) <small class="form-text help-block" style="color:red">{{ $errors->first('slideshow_no') }}</small> @endif
	</div>  
    <div class="form-group @if ($errors->has('notes')) has-error @endif">
		<label class="col-sm-3 control-label">Remarks</label>
		<div class="col-sm-6">
			{{ Form::text ('notes', null, ['class' => 'form-control', 'placeholder' => 'notes']) }}
		</div>
		@if ($errors->has('notes')) <small class="form-text help-block" style="color:red">{{ $errors->first('notes') }}</small> @endif
	</div>
	<div class="form-group @if ($errors->has('status')) has-error @endif">
		<label class="col-sm-3 control-label">Status</label>
		<div class="col-sm-6">
			{{ Form::select('status', ['Enabled' => 'Enabled', 'Disabled' => 'Disabled'], null, ['class' => 'form-select '.($errors->has('status') ? 'is-invalid':''), 'id' => 'status-option', 'placeholder' => '-- Pilih Status --']) }}
		</div>
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>
