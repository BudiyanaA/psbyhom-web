
<!-- <ul class="breadcrumbs">
	<li class="nav-home">
		<a href="#">
			<i class="flaticon-home"></i>
		</a>
	</li>
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#"></a>
	</li>
</ul> -->

    <div class="row">
        <div class="col-md-12">					
			@if (Session::has('success'))
				<div class="alert alert-success alert-dismissible" role="alert">
					{{ Session::get('success') }}
				</div>
			@endif
			<div class="card">
				<div class="card-header">
                    <div class="d-flex align-items-center">
						<h4 class="card-title">Slideshow Management</h4>
						<a href="{{ route('slideshow_management.create') }}"  class="btn btn-primary btn-round ml-auto">
						    <i class="fa fa-plus"></i>
							    Tambah Slideshow
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                    <table border="1">
		<tr>
			<th>No</th>
			<th>Slidehow Name</th>
			<th>Slidehow No</th>
			<th>Thumbnail</th>
			<th>Status</th>
		</tr>
		@foreach($slides as $s)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td><a href="{{ route('slideshow_management.edit', $s->id) }}">{{ $s->slideshow_name }}</a></td>
			<td>{{ $s->slideshow_no }}</td>
			<td>{{ $s->image }}</td>
			<td>{{ $s->status }}</td>
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
@endsection
