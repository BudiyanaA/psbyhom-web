
    <div class="form-group 	@if ($errors->has('slideshow_name')) has-error @endif">
		<label class="col-sm-3 control-label">Slideshow Name</label>
		<div class="col-sm-6">
		{{ Form::text('slideshow_name', $slide->slide_name ?? '', ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		</div>
		@if ($errors->has('slideshow_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('slideshow_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('hyperlink')) has-error @endif">
		<label class="col-sm-3 control-label">Hyperlink</label>
		<div class="col-sm-6">
			{{ Form::text('hyperlink', $slide->ArticleUUID ?? '', ['class' => 'form-control', 'placeholder' => 'URL Link article']) }}
		</div>
		@if ($errors->has('hyperlink')) <small class="form-text help-block" style="color:red">{{ $errors->first('hyperlink') }}</small> @endif
	</div>
	<div class="form-group">
    <label class="col-sm-3 control-label">Slideshow Image</label>
    <div class="col-sm-6">
        @if (isset($slide) && $slide->image_slide)
            <img id="previewImage" src="{{ asset('assets/'.$slide->image_slide) }}" alt="{{ $slide->slide_name }}" style="max-height: 200px;">
        @else
            <img id="previewImage" src="#" alt="Preview" style="max-height: 200px; display: none;">
        @endif
        {{ Form::file('image', ['class' => 'form-control', 'placeholder' => 'Image', 'onchange' => 'previewFile()']) }}
    </div>
    @if ($errors->has('image')) 
        <small class="form-text help-block" style="color:red">{{ $errors->first('image') }}</small> 
    @endif
</div>
    <div class="form-group @if ($errors->has('slideshow_no')) has-error @endif">
		<label class="col-sm-3 control-label">Slideshow No </label>
		<div class="col-sm-6">
			{{ Form::number ('slideshow_no', $slide->seq ?? '', ['class' => 'form-control', 'placeholder' => 'Slideshow No']) }}
		</div>
		@if ($errors->has('slideshow_no')) <small class="form-text help-block" style="color:red">{{ $errors->first('slideshow_no') }}</small> @endif
	</div>  
    <div class="form-group @if ($errors->has('notes')) has-error @endif">
		<label class="col-sm-3 control-label">Remarks</label>
		<div class="col-sm-6">
			{{ Form::text ('notes', $slide->remarks ?? '', ['class' => 'form-control', 'placeholder' => 'notes']) }}
		</div>
		@if ($errors->has('notes')) <small class="form-text help-block" style="color:red">{{ $errors->first('notes') }}</small> @endif
	</div>
	<div class="form-group @if ($errors->has('status')) has-error @endif">
		<label class="col-sm-3 control-label">Status</label>
		<div class="col-sm-6">
		{{ Form::select('status', ['01' => 'Enabled', '02' => 'Disabled'], $slide->status ?? null, ['class' => 'form-select '.($errors->has('status') ? 'is-invalid':''), 'id' => 'status-option', 'placeholder' => '-- Pilih Status --']) }}
		</div>
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>

	<script>
    function previewFile() {
        var preview = document.getElementById('previewImage');
        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
