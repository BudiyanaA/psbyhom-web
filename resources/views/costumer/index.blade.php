
@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li class="active">Costumer Management</li>
            </ol>

            <h1>Costumer Management</h1>
            <
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Customer</h4>
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
                                        <th>Costumer Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($costumer as $c)
                                    <tr >
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="{{ route('customer.detail', $c->CustomerUUID) }}">{{ $c->customer_name }}</a></td>
                                        <td>{{ $c->email }}</td>
                                        <td>{{ $c->created_date }}</td>
                                        <td>
                                        @if ($c->status == '01')
                                            Active
                                        @elseif ($c->status == '03')
                                            Not Active / Reset
                                        @else
                                            {{ $c->status }}
                                        @endif
                                        </td>
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
