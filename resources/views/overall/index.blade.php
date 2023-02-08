@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
				<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('preorder.index') }}">Pre Order</a></li>
                <li class="active">List of Pre Order </li>
            </ol>
			
			            
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                           							<h4>Overall PO Report</h4>
							
							
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
																	<tr>
										<td>Status  &nbsp; &nbsp; </td>
										<td width="250px">
										<select class="form-control" name="status">
												<option value="">--All Status--</option>
												<option value="00">Pending Admin Payment Verification</option> <!-- Status awal saat customer submit -->
												<option value="01">Waiting Down Payment</option> <!-- Status saat admin kirim penawaran   -->
												<option value="02">Processed</option> <!-- Status saat customer submit checkout  -->
												<option value="03">Processed (All Checked)</option>
												<option value="04">Waiting Last Payment</option>
												<option value="05">Pending Admin Payment Verification</option>
												<option value="06">Ready to Ship</option>
												<option value="07">Shipped</option>
												<option value="08">Invalid Payment</option>
												<option value="09">Canceled</option>
											</select>
										
										</td>
									</tr>
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
                                    <tr >										<input type="hidden" value="50ef9c8b-0469-46f9-b14d-ecf9afa456e4" class='POUUID' name="POUUID1">
										<input type="hidden" value="rachelvalerie99@gmail.com" class='customer_email' name="customer_email1">
										<td valign='top'>1</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/50ef9c8b-0469-46f9-b14d-ecf9afa456e4.html">FE23020149</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/5c8ea8b6-529c-4c08-9060-8af097995acd.html">Rachel Valerie</a></td><td>05 Feb 2023</td><td>516,102</td><td>Processed</td></tr><tr >										<input type="hidden" value="9c6b094b-58e6-436a-bd6c-550d2bc17d68" class='POUUID' name="POUUID2">
										<input type="hidden" value="valmayria95@yahoo.co.id" class='customer_email' name="customer_email2">
										<td valign='top'>2</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/9c6b094b-58e6-436a-bd6c-550d2bc17d68.html">TH23020148</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/4ea29c73-8401-48bf-b683-1a406335cd9d.html">Valmayria Pavita </a></td><td>03 Feb 2023</td><td>1,245,354</td><td>Processed</td></tr><tr >										<input type="hidden" value="1f555957-768e-47ed-b953-53308f8ae6a7" class='POUUID' name="POUUID3">
										<input type="hidden" value="abadienriko@gmail.com" class='customer_email' name="customer_email3">
										<td valign='top'>3</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/1f555957-768e-47ed-b953-53308f8ae6a7.html">HP23010068</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/dd2dff9c-9d4f-47ff-b94b-66c5a7f962e7.html">Enriko Abadi</a></td><td>09 Jan 2023</td><td>359,471</td><td>Ready to Ship</td></tr><tr >										<input type="hidden" value="076d2b7d-4cb4-4ff5-b1ea-bb0f6bed5676" class='POUUID' name="POUUID4">
										<input type="hidden" value="aputriabsari31@gmail.com" class='customer_email' name="customer_email4">
										<td valign='top'>4</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/076d2b7d-4cb4-4ff5-b1ea-bb0f6bed5676.html">MV23020147</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/54ae2bfb-ae56-428e-a56e-7be947d55f0b.html">Ananda Putri Absari</a></td><td>02 Feb 2023</td><td>543,207</td><td>Processed</td></tr><tr >										<input type="hidden" value="ab3d1cdc-22c6-4b1b-8000-474d2d5011a5" class='POUUID' name="POUUID5">
										<input type="hidden" value="gabykwandy@gmail.com" class='customer_email' name="customer_email5">
										<td valign='top'>5</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/ab3d1cdc-22c6-4b1b-8000-474d2d5011a5.html">JM23020144</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/3125743d-b9cc-4e97-9fdd-e3e1bb25d411.html">Gaby kwandy</a></td><td>01 Feb 2023</td><td>400,178</td><td>Processed</td></tr><tr >										<input type="hidden" value="f1536e62-d5e4-4e14-822a-df38d9ede3a8" class='POUUID' name="POUUID6">
										<input type="hidden" value="other.taradharani@gmail.com" class='customer_email' name="customer_email6">
										<td valign='top'>6</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/f1536e62-d5e4-4e14-822a-df38d9ede3a8.html">GD22123063</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/456f479d-7592-4ec1-8ed2-60c01f3a961a.html">Taradharani Wikantiananda</a></td><td>27 Dec 2022</td><td>3,084,788</td><td>Ready to Ship</td></tr><tr >										<input type="hidden" value="c7ceaa08-e6cc-4d24-b73e-15f466bf3fd8" class='POUUID' name="POUUID7">
										<input type="hidden" value="derika13derika@gmail.com" class='customer_email' name="customer_email7">
										<td valign='top'>7</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/c7ceaa08-e6cc-4d24-b73e-15f466bf3fd8.html">VB22112452</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/d547e85c-a3dd-48e7-8333-2e1b26c07b74.html">Derika Puspitayu</a></td><td>14 Nov 2022</td><td>5,473,858</td><td>Waiting Last Payment</td></tr><tr >										<input type="hidden" value="71045694-0963-4052-b33f-ec2068b59b27" class='POUUID' name="POUUID8">
										<input type="hidden" value="spacegeementia@hotmail.com" class='customer_email' name="customer_email8">
										<td valign='top'>8</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/71045694-0963-4052-b33f-ec2068b59b27.html">UP22123030</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/07b45d4d-23ad-4492-8191-20a205b06caf.html">Nadine</a></td><td>21 Dec 2022</td><td>1,507,807</td><td>Ready to Ship</td></tr><tr >										<input type="hidden" value="f0f8629c-880e-4824-8599-238d229c281c" class='POUUID' name="POUUID9">
										<input type="hidden" value="eve_7@live.com" class='customer_email' name="customer_email9">
										<td valign='top'>9</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/f0f8629c-880e-4824-8599-238d229c281c.html">CQ22112585</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/0c673ab6-60e6-49b6-baef-462b59fd54dc.html">Evelyn Natalia</a></td><td>21 Nov 2022</td><td>0</td><td>Cancelled</td></tr><tr >										<input type="hidden" value="9f8311aa-d506-463d-a35b-206ec03139c9" class='POUUID' name="POUUID10">
										<input type="hidden" value="melilavigne07@gmail.com" class='customer_email' name="customer_email10">
										<td valign='top'>10</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/9f8311aa-d506-463d-a35b-206ec03139c9.html">KC22123122</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/188890f6-bfae-4ebf-9c76-13e1308f8ab2.html">Meli</a></td><td>31 Dec 2022</td><td>895,577</td><td>Waiting Last Payment</td></tr>									 <tr>
												<td colspan='8'>
													
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans?trans_date_start=&&trans_date_end=&&po_id=&&status=&&customer_name=&&order_by=DESC')" class="btn-primary btn">Print</a>
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans_xls?trans_date_start=&&trans_date_end=&&po_id=&&status=&&customer_name=&&order_by=DESC')" class="btn-primary btn">Export To Excel</a>
												</td>
											</tr>
                                </tbody>
                            </table>
							<ul class="pagination"><li class="active"><a href="#">1</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=&customer_name=&order_by=DESC&amp;per_page=2">2</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=&customer_name=&order_by=DESC&amp;per_page=3">3</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=&customer_name=&order_by=DESC&amp;per_page=4">4</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=&customer_name=&order_by=DESC&amp;per_page=2">&raquo</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=&customer_name=&order_by=DESC&amp;per_page=342">Last</a></li></ul>                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection