
    <div class="form-group 	@if ($errors->has('bank_name')) has-error @endif">
		<label class="col-sm-3 control-label">Bank Name</label>
		<div class="col-sm-6">
		{{ Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		</div>
		@if ($errors->has('bank_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account_name')) has-error @endif">
	<label class="col-sm-3 control-label">Bank Account Name</label>
	<div class="col-sm-6">
		{{ Form::text('bank_account_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Account Name']) }}
		</div>
		@if ($errors->has('bank_account_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account_name')) has-error @endif">
	<label class="col-sm-3 control-label">Bank Account No</label>
	<div class="col-sm-6">
		{{ Form::text('bank_account_no', null, ['class' => 'form-control', 'placeholder' => 'Bank Account No']) }}
	</div>
		@if ($errors->has('bank_account_no')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account_no') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('status')) has-error @endif">
	<label class="col-sm-3 control-label">Status</label>
	<div class="col-sm-6">
		{{ Form::select('status', ['Enabled' => 'Enabled', 'Disabled' => 'Disabled'], null, ['class' => 'form-select '.($errors->has('gender') ? 'is-invalid':''), 'id' => 'gender-option', 'placeholder' => '-- Pilih Status --']) }}
		</div>
		@if ($errors->has('status')) <small class="form-text help-block" style="color:red">{{ $errors->first('status') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('notes')) has-error @endif">
	<label class="col-sm-3 control-label">Catatan</label>
	<div class="col-sm-6">
		{{ Form::text ('notes', null, ['class' => 'form-control', 'placeholder' => 'notes']) }}
</div>
		@if ($errors->has('notes')) <small class="form-text help-block" style="color:red">{{ $errors->first('notes') }}</small> @endif
	</div>

