
    <div class="form-group 	@if ($errors->has('name')) has-error @endif">
		<label class="col-sm-3 control-label">Name</label>
		<div class="col-sm-6">
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		</div>
		@if ($errors->has('name')) <small class="form-text help-block" style="color:red">{{ $errors->first('name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('email')) has-error @endif">
		<label class="col-sm-3 control-label">Email</label>
		<div class="col-sm-6">
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
		</div>
		@if ($errors->has('email')) <small class="form-text help-block" style="color:red">{{ $errors->first('Email') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account_name')) has-error @endif">
		<label class="col-sm-3 control-label">Password</label>
		<div class="col-sm-6">
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
		</div>
		@if ($errors->has('password')) <small class="form-text help-block" style="color:red">{{ $errors->first('password') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('status')) has-error @endif">
	<label class="col-sm-3 control-label">Confirm Password</label>
	<div class="col-sm-6">
		{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
		</div>
	</div>

