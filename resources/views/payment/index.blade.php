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
			
						<h1>Waiting Payment</h1>
			            
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
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
																
									<input type='hidden' name='status' value='01'>
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
                                    <tr >										<input type="hidden" value="9d042f66-f78b-4034-80ce-baeb72037a26" class='POUUID' name="POUUID1">
										<input type="hidden" value="ekartikasari22@gmail.com" class='customer_email' name="customer_email1">
										<td valign='top'>1</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/9d042f66-f78b-4034-80ce-baeb72037a26.html">IM20040083</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/afce0d58-4cf0-4b42-833e-6a686f877efd.html">Evita Kartikasari</a></td><td>18 Apr 2020</td><td>461,387</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="6b2cfaa6-e7db-499f-82f4-df5b75014e43" class='POUUID' name="POUUID2">
										<input type="hidden" value="adznianzalia@gmail.com" class='customer_email' name="customer_email2">
										<td valign='top'>2</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/6b2cfaa6-e7db-499f-82f4-df5b75014e43.html">WZ20040146</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/7eb652aa-d162-44e4-bc35-083e3f7ded8f.html">Adzni Anzalia Roehan</a></td><td>20 Apr 2020</td><td>1,393,866</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="e2ad4309-1108-43c0-badc-75723ca54bac" class='POUUID' name="POUUID3">
										<input type="hidden" value="gabriellaivana@yahoo.com" class='customer_email' name="customer_email3">
										<td valign='top'>3</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/e2ad4309-1108-43c0-badc-75723ca54bac.html">CE20040163</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/b16a6af3-0cd2-468f-80cf-a1925d322ea6.html">Gabriella Ivana </a></td><td>21 Apr 2020</td><td>290,183</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="fd8afddb-429f-4387-b052-bef5ab1c6de6" class='POUUID' name="POUUID4">
										<input type="hidden" value="threewords.eightletters@yahoo.com" class='customer_email' name="customer_email4">
										<td valign='top'>4</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/fd8afddb-429f-4387-b052-bef5ab1c6de6.html">OE20040161</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/4dc26c96-ba93-4f65-9e81-2f238668f7d0.html">Lily Panghadi</a></td><td>22 Apr 2020</td><td>793,612</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="e4e82a3f-9540-46b5-8b59-be37ae49d307" class='POUUID' name="POUUID5">
										<input type="hidden" value="larasatipritania@yahoo.com" class='customer_email' name="customer_email5">
										<td valign='top'>5</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/e4e82a3f-9540-46b5-8b59-be37ae49d307.html">AB20040047</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/52e69000-8fcb-4f9e-8722-e46c5018b425.html">Larasati Pritania</a></td><td>23 Apr 2020</td><td>1,855,155</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="ba171588-d5fa-4357-80a3-da5813fc7010" class='POUUID' name="POUUID6">
										<input type="hidden" value="larasatipritania@yahoo.com" class='customer_email' name="customer_email6">
										<td valign='top'>6</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/ba171588-d5fa-4357-80a3-da5813fc7010.html">SI20040049</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/52e69000-8fcb-4f9e-8722-e46c5018b425.html">Larasati Pritania</a></td><td>23 Apr 2020</td><td>5,700,850</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="f798b1e8-f144-42ab-b876-6b0285bc5afb" class='POUUID' name="POUUID7">
										<input type="hidden" value="larasatipritania@yahoo.com" class='customer_email' name="customer_email7">
										<td valign='top'>7</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/f798b1e8-f144-42ab-b876-6b0285bc5afb.html">FD20040168</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/52e69000-8fcb-4f9e-8722-e46c5018b425.html">Larasati Pritania</a></td><td>23 Apr 2020</td><td>815,390</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="962d8f48-9fb5-41cc-b697-23cf923ccf1e" class='POUUID' name="POUUID8">
										<input type="hidden" value="larasatipritania@yahoo.com" class='customer_email' name="customer_email8">
										<td valign='top'>8</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/962d8f48-9fb5-41cc-b697-23cf923ccf1e.html">XQ20040132</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/52e69000-8fcb-4f9e-8722-e46c5018b425.html">Larasati Pritania</a></td><td>23 Apr 2020</td><td>1,665,096</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="9b3e82ae-add4-4936-a4ac-5d3328475627" class='POUUID' name="POUUID9">
										<input type="hidden" value="larasatipritania@yahoo.com" class='customer_email' name="customer_email9">
										<td valign='top'>9</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/9b3e82ae-add4-4936-a4ac-5d3328475627.html">VM20040085</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/52e69000-8fcb-4f9e-8722-e46c5018b425.html">Larasati Pritania</a></td><td>23 Apr 2020</td><td>1,028,978</td><td>Waiting Down Payment</td></tr><tr >										<input type="hidden" value="fbc86697-6f88-4b8e-8e22-151355df2e0c" class='POUUID' name="POUUID10">
										<input type="hidden" value="larasatipritania@yahoo.com" class='customer_email' name="customer_email10">
										<td valign='top'>10</td><td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/fbc86697-6f88-4b8e-8e22-151355df2e0c.html">QS20040084</a></td><td><a href="https://psbyhom.com/isms_customer_management/view_customer/52e69000-8fcb-4f9e-8722-e46c5018b425.html">Larasati Pritania</a></td><td>23 Apr 2020</td><td>2,165,329</td><td>Waiting Down Payment</td></tr>									 <tr>
												<td colspan='8'>
													
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans?trans_date_start=&&trans_date_end=&&po_id=&&status=01&&customer_name=&&order_by=ASC')" class="btn-primary btn">Print</a>
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans_xls?trans_date_start=&&trans_date_end=&&po_id=&&status=01&&customer_name=&&order_by=ASC')" class="btn-primary btn">Export To Excel</a>
												</td>
											</tr>
                                </tbody>
                            </table>
							<ul class="pagination"><li class="active"><a href="#">1</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=01&customer_name=&order_by=ASC&amp;per_page=2">2</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=01&customer_name=&order_by=ASC&amp;per_page=3">3</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=01&customer_name=&order_by=ASC&amp;per_page=4">4</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=01&customer_name=&order_by=ASC&amp;per_page=2">&raquo</a></li><li><a href="https://psbyhom.com/po_invoice_controller/search_filter_invoice?trans_date_start=&batch_id=&trans_date_end=&po_id=&status=01&customer_name=&order_by=ASC&amp;per_page=45">Last</a></li></ul>                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection