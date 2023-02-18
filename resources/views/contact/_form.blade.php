<div class="selang form-group">
    <span class="col-sm-2 text-right">Name * :</span>
    <div class="col-sm-10 col-md-8">
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'size' => '40', 'max_length' => '50']) }}
		@if ($errors->has('name')) <small class="form-text help-block" style="color:red">{{ $errors->first('name') }}</small> @endif
    </div>
</div>
<div class="selang form-group">
    <span class="col-sm-2 text-right">PO Number * :</span>
    <div class="col-sm-10 col-md-8">
    {{ Form::text('po_number', null, ['class' => 'form-control', 'placeholder' => 'Name', 'size' => '50', 'max_length' => '50']) }}
		@if ($errors->has('po_number')) <small class="form-text help-block" style="color:red">{{ $errors->first('po_number') }}</small> @endif
    </div>
</div>
<div class="selang form-group">
    <span class="col-sm-2 text-right">Phone Number * :</span>
    <div class="col-sm-10 col-md-8">
    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Name', 'size' => '20', 'max_length' => '20']) }}
		@if ($errors->has('phone')) <small class="form-text help-block" style="color:red">{{ $errors->first('phone') }}</small> @endif
    </div>
</div>
<div class="selang form-group">
    <span class="col-sm-2 text-right">Email * :</span>
    <div class="col-sm-10 col-md-8">
    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Name', 'size' => '40', 'max_length' => '50']) }}
		@if ($errors->has('email')) <small class="form-text help-block" style="color:red">{{ $errors->first('email') }}</small> @endif
    </div>
</div>
<div class="selang form-group">
<span class="col-sm-2 text-right">Messages * :</span>
    <div class="col-sm-10 col-md-8">
        {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Messages', 'cols' => '40', 'rows' => '5', 'class' => 'notiny']) }}
        @if ($errors->has('message')) 
            <small class="form-text help-block" style="color:red">{{ $errors->first('message') }}</small> 
        @endif
    </div>
</div>
