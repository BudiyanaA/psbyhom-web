<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>House of Make Up | Ready stock & Pre Order from US</title>
<link href="{{ url('assets/fonts/Ayuthaya.ttf') }}">
<style type="text/css">
body {
	font-family: 'Ayuthaya', sans-serif;
	font-size:8pt;
}

.alamat
{
	text-align:left;
	padding: 6px 50px;
}

.position-left {
	float: left;
	max-width:48%;
}
.position-right {
    float: right;
	max-width:48%;
}
#invoice-container p {
    margin: 0;
}
.invoice-header:after {
	content:"";
	clear:both;
	position:relative;
	display:block;
}
div#block-content-invoice {
    
}
.right-post{float:right;font-weight:bold}
.left-post{float:left;font-weight:bold}
.invoice-header 
{
    padding: 6px 10px;
    border-bottom: 2px solid #777;
}

.invoice-footer 
{
    padding: 6px 10px;
    border-top: 2px solid #777;
}

.header-left
{
	padding: 6px 155px;
	border-right: 2px solid #777;
	width: 150px;
}

.header-right
{
	 padding: 6px 5px;
	
}

.footer-left
{
	padding: 6px 15px;
	width: 100px;
	
}

.footer-right
{
	padding: 6px 5px;
	width: 40px;
}

.invoice-table
{
	border-collapse: collapse;
	padding: 6px 35px;
	width: 100%;
}

.invoice-table th, .invoice-table table, .invoice-table td
{
	 border: 2px solid black;
}


.note
{
	padding-left: 5px;
	text-align:left;
}



.invoice-header label {
    text-transform: uppercase;
    font-weight: bold;
}
#invoice-container p:first-child {
   
    float: left;
}
#invoice-container p:last-child {
    float: right;
}
.invoice-sub-header {
    padding: 6px 10px;
}
.invoice-from-sender p {
    margin-top: 0;
}
.invoice-from-sender p,.invoice-to-receiver p {
    margin-top: 0;
    margin-bottom: 7px;
    text-transform: uppercase;
    font-weight: bold;
}
.invoice-customer-data {
    font-weight: bold;
}
small.brand-name {
    display: block;
    font-style: italic;
}
.table-list-cart {
    width: 43%;
    float: left;
    margin-left: 3.5%;
    padding-left: 3.5%;
}
div#block-content-invoice:after {
	content:"";
	display:block;
	position:absolute;
	height:100%;
	width:1px;
	left:107%;
	border-left:2px dashed #777;
	top:0
}
div#block-content-invoice {
   
	position:relative;
    width: 49%;
    float: left;
}
.invoice-from-sender div,.invoice-to-receiver div{margin-bottom:2px}
.invoice-to-receiver {
    width: 70%;
    left: 29%;
    position: relative;
	
}

.invoice-from-sender
{
	width: 100%;
	border-top: 2px solid #777;
}

h3{margin-bottom:7px}
.data-pembayaran,.list-product-order{clear:both}
.data-pembayaran{padding-top:10px}
.list-product-order {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
}
.list-product-order td, .list-product-order th {
    padding: 3px 5px;
    border-bottom: 2px solid #777;
}
</style>
</head>
<body onLoad="javascript:print()"> <!--onLoad="javascript:print()"-->
<div id="block-content-invoice"><!-- /.invoice-header -->
  <div style="text-align:center;"> 
    <table  class='invoice-table'>
	    <tr>
		    <td><p class=""><label><b>{{ strtoupper($view_po->courier_name) }} {{ $view_po->ongkir_type }}</b></label>
	        <br/>@if($view_po->block_package != '0' ) Pack Kayu @endif
	        <br/>@if($view_po->insurance != '0' ) Asuransi @else {{ number_format($view_po->subtotal) }} @endif</p>
	      </td>
		    <td><p class="header-right"><label><b>Order ID</b></label><br/>{{ $view_po->po_id }}</p></td>
	    </tr>
	    <tr>
		    <td colspan='2' class='alamat'><b>To :</b><br/>
		      @if($view_po->is_dropshipper != '1') {{ $customer_name }} @else {{ $view_po->receiver_name }} @endif<br/>
		      {{ $view_po->receiver_hp1 }}
          @if($view_po->receiver_hp2 != '')
            {{ $view_po->receiver_hp2 }}
          @endif
          <br/>
          {{ $view_po->receiver_address }}<br/>
        </td>
	    </tr>
	    <tr>
	    	<td class='footer-left' ><p class="note"><label><b>Note :</b></label>
	        <br/>{{ $view_po->notes }}</p>
        </td>
	    	<td class='footer-right'><p class="note"><label><b>From :</b></label>
        @if($view_po->is_dropshipper == '0' )
          <br/>House of Makeup <br> 08179369610 
	      @else
          {{ $view_po->dropshipper }} <br> {{ $view_po->dropshipper_contact }} 
	      @endif
	      </p></td>
	    </tr>
	    <tr >
	    	<td  colspan='2' ><br><b>PLEASE HANDLE WITH CARE</b><br/><br/></td>
	    </tr>
    </table>
  </div>
</div>	<!-- /.invoice-sub-header -->

<div class="table-list-cart">
  <div class="left-post"><strong>Product List</strong></div>
  <div class="right-post">
    <strong>Order ID : {{ $view_po->po_id }}</strong>
  </div>
  <table style="clear:both;margin-top:14px" class="stat-table table table-stats table-striped table-sortable table-bordered list-product-order">
		<table class="stat-table table table-stats table-striped table-sortable table-bordered list-product-order">
		  <tr>
		  	<td>Product Name</td>
		  	<td align="center">Quantity</td>
		  </tr>
		  @foreach ($order_dtl as $row)
		  <tr>
		  	<td><small class="brand-name"></small>{{ $row->requestOrderDtl?->product_name }}</td>
		  	<td align="center">{{ $row->incoming_qty }}</td>
		  </tr>
      @endforeach
	  </table>
  </table>
</div>
</body>
</html>