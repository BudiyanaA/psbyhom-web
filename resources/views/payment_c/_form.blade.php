
	<div style="text-weight:bolder;color:red">{{-- $error_message --}}</div>
	<div class="form-group 	@if ($errors->has('invoice_amount')) has-error @endif col-md-6 col-lg-12">
		<span class="text-right req">Invoice<span class="reqsign">*</span></span>
		{{ Form::select('invoice_id', $invoice, null, ['class' => 'form-control',  'placeholder' => '--Select Invoice No You Want to Confirm Payment--', 'id' => 'invoice_id']); }}
		@if ($errors->has('invoice_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('invoice_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('invoice_amount')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Invoice Amount</span>
		{{ Form::text('invoice', "0",  ['class' => 'form-control',  'readonly' => 'readonly', 'id' => 'total_amount']); }}
		@if ($errors->has('invoice_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('invoice_amount') }}</small> @endif
		<input type="hidden" id="type_invoice">
	</div>
    <div class="form-group 	@if ($errors->has('payment_amount')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Payment Amount<span class="reqsign">*</span> <b class="keterangan"><i></i></b></span>
		{{ Form::text('total_amount', "0", ['class' => 'form-control', 'placeholder' => 'Payment Amount']) }}
		@if ($errors->has('payment_amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('payment_amount') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_destination')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Bank Destination<span class="reqsign">*</span></span>
		{{ Form::select('bank_id', $banks, null, ['class' => 'form-control',  'placeholder' => '--Select Bank--']); }}
		@if ($errors->has('bank_destination')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_destination') }}</small> @endif
	</div>
    <div class="form-group @if ($errors->has('payment_date')) has-error @endif col-md-6 col-lg-12">
    <span class="text-right req">Payment Date<span class="reqsign">*</span></span>
    {{ Form::text('payment_date', null, ['id' => 'datepicker', 'class' => 'form-control']) }}
    @if ($errors->has('payment_date')) <small class="form-text help-block" style="color:red">{{ $errors->first('payment_date') }}</small> @endif
</div>
    <div class="form-group 	@if ($errors->has('bank_name')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Your Bank name<span class="reqsign">*</span></span>
		{{ Form::text('source_bank_name', null, ['class' => 'form-control']) }}
		@if ($errors->has('bank_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('bank_account')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Your Bank Account No<span class="reqsign">*</span></span>
		{{ Form::number('source_acct_no', null, ['class' => 'form-control']) }}
		@if ($errors->has('bank_account')) <small class="form-text help-block" style="color:red">{{ $errors->first('bank_account') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('account_name')) has-error @endif col-md-6 col-lg-12">
	<span class="text-right req">Your Account Name<span class="reqsign">*</span></span>
		{{ Form::text('source_acct_name', null, ['class' => 'form-control']) }}
		@if ($errors->has('account_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('account_name') }}</small> @endif
	</div>

@section('script')
<script>
	$("#invoice_id").change(function() {
		var value=$(this).val();
		var invoice_id = $("#invoice_id option:selected").text();
		var type_invoice = invoice_id.slice(-2);
		if(type_invoice == "DP")
		{
			$(".keterangan").html(" (Min DP 50 %)");
		}
		else 
		{
			$(".keterangan").html("");
		}
		$("#type_invoice").val(type_invoice);

		if(value != '') {
			$.ajax({
        url: '/api/invoice/amount/' + value,
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(data)
        {
          if(data.amount){
						$("#total_amount").val(format_rupiah(data.amount));
						// $("#total_invoice").val(data.amount);
        	} else {
						$("#total_amount").val("0");
						// $("#total_invoice").val("0");
						$("#type_invoice").val("");
    	    }
    	  }
    	});
		} else {
			$("#total_amount").val("0");
			// $("#total_invoice").val("0");
			$("#type_invoice").val("");
		}
	});

	function format_rupiah(str) {
		var symbol = '';
		return accounting.formatMoney(str, symbol, 0, ".", ",");
	}	

	$(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

</script>
@endsection