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
			
						<h1>Ready to Ship</h1>
			            
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                           							<h4>List of PO Waiting to be delivered</h4>
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
																
									<input type='hidden' name='status' value='06'>
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
																				<th>No Resi</th>
										                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >										<input type="hidden" value="1f555957-768e-47ed-b953-53308f8ae6a7" class='POUUID' name="POUUID1">
										<input type="hidden" value="abadienriko@gmail.com" class='customer_email' name="customer_email1">
										<td valign='top'>1</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/1f555957-768e-47ed-b953-53308f8ae6a7.html">HP23010068</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html">Enriko Abadi</a></td><td>09 Jan 2023</td><td>359,471</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="f1536e62-d5e4-4e14-822a-df38d9ede3a8" class='POUUID' name="POUUID2">
										<input type="hidden" value="other.taradharani@gmail.com" class='customer_email' name="customer_email2">
										<td valign='top'>2</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/f1536e62-d5e4-4e14-822a-df38d9ede3a8.html">GD22123063</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/456f479d-7592-4ec1-8ed2-60c01f3a961a.html">Taradharani Wikantiananda</a></td><td>27 Dec 2022</td><td>3,084,788</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="71045694-0963-4052-b33f-ec2068b59b27" class='POUUID' name="POUUID3">
										<input type="hidden" value="spacegeementia@hotmail.com" class='customer_email' name="customer_email3">
										<td valign='top'>3</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/71045694-0963-4052-b33f-ec2068b59b27.html">UP22123030</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/07b45d4d-23ad-4492-8191-20a205b06caf.html">Nadine</a></td><td>21 Dec 2022</td><td>1,507,807</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="7363919e-4db2-4645-b53e-370a73c8a37c" class='POUUID' name="POUUID4">
										<input type="hidden" value="novrigia_p@yahoo.com" class='customer_email' name="customer_email4">
										<td valign='top'>4</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/7363919e-4db2-4645-b53e-370a73c8a37c.html">XL22112651</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/c8e51ba9-43d5-4567-b741-35bd86109456.html">Novrigia permatani</a></td><td>24 Nov 2022</td><td>733,039</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="0a1d2822-ccf0-42d1-b954-1a289c48c7ec" class='POUUID' name="POUUID5">
										<input type="hidden" value="ayuarinidarman@yahoo.co.id" class='customer_email' name="customer_email5">
										<td valign='top'>5</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/0a1d2822-ccf0-42d1-b954-1a289c48c7ec.html">YQ22122893</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/7477a9c6-33d3-4404-87bb-c8fd06398d4c.html">Ayu Arini</a></td><td>01 Dec 2022</td><td>686,455</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="d432e154-27d7-41fc-8030-942cf21c344a" class='POUUID' name="POUUID6">
										<input type="hidden" value="naistiqomah@gmail.com" class='customer_email' name="customer_email6">
										<td valign='top'>6</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/d432e154-27d7-41fc-8030-942cf21c344a.html">QI22122896</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/fd1b37fa-e956-4402-9601-6beef4b7b2f4.html">Nur Annisa</a></td><td>02 Dec 2022</td><td>1,789,121</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="ed6e81ab-e508-45a5-9d12-244669b74680" class='POUUID' name="POUUID7">
										<input type="hidden" value="jesswinata@gmail.com" class='customer_email' name="customer_email7">
										<td valign='top'>7</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/ed6e81ab-e508-45a5-9d12-244669b74680.html">NY22123025</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/10515d2b-1e9d-49c9-a779-5a46b53fafa5.html">Jesslyn</a></td><td>20 Dec 2022</td><td>3,640,213</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="71c442a8-185a-4eba-89ab-4fc6fc1f2855" class='POUUID' name="POUUID8">
										<input type="hidden" value="silvitantri@gmail.com" class='customer_email' name="customer_email8">
										<td valign='top'>8</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/71c442a8-185a-4eba-89ab-4fc6fc1f2855.html">IA22112812</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/e951ae11-b128-48b8-a076-af7aaeb222a2.html">silvi</a></td><td>28 Nov 2022</td><td>711,716</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="16bd471b-5b64-4620-a148-d274a46b07c7" class='POUUID' name="POUUID9">
										<input type="hidden" value="abadienriko@gmail.com" class='customer_email' name="customer_email9">
										<td valign='top'>9</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/16bd471b-5b64-4620-a148-d274a46b07c7.html">DT22123037</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html">Enriko Abadi</a></td><td>22 Dec 2022</td><td>430,049</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr><tr >										<input type="hidden" value="8cfa73ff-d911-4c41-9015-f26f3df3b4c3" class='POUUID' name="POUUID10">
										<input type="hidden" value="ceciliafransiska.a@gmail.com" class='customer_email' name="customer_email10">
										<td valign='top'>10</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/8cfa73ff-d911-4c41-9015-f26f3df3b4c3.html">CU22122929</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/a2f22cdf-b95c-4b8a-abbe-5c56a03baf64.html">Fransiska angelina</a></td><td>06 Dec 2022</td><td>671,104</td><td>Ready to Ship</td><td>										<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td></tr>									 <tr>
												<td colspan='8'>
													
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans?trans_date_start=&&trans_date_end=&&po_id=&&status=06&&customer_name=&&order_by=DESC')" class="btn-primary btn">Print</a>
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans_xls?trans_date_start=&&trans_date_end=&&po_id=&&status=06&&customer_name=&&order_by=DESC')" class="btn-primary btn">Export To Excel</a>
												</td>
											</tr>
                                </tbody>
                            </table>
							<ul class="pagination"><li class="active"><a href="#">1</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=06&customer_name=&order_by=DESC&amp;per_page=2">2</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=06&customer_name=&order_by=DESC&amp;per_page=2">&raquo</a></li></ul>                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection