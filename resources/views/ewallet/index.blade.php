@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li class="active">Costumer Management</li>
            </ol>

            <h1>Ewallet List</h1>
            <
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
                                        <th>Trans Date</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Po Id</th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($ewallet as $e)
                                    <tr>
                                        <td valign='top'>{{ $loop->index + 1 }}</td>
                                        <td valign='top'>{{ $e->msCustomer?->customer_name}}</td>
                                        <td valign='top'>{{ $e->trans_date}}</td>
                                        <td valign='top'>{{ $e->amount}}</td>
                                        <td valign='top'>{{ $e->description}}</td>
                                        <td valign='top'>{{ $e->po?->request_id}}</td>
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