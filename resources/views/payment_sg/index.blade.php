@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
				<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <!-- <li><a href="{{ route('preorder.index') }}">Pre Order</a></li> -->
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
						<form method="get" action="{{ route('payment_sg.index') }}">
								<table class="search-table">
								<tr>
										<td>Pre Order Date Start &nbsp; &nbsp; </td>
										<td width="250px">
											<input type="date" class="form-control mask" name="order_date_start" value="{{ $order_date_start }}">
										</td>
									</tr>
									<tr>
										<td>Pre Order Date End &nbsp; &nbsp; </td>
										<td width="250px">
											<input type="date" class="form-control mask" name="order_date_end" value="{{ $order_date_end }}">
										</td>
									</tr>
									<tr>
										<td>Pre Order ID  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="PO ID" class="form-control" name='po_id'  value="{{ $po_id }}" autocomplete="off"></td>
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
			@if(app('request')->input('status') == '')
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
			@else
				<input type='hidden' name='status' value="{{ app('request')->input('status') }}">
			@endif
																	<tr>
										<td>Customer Name  &nbsp; &nbsp; </td>
										<td width="250px"><input type="text" placeholder="Customer Name" class="form-control" name='customer_name'  value="{{ $customer_name }}" autocomplete="off"></td>
									</tr>
									
								
									
									<!--pilihan untuk sorting data 21-12-2015-->
									<tr>
										<td>Order By  &nbsp; &nbsp; </td>
										<td width="250px">
										<select class="form-control" name="order_by">
										<option value="asc" {{ $order_by == 'asc' ? 'selected' : '' }}>Ascending</option>
            							<option value="desc" {{ $order_by == 'desc' ? 'selected' : '' }}>Descending</option>
												
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
								@if(count($payment) > 0)
								@foreach($payment as $p)
                    <tr >										
										<input type="hidden" value="{{ $p->POUUID }}" class='POUUID' name="POUUID1">
										<input type="hidden" value="{{ $p->msCustomer?->email }}" class='customer_email' name="customer_email1">
										<td valign='top'>{{ $loop->index + 1 }}</td>
										<td><a href="{{ route('po_sginvoice.detail', $p->POUUID) }}">{{ $p->po_id }}</a></td>
										<td><a href="{{ route('customer.detail', $p->CustomerUUID) }}">{{ $p->msCustomer?->customer_name }}</a></td>
										<td>{{ formatDate($p->trans_date) }}</td>
										<td>{{ number_format($p->total_trans) }}</td>
										<td>{{ $p->msStatus?->status_name }}@if ($p->status == '07')
				/ No Resi : <strong>{{ $p->no_resi }}</strong>
			@endif</td>
										@if ($status === '06')
										<td>
											<a href="#" class="noresi" data-type="text" data-pk="87605" data-pk-invoice="SS19041299" data-name="noresi"></a>
										</td>
										@endif 
										</tr>
									<tr >
										@endforeach
										@else
								<tr>
									<td colspan="10">Data not found</td>
								</tr>
							@endif
										<input type="hidden" value="6b2cfaa6-e7db-499f-82f4-df5b75014e43" class='POUUID' name="POUUID2">
										
												<td colspan='8'>
													
												<a id="pdfLink" class="btn-primary btn">Print</a>
													<a onclick="print('https://psbyhom.com/po_invoice_controller/po_report/print_list_trans_xls?trans_date_start=&&trans_date_end=&&po_id=&&status=01&&customer_name=&&order_by=ASC')" class="btn-primary btn">Export To Excel</a>
												</td>
											</tr>
                                </tbody>
                            </table>
						</div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection

@section ('script')

<script>
    document.getElementById('pdfLink').addEventListener('click', function() {
		var doc = new jsPDF('landscape'); // Mengatur orientasi kertas menjadi landscape

    doc.setFontSize(12);
    doc.text('No', 10, 40);
    doc.text('Pre Order ID', 30, 40);
    doc.text('Customer Name', 70, 40);
    doc.text('Transaction Date', 110, 40);
    doc.text('Grand Total', 160, 40);
    doc.text('Status', 200, 40);

    doc.line(10, 42, 290, 42); // Garis horisontal di bawah judul kolom

    var y = 50; // Inisialisasi posisi vertikal teks

    @foreach($payment as $p)
    doc.setFontSize(10);
    doc.text('{{ $loop->index + 1 }}', 10, y);
    doc.text('{{ $p->po_id }}', 30, y);
    doc.text('{{ $p->msCustomer?->customer_name }}', 70, y);
    doc.text('{{ formatDate($p->trans_date) }}', 110, y);
    doc.text('{{ number_format($p->total_trans) }}', 160, y);
    doc.text('{{ $p->msStatus?->status_name }}@if ($p->status == "07")/ No Resi :{{ $p->no_resi }}@endif', 200, y);

    y += 10; // Menambahkan jarak vertikal antar baris
    @endforeach

       
        doc.output('dataurlnewwindow'); // Membuka jendela baru dengan tautan data URL PDF
    });
</script>
<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';
		$('.noresi').editable(
		{
		  type:  'text',
		  title: 'Enter No. Resi',
		});

		$('.noresi').on('save', function(e, params) { 
			var no_resi = params.newValue;
			var POUUID = $(this).closest('tr').find('.POUUID').val();
			var customer_email = $(this).closest('tr').find('.customer_email').val();

				$.ajax({
					url: '/api/no_resi/update',
        	type:"POST",
					data:{POUUID:POUUID,no_resi:no_resi,customer_email:customer_email,admin:"{{ session('admin_id') }}"},
					success: function(data) 
					{
						if (data.success) {					
							alert("Successfully update no resi !");
							location.reload();
						}
					}
				})	
		});
</script>
@endsection
