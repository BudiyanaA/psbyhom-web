
    <div class="form-group 	@if ($errors->has('voucher_id')) has-error @endif">
	<label class="col-sm-3 control-label">Voucher Id</label>
	<div class="col-sm-6">
		{{ Form::text('voucher_id', null, ['class' => 'form-control', 'placeholder' => 'Voucher Id']) }}
	</div>
		@if ($errors->has('voucher_id')) <small class="form-text help-block" style="color:red">{{ $errors->first('voucher_id') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('expiry_date')) has-error @endif">
	<label class="col-sm-3 control-label">Expiry Date</label>
	<div class="col-sm-6">
		{{ Form::date('valid_until_date', null, ['class' => 'form-control', 'placeholder' => 'Expiry Date']) }}
	</div>
		@if ($errors->has('valid_until_date')) <small class="form-text help-block" style="color:red">{{ $errors->first('valid_until_date') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('discount_amount')) has-error @endif">
	<label class="col-sm-3 control-label">Discount Amount</label>
	<div class="col-sm-6">
		{{ Form::text ('discount_amount', null, ['class' => 'form-control', 'placeholder' => 'Discount Amount']) }}
	</div>
		@if ($errors->has('discount_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('discount_amount') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('remarks')) has-error @endif">
	<label class="col-sm-3 control-label">Remarks</label>
	<div class="col-sm-6">
		{{ Form::text ('remarks', null, ['class' => 'form-control', 'placeholder' => 'remarks']) }}
	</div>
		@if ($errors->has('remarks')) <small class="form-text help-block" style="color:red">{{ $errors->first('remarks') }}</small> @endif
	</div>
