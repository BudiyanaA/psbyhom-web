	<div class="form-group 	@if ($errors->has('page_name')) has-error @endif">
		<label class="col-sm-3 control-label">Page Name</label>
		<div class="col-sm-6">
		{{ Form::text('page_name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		</div>
		@if ($errors->has('page_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('page_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('image')) has-error @endif">
		<label class="col-sm-3 control-label">Slideshow Image</label>
		<div class="col-sm-6">
		{{ Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image']) }}
		</div>
		@if ($errors->has('image')) <small class="form-text help-block" style="color:red">{{ $errors->first('image') }}</small> @endif
	</div>
	<div class="form-group @if ($errors->has('status')) has-error @endif">
		<label class="col-sm-3 control-label">Status</label>
		<div class="col-sm-6">
		{{ Form::select('status', ['Enabled' => 'Enabled', 'Disabled' => 'Disabled'], null, ['class' => 'form-select '.($errors->has('gender') ? 'is-invalid':''), 'id' => 'status-option', 'placeholder' => '-- Pilih Status --']) }}
		</div>
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>
