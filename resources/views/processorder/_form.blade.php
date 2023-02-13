    <div class="form-group 	@if ($errors->has('name')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Full Name :</label>
		<div class="col-sm-8">
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) }}
		</div>
		@if ($errors->has('name')) <small class="form-text help-block" style="color:red">{{ $errors->first('name') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('address')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Address * :</label>
		<div class="col-sm-8">
		{{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}
		</div>
		@if ($errors->has('address')) <small class="form-text help-block" style="color:red">{{ $errors->first('address') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('province')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Province :</label>
		<div class="col-sm-8">
		{{ Form::text('province', null, ['class' => 'form-control', 'placeholder' => 'Province']) }}
		</div>
		@if ($errors->has('province')) <small class="form-text help-block" style="color:red">{{ $errors->first('province') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('city')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">City * :</label>
		<div class="col-sm-8">
		{{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) }}
		</div>
		@if ($errors->has('city')) <small class="form-text help-block" style="color:red">{{ $errors->first('city') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('district')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">District * :</label>
		<div class="col-sm-8">
		{{ Form::text('district', null, ['class' => 'form-control', 'placeholder' => 'District']) }}
		</div>
		@if ($errors->has('district')) <small class="form-text help-block" style="color:red">{{ $errors->first('district') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('courier')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Courier * :</label>
		<div class="col-sm-8">
		{{ Form::text('courier', null, ['class' => 'form-control', 'placeholder' => 'Courier']) }}
		</div>
		@if ($errors->has('courier')) <small class="form-text help-block" style="color:red">{{ $errors->first('courier') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('delivery')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Delivery :</label>
		<div class="col-sm-8">
		{{ Form::text('delivery', null, ['class' => 'form-control', 'placeholder' => 'Delivery']) }}
		</div>
		@if ($errors->has('delivery')) <small class="form-text help-block" style="color:red">{{ $errors->first('delivery') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('zip_code')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Zip Code :</label>
		<div class="col-sm-8">
		{{ Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => 'Zip Code']) }}
		</div>
		@if ($errors->has('zip_code')) <small class="form-text help-block" style="color:red">{{ $errors->first('zip_code') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('nohp_1')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Hanphone 1 * :</label>
		<div class="col-sm-8">
		{{ Form::text('nohp_1', null, ['class' => 'form-control', 'placeholder' => 'Hanphone 1']) }}
		</div>
		@if ($errors->has('nohp_1')) <small class="form-text help-block" style="color:red">{{ $errors->first('nohp_1') }}</small> @endif
	</div>
    <div class="form-group 	@if ($errors->has('nohp_2')) has-error @endif">
		<label class="col-sm-3 control-label" style="font-weight: normal;">Hanphone 2 :</label>
		<div class="col-sm-8">
		{{ Form::text('nohp_2', null, ['class' => 'form-control', 'placeholder' => 'Hanphone 2']) }}
		</div>
		@if ($errors->has('nohp_2')) <small class="form-text help-block" style="color:red">{{ $errors->first('nohp_2') }}</small> @endif
	</div>