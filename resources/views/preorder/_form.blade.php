

    @if (Session::has('errors'))
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <input type="hidden" name="counter" id='counter' value="{{ old('counter', 1) }}">
    @php
        $row = old('counter') ?? 1;
    @endphp
    @for ($i = 0; $i < $row; $i++)
    <tr id="remove_po_{{ $i }}">
        <td class="@if ($errors->has('qty.'.$i)) has-error @endif">
            {{ Form::number('qty['.$i.']', null, ['class' => 'form-control']) }}
        </td>
        <td class="@if ($errors->has('product_url.'.$i)) has-error @endif">
            {{ Form::text('product_url['.$i.']', null, ['class' => 'form-control']) }}
        </td>
        <td class="@if ($errors->has('product_name.'.$i)) has-error @endif">
            {{ Form::text('product_name['.$i.']', null, ['class' => 'form-control']) }}
        </td>
        <td class="@if ($errors->has('color.'.$i)) has-error @endif">
            {{ Form::text('color['.$i.']', null, ['class' => 'form-control']) }}
        </td>
        <td class="@if ($errors->has('size.'.$i)) has-error @endif">
            {{ Form::text('size['.$i.']', null, ['class' => 'form-control']) }}
        </td>
        <td class="@if ($errors->has('price_customer.'.$i)) has-error @endif">
            {{ Form::text('price_customer['.$i.']', null, ['class' => 'form-control', 'step' => 'any']) }}
        </td>
        <td class="@if ($errors->has('remarks.'.$i)) has-error @endif">
            {{ Form::text('remarks['.$i.']', null, ['class' => 'form-control']) }}
        </td>
        @if ($i != 0)
            <td>
                <a href="#" onclick="removeItemReq('{{ $i }}')">
                    <img src='{{ url("assets/img/deletepic.png") }}' alt="Remove Pro Order">
                </a>
            </td>
        @endif
    </tr>
@endfor

    {{ Form::hidden('RequestOrderUUID', null, ['class' => 'form-control' , 'id' => 'RequestOrderUUID']) }}

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