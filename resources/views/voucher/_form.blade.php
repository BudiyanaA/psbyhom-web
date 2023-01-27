<div class="row">
    <div class="form-group 	@if ($errors->has('voucher_id')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Voucher Id</label>
		{{ Form::text('voucher_id', null, ['class' => 'form-control', 'placeholder' => 'Voucher Id']) }}
		@if ($errors->has('voucher_id')) <small class="form-text help-block" style="color:red">{{ $errors->first('voucher_id') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('expiry_date')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Expiry Date</label>
		{{ Form::date('expiry_date', null, ['class' => 'form-control', 'placeholder' => 'Expiry Date']) }}
		@if ($errors->has('expiry_date')) <small class="form-text help-block" style="color:red">{{ $errors->first('expiry_date') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('discount_amount')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">Discount Amount</label>
		{{ Form::text ('discount_amount', null, ['class' => 'form-control', 'placeholder' => 'Discount Amount']) }}
		@if ($errors->has('discount_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('discount_amount') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('remarks')) has-error @endif col-md-6 col-lg-6">
		<label for="email2">remarks</label>
		{{ Form::text ('remarks', null, ['class' => 'form-control', 'placeholder' => 'remarks']) }}
		@if ($errors->has('remarks')) <small class="form-text help-block" style="color:red">{{ $errors->first('remarks') }}</small> @endif
	</div>
</div>
