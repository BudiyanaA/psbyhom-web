@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Home</a></li>
                
                <li class="active">List of Pre Orders</li>
            </ol>
						<h1>Waiting Customer Approval</h1>
                       <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
												<h4>Waiting Customer Approval</h4>
					                               <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						<form method="get" action="https://psbyhom.com/request_order_controller/search_filter_request_transaction">
								<table class="search-table">
									<tr>
										<td>Order Date Start &nbsp; &nbsp; </td>
										<td><input type="text" class="form-control mask" name="trans_date_start" value="" data-inputmask="'alias': 'date'"></td>
									</tr>
									<tr>
										<td>Order Date End &nbsp;  &nbsp; </td>
										<td><input type="text" class="form-control mask" name="trans_date_end"  value="" data-inputmask="'alias': 'date'"></td>
									</tr>
									
									<tr>
										<td>PO ID  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Request No" class="form-control" value="" name='request_id' autocomplete="off"></td>
									</tr>

									<!--<tr>
										<td>Status &nbsp; &nbsp;</td>
										<td width="250px">
										<select class="form-control" name="status">
												<option value="">--All Status--</option>
												<option value="00">Pending Admin Verification</option> <!-- Status awal saat customer submit 
												<option value="01">Pending Customer Approval</option> <!-- Status saat admin kirim penawaran 
												<option value="02">Customer Approved</option> <!-- Status saat customer submit checkout 
												<option value="03">Rejected</option>
											</select>
										
										</td>
									</tr>
									-->
									<input type="hidden" name="status" value='01'>
									<!--<tr>
										
										<td>Nama Customer  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Customer Name" class="form-control" name='customer_name'  value="" autocomplete="off"></td>
									</tr>
									--
								
									
									<!--pilihan untuk sorting data 21-12-2015-->
									<tr>
										<td>Order By &nbsp; &nbsp; </td>
										<td width="250px">
										<select class="form-control" name="order_by">
												<option value="ASC">Ascending</option>
												<option selected value="DESC">Descending</option>
												
											</select>
										
										</td>
									</tr>
									<tr>
										<td>&nbsp; &nbsp;  </td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<input type="submit" class="btn-primary btn" value='Search'>
										</td>
									</tr>
								</table>
								<br>
								<br>
							</form>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered " id="example">
                                <thead>
                                    <tr>
										<th>No</th>
                                        <th>PO ID</th>
                                        <th>Customer Name</th>
										<th>Created Date</th>
										<th>Variety Items</th>
										<th>Total Price</th>
										<th>Status</th>										
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ><td valign='top'>1</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/a6d2cac9-e4be-4c85-822a-433ad0789bcd.html">ZI23020153</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/93849333-5d01-4cf2-828e-07aee8fa78d5.html">Manik Kirani</a></td><td>05 Feb 2023</td><td>3</td><td>2,782,400</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>2</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/17222503-1c5c-429b-9b45-53778fcc0153.html">YV23020152</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/4ec4b91f-2957-4f2b-ade9-0f967939c616.html">Jesslyn Prijanto</a></td><td>05 Feb 2023</td><td>6</td><td>2,257,640</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>3</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/86cabdf8-718c-4af6-9106-51eff728615c.html">IB23020150</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/5c8ea8b6-529c-4c08-9060-8af097995acd.html">Rachel Valerie</a></td><td>04 Feb 2023</td><td>4</td><td>10,215,032</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>4</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/418bd005-8fae-4574-acea-cd7b349b1dd3.html">GL23020151</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/5c8ea8b6-529c-4c08-9060-8af097995acd.html">Rachel Valerie</a></td><td>04 Feb 2023</td><td>1</td><td>2,382,344</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>5</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/09558469-29ef-406c-a4ce-2ecc72fa7a90.html">ZT23020146</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html">Enriko Abadi</a></td><td>01 Feb 2023</td><td>1</td><td>831,253</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>6</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/874f9093-3559-4b72-9d22-995d34e58f5f.html">ID23020145</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/d45ad557-d725-4460-ba71-7e2838881f47.html">Christine</a></td><td>01 Feb 2023</td><td>7</td><td>4,114,963</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>7</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/f7a41329-6f5c-4ed3-a0c6-0946aa7cf018.html">QZ23010143</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/8237bfe4-4c4c-47f8-b69b-3d6bf4cdedb4.html">Vania</a></td><td>30 Jan 2023</td><td>1</td><td>563,600</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>8</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/5e089bb3-8949-4829-934d-39add094e3b1.html">PW23010141</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/1d9acb50-af3c-432e-bef4-14ec091e9d03.html">Edwina Hartanti</a></td><td>29 Jan 2023</td><td>1</td><td>2,576,960</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>9</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/f0cc1f7b-2f96-4f2c-8b1d-dc0c997d331d.html">GX23010142</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/4e8d3fc3-2b89-45d4-ab71-c68e675c12d3.html">Aldila Oey (Harry)</a></td><td>30 Jan 2023</td><td>2</td><td>1,520,960</td><td>Pending Customer Approval</td></tr><tr ><td valign='top'>10</td><td><a href="https://psbyhom.com/request_order_controller/view_request_order/e6463a8e-1cc5-4e7e-afbb-756c997cf181.html">BG23010140</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html">Enriko Abadi</a></td><td>29 Jan 2023</td><td>1</td><td>813,429</td><td>Pending Customer Approval</td></tr>                                </tbody>
                            </table>
							<ul class="pagination"><li class="active"><a href="#">1</a></li><li><a href="https://psbyhom.com/request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=01&customer_name=&order_by=DESC&amp;per_page=2">2</a></li><li><a href="https://psbyhom.com/request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=01&customer_name=&order_by=DESC&amp;per_page=3">3</a></li><li><a href="https://psbyhom.com/request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=01&customer_name=&order_by=DESC&amp;per_page=4">4</a></li><li><a href="https://psbyhom.com/request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=01&customer_name=&order_by=DESC&amp;per_page=2">&raquo</a></li><li><a href="https://psbyhom.com/request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=01&customer_name=&order_by=DESC&amp;per_page=510">Last</a></li></ul>                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection