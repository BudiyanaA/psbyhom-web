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
		{{ Form::select('province', $province, null, ['class' => 'form-control',  'placeholder' => 'Pilih Provinsi', 'id' => 'province-option', 'disabled' => true]); }}
        @if ($errors->has('province')) <small class="form-text help-block" style="color:red">{{ $errors->first('province') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('city')) has-error @endif">
		<span class="text-right req">Kota <span class="reqsign">*</span></span>
		{{ Form::select('city', $cities, null, ['class' => 'form-control',  'placeholder' => 'Pilih Kota', 'id' => 'city-option', 'disabled' => true]); }}
        @if ($errors->has('city')) <small class="form-text help-block" style="color:red">{{ $errors->first('city') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('district')) has-error @endif">
		<span class="text-right req">Kecamatan <span class="reqsign">*</span></span>
		{{ Form::select('district', $districts, null, ['class' => 'form-control',  'placeholder' => 'Pilih Kecamatan', 'id' => 'subdistrict-option', 'disabled' => true]); }}
        @if ($errors->has('district')) <small class="form-text help-block" style="color:red">{{ $errors->first('district') }}</small> @endif
	</div>
  {!! NoCaptcha::renderJs() !!}
  
  @if ($errors->has('g-recaptcha-response'))
      <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
  @endif

  {!! NoCaptcha::display() !!}

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $.ajax({
        url: '/api/rajaongkir/provinces',
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(data)
        {
          if(data.provinces){
            $('#province-option').empty();
            $('#province-option').prop('disabled', false);
            $('#city-option').empty();
            $('#city-option').prop('disabled', true);
            $('#subdistrict-option').empty();
            $('#subdistrict-option').prop('disabled', true);

            $('#province-option').append('<option value="" selected disabled>Pilih Provinsi</option>'); 
            $.each(data.provinces, function(key, province){
                $('#province-option').append('<option value="'+ province.id +'">' + province.name+ '</option>');
            });
        }else{
            $('#province-option').empty();
            $('#province-option').prop('disabled', true);
            $('#city-option').empty();
            $('#city-option').prop('disabled', true);
            $('#subdistrict-option').empty();
            $('#subdistrict-option').prop('disabled', true);
        }
      }
    });

		$('#province-option').on('change', function() {
      var provinceId = $(this).val();
      if(provinceId) {
          $.ajax({
              url: '/api/rajaongkir/cities/'+provinceId,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.cities){
                  $('#city-option').empty();
                  $('#city-option').prop('disabled', false);
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', true);

                  $('#city-option').append('<option value="" selected disabled>Pilih Kota</option>'); 
                  $.each(data.cities, function(key, city){
                      $('#city-option').append('<option value="'+ city.id +'">' + city.name+ '</option>');
                  });
              }else{
                  $('#city-option').empty();
                  $('#city-option').prop('disabled', true);
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', true);
              }
            }
          });
      }else{
        $('#city-option').empty();
        $('#city-option').prop('disabled', true);
        $('#subdistrict-option').empty();
        $('#subdistrict-option').prop('disabled', true);
      }
    });

		$('#city-option').on('change', function() {
      var cityId = $(this).val();
      if(cityId) {
          $.ajax({
              url: '/api/rajaongkir/subdistricts/'+cityId,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data.subdistricts){
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', false);
                  $('#subdistrict-option').append('<option value="" selected disabled>Pilih Kecamatan</option>'); 
                  $.each(data.subdistricts, function(key, district){
                      $('#subdistrict-option').append('<option value="'+ district.id +'">' + district.name+ '</option>');
                  });
              }else{
                  $('#subdistrict-option').empty();
                  $('#subdistrict-option').prop('disabled', true);
              }
            }
          });
      }else{
        $('#subdistrict-option').empty();
        $('#subdistrict-option').prop('disabled', true);
      }
    });
	});

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
@endsection