<div class="row">
	<div class="form-group 	@if ($errors->has('invoice_amount')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Invoice<span class="reqsign">*</span></span>
		{{ Form::select('invoice', $invoice, null, ['class' => 'form-control',  'placeholder' => '--Pilih Invoice--']); }}
		@if ($errors->has('invoice_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('invoice_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('invoice_amount')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Invoice Amount</span>
	{{ Form::text('invoice', $amount,  ['class' => 'form-control',  'readonly' => 'readonly']); }}
		@if ($errors->has('invoice_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('invoice_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('payment_amount')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Payment Amount<span class="reqsign">*</span></span>
		{{ Form::text('payment_amount', null, ['class' => 'form-control', 'placeholder' => 'Payment Amount']) }}
		@if ($errors->has('payment_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('payment_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_destination')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Bank Destination<span class="reqsign">*</span></span>
		{{ Form::select('bank', $banks, null, ['class' => 'form-control',  'placeholder' => '--Select Bank--']); }}
		@if ($errors->has('bank_destination')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_destination') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('payment_date')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Payment Date<span class="reqsign">*</span></span>
		{{ Form::date('payment_date', null, ['class' => 'form-control', 'placeholder' => 'Payment Date']) }}
		@if ($errors->has('payment_date')) <small class="form-text help-block" style="color:red">{{ $errors->first('payment_date') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_name')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Your Bank name<span class="reqsign">*</span></span>
		{{ Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name']) }}
		@if ($errors->has('bank_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Your Bank Account No*<span class="reqsign">*</span></span>
		{{ Form::number('bank_account', null, ['class' => 'form-control', 'placeholder' => 'Bank Account']) }}
		@if ($errors->has('bank_account')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('account_name')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Your Account Name*<span class="reqsign">*</span></span>
		{{ Form::text('account_name', null, ['class' => 'form-control', 'placeholder' => 'Account Name']) }}
		@if ($errors->has('account_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('account_name') }}</small> @endif
	</div>
</div>