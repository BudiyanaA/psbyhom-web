    <td>
		{{ Form::number('qty', null, ['class' => 'form-control']) }}
		@if ($errors->has('qty')) <small class="form-text help-block" style="color:red">{{ $errors->first('qty') }}</small> @endif
    </td>
    <td>
		{{ Form::text('link', null, ['class' => 'form-control']) }}
		@if ($errors->has('link')) <small class="form-text help-block" style="color:red">{{ $errors->first('link') }}</small> @endif
        </td>
    <td>
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		@if ($errors->has('name')) <small class="form-text help-block" style="color:red">{{ $errors->first('name') }}</small> @endif
        </td>
    <td>
		{{ Form::text('color', null, ['class' => 'form-control']) }}
		@if ($errors->has('color')) <small class="form-text help-block" style="color:red">{{ $errors->first('color') }}</small> @endif
        </td>
    <td>
		{{ Form::text('sizeweight', null, ['class' => 'form-control']) }}
		@if ($errors->has('sizeweight')) <small class="form-text help-block" style="color:red">{{ $errors->first('sizeweight') }}</small> @endif
        </td>
    <td>
		{{ Form::number('price', null, ['class' => 'form-control']) }}
		@if ($errors->has('price')) <small class="form-text help-block" style="color:red">{{ $errors->first('price') }}</small> @endif
        </td>
    <td>
		{{ Form::text('info', null, ['class' => 'form-control']) }}
		@if ($errors->has('info')) <small class="form-text help-block" style="color:red">{{ $errors->first('info') }}</small> @endif
        </td>