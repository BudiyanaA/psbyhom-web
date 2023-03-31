@extends('layouts.app')
@section('content')	
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading">
      <ol class="breadcrumb">

      </ol>

      <h1>Admin Dashboard</h1>

      <div class="container">
        <?php
		if($flag_sensitive_data == '1')
												{
													
		?>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-toyo"
                  href="{{ route('preorder.index') }}?status=00">
                  <div class="tiles-heading">New PO</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="text-center">
                      <font size='6.5'><span class="text-top"></span>
                      <?php echo getAdminNew(); ?>
                      </font>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-success"
                  href="{{ route('dpconfirmation.index') }}">
                  <div class="tiles-heading">DP Confirmation</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-money"></i>
                    <div class="text-center">
                      <font size='6.5'><span class="text-top"></span>
                      <?php echo getAdminDp(); ?><span class="text-smallcaps"></span>
                      </font>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-alizarin"
                  href="{{ route('Waitinggood.index') }}">
                  <div class="tiles-heading">Waiting Goodies</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-truck"></i>
                    <div class="text-center">
                    <?php echo getAdminGoods(); ?>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-orange"
                  href="{{ route('lpconfirmation.index') }}">
                  <div class="tiles-heading">LP Confirmation</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-dollar"></i>
                    <div class="text-center">
                    <?php echo getAdminLp(); ?>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>

            </div>
          </div>
        </div>
        <?php
												}
												
			?>
        <div class="row">
          <div class="col-md-6">

            <div class="panel panel-danger">
              <div class="panel-heading">
                <h4 href="">New Orders</h4>
                <div class="options">
                  <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table" style="margin-bottom: 0px;">
                    <thead>
                      <tr>

                        <th class="col-xs-6 col-sm-3">PO ID</th>
                        <th class="col-sm-6 hidden-xs">Customer Name</th>
                        <th >Date</th>
                      </tr>
                    </thead>
                    <tbody class="selects">
                      @php
                          $i = 1;
                          $showMore = count($orders) > 5;
                      @endphp
                      @foreach($orders->take(5) as $o)
                          <tr>
                              <td>
                                  <a href="{{ route('preorder.detail', $o->RequestOrderUUID) }}">
                                      {{ $o->request_id }}
                                  </a>
                              </td>
                              <td>
                                  <a href="{{ route('customer.detail', $o->CustomerUUID) }}">
                                      {{ $o->customer?->customer_name }}
                                  </a>
                              </td>
                              <td>
                                  {{ formatDate($o->created_date) }}
                              </td>
                          </tr>
                          @php
                              $i++;
                          @endphp
                      @endforeach
                      @if($i < 5 && !$showMore)
                          @for($j = $i; $j <= 5; $j++)
                              <tr>
                                  <td colspan='3'>N/A</td>
                              </tr>
                          @endfor
                      @endif
                  </tbody>
                  @if($showMore)
                      <tfoot>
                          <tr>
                              <td colspan="3">
                                  <a href="{{ route('preorder.index') }}?status=00">View More...</a>
                              </td>
                          </tr>
                      </tfoot>
                  @endif

                  </table>
                </div>
              </div>
            </div>
            <div class="panel panel-indigo">
              <div class="panel-heading">
                <h4>Down Payment Confirmation</h4>
                <div class="options">

                  <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table" style="margin-bottom: 0px;">
                    <thead>
                      <tr>

                        <th class="col-xs-6 col-sm-3">PO ID </th>
                        <th class="col-sm-6 hidden-xs">Customer Name</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody class="selects">
                      @php
                          $i = 1;
                          $showMore = count($dppayment) > 5;
                      @endphp
                      @foreach($dppayment->take(5) as $dp)
                          <tr>
                          <td>
                            <a href="{{ route('poinvoice.detail', $dp->POUUID) }}">{{ $dp->po_id }}</a>
                          </td>
										      <td>
                            <a href="{{ route('customer.detail', $dp->CustomerUUID) }}">{{ $dp->msCustomer?->customer_name }}</a>
                          </td>
                              <td>
                              {{ $dp->msStatus?->status_name }}
                              </td>
                          </tr>
                          @php
                              $i++;
                          @endphp
                      @endforeach
                      @if($i < 5 && !$showMore)
                          @for($j = $i; $j <= 5; $j++)
                              <tr>
                                  <td colspan='3'>N/A</td>
                              </tr>
                          @endfor
                      @endif
                  </tbody>
                  @if($showMore)
                      <tfoot>
                          <tr>
                              <td colspan="3">
                                  <a href="{{ route('payment.index') }}?status=00">View More...</a>
                              </td>
                          </tr>
                      </tfoot>
                  @endif

                  </table>
                </div>
              </div>
            </div>
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4>Last Payment Confirmation</h4>
                <div class="options">

                  <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table" style="margin-bottom: 0px;">
                    <thead>
                      <tr>

                        <th class="col-xs-6 col-sm-3">PO ID </th>
                        <th class="col-sm-6 hidden-xs">Customer Name</th>
                        <th class="col-xs-2 col-sm-2">Status</th>
                      </tr>
                    </thead>
                    <tbody class="selects">
                      @php
                          $i = 1;
                          $showMore = count($lppayment) > 5;
                      @endphp
                      @foreach($lppayment->take(5) as $lp)
                          <tr>
                          <td>
                            <a href="{{ route('poinvoice.detail', $lp->POUUID) }}">{{ $lp->po_id }}</a>
                          </td>
										      <td>
                            <a href="{{ route('customer.detail', $lp->CustomerUUID) }}">{{ $lp->msCustomer?->customer_name }}</a>
                          </td>
                              <td>
                              {{ $lp->msStatus?->status_name }}
                              </td>
                          </tr>
                          @php
                              $i++;
                          @endphp
                      @endforeach
                      @if($i < 5 && !$showMore)
                          @for($j = $i; $j <= 5; $j++)
                              <tr>
                                  <td colspan='3'>N/A</td>
                              </tr>
                          @endfor
                      @endif
                  </tbody>
                  @if($showMore)
                      <tfoot>
                          <tr>
                              <td colspan="3">
                                  <a href="{{ route('payment.index') }}?status=05">View More...</a>
                              </td>
                          </tr>
                      </tfoot>
                  @endif

                  </table>
                </div>
              </div>
            </div>
            <div class="panel panel-indigo">
              <div class="panel-heading">
                <h4>Top 5 Customers this month </h4>
                <div class="options">

                  <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table" style="margin-bottom: 0px;">
                    <thead>
                      <tr>

                        <th class="col-xs-6 col-sm-3">Total Invoice</th>
                        <th class="col-sm-6 hidden-xs">Customer Name</th>
                        <th class="col-xs-2 col-sm-2">Total Trans</th>
                      </tr>
                    </thead>
                    <tbody class="selects">
                      <?php
									$cust = 1;
								    foreach ($top_5_customer as $row_cust)
									{
									
									?>
                      <tr>

                        <td>
                          <?php echo $row_cust->num_invoice ?>
                        </td>
                        <td class="hidden-xs">
                          <?php echo anchor('isms_customer_management/view_customer/'.$row_cust->CustUUID,$row_cust->customer_name) ?>
                        </td>
                        <td><span class="label label-success">Rp.
                            <?php echo number_format($row_cust->grand_total,0) ?>
                          </span></td>
                      </tr>
                      <?php 	
									 $cust++;
									}
									if($cust < 6)
									{
									
										for($j = $cust;$j<6;$j++)
										{
											
										
									?>
                      <tr>
                        <td colspan='3'>N/A</td>
                      </tr>
                      <?php
										}
									}
									 ?>

                    </tbody>

                  </table>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4>Waiting Approval & Waiting Payment</h4>
                  <div class="options">

                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;">
                      <thead>
                        <tr>

                          <th class="col-xs-6 col-sm-3">PO ID </th>
                          <th class="col-sm-6 hidden-xs">Customer Name</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody class="selects">
                      @php
                          $i = 1;
                          $showMore = count($approval) > 5;
                      @endphp
                      @foreach($approval->take(5) as $a)
                          <tr>
                              <td>
                                  <a href="{{ route('preorder.detail', $a->RequestOrderUUID) }}">
                                      {{ $a->request_id }}
                                  </a>
                              </td>
                              <td>
                                  <a href="{{ route('customer.detail', $a->CustomerUUID) }}">
                                      {{ $a->customer?->customer_name }}
                                  </a>
                              </td>
                              <td>
                                  {{ formatDate($a->created_date) }}
                              </td>
                          </tr>
                          @php
                              $i++;
                          @endphp
                      @endforeach
                      @if($i < 5 && !$showMore)
                          @for($j = $i; $j <= 5; $j++)
                              <tr>
                                  <td colspan='3'>N/A</td>
                              </tr>
                          @endfor
                      @endif
                  </tbody>
                  @if($showMore)
                      <tfoot>
                          <tr>
                              <td colspan="3">
                                  <a href="{{ route('preorder.index') }}?status=00">View More...</a>
                              </td>
                          </tr>
                      </tfoot>
                  @endif

                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h4>Waiting Goodies</h4>
                  <div class="options">

                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;">
                      <thead>
                        <tr>

                          <th class="col-xs-6 col-sm-3">PO ID </th>
                          <th class="col-sm-6 hidden-xs">Customer Name</th>
                        </tr>
                      </thead>
                      <tbody class="selects">
                      @php
                          $i = 1;
                          $showMore = count($waitinggoods) > 5;
                      @endphp
                      @foreach($waitinggoods->take(5) as $w)
                      @foreach ($w->poDtls as $dtl)
                          <tr>
                          <td>                          
                         
                        <a href="{{ route('poinvoice.detail', $dtl->POUUID) }}">{{ $w->po_id }}</a>
                     
                          </td>
                          <td style="width:20%">
                            <a href="{{ route('customer.detail', $w->CustomerUUID) }}">{{ $w->msCustomer?->customer_name  }}</a>
                          </td>			
                          </tr>
                          @php
                              $i++;
                          @endphp
                          @endforeach
                      @endforeach
                      @if($i < 5 && !$showMore)
                          @for($j = $i; $j <= 5; $j++)
                              <tr>
                                  <td colspan='3'>N/A</td>
                              </tr>
                          @endfor
                      @endif
                  </tbody>
                  @if($showMore)
                      <tfoot>
                          <tr>
                              <td colspan="3">
                                  <a href="{{ route('preorder.index') }}?status=00">View More...</a>
                              </td>
                          </tr>
                      </tfoot>
                  @endif

                    </table>
                  </div>
                </div>
              </div>

              <div class="panel panel-success">
                <div class="panel-heading">
                  <h4>Ready to Ship</h4>
                  <div class="options">

                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;">
                      <thead>
                        <tr>

                          <th class="col-xs-6 col-sm-3">PO ID </th>
                          <th class="col-sm-6 hidden-xs">Customer Name</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="selects">
                      @php
                          $i = 1;
                          $showMore = count($readytoship) > 5;
                      @endphp
                      @foreach($readytoship->take(5) as $r)
                          <tr>
                          <td>
                            <a href="{{ route('poinvoice.detail', $r->POUUID) }}">{{ $r->po_id }}</a>
                          </td>
										      <td>
                            <a href="{{ route('customer.detail', $r->CustomerUUID) }}">{{ $r->msCustomer?->customer_name }}</a>
                          </td>
                              <td>
                              {{ $r->msStatus?->status_name }}
                              </td>
                          </tr>
                          @php
                              $i++;
                          @endphp
                      @endforeach
                      @if($i < 5 && !$showMore)
                          @for($j = $i; $j <= 5; $j++)
                              <tr>
                                  <td colspan='3'>N/A</td>
                              </tr>
                          @endfor
                      @endif
                  </tbody>
                  @if($showMore)
                      <tfoot>
                          <tr>
                              <td colspan="3">
                                  <a href="{{ route('payment.index') }}?status=00">View More...</a>
                              </td>
                          </tr>
                      </tfoot>
                  @endif

                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-green">
                <div class="panel-heading">
                  <h4>Top 5 Products this month </h4>
                  <div class="options">

                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;">
                      <thead>
                        <tr>

                          <th class="col-xs-6 col-sm-3">Total Sold </th>
                          <th class="col-sm-6 hidden-xs">Product ID</th>
                          <th class="col-xs-2 col-sm-2">Total Trans</th>
                        </tr>
                      </thead>
                      <tbody class="selects">
                        <?php
									$prod = 1;
									foreach ($top_5_product as $row_prod)
									{
									
									?>
                        <tr>

                          <td>
                            <?php echo $row_prod->num_product ?> qty
                          </td>
                          <td class="hidden-xs">
                            <?php echo $row_prod->product_name ?>
                          </td>
                          <td><span class="label label-success">Rp.
                              <?php echo number_format($row_prod->subtotal,0) ?>
                            </span></td>
                        </tr>
                        <?php 	
									 $prod++;
									}
									if($prod < 6)
									{
									
										for($j = $prod;$j<6;$j++)
										{
											
										
									?>
                        <tr>
                          <td colspan='3'>N/A</td>
                        </tr>
                        <?php
										}
									}
									 ?>

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>


            </div>

          </div> <!-- container -->
        </div>
        <!--wrap -->
      </div> <!-- page-content -->
      @endsection