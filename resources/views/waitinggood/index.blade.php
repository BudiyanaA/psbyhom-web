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
												<div class="batchorder" data-type="text" data-name="batchorder" data-poid="{{ $w->id }}" data-batchid="{{ $w->batch_no }}">
													<span class="batch-no">{{ $w->batch_no }}</span>
													<input type="text" class="form-control edit-batch-no" value="{{ $w->batch_no }}" style="display:none;">
												</div>
											</td>
											<td style="width:20%">												
												<a href="#" class="arrival_status" data-type="select" data-name="batchorder">
												@if($w->status == '00')
													Not Arrived
												@elseif($w->status == '01')
													OK
												@elseif($w->status == '02')
													Reject
												@endif
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
<script>
	$(document).ready(function() {
	// Menangani klik pada Batch ID untuk mengaktifkan mode pengeditan
	$(document).on('click', '.batchorder', function() {
		$(this).find('.batch-no').hide();
		$(this).find('.edit-batch-no').show().focus();
	});
	
	// Menangani perubahan pada Batch ID dan menyimpannya ke database
	$(document).on('blur', '.edit-batch-no', function() {
		var newBatchID = $(this).val();
		var batchOrder = $(this).closest('.batchorder');
		var poid = batchOrder.data('poid');
		var batchid = batchOrder.data('batchid');
		
		// Lakukan pembaruan ke tabel 'tr_po_dtl' melalui AJAX
		$.ajax({
			url: '/update-batch-no',
			type: 'POST',
			data: {
				poid: poid,
				batchid: batchid,
				newBatchID: newBatchID
			},
			success: function(response) {
				// Tampilkan Batch ID yang baru disimpan
				batchOrder.find('.batch-no').html(newBatchID).show();
				batchOrder.find('.edit-batch-no').hide();
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});
	});
});
	
</script>