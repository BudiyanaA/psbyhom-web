<div class="row">
    <div class="form-group 	@if ($errors->has('invoice_amount')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Invoice Amount *</label>
		{{ Form::text('invoice_amount', null, ['class' => 'form-control', 'placeholder' => 'Invoice Amount']) }}
		@if ($errors->has('invoice_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('invoice_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('payment_amount')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Payment Amount * <b>(Min DP 50 %)</b></label>
		{{ Form::text('payment_amount', null, ['class' => 'form-control', 'placeholder' => 'Payment Amount']) }}
		@if ($errors->has('payment_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('payment_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_destination')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Bank Destination *</label>
		{{ Form::text('bank_destination', null, ['class' => 'form-control', 'placeholder' => 'Bank Destination']) }}
		@if ($errors->has('bank_destination')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_destination') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('payment_date')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Payment Date *</label>
		{{ Form::date('payment_date', null, ['class' => 'form-control', 'placeholder' => 'Payment Date']) }}
		@if ($errors->has('payment_date')) <small class="form-text help-block" style="color:red">{{ $errors->first('payment_date') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('transaction_receipt')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Transaction Receipt *</label>
		{{ Form::file('transaction_receipt', null, ['class' => 'form-control', 'placeholder' => 'Nama']) }}
		@if ($errors->has('transaction_receipt')) <small class="form-text help-block" style="color:red">{{ $errors->first('transaction_receipt') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_name')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Bank Name *</label>
		{{ Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name']) }}
		@if ($errors->has('bank_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Bank Account No *</label>
		{{ Form::number('bank_account', null, ['class' => 'form-control', 'placeholder' => 'Bank Account']) }}
		@if ($errors->has('bank_account')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('account_name')) has-error @endif col-md-6 col-lg-12">
		<label for="email2">Account Name</label>
		{{ Form::text('account_name', null, ['class' => 'form-control', 'placeholder' => 'Account Name']) }}
		@if ($errors->has('account_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('account_name') }}</small> @endif
	</div>
</div>