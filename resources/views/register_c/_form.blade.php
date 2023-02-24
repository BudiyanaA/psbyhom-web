<div class="col-sm-6">
    <div class="form-group @if ($errors->has('email')) has-error @endif">
		<span class="text-right req">Email <span class="reqsign">*</span></span>
		{{ Form::email('email', null, ['class' => 'form-control']) }}
		@if ($errors->has('email'))
    <script>
        alert("Email Sudah Digunakan");
    </script>
@endif
	</div>
    <div class="form-group @if ($errors->has('customer_name')) has-error @endif">
		<span class="text-right req">Nama Lengkap <span class="reqsign">*</span></span>
		{{ Form::text('customer_name', null, ['class' => 'form-control']) }}
        @if ($errors->has('customer_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('customer_name') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
		<span class="text-right req">Password <span class="reqsign">*</span></span>
		{{ Form::password('password', ['class' => 'form-control']) }}
		@if ($errors->has('password'))
    <script>
        alert("Konfirmasi password tidak sesuai");
    </script>
@endif
	</div>
    <div class="form-group">
		<span class="text-right req">Konfirmasi Password <span class="reqsign">*</span></span>
		{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
	</div>
    <div class="form-group @if ($errors->has('handphone')) has-error @endif">
		<span class="text-right req">Handphone 1 <span class="reqsign">*</span></span>
		{{ Form::text('handphone', null, ['class' => 'form-control']) }}
        @if ($errors->has('handphone')) <small class="form-text help-block" style="color:red">{{ $errors->first('handphone') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('handphone2')) has-error @endif">
		<span class="text-right req">Handphone 2</span>
		{{ Form::text('handphone2', null, ['class' => 'form-control']) }}
        @if ($errors->has('handphone2')) <small class="form-text help-block" style="color:red">{{ $errors->first('handphone2') }}</small> @endif
	</div>
</div>
<div>
<div class="col-sm-6">
    <div class="form-group @if ($errors->has('address')) has-error @endif">
		<span class="text-right req">Address <span class="reqsign">*</span></span>
		{{ Form::text('address', null, ['class' => 'form-control']) }}
        @if ($errors->has('address')) <small class="form-text help-block" style="color:red">{{ $errors->first('address') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('zip_code')) has-error @endif">
		<span class="text-right req">Zip Code</span>
		{{ Form::text('zip_code', null, ['class' => 'form-control']) }}
        @if ($errors->has('zip_code')) <small class="form-text help-block" style="color:red">{{ $errors->first('zip_code') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('province')) has-error @endif">
		<span class="text-right req">Provinsi <span class="reqsign">*</span></span>
		{{ Form::select('province', $province, null, ['class' => 'form-control',  'placeholder' => 'Pilih Provinsi', 'id' => 'province-option']); }}
        @if ($errors->has('province')) <small class="form-text help-block" style="color:red">{{ $errors->first('province') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('city')) has-error @endif">
		<span class="text-right req">Kota <span class="reqsign">*</span></span>
		{{ Form::select('city', $cities, null, ['class' => 'form-control',  'placeholder' => 'Pilih Kota', 'id' => 'city-option', 'disabled' => true]); }}
        @if ($errors->has('city')) <small class="form-text help-block" style="color:red">{{ $errors->first('city') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('district')) has-error @endif">
		<span class="text-right req">Kecamatan <span class="reqsign">*</span></span>
		{{ Form::select('district', $districts, null, ['class' => 'form-control',  'placeholder' => 'Pilih Kecamatan', 'id' => 'district-option', 'disabled' => true]); }}
        @if ($errors->has('district')) <small class="form-text help-block" style="color:red">{{ $errors->first('district') }}</small> @endif
	</div>
    <div class="form-group">
		<label>Captcha</label>
		<br>
		<span style="width: 150px; height: 30px;">{!! captcha_img() !!} </span>
	</div>
    
    <div class="form-group @if ($errors->has('captcha')) has-error @endif">
		<label class="text-right req">Enter Chapha <span class="reqsign">*</span></label>
		{{ Form::text('captcha', null, ['class' => 'form-control']) }}
		@if ($errors->has('captcha'))
		<script>
			alert("Captcha Tidak Sesuai");
		</script>
	@endif
		</div>
  


@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush