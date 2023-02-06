@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>

                <li class="active">Bank Management</li>
            </ol>

            <h1>Bank Management</h1>
            <div class="options">
                <div class="btn-toolbar">
              
                    <a href="https://psbyhom.com/bank_controller/create_bank.html" class="btn btn-default"><i class="fa fa-plus"></i> Create New Bank</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Bank</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
										<th>No</th>
										<th>Bank Name</th>
										<th>Bank Account No</th>
										<th>Bank Account Name</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<tr><td valign='top'>1</td><td><a href="https://psbyhom.com/bank_controller/view_bank/a9c74b20-5d72-11e8-9fac-ac1f6b451820.html">BCA</a></td><td valign='top'>6730259652</td><td valign='top'>Engeline Herawati</td><td>Active</td></tr><tr><td valign='top'>2</td><td><a href="https://psbyhom.com/bank_controller/view_bank/875db0b7-09f9-48ae-9b68-2ec6d731e5f8.html">Mandiri</a></td><td valign='top'>1420007355448</td><td valign='top'>Astrid Hendrianti</td><td>Active</td></tr>                                </tbody>
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
						<h4 class="card-title">Bank Management</h4>
						<a href="{{ route('bank_management.create') }}"  class="btn btn-primary btn-round ml-auto">
						    <i class="fa fa-plus"></i>
							    Create New Bank
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                    <table border="1">
		<tr>
			<th>No</th>
			<th>Bank Name</th>
			<th>Bank Account No</th>
			<th>Bank Account Name</th>
			<th>Status</th>
		</tr>
		@foreach($banks as $b)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td><a href="{{ route('bank_management.edit', $b->id) }}">{{ $b->bank_name }}</a></td>
			<td>{{ $b->bank_account_no }}</td>
			<td>{{ $b->bank_account_name }}</td>
			<td>{{ $b->status }}</td>
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
