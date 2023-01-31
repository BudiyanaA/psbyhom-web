<div class="row">
    <div class="form-group 	@if ($errors->has('name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Name</label>
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		@if ($errors->has('name')) <small class="form-text help-block" style="color:red">{{ $errors->first('name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('email')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Email</label>
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
		@if ($errors->has('email')) <small class="form-text help-block" style="color:red">{{ $errors->first('Email') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account_name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Password</label>
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
		@if ($errors->has('password')) <small class="form-text help-block" style="color:red">{{ $errors->first('password') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('status')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Confirm Password</label>
		{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
	</div>
</div>
