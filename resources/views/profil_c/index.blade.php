@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

	<    <div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><h3  ><strong style="color:darkgray ">My Profile</strong></h3><br>
	</div><div class="col-lg-12">
<div class="form-checkout" onLoad="get_kecamatan_api()">
		<div class="form-register">
			<form class="form-group row" id='edit_profile_form' name='edit_profile_form' method="POST" action="https://psbyhom.com/proses_update.html?CustomerUUID=045194b4-2867-4442-92eb-c295b4d59454">
				<div class="col-sm-6">
					<div class="form-group">
						<span class="text-right req">Email <span class="reqsign">*</span></span>
						<input class="form-control" name="txtEmail" id='email' type="email" size="40" maxlength="50" required="required" value='' readonly>
		
					</div>
					<div class="form-group">
						<span class="text-right req">Full Name<span class="reqsign">*</span></span>
						<input class="form-control" name="txtNama" id='nama_lengkap' type="text" size="40" maxlength="40" required="required" value='' >
					</div>
		
					<div class="form-group">
						<span class="text-right req">Handphone 1<span class="reqsign">*</span></span>
						<input class="form-control" name="txtPonsel1" id='hp1' type="text" size="20" maxlength="20" required="required" value='' >
					</div>
					<div class="form-group">
						<span class="text-right req">Handphone 2<span class="reqsign">:</span></span>
						<input class="form-control" name="txtPonsel2" id='hp2' type="text" size="20" maxlength="20" value='' >
					</div>
					<div class="form-group">
						<span class="text-right req">Fax<span class="reqsign"></span></span>
						<input class="form-control" name="txtFax" id='fax' type="text" size="20" maxlength="20" value='' >
					</div>
					
					
				
					<div class="form-group" style="display:none">
						<input class="form-control" name="txtAlamat2" type="text" size="40" maxlength="" >
					</div>
				</div>
				<div class="col-sm-6">
				<div  class="form-group">
				<div class="form-group">
						<span class="text-right req">Address <span class="reqsign">*</span></span>
						<input class="form-control" name="txtAlamat1" id='address' type="text" size="40" maxlength="255" required="required" value='' >
					</div>
						<div class="form-group">
						<span class="text-right req">ZIP Code<span class="reqsign"></span></span>
						<input class="form-control" name="txtKodepos" id='zip_code' type="text" size="10" maxlength="10" value='' >
					</div>
		
					<span class="text-right req">Province <span class="reqsign">*</span></span>
						<select required name="provinsi" id="provinsi" class="form-control"   = "">
											<option value="">-Select Province-</option>
																									
													
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
									
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					<br>	
						<input class="btn btn-default more" type="button" id="update_profile" name="update_profile" value="Update Profile">
					
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