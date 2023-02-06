@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li class="active">Slideshow  Management</li>
            </ol>

            <h1>Slideshow  Management</h1>
            <div class="options">
                <div class="btn-toolbar">
						                    <a href="https://psbyhom.com/isms_slideshow_management/create_slide.html" class="btn btn-default"><i class="fa fa-plus"></i> Create New Slide</a>
					
				</div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Slideshow</h4>
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
										<th>Slideshow Name</th>
										<th>Slideshow No</th>
										
										<th>Thumbnail</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<tr><td valign='top'>1</td><td><a href="https://psbyhom.com/isms_slideshow_management/view_slide/4a2a48fc-9c84-4306-a9a8-e0d67344eeb8.html">Slider 1</a></td><td>1</td><td><img src="https://psbyhom.com//img/slide/Slider_1.png" alt="Slider 1" class="post_images" width="200" height="100" title="Slider 1" rel="lightbox"/></td><td>Disabled</td></tr><tr><td valign='top'>2</td><td><a href="https://psbyhom.com/isms_slideshow_management/view_slide/287fae59-5858-4a14-a344-8088920ca30a.html">Slide 2</a></td><td>2</td><td><img src="https://psbyhom.com//img/slide/Slide_2.jpg" alt="Slide 2" class="post_images" width="200" height="100" title="Slide 2" rel="lightbox"/></td><td>Enabled</td></tr><tr><td valign='top'>3</td><td><a href="https://psbyhom.com/isms_slideshow_management/view_slide/26504148-1746-4104-bc29-5c40ae4669d0.html">Slide 3</a></td><td>3</td><td><img src="https://psbyhom.com//img/slide/Slide_3.jpg" alt="Slide 3" class="post_images" width="200" height="100" title="Slide 3" rel="lightbox"/></td><td>Enabled</td></tr>                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection






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
@endsection -->
