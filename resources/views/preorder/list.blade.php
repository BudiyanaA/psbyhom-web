@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
	<div class="row"><h3  ><strong style="color:darkgray ">Pre Oder</strong></h3><br>
	</div><div class="col-lg-12">
<div class="table-responsive">
<table class="table table-striped table-bordered" id='example' style="text-align:left">
<thead>
<tr style="background:#56cfe1;color:white">

	<th align='left'>PO ID</th>
	<th align='left'>Trans Date</th>
	<th >Status</th>
</tr>
</thead>
	@foreach ($list_of_ro as $row)
	<tr>
		<td>
			@if ($row->status == '01')
				<a href="{{ url('request/view/' . $row->request_id) }}">{{ $row->request_id }}</a>
			@else
				{{ $row->request_id }}
			@endif
		</td>
		<td data-order='{{ $row->created_date }}'>{{ formatDate($row->created_date) }}</td>
		<td>{{ $row->msStatus?->status_name }}</td>
	</tr>
	@endforeach

	@foreach ($list_of_po as $row)
	<tr>
		<td>
			<a href="{{ route('payment.confirm') }}">{{ $row->po_id }}</a>
		</td>
		<td data-order='{{ $row->trans_date }}'>{{ formatDate($row->trans_date) }}</td>
		<td>
			{{ $row->msStatus?->status_name }}
			@if ($row->status == '07')
				/ No Resi : <strong>{{ $row->no_resi }}</strong>
			@endif
		</td>
	</tr>
	@endforeach
	<tr>
	
	<td><a href="https://psbyhom.com/view_request_order/267c3b8f-fbf9-42c7-be23-dd18b6d6ab7b.html">TR23020162</a></td>
	<td data-order='2023-02-10 09:49:21'>10 Feb 2023</td>
	<td>Waiting Your Approval	</td>
</tr>
	</table>
</div><p><a class="buton" href="https://psbyhom.com/">Back</a></p>	</div></div>
	<div class="blockfooter"><div class="wrapper"></div></div>
</div>
<div class="blockseparator"></div>
	</div>
@endsection

