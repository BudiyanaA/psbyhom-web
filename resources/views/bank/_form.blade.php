<div class="row">
    <div class="form-group 	@if ($errors->has('bank_name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Bank Name</label>
		{{ Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		@if ($errors->has('bank_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account_name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Bank Account Name</label>
		{{ Form::text('bank_account_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Account Name']) }}
		@if ($errors->has('bank_account_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account_name')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Bank Account No</label>
		{{ Form::text('bank_account_no', null, ['class' => 'form-control', 'placeholder' => 'Bank Account No']) }}
		@if ($errors->has('bank_account_no')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account_no') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('status')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Status</label>
		{{ Form::select('status', ['Enabled' => 'Enabled', 'Disabled' => 'Disabled'], null, ['class' => 'form-select '.($errors->has('gender') ? 'is-invalid':''), 'id' => 'gender-option', 'placeholder' => '-- Pilih Status --']) }}
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('notes')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Catatan</label>
		{{ Form::text ('notes', null, ['class' => 'form-control', 'placeholder' => 'notes']) }}
		@if ($errors->has('notes')) <small class="form-text help-block" style="color:red">{{ $errors->first('notes') }}</small> @endif
	</div>
</div>
