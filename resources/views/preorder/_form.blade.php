
   <td>
		{{ Form::number('qty[]', null, ['class' => 'form-control']) }}
		@if ($errors->has('qty')) <small class="form-text help-block" style="color:red">{{ $errors->first('qty') }}</small> @endif
    </td>
    <td>
		{{ Form::text('product_url[]', null, ['class' => 'form-control']) }}
		@if ($errors->has('product_url')) <small class="form-text help-block" style="color:red">{{ $errors->first('product_url') }}</small> @endif
        </td>
    <td>
		{{ Form::text('product_name[]', null, ['class' => 'form-control']) }}
		@if ($errors->has('product_name')) <small class="form-text help-block" style="color:red">{{ $errors->first('product_name') }}</small> @endif
        </td>
    <td>
		{{ Form::text('color[]', null, ['class' => 'form-control']) }}
		@if ($errors->has('color')) <small class="form-text help-block" style="color:red">{{ $errors->first('color') }}</small> @endif
        </td>
    <td>
		{{ Form::text('size[]', null, ['class' => 'form-control']) }}
		@if ($errors->has('size')) <small class="form-text help-block" style="color:red">{{ $errors->first('size') }}</small> @endif
        </td>
        <td>
            {{ Form::number('price_customer[]', null, ['class' => 'form-control', 'step' => 'any']) }}
            @if ($errors->has('price_customer')) <small class="form-text help-block" style="color:red">{{ $errors->first('price_customer') }}</small> @endif
        </td>
    <td>
		{{ Form::text('remarks[]', null, ['class' => 'form-control']) }}
		@if ($errors->has('remarks')) <small class="form-text help-block" style="color:red">{{ $errors->first('remarks') }}</small> @endif
        </td>
        <td>
    {{ Form::hidden('RequestOrderUUID', null, ['class' => 'form-control' , 'id' => 'RequestOrderUUID']) }}
    @if ($errors->has('RequestOrderUUID')) <small class="form-text help-block" style="color:red">{{ $errors->first('RequestOrderUUID') }}</small> @endif
</td>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var uuid = create_UUID();
        document.getElementById("RequestOrderUUID").value = uuid;
    });

    function create_UUID(){
        var dt = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (dt + Math.random()*16)%16 | 0;
            dt = Math.floor(dt/16);
            return (c=='x' ? r :(r&0x3|0x8)).toString(16);
        });
        return uuid;
    }
</script>