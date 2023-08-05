
  <div class="form-group @if ($errors->has('trans_date')) has-error @endif">
		<label class="col-sm-3 control-label">trans_date </label>
		<div class="col-sm-6">
			{{ Form::date ('trans_date', date('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'trans_date']) }}
		</div>
		@if ($errors->has('trans_date')) <small class="form-text help-block" style="color:red">{{ $errors->first('trans_date') }}</small> @endif
	</div>  
  <div class="form-group @if ($errors->has('amount')) has-error @endif">
		<label class="col-sm-3 control-label">Amount </label>
		<div class="col-sm-6">
			{{ Form::number ('amount', null, ['class' => 'form-control', 'placeholder' => 'amount']) }}
		</div>
		@if ($errors->has('amount')) <small class="form-text help-block" style="color:red">{{ $errors->first('amount') }}</small> @endif
	</div>  
  <div class="form-group @if ($errors->has('description')) has-error @endif">
		<label class="col-sm-3 control-label">Description</label>
		<div class="col-sm-6">
			{{ Form::text ('description', null, ['class' => 'form-control', 'placeholder' => 'description']) }}
		</div>
		@if ($errors->has('description')) <small class="form-text help-block" style="color:red">{{ $errors->first('description') }}</small> @endif
	</div>
