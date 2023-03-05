@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li class="active">Costumer Management</li>
            </ol>

            <h1>Withdrawal List</h1>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="tab-pane active" id="wallet">
                        <div class="panel-body collapse in">
						                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
										<th>No</th>
                                        <th>Costumer Name</th>
                                        <th>Bank</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($withdrawal as $w)
                                    <tr>
																				<input type="hidden" value="{{ $w->withdrawUUID }}" class='withdrawUUID' name="withdrawUUID{{$loop->index}}">
                                        <td valign='top'>{{ $loop->index + 1 }}</td>
                                        <td valign='top'>{{ $w->msCustomer?->customer_name}}</td>
																				<td valign='top'>{{ $w->bank_name ." | ". $w->account_no ." a/n: ". $w->account_name }}</td>
                                        <td valign='top'>{{ $w->trans_date}}</td>
                                        <td valign='top'>{{ $w->amount}}</td>
                                        <td valign='top'>
																					<a href="#" class="status_withdrawal" data-type="select" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi">
																						@if($w->status == '00')
																							Pending
																						@elseif($w->status == '01')
																							Finish
																						@elseif($w->status == '02')
																							Reject
																						@endif
																					</a>
																				</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>

                        
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div> 
@endsection

@section ('script')
<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';
		$('.status_withdrawal').editable({
      type: 'select',
      source: [
        {value: '00', text: 'Pending'},
        {value: '01', text: 'Finish'},
        {value: '02', text: 'Reject'},
      ],
    });

		$('.status_withdrawal').on('save', function(e, params) { 
			var status = params.newValue;
			var withdrawUUID = $(this).closest('tr').find('.withdrawUUID').val();

				$.ajax({
					url: '/api/status_withdrawal/update',
        	type:"POST",
					data:{withdrawUUID:withdrawUUID,status:status},
					success: function(respond) 
					{
						if (data.success) {					
							alert("Successfully update status !");
							location.reload();
						}
					}
				})	
		});
</script>
@endsection