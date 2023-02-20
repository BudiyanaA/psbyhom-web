@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li><a href="https://psbyhom.com/isms_customer_management/list_of_customer.html">Customer Management</a></li>
                <li class="active">View Customer Detail</li>
            </ul>

            <h1>Customer Information</h1>
			<br>
			<br>
        </div>
<div class="row">
<div class="container">
    <div class="col-xs-12">
		<div class="panel panel-midnightblue">
			<div class="panel-heading">
				  <h4>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#threads" data-toggle="tab"><i class="fa fa-list visible-xs icon-scale"></i><span class="hidden-xs">Member Information</span></a></li>
						<li><a href="#trx" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Transaction</span></a></li>
						<li><a href="#ewallet" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">E-Wallet History</span></a></li>
						<li><a href="#comments" data-toggle="tab"><i class="fa fa-comments visible-xs icon-scale"></i><span class="hidden-xs">Log Activity</span></a></li>
						
					 
					</ul>
				  </h4>
				  <!-- <div class="options">
					<a href="javascript:;"><i class="fa fa-cog"></i></a>
					<a href="javascript:;"><i class="fa fa-wrench"></i></a> 
				  </div> -->
			</div>
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane active" id="threads">
							<ul class="panel-threads">
								<form action="https://psbyhom.com/isms_customer_management/validate_customer_update/a9963b3a-fc86-4f89-94a4-ca4186f32902" class="form-horizontal row-border"  method="post" data-validate="parsley" id="validate-form">
																		<div class="form-group">
										<label for="inputFN" class="col-sm-2 control-label">Customer Name<span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" readonly required class="form-control" id="inputFN" name="customer_name"  value="Aphrodita mayangsari">
										</div>
									</div>
									
						
									<div class="form-group">
										<label for="inputCN" class="col-sm-2 control-label">Address</label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="inputCN"  name="nama_comp" value="Jl. Gardenia utara blok b1/30 villa galaxi">
										</div>
									</div>
									<div class="form-group">
										<label for="inputCN" class="col-sm-2 control-label">Handphone No.</label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="inputCN" name="no_hp" value="081223512351">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAdd" class="col-sm-2 control-label">Email <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="email" readonly class="form-control" id="inputAdd" name="email" value="avoxo23@yahoo.com">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputAdd" class="col-sm-2 control-label">Dropshipper Name <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="dropshipper_name" name="dropshipper_name" value="">
										</div>
									</div>
									
										<div class="form-group">
										<label for="inputAdd" class="col-sm-2 control-label">Dropshipper Contact <span class="required">*</span></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" id="dropshipper_hp" name="dropshipper_hp" value="">
										</div>
									</div>
								
									
									</ul>
									
									<div class="btn-toolbar">
										<div class="col-sm-6 col-sm-offset-3">	
											<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
																						<button class="btn-primary btn" value ='locked' name='submit' >Banned/Lock</button>
																																											</div>
									</div>
							</div>
							<div class="tab-pane" id="trx">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Invoice No</th>
											<th>Trx Date</th>
											<th>Grand Total</th>
											

										</tr>
									</thead>
									<tbody>
																						<tr >
															<td valign='top' colspan='5' align='center'>No Record Found</td>
															
														</tr>
																			</tbody>
								</table>
							</div>
							<div class="tab-pane" id="ewallet">
						
							<br>
							<br>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Trans Date</th>
											
											<th>Amount</th>
											<th>Description</th>
										

										</tr>
									</thead>
									<tbody>
																						<tr >
															<td valign='top' colspan='5' align='center'>No Record Found</td>
															
														</tr>
																			</tbody>
								</table>
							Total Current E-Wallet Amount : 
							<strong>0</strong>							</div>
							<div class="tab-pane" id="comments">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Log Time</th>
											<th>Function Name</th>
											<th>Description</th>
										

										</tr>
									</thead>
									<tbody>
																							
														<tr >
															<td valign='top'>1</td>
															<td>19 Feb 2023</td>
															<td>Submit Request Order</td>
															<td>Submit Request Order : TY23020170</td>
														</tr>
																									
														<tr >
															<td valign='top'>2</td>
															<td>13 Feb 2023</td>
															<td>Submit Request Order</td>
															<td>Submit Request Order : GP23020166</td>
														</tr>
																									
														<tr >
															<td valign='top'>3</td>
															<td>22 Jan 2023</td>
															<td>Submit Request Order</td>
															<td>Submit Request Order : TX23010113</td>
														</tr>
																									
														<tr >
															<td valign='top'>4</td>
															<td>17 Jun 2022</td>
															<td>Submit Request Order</td>
															<td>Submit Request Order : LG22061221</td>
														</tr>
																									
														<tr >
															<td valign='top'>5</td>
															<td>17 Jun 2022</td>
															<td>Submit Request Order</td>
															<td>Submit Request Order : TK22061219</td>
														</tr>
																									
														<tr >
															<td valign='top'>6</td>
															<td>17 Jun 2022</td>
															<td>Customer Register</td>
															<td>Customer Register dengan email : avoxo23@yahoo.com</td>
														</tr>
																				</tbody>
								</table>
							</div>
						</div>
								<!--<div class="panel-footer">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<div class="btn-toolbar">
											
													<button class="btn-primary btn" value ='update' name='submit' onclick="javascript:$('#validate-form').parsley( 'validate' );">Submit</button>
											
													<button class="btn-primary btn" value ='delete' name='submit' onclick="ConfirmDelete()">Delete</button>
											
											</div>
										</div>
									</div>
								</div>-->
			                </form>
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