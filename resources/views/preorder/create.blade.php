@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
    @if(session()->has('user_id'))
	    <div class="row">
            <div class="col-lg-12"><h3 ><strong style="color:darkgray ">Request Pre Order</strong></h3><br></div>
                <div class="col-lg-12">
                    <div class="row">
                    @if(Session::has('error'))
						<script>
							alert("{{ Session::get('error') }}");
						</script>
					@endif
                        <div class="col-md-12">
                        {{ Form::open(['url' => route('preorder.store'), 'class' => 'form-horizontal' ])}}
                                <div class="table-responsive">
                                    <table id="pre-order" class="tablex table-borderedx">	
                                        <tr>
                                            <td>Qty</td>
                                            <td>URL/Product Link</td>
                                            <td>Product Name</td>
                                            <td>Color</td>
                                            <td>Size / Weight</td>
                                            <td>Price (USD)</td>
                                            <td>Info</td>
                                        </tr>
                                        
                                        @include('preorder._form')
                                        
                                    </table>
                                </div><br/>
																<div class="button-container">
																	<a id="tambahpo" href="javascript:void(0)" class="btn btn-default more">Add</a>
																	<button class="btn btn-default more">Submit</button>
																</div>
                                {{ Form::close() }}
                            <div class="poalert">
                                <i><center>This is the request order list to get the quotation from us in IDR. <br>For each items you requested, you can choose either to continue order or not based on our Quotation.<br> We will send the Quotation to your registered email or you can check <a href="{{ route('preorderlist') }}" >Request Order List</a> menu..<br> Thank You.</i></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
            
@endsection