@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>
                <li><a href="https://psbyhom.com/po_invoice_controller/po_invoice_filter">Pre Order</a></li>
                <li class="active">List of Pre Order </li>
            </ol>
			
						<h1>Last Payment Confirmation</h1>
			            
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                           							<h4>List of PO Waiting Last Payment Verification</h4>
							                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						<form method="get" action="https://psbyhom.com/po_invoice_controller/search_filter_invoice">
								<table class="search-table">
									<tr>
										<td>Pre Order Date Start  &nbsp; &nbsp; </td>
										<td><input type="text" class="form-control mask" name="trans_date_start"  value=""  data-inputmask="'alias': 'date'"></td>
									</tr>
									<tr>
										<td>Pre Order Date End  &nbsp; &nbsp; </td>
										<td><input type="text" class="form-control mask" name="trans_date_end"  value="" data-inputmask="'alias': 'date'"></td>
									</tr>
									<tr>
										<td>Pre Order ID  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="PO ID" class="form-control" name='po_id'  value="" autocomplete="off"></td>
									</tr>
									<tr>
										<td>Batch Order ID  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Batch ID" class="form-control" name='batch_id'  value="" autocomplete="off"></td>
									</tr>
									
								<!--	<tr>
										<td>Batch Order ID</td>
										<td width="250px"><input type="text" placeholder="Batch Order ID" class="form-control" name='batch_id' autocomplete="off"></td>
									</tr>
			-->
																
									<input type='hidden' name='status' value='05'>
																	<tr>
										<td>Customer Name  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Customer Name" class="form-control" name='customer_name'  value="" autocomplete="off"></td>
									</tr>
									
								
									
									<!--pilihan untuk sorting data 21-12-2015-->
									<tr>
										<td>Order By  &nbsp; &nbsp; </td>
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
							</form>
							<br>
							<br>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered " id="example">
                                <thead>
                                    <tr>
										<th>No</th>
                                        <th>Pre Order ID</th>
										
										
                                        <th>Customer Name</th>
										<th>Transaction Date</th>
										<th>Grand Total</th>
										
										<th>Status</th>
										                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >										<input type="hidden" value="c7ceaa08-e6cc-4d24-b73e-15f466bf3fd8" class='POUUID' name="POUUID1">
										<input type="hidden" value="derika13derika@gmail.com" class='customer_email' name="customer_email1">
										<td valign='top'>1</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/c7ceaa08-e6cc-4d24-b73e-15f466bf3fd8.html">VB22112452</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html">Derika Puspitayu</a></td><td>14 Nov 2022</td><td>5,473,858</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="9f8311aa-d506-463d-a35b-206ec03139c9" class='POUUID' name="POUUID2">
										<input type="hidden" value="melilavigne07@gmail.com" class='customer_email' name="customer_email2">
										<td valign='top'>2</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/9f8311aa-d506-463d-a35b-206ec03139c9.html">KC22123122</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/188890f6-bfae-4ebf-9c76-13e1308f8ab2.html">Meli</a></td><td>31 Dec 2022</td><td>895,577</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="b01faafa-2986-42bb-876a-c1101b735d83" class='POUUID' name="POUUID3">
										<input type="hidden" value="michelliasnts@gmail.com" class='customer_email' name="customer_email3">
										<td valign='top'>3</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/b01faafa-2986-42bb-876a-c1101b735d83.html">IU22123117</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/a2fecd2c-5c28-4382-aec9-9ca74a8debb7.html">Michaelia W</a></td><td>30 Dec 2022</td><td>791,418</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="8b4ca2ff-5e84-4c00-b51c-049c78b9bee0" class='POUUID' name="POUUID4">
										<input type="hidden" value="astridhendrianti@gmail.com" class='customer_email' name="customer_email4">
										<td valign='top'>4</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/8b4ca2ff-5e84-4c00-b51c-049c78b9bee0.html">MG23010034</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html">astrid hendrianti</a></td><td>05 Jan 2023</td><td>600,439</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="df85f547-5e58-4cdd-98fe-37e5b3c9ec60" class='POUUID' name="POUUID5">
										<input type="hidden" value="ruby_avocado@yahoo.com" class='customer_email' name="customer_email5">
										<td valign='top'>5</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/df85f547-5e58-4cdd-98fe-37e5b3c9ec60.html">FP23010057</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/728ef747-8457-419f-9baf-1b6dc448ad98.html">Resha Livia</a></td><td>08 Jan 2023</td><td>1,317,372</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="ec72785d-05ba-4ffc-aa7b-2092154e687a" class='POUUID' name="POUUID6">
										<input type="hidden" value="hilda.puspitasari@gmail.com" class='customer_email' name="customer_email6">
										<td valign='top'>6</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/ec72785d-05ba-4ffc-aa7b-2092154e687a.html">MZ23010011</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/a42dcfff-4cca-4693-a87d-e90ec68fed5d.html">Hilda Puspitasari</a></td><td>06 Jan 2023</td><td>2,610,080</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="8819814b-bbed-43b4-80a7-8c49ed5646bd" class='POUUID' name="POUUID7">
										<input type="hidden" value="gracetheresiaa@gmail.com" class='customer_email' name="customer_email7">
										<td valign='top'>7</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/8819814b-bbed-43b4-80a7-8c49ed5646bd.html">GQ23010051</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/b059cbe6-c167-402f-9406-d18b94027b4e.html">Graciela Theresia</a></td><td>08 Jan 2023</td><td>2,042,777</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="a4e52feb-3b4d-48d1-bfaf-4699e9140f16" class='POUUID' name="POUUID8">
										<input type="hidden" value="k.widianti@gmail.com" class='customer_email' name="customer_email8">
										<td valign='top'>8</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/a4e52feb-3b4d-48d1-bfaf-4699e9140f16.html">IX23010045</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/2d4b5686-02f3-42d3-a4da-41174059a963.html">Kartika widianti</a></td><td>06 Jan 2023</td><td>15,205,024</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="67c870c1-88d4-4e41-99b1-dd2c8af9f57d" class='POUUID' name="POUUID9">
										<input type="hidden" value="karen.suherman97@gmail.com" class='customer_email' name="customer_email9">
										<td valign='top'>9</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/67c870c1-88d4-4e41-99b1-dd2c8af9f57d.html">YJ22112879</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/1d4c94e6-34f1-4979-a76d-c27736e98911.html">Karen Suherman</a></td><td>30 Nov 2022</td><td>664,458</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="cfd90d57-2928-4182-95f3-c8c77c0680a1" class='POUUID' name="POUUID10">
										<input type="hidden" value="astridhendrianti@gmail.com" class='customer_email' name="customer_email10">
										<td valign='top'>10</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/cfd90d57-2928-4182-95f3-c8c77c0680a1.html">CT22122995</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/defe95cf-56ac-4233-8f49-2555b7f5e583.html">astrid hendrianti</a></td><td>16 Dec 2022</td><td>687,377</td><td>Waiting Last Payment</td></tr>									 <tr>
												<td colspan='8'>
													
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans?trans_date_start=&&trans_date_end=&&po_id=&&status=05&&customer_name=&&order_by=DESC')" class="btn-primary btn">Print</a>
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans_xls?trans_date_start=&&trans_date_end=&&po_id=&&status=05&&customer_name=&&order_by=DESC')" class="btn-primary btn">Export To Excel</a>
												</td>
											</tr>
                                </tbody>
                            </table>
							<ul class="pagination"><li class="active"><a href="#">1</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=05&customer_name=&order_by=DESC&amp;per_page=2">2</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=05&customer_name=&order_by=DESC&amp;per_page=3">3</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=05&customer_name=&order_by=DESC&amp;per_page=4">4</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=05&customer_name=&order_by=DESC&amp;per_page=2">&raquo</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=05&customer_name=&order_by=DESC&amp;per_page=8">Last</a></li></ul>                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection