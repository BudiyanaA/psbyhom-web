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
			
			<h1>{{ $title }}</h1>
			            
            <div class="options">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-14">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
						<h4>{{ $subtitle }}</h4>
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
										@if ($status === '06')
										<th>No Resi</th>
										@endif
									</tr>
                                </thead>
                                <tbody>
                                    <tr >										<input type="hidden" value="9d042f66-f78b-4034-80ce-baeb72037a26" class='POUUID' name="POUUID1">
										<input type="hidden" value="ekartikasari22@gmail.com" class='customer_email' name="customer_email1">
										<td valign='top'>1</td>
										<td><a href="https://psbyhom.com/po_invoice_controller/view_po_invoice/9d042f66-f78b-4034-80ce-baeb72037a26.html">IM20040083</a></td>
										<td><a href="https://psbyhom.com/isms_customer_management/view_customer/afce0d58-4cf0-4b42-833e-6a686f877efd.html">Evita Kartikasari</a></td>
										<td>18 Apr 2020</td>
										<td>461,387</td>
										<td>Waiting Down Payment</td>
										@if ($status === '06')
										<td>
										<a href="#" class="resi" data-name="no_resi" data-type="text" data-pk="1" data-title="Enter name">N/A</a>
										</td>
										@endif 
										</tr>
									<tr >
										<input type="hidden" value="6b2cfaa6-e7db-499f-82f4-df5b75014e43" class='POUUID' name="POUUID2">
										
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <script>$.fn.poshytip={defaults:null}</script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    }); 
  
    $('.resi').editable({
           url: "{{ route('resi.update') }}",
           type: 'text',
           pk: 1,
           name: 'no_resi',
           title: 'Enter resi'
    });

	function update_no_resi(newNoResi) {
    $.ajax({
        url: "{{ route('resi.update') }}",
        type: 'POST',
        data: { no_resi: newNoResi },
        success: function(response) {
            console.log("no_resi berhasil di-update menjadi " + newNoResi);
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}
</script>
