@extends('layouts.costumerapp')
@section('content')
<div class="container" id="content">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Request Order</h1>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table stat-table table-bordered" style="text-align:left">
						<tr style="background:black;color:white">
							<th align='left'>No.</th>
							<th align='left'>Request Order ID</th>
							<th align='left'>Request Date</th>
							<th >Status</th>
						</tr>
						<tr>
							<td colspan='4' style="text-align:center">No Request Order that currently Pending Your Approval </td>
						</tr>
					</table>
					</div><p><a class="buton" href="{{ route('home') }}">Back</a></p></div>
				</div>
				<div class="blockfooter">
					<div class="wrapper"></div>
				</div>
			</div>
			<div class="blockseparator"></div>
		</div>
	</div>
</div>
@endsection