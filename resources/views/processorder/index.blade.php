@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row">
	<div class="container">
		<div class="col-xs-12">
			<div class="panel panel-midnightblue">
				<div class="panel-heading">
					<h4>
						<ul class="nav nav-tabs">
						<li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Pree Order</span></a></li>
						<li><a href="#comments" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Delivery & Summary</span></a></li>					
						</ul>
					</h4>
				</div>
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane active" id="threads">
							<h3>Pree Order</h3>
							<div style="width: 20%; float: left;">
								<h4>PO ID</h4>
							</div>
							<div style="width: 80%; float: right;">
								<h4>TR23020162</h4>
							</div>
							<div style="width: 20%; float: left;">
								<h4>Request Date</h4>
							</div>
							<div style="width: 80%; float: right;">
								<h4>20 JAN 2023</h4>
							</div>
							<div style="width: 20%; float: left;">
								<h4>Status</h4>
							</div>
							<div style="width: 80%; float: right;">
								<h4>Pending Your Approval</h4>
							</div>
							<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table stat-table table-bordered" style="text-align:left">
						<tr style="background:black;color:white">
							<th align='left'>Qty</th>
							<th align='left'>URL Product</th>
                            <th align='left'>Product Name</th>
							<th align='left'>color</th>
                            <th align='left'>Size/Weight</th>
							<th align='left'>Approved</th>
                            <th align='left'>Pice</th>
                            <th align='left'>Info</th>
							<th >Subtotal (IDR)</th>
						</tr>
						<tr>
                                @foreach($preorders as $p)
									<tr>
										<td>{{ $p->qty }}</td>
                                        <td><a href="{{ $p->link }}">Link Produk</a></td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->color }}</td>
                                        <td>{{ $p->sizeweight }}</td>
										<td>
											<input type="checkbox" name="selected[]" value="{{ $p->id }}">
										</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->info }}</td>
                                        <td>{{ $p->qty * $p->price }}</td>
									</tr>
								@endforeach
						</tr>
					</table>
				</div>
			</div>

						</div>
							<div class="tab-pane" id="comments">
								<ul class="panel-comments">
									<textarea name="content" id="content" cols="80" rows="20" class="ckeditor" ><p>HELLO Welcome to House of make up.</p>
										<p>Berdiri sejak tahun 2009 dengan nama Make up house.</p>
										<p>House of make up adalah Indonesia based online shop yang membantu kalian membeli barang di US yang limited edition , special edition , new launch ,produk SALE atau yang tidak ada di Indonesia dengan harga yang affordable &amp; reasonable.</p>
										<p>Kita melakukan order 1-2 x dalam seminggu dan tanpa minimum pesanan , kecuali beberapa website tertentu <u>(detail)</u>.</p>
										<p>Line@ : @houseofmakeup</p>
										</textarea>
								</ul>
							</div>
							<!-- <div class="panel-footer">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<div class="btn-toolbar">
											<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
											<button class="btn-primary btn" value ='delete' name='submit' onclick="ConfirmDelete()">Delete</button>											
										</div>
									</div>
								</div>
							</div>
			            </form> -->
					</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>



</div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection