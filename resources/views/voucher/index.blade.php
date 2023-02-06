@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>

                <li class="active">Voucher Management</li>
            </ol>

            <h1>Voucher Management</h1>
            <div class="options">
                <div class="btn-toolbar">
              
                    <a href="https://psbyhom.com/voucher_controller/create_voucher.html" class="btn btn-default"><i class="fa fa-plus"></i> Create New Voucher</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Voucher</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered  " id="example">
                                <thead>
                                    <tr>
										<th>No</th>
										<th>Voucher ID</th>
										<th>Created Date</th>
										<th>Expiry Date</th>
										<th>Discount Value</th>
										<th>Remarks</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<tr><td valign='top'>1</td><td><a href="https://psbyhom.com/voucher_controller/view_voucher/e5e94f47-48d5-11e9-a1ad-ac1f6b451820.html">V0001</a></td><td valign='top'>01 Mar 2019</td><td valign='top'>22 Mar 2019</td><td valign='top'>100,000</td><td valign='top'></td><td>Used</td></tr><tr><td valign='top'>2</td><td><a href="https://psbyhom.com/voucher_controller/view_voucher/722c42b7-f260-464f-af6c-78f6e947b71a.html">V0002</a></td><td valign='top'>30 Nov -0001</td><td valign='top'>03 Apr 2019</td><td valign='top'>150,000</td><td valign='top'>tes</td><td>Unused</td></tr><tr><td valign='top'>3</td><td><a href="https://psbyhom.com/voucher_controller/view_voucher/b539260d-0d05-4c98-bda6-8814355f4d69.html">V0003</a></td><td valign='top'>01 Apr 2019</td><td valign='top'>25 Apr 2019</td><td valign='top'>350,000</td><td valign='top'>testawgagaawa</td><td>Unused</td></tr>                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection







<!-- <div class="row">
        <div class="col-md-12">					
			@if (Session::has('success'))
				<div class="alert alert-success alert-dismissible" role="alert">
					{{ Session::get('success') }}
				</div>
			@endif
			<div class="card">
				<div class="card-header">
                    <div class="d-flex align-items-center">
						<h4 class="card-title">Voucher Management</h4>
						<a href="{{ route('voucher_management.create') }}"  class="btn btn-primary btn-round ml-auto">
						    <i class="fa fa-plus"></i>
							    Tambah Voucher
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                    <table border="1">
		<tr>
			<th>No</th>
			<th>Voucher Id</th>
			<th>Created Date</th>
			<th>Expiry Date</th>
			<th>Discount Value</th>
            <th>Remarks</th>
            <th>Status</th>
		</tr>
		@foreach($vouchers as $v)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td><a href="{{ route('voucher_management.edit', $v->id) }}">{{ $v->voucher_id }}</a></td>
            <td>{{ $v->created_at }}</td>
			<td>{{ $v->expiry_date }}</td>
			<td>{{ $v->discount_amount }}</td>
			<td>{{ $v->remarks }}</td>
            <td>-</td>
		</tr>
		@endforeach
	</table>
					</div>
				</div>
			</div>
		</div>
    </div>


@section('script')
<script>
  $(document).ready(function() {
		$('#basic-datatables').DataTable({
        "pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
		});
  });

  function deleteItem(id) {
    swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			buttons:{
				confirm: {
					text : 'Yes, delete it!',
					className : 'btn btn-success'
				},
				cancel: {
					visible: true,
					className: 'btn btn-danger'
				}
			}
		}).then((Delete) => {
			var url = '{{ route("slideshow_management.destroy", ":id") }}';
    	url = url.replace(':id', id);

			if (Delete) {
				$.ajax({
				url: url,
				method: 'delete',
				cache: false,
				data: {
					"_token": "{{ csrf_token() }}",
				},
				success: function(data){
          if (data === 'success') {
						swal({
							title: 'Deleted!',
							text: 'Your file has been deleted.',
							type: 'success',
							buttons : {
								confirm: {
									className : 'btn btn-success'
								}
							}
						});
            // $('#dt-prv').DataTable().ajax.reload();
            location.reload();
          } else {
						swal({
							title: 'Oops...',
							text: 'Ada yang salah!',
							type: 'error',
							buttons : {
								confirm: {
									className : 'btn btn-danger'
								}
							}
						});
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
					swal({
						title: 'Oops...',
						text: 'Ada yang salah!',
						type: 'error',
						buttons : {
							confirm: {
								className : 'btn btn-danger'
							}
						}
					});
        }
      });
			} else {
				swal.close();
			}
		});
  }
</script>
@endsection -->
