@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">PO Invoice Management</a></li>
                <li class="active">
				Update PO Invoice	
				</li>
            </ul>

            <h1>Update PO Invoice			</h1>
        </div>
<div class="container">


<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-midnightblue">
            <div class="panel-heading"><h4>Information</h4></div>
            <div class="panel-body" align='center'>

				 <p align='center'>PO Invoice has been successfully updated</p>
                 @php $isLinkDisplayed = false; @endphp

@foreach($waitinggoods as $waitinggood)
    @if (!$isLinkDisplayed)
        @php $isLinkDisplayed = true; @endphp
        <a href="{{ route('po_sginvoice.detail', $waitinggood->POUUID) }}">Go to updated PO</a>
    @endif
@endforeach
				           </div>
    </div>
</div>

</div>
</div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection