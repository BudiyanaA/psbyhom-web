@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

	   <div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><h3  ><strong style="color:darkgray ">My Profile</strong></h3><br>
	</div><div class="col-lg-12">
<div class="form-checkout" onLoad="get_kecamatan_api()">
		<div class="form-register">
			<form class="form-group row" id='edit_profile_form' name='edit_profile_form' method="post" action="{{ route('profil.update') }}">
			@csrf
				<div class="col-sm-6">
					<div class="form-group">
						<span class="text-right req">Email <span class="reqsign">*</span></span>
						<input class="form-control" name="email" id='email' type="email" size="40" maxlength="50" required="required" value='{{$profil->email}}' readonly>
		
					</div>
					<div class="form-group">
						<span class="text-right req">Full Name<span class="reqsign">*</span></span>
						<input class="form-control" name="customer_name" id='nama_lengkap' type="text" size="40" maxlength="40" required="required" value='{{$profil->customer_name}}' >
					</div>
		
					<div class="form-group">
						<span class="text-right req">Handphone 1<span class="reqsign">*</span></span>
						<input class="form-control" name="handphone" id='hp1' type="text" size="20" maxlength="20" required="required" value='{{$profil->handphone}}' >
					</div>
					<div class="form-group">
						<span class="text-right req">Handphone 2<span class="reqsign">:</span></span>
						<input class="form-control" name="handphone2" id='hp2' type="text" size="20" maxlength="20" value='{{$profil->handphone2}}' >
					</div>
					<div class="form-group">
						<span class="text-right req">Kecamatan <span class="reqsign">*</span></span>
							<select required name="kecamatan" class="form-control" id="subdistrict-option"></select>
                  <div style="font-size:10px; display:none" id="loading1">Loading...</div>
								
									
					</div>
					
					
				
					<div class="form-group" style="display:none">
						<input class="form-control" name="txtAlamat2" type="text" size="40" maxlength="" >
					</div>
				</div>
				<div class="col-sm-6">
				<div  class="form-group">
				<div class="form-group">
						<span class="text-right req">Address <span class="reqsign">*</span></span>
						<input class="form-control" name="address" id='address' type="text" size="40" maxlength="255" required="required" value='{{$profil->address}}' >
					</div>
						<div class="form-group">
						<span class="text-right req">ZIP Code<span class="reqsign"></span></span>
						<input class="form-control" name="kodepos" id='zip_code' type="text" size="10" maxlength="10" value='{{$profil->kodepos}}' >
					</div>
					<div class="form-group">
					<span class="text-right req">Province <span class="reqsign">*</span></span>
						<select required name="province" id="province-option" class="form-control" ></select>
									<div style="font-size:10px; display:none" id="loading1">Loading...</div>
								
									
					</div>
					<div class="form-group">
					<span class="text-right req">Kota <span class="reqsign">*</span></span>
						<select required name="cities" id="city-option" class="form-control" ></select>
                  <div style="font-size:10px; display:none" id="loading1">Loading...</div>
								
									
					</div>
					
					
				
					<!--<div class="form-group">
						<span class="text-right req">Company <span class="reqsign"></span></span>
						<input class="form-control" name="txtPerusahaan" type="text" size="40" maxlength="50">
					</div>
					<div class="form-group">
						<span class="text-right req">Telephone <span class="reqsign">*</span></span>
						<input class="form-control" name="txtTelepon" type="text" size="20" maxlength="20" required="required">
					</div>-->
					
					<!--<div class="form-group">
						<span class="req">Persetujuan Keanggotaan<span class="reqsign"></span></span>
						<div class="text-agreement"></div>
					</div>
					<div class="form-group">
						<label><span><input class="checkbox-input" name="chkAgreement" type="checkbox" value="1" required>Saya setuju dan menerima perjanjian di atas</span></label>
					</div>-->
									
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					<br>	
						<input class="btn btn-default more" type="submit" id="update_profile" name="update_profile" value="Update Profile">
					
					</div>
				</div>
			</form>
		</div>
		</div>	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection

@section('script')
<script>
    const errorMessage = "{{ session('error') }}";
    if(errorMessage){
        alert(errorMessage);
    }

    const successMessage = "{{ session('success') }}";
    if(successMessage){
        alert(successMessage);
    }
</script>
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

            var provinces = data.provinces; // simpan data provinsi ke dalam variabel

            $('#province-option').append('<option value="" selected disabled>Pilih Provinsi</option>'); 
            $.each(provinces, function(key, province){
                $('#province-option').append('<option value="'+ province.id +'">' + province.name+ '</option>');
            });

            // set nilai default untuk form select provinsi
            var defaultProvinceId = '{{$profil->provinsi_new}}'; // contoh nilai default
            $('#province-option').val(defaultProvinceId);
            $('#province-option').trigger('change'); // panggil trigger change untuk mengambil data kota berdasarkan nilai default provinsi
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

                  var cities = data.cities; // simpan data kota ke dalam variabel

                  $('#city-option').append('<option value="" selected disabled>Pilih Kota</option>'); 
                  $.each(cities, function(key, city){
                      $('#city-option').append('<option value="'+ city.id +'">' + city.name+ '</option>');
                  });

                  // set nilai default untuk form select kota
                  var defaultCityId = '{{$profil->kota_new}}'; // contoh nilai default
                  $('#city-option').val(defaultCityId);
                  $('#city-option').trigger('change'); // panggil trigger change untuk mengambil data kecamatan berdasarkan nilai default kota
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

                        var subdistricts = data.subdistricts; // simpan data kecamatan ke dalam variabel

                        $('#subdistrict-option').append('<option value="" selected disabled>Pilih Kecamatan</option>'); 
                        $.each(subdistricts, function(key, subdistrict){
                            $('#subdistrict-option').append('<option value="'+ subdistrict.id +'">' + subdistrict.name+ '</option>');
                        });

                        // set nilai default untuk form select kecamatan
                        var defaultSubdistrictId = '{{$profil->kecamatan_new}}'; // contoh nilai default
                        $('#subdistrict-option').val(defaultSubdistrictId);
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
</script>
@endsection