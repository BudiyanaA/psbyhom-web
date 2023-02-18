@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><div class="col-lg-12"><h3  ><strong style="color:darkgray ">Change Password</strong></h3><br>
	</div><div class="col-lg-12">
<div class="form-checkout">
		<div class="form-register">
        <form method="POST" action="{{ route('changepassword.update') }}">
            @method('patch')
            @csrf
				<div class="col-sm-6">
                <div class="form-group">
						<span class="text-right req">{{ __('Current Password') }}<span class="reqsign">*</span></span>
						<input class="form-control @error('current_password') is-invalid @enderror" name="password" id='current_password' type="password" size="40" maxlength="50" required="required" value='' >
		
					</div>

					<div class="form-group">
						<span class="text-right req">Password Baru<span class="reqsign">*</span></span>
						<input class="form-control" name="password" id='password' type="password" size="40" maxlength="50" required="required" value='' >
		
					</div>
					<div class="form-group">
						<span class="text-right req">Konfirmasi Password Baru<span class="reqsign">*</span></span>
						<input class="form-control" name="password_confirmation" id='password-confirm' type="password" size="40" maxlength="40" required="required" value='' >
					</div>
						<div class="form-group">
					<br>	
                    <button type="submit" class="btn btn-primary">
                                                    Ubah Password
                                                </button>
					
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