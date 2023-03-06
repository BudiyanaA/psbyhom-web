@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>

                <li class="active">Email Content Management</li>
            </ol>

            <h1>Email Content Management</h1>
            <div class="options">
                <div class="btn-toolbar">
              
                   
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Email Notification</h4>
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
										<th>Email Name</th>
										<th>Email Title</th>
										<th>Created Date</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($emails as $e)
                                    <tr>
                                        <td valign='top'>{{ $loop->index + 1 }}</td>
                                        <td><a href="{{ route('email.detail', $e->EmailUUID) }}">{{ $e->email_name }}</a></td>
                                        <td valign='top'>{{ $e->email_title }}</td>
                                        <td valign='top'>{{ \Carbon\Carbon::parse($e->created_at)->format('d F Y') }}</td>
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