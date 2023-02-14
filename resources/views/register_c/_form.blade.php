<div class="col-sm-6">
    <div class="form-group @if ($errors->has('email')) has-error @endif">
		<span class="text-right req">Email <span class="reqsign">*</span></span>
		{{ Form::email('email', null, ['class' => 'form-control']) }}
        @if ($errors->has('email')) <small class="form-text help-block" style="color:red">{{ $errors->first('email') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
		<span class="text-right req">Nama Lengkap <span class="reqsign">*</span></span>
		{{ Form::text('name', null, ['class' => 'form-control']) }}
        @if ($errors->has('name')) <small class="form-text help-block" style="color:red">{{ $errors->first('name') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
		<label class="text-right req">Password <span class="reqsign">*</span></label>
		{{ Form::password('password', ['class' => 'form-control']) }}
        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	</div>
    <div class="form-group">
		<span class="text-right req">Confirm Password <span class="reqsign">*</span></span>
		{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
	</div>
    <div class="form-group @if ($errors->has('nohp_1')) has-error @endif">
		<span class="text-right req">Handphone 1 <span class="reqsign">*</span></span>
		{{ Form::text('nohp_1', null, ['class' => 'form-control']) }}
        @if ($errors->has('nohp_1')) <small class="form-text help-block" style="color:red">{{ $errors->first('nohp_1') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('nohp_2')) has-error @endif">
		<span class="text-right req">Handphone 2 <span class="reqsign">*</span></span>
		{{ Form::text('nohp_2', null, ['class' => 'form-control']) }}
        @if ($errors->has('nohp_2')) <small class="form-text help-block" style="color:red">{{ $errors->first('nohp_2') }}</small> @endif
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
		<span class="text-right req">Zip Code <span class="reqsign">*</span></span>
		{{ Form::text('zip_code', null, ['class' => 'form-control']) }}
        @if ($errors->has('zip_code')) <small class="form-text help-block" style="color:red">{{ $errors->first('zip_code') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('province')) has-error @endif">
		<span class="text-right req">Province <span class="reqsign">*</span></span>
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
		<span class="text-right req">Enter Chapha <span class="reqsign">*</span></span>
		{{ Form::text('captcha', null, ['class' => 'form-control']) }}
        @if ($errors->has('captcha')) <small class="form-text help-block" style="color:red">Captcha Tidak Sesuai</small> @endif
	</div>
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
<script>
  $(document).ready( function () {
    $('#province-option').select2({
      placeholder: "-- Pilih Provinsi --",
      theme: "bootstrap4",
    });
		$('#city-option').select2({
      placeholder: "-- Pilih Kabupaten --",
      theme: "bootstrap4",
    });
		$('#district-option').select2({
      placeholder: "-- Pilih Kecamatan --",
      theme: "bootstrap4",
    });

		$('#province-option').on('change', function() {
      var provinceId = $(this).val();
      if(provinceId) {
          $.ajax({
              url: '/api/cities/'+provinceId,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.cities){
                  $('#city-option').empty();
                  $('#city-option').prop('disabled', false);
                  $('#district-option').empty();
                  $('#district-option').prop('disabled', true);

                  $('#city-option').append('<option value="" selected disabled>Pilih Kota</option>'); 
                  $.each(data.cities, function(key, city){
                      $('#city-option').append('<option value="'+ city.kode +'">' + city.nama+ '</option>');
                  });
              }else{
                  $('#city-option').empty();
                  $('#city-option').prop('disabled', true);
                  $('#district-option').empty();
                  $('#district-option').prop('disabled', true);
              }
            }
          });
      }else{
        $('#city-option').empty();
        $('#city-option').prop('disabled', true);
        $('#district-option').empty();
        $('#district-option').prop('disabled', true);
      }
    });
		$('#city-option').on('change', function() {
      var cityId = $(this).val();
      if(cityId) {
          $.ajax({
              url: '/api/districts/'+cityId,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.districts){
                  $('#district-option').empty();
                  $('#district-option').prop('disabled', false);
                  $('#district-option').append('<option value="" selected disabled>Pilih Kecamatan</option>'); 
                  $.each(data.districts, function(key, district){
                      $('#district-option').append('<option value="'+ district.kode +'">' + district.nama+ '</option>');
                  });
              }else{
                  $('#district-option').empty();
                  $('#district-option').prop('disabled', true);
              }
            }
          });
      }else{
        $('#district-option').empty();
        $('#district-option').prop('disabled', true);
      }
    });
  } );
</script>
@endpush