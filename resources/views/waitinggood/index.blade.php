@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Home</a></li>
  
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
								@foreach($waitinggoods as $w)
									<tr >													
										<input type="hidden" value="fde5e673-5e1d-455a-8fe7-f3eec3f78f85" class='PODtlUUID' name="PODtlUUID100">
										<input type="hidden" value="1" name="qty_po100">
										<td><a href="{{ route('preorder.detail', $o->RequestOrderUUID) }}">{{ $w->po_id }}</a></td>
										<td>{{ $w->price_customer - ($w->price_customer * $disc_percentage / 100) }}</td>
											<td>{{ $w->incoming_qty }}</td>
											<td><a href="{{ $w->product_url }}">LINK</a></td>
											<td>{{ $w->product_name }}</td>
											<td><a href="{{ route('customer.detail', $o->CustomerUUID) }}">{{ $w->customer?->customer_name }}</a></td>			
											<td valign='top'>		
												<a href="#" class="batchorder" data-type="text" data-name="batchorder">
													{{ $w->batch_no }}
												</a>	
											</td>
											<td style="width:20%">												
												<a href="#" class="arrival_status" data-type="select"  data-name="batchorder">
												{{ $w->status_item }}
												</a>
												<span class="tambahan">	</span>
												<input type='hidden' class='stat' value='00'>
												<input type='hidden' class='qty_real' value='1'>
												<input type='hidden' class='incoming' value='1'>
												<input type='hidden' class='harga' value='848300'>
											</td>																								
										</td>
									</tr>
								@endforeach	
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" />

<script>
  $(document).ready(function() {
    $('.batchorder').editable({
      url: '/update-batch', // URL untuk menyimpan perubahan ke database
      title: 'Edit Batch No',
      type: 'text',
      params: function(params) {
        params._token = '{{ csrf_token() }}'; // Tambahkan token CSRF untuk keamanan
        return params;
      },
      ajaxOptions: {
        type: 'put' // Menggunakan metode PUT untuk mengirim data ke server
      }
    });
  });

  $(document).ready(function() {
  $('.arrival_status').editable({
    url: '/update-status', // URL untuk menyimpan perubahan ke database
    title: 'Edit Arrival Status',
    type: 'select',
    source: [
      {value: '00', text: 'Not Arrived'},
      {value: '01', text: 'OK'},
      {value: '02', text: 'Reject'},
    ],
    params: function(params) {
      params._token = '{{ csrf_token() }}'; // Tambahkan token CSRF untuk keamanan
      return params;
    },
    ajaxOptions: {
      type: 'put' // Menggunakan metode PUT untuk mengirim data ke server
    },
    display: function(value, sourceData) {
      var text = '';
      $.each(sourceData, function(index, item) {
        if (item.value == value) {
          text = item.text;
          return false;
        }
      });
      $(this).text(text);
    }
  });
});
</script>




