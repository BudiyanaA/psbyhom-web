@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
  
                <li class="active">List of PO Waiting Goodies</li>
            </ol>

            <h1>Waiting Goodies</h1>
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>Waiting Goodies</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						<form action="https://psbyhom.com/incoming_item_controller/validate_update.html" class="form-horizontal row-border "  data-validate="parsley" id="validate-form"  method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
										<tr>
											<th>PO ID</th>
											<th>Price($)</th>
											<th>Qty</th>
											<th>URL</th>
											<th>Name</th>
											<th>Customer Name</th>
											<th>Batch ID</th>
											<th>Status/Keterangan</th>
					
										</tr>
									</thead>
              <tbody>
              @if(count($waitinggoods) > 0)
								@foreach($waitinggoods as $w)
                  @foreach ($w->poDtls as $dtl)
									<tr >													
										<input type="hidden" value="{{ $dtl->PODtlUUID }}" class='PODtlUUID' name="PODtlUUID100">
										<input type="hidden" value="1" name="qty_po100">
										<td>
                      @if ($loop->index == 0)
                        <a href="{{ route('poinvoice.detail', $dtl->POUUID) }}">{{ $w->po_id }}</a>
                      @else
                        <p style='color: white;font-size: 1px;'>{{ $w->po_id }}</p>
                      @endif
                    </td>
                    <td>
                      @php
                        $price_customer = $dtl->requestOrderDtl?->price_customer - ($w->requestOrderDtl?->price_customer * $w->requestOrderDtl?->disc_percentage / 100);
                      @endphp
                      {{ number_format($price_customer,2) }}
                    </td>
                    <td style="width:8%" class="incoming_qty2">{{ $dtl->incoming_qty }}</td>
										<td><p id="price"><a href="{{ $dtl->requestOrderDtl?->product_url }}">LINK</a></p></td>
										<td style="width:20%">{{ $dtl->requestOrderDtl?->product_name }}</td>
										<td style="width:20%"><a href="{{ route('customer.detail', $w->CustomerUUID) }}">{{ $w->msCustomer?->customer_name  }}</a></td>			
										<td style="width:18%" valign='top'>		
											<a href="#" class="batchorder" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
												@if ($dtl->batch_no != '')
                          {{ $dtl->batch_no }}
                        @endif
											</a>	
										</td>
										<td style="width:20%">												
											<a href="#" class="arrival_status" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="batchorder">
                        @if ($dtl->status == '00') Not Arrived
                        @elseif ($dtl->status == '01') OK
                        @elseif ($dtl->status == '02') Reject
						@elseif ($dtl->status == '03') Confirm
						@elseif ($dtl->status == '04') Shiped
						@elseif ($dtl->status == '05') Delivered
						@elseif ($dtl->status == '02') Otw Indo
                        @endif
											</a>
											<span class="tambahan">
                        @if ($dtl->status == '02')
                          / <a href="#" class="keterangan_item" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan_item">{{ $dtl->keterangan }}</a>
                        @endif
                      </span>
											<input type='hidden' class='stat' value='00'>
											<input type='hidden' class='qty_real' value='{{ $dtl->qty }}'>
											<input type='hidden' class='incoming' value='1'>
											<input type='hidden' class='harga' value='{{ $dtl->price }}'>
										</td>																								
									</tr>
                  @endforeach
								@endforeach
                @else
                  <tr>
                      <td colspan="8">Data not found.</td>
                  </tr>
              @endif

				                </tbody>
                            </table>
							<input type='hidden' name="total_row" id='total_row' value='101'>
	            			<div class="panel-footer">
                				<div class="row">
                    		<div class="col-sm-6 col-sm-offset-3">
					                        <div class="btn-toolbar">
						
								
                        </div>
					                    </div>
                </div>
            </div>
			</FORM>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection

@section ('script')
<script>
  $(document).ready(function() {
    $.fn.editable.defaults.mode = 'inline';
    $('.batchorder').editable({
      title: 'Enter batch order',
      type: 'text',
    });
    $('.arrival_status').editable({
      type: 'select',
      source: [
        {value: '00', text: 'Not Arrived'},
        {value: '01', text: 'OK'},
        {value: '02', text: 'Reject'},
		{value: '03', text: 'Confirm'},
		{value: '04', text: 'Shiped'},
		{value: '05', text: 'Delivered'},
		{value: '06', text: 'Otw Indo'},
      ],
    });

    $('.batchorder').on('save', function(e, params) {
	  	var batch_no = params.newValue;
	  	var PODtlUUID = $(this).closest('tr').find('.PODtlUUID').val();
    
	  	$.ajax({
        url: '/api/batch_order/update',
        type:"POST",
	  		data:{PODtlUUID:PODtlUUID,batch_no:batch_no},
	  		success: function(data) {
          if (data.success) {
            $(this).closest('tr').find('.batchorder').html(batch_no);
          }
	  			//alert("Success update Batch No !");
	  		}
	  	})
	  });
    $('.arrival_status').on('save', function(e, params) {
		  var status_item = params.newValue;
		  var qty = $(this).closest('tr').find('.qty_real').val(); 
		  var PODtlUUID = $(this).closest('tr').find('.PODtlUUID').val();
		  var harga = $(this).closest('tr').find('.harga').val();
      
		  if(status_item =='02' )
		  {
		  	$(this).closest('tr').find('.incoming_qty2').html('0');
		  	$(this).closest('tr').find('.tambahan').append('/ <a href="#" class="keterangan" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="keterangan"></a>');
		  	keterangan();
		  }
		  else if(status_item != '02'	)
		  {
		  	$(this).closest('tr').find('.incoming_qty2').html(qty);
		  	$(this).closest('tr').find('.tambahan').html('');
		  }
      
		  $.ajax({
        url: '/api/status_item/update',
        type: "POST",
		  	data:{PODtlUUID:PODtlUUID,status_item:status_item,qty:qty,harga:harga},
		  	success: function(data) 
		  	{
          console.log(data);
		  		//alert(respond)
		  		//$(this).closest('tr').find('.arrival_status').html(status_item);
		  		//alert("Success update Status Item !");
		  	}
		  })
	  });
  });

  function keterangan()
	{
		$('.keterangan').editable(
		{
			type:  'text',
			title: 'Enter batch order',
		});
		
		$('.keterangan').on('save', function(e, params) 
		{
			var keterangan = params.newValue;
			var PODtlUUID = $(this).closest('tr').find('.PODtlUUID').val();
				
			$.ajax({
        url: '/api/keterangan/update',
        type: "POST",
				data:{PODtlUUID:PODtlUUID,keterangan:keterangan},
				success: function(data) 
				{
          console.log(data);
					//$(this).closest('tr').find('.batchorder').html(batch_no);
					//alert("Success update keterangan !");
				}
			})
		})
	}

	

</script>
@endsection
