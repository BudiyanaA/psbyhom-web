@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><div class="col-lg-12"><h3  ><strong style="color:darkgray ">Register</strong></h3><br>
	
		
	</div><div class="col-lg-12">
<div class="form-checkout">
		<div class="form-register">
			<form class="form-group row" id='register_form' name='register_form' method="POST" action="https://psbyhom.com/proses_register.html">
				<div class="col-sm-6">
					<div class="form-group">
						<span class="text-right req">Email <span class="reqsign">*</span></span>
						<input class="form-control" name="txtEmail" id='email' type="email" size="40" maxlength="50" required="required">
		
					</div>
					<div class="form-group">
						<span class="text-right req">Nama Lengkap <span class="reqsign">*</span></span>
						<input class="form-control" name="txtNama" id='nama_lengkap' type="text" size="40" maxlength="40" required="required">
					</div>
					<div class="form-group">
						<span class="text-right req">Password <span class="reqsign">*</span></span>
						<input class="form-control" name="txtPass1" id='password' type="password" size="20" maxlength="40" required="required">
						<div class="notice">Min. 6 karakter</div>
						<span class="reqsign"></span>
					</div>
					<div class="form-group">
						<span class="text-right req">Konfirmasi Password <span class="reqsign">*</span></span>
						<input class="form-control" name="txtPass2" id='confirm_password' type="password" size="20" maxlength="40" required="required">
					</div>
					<div class="form-group">
						<span class="text-right req">Handphone 1<span class="reqsign">*</span></span>
						<input class="form-control" name="txtPonsel1" id='hp1' type="text" size="20" maxlength="20" required="required">
					</div>
					<div class="form-group">
						<span class="text-right req">Handphone 2<span class="reqsign"></span></span>
						<input class="form-control" name="txtPonsel2" id='hp2' type="text" size="20" maxlength="20">
					</div>
					
				
					
			
					<div class="form-group" style="display:none">
						<input class="form-control" name="txtAlamat2" type="text" size="40" maxlength="50">
					</div>
				</div>
				<div class="col-sm-6">
				<div  class="form-group">
				<div class="form-group">
						<span class="text-right req">Alamat <span class="reqsign">*</span></span>
						<input class="form-control" name="txtAlamat1" id='address' type="text" size="40" maxlength="255" required="required">
					</div>
						<div class="form-group">
						<span class="text-right req">ZIP Code<span class="reqsign"></span></span>
						<input class="form-control" name="txtKodepos" id='zip_code' type="text" size="10" maxlength="10">
					</div>
					<span class="text-right req">Propinsi <span class="reqsign">*</span></span>
						<select required name="provinsi" id="provinsi" class="form-control"   = "">
											<option value="">-Pilih Propinsi-</option>
																									<option value="1">Bali</option>
																									<option value="2">Bangka Belitung</option>
																									<option value="3">Banten</option>
																									<option value="4">Bengkulu</option>
																									<option value="5">DI Yogyakarta</option>
																									<option value="6">DKI Jakarta</option>
																									<option value="7">Gorontalo</option>
																									<option value="8">Jambi</option>
																									<option value="9">Jawa Barat</option>
																									<option value="10">Jawa Tengah</option>
																									<option value="11">Jawa Timur</option>
																									<option value="12">Kalimantan Barat</option>
																									<option value="13">Kalimantan Selatan</option>
																									<option value="14">Kalimantan Tengah</option>
																									<option value="15">Kalimantan Timur</option>
																									<option value="16">Kalimantan Utara</option>
																									<option value="17">Kepulauan Riau</option>
																									<option value="18">Lampung</option>
																									<option value="19">Maluku</option>
																									<option value="20">Maluku Utara</option>
																									<option value="21">Nanggroe Aceh Darussalam (NAD)</option>
																									<option value="22">Nusa Tenggara Barat (NTB)</option>
																									<option value="23">Nusa Tenggara Timur (NTT)</option>
																									<option value="24">Papua</option>
																									<option value="25">Papua Barat</option>
																									<option value="26">Riau</option>
																									<option value="27">Sulawesi Barat</option>
																									<option value="28">Sulawesi Selatan</option>
																									<option value="29">Sulawesi Tengah</option>
																									<option value="30">Sulawesi Tenggara</option>
																									<option value="31">Sulawesi Utara</option>
																									<option value="32">Sumatera Barat</option>
																									<option value="33">Sumatera Selatan</option>
																									<option value="34">Sumatera Utara</option>
																					</select>
					</div>
					<div class="form-group">
						<span class="text-right req">Kota <span class="reqsign">*</span></span>
							<select required name="city" class="form-control" id="city"   = "">
										<option value="">-Please select-</option>
												
									</select><div style="font-size:10px; display:none" id="loading1">Loading...</div>
								
									
					</div>
				
					<div class="form-group">
						<span class="text-right req">Kecamatan <span class="reqsign">*</span></span>
							<select required name="kecamatan" class="form-control" id="kecamatan"   = "">
										<option value="">-Please select-</option>
												
									</select><div style="font-size:10px; display:none" id="loading1">Loading...</div>
								
									
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
					<div class="form-group">
					    <label>Captcha</label>
					    <br>
					    <span><img src="https://psbyhom.com/captcha-images/1675307315.22.jpg" width="150" height="30" style="border:0;" alt=" " /></span>
					</div>
				    <div class="form-group">
				        <label>Enter Captcha Text</label>
				        <input type="text" id="captcha" name="captcha" class="form-control" required>
				    </div>
								
				</div>
				<div class="col-sm-6"></div>
				<div class="col-sm-6">
				    
					<div class="form-group">
						<input class="btn btn-default more" type="button" id="daftar" name="daftar" value="Register">
						<p>*required field</p>
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