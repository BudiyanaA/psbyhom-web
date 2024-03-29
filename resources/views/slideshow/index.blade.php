@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Slideshow  Management</li>
            </ol>

            <h1>Slideshow  Management</h1>
            <div class="options">
                <div class="btn-toolbar">
					<a href="{{ route('slideshow_management.create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Create New Slide</a>				
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
									@foreach($slides as $s)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td><a href="{{ route('slideshow_management.edit', $s->SlideUUID) }}">{{ $s->slide_name }}</a></td>
										<td>{{ $s->seq }}</td>
										<td>
                                            <img src="{{ asset('assets/'.$s->image_slide) }}" alt="{{ $s->slide_name }}" width="200" height="100%" class="post_images" title="{{ $s->slide_name }}" rel="lightbox">
										</td>
                                        @if($s->status == '01')
                                            <td>Enabled</td>
                                        @else
                                            <td>Disabled</td>
                                        @endif
										
									</tr>
									@endforeach
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection