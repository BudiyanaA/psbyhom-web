@extends('layouts.costumerapp')
@section('content')

<!-- Page Content -->
<div class="container" id="content">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3><strong style="color:darkgray">Reset Password</strong></h3>
				<br>
			</div>
			<div class="col-lg-12">
				<div class="form-checkout">
					<div class="form-register">
						<form class="form-group row" id="change_password_form" name="change_password_form" method="POST" action="{{ route('password.resetaction') }}">
							@csrf
              <div class="col-sm-6">
								<input class="form-control" name="token_id" id="token_id" type="hidden" size="40" maxlength="50" required="required" value="{{ $token_id }}>" readonly>
								<div class="form-group">
									<span class="text-right req">Password Baru<span class="reqsign">*</span></span>
									<input class="form-control" name="new_password" id="new_password" type="password" size="40" maxlength="50" required="required" value="">
								</div>
								<div class="form-group">
									<span class="text-right req">Konfirmasi Password Baru<span class="reqsign">*</span></span>
									<input class="form-control" name="new_password_confirm" id="new_password_confirm" type="password" size="40" maxlength="40" required="required" value="">
								</div>
								<div class="form-group">
									<br>
									<input class="btn btn-default more" type="submit" id="update_password" name="update_password" value="Ubah Password">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="blockfooter">
			<div class="wrapper"></div>
		</div>
	</div>
	<div class="blockseparator"></div>
</div>
	
@endsection
