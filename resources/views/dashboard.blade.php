<head>
<link href="{{ url('assets/less/styles.less') }}" rel="stylesheet/less" media="all"> 
<script type="text/javascript" src="https://psbyhom.com/assets/js/less.js"></script>
</head>

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
                  href="#">
                  <div class="tiles-heading">New PO</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="text-center">
                      <font size='6.5'><span class="text-top"></span>
                        <?php echo $total_new // $newUsers ?>
                      </font>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-success"
                  href="#">
                  <div class="tiles-heading">DP Confirmation</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-money"></i>
                    <div class="text-center">
                      <font size='6.5'><span class="text-top"></span>
                        <?php echo $total_dp // number_format($totalHit) ?><span class="text-smallcaps"></span>
                      </font>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-alizarin"
                  href="#">
                  <div class="tiles-heading">Waiting Goodies</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-truck"></i>
                    <div class="text-center">
                      <?php echo $total_goodies //round($avgSessionDuration,2) ?>
                    </div>
                    <small>.</small>
                  </div>
                  <div class="tiles-footer"></div>
                </a>
              </div>
              <div class="col-md-3 col-xs-12 col-sm-6">
                <a class="info-tiles tiles-orange"
                  href="#">
                  <div class="tiles-heading">LP Confirmation</div>
                  <div class="tiles-body-alt">
                    <i class="fa fa-dollar"></i>
                    <div class="text-center">
                      <?php echo $total_fp //round($totalBounce,2) ?>
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
                        <th class="col-xs-2 col-sm-2">Date</th>
                      </tr>
                    </thead>
                    <tbody class="selects">
                      <?php
										$datestring = "%d %M %Y";
										$i = 1;
								    foreach ($pending_request_order as $row_req)
									{
									
									?>
                      <tr>

                        <td>
                          <?php  echo anchor('request_order_controller/view_request_order/'.$row_req->RequestOrderUUID,$row_req->request_id) ?>
                        </td>
                        <td>
                          <?php echo anchor('isms_customer_management/view_customer/'.$row_req->CustomerUUID,$row_req->customer_name) ?>
                        </td>
                        <td style="width:20%">
                          <?php  echo mdate($datestring,strtotime($row_req->request_date)); ?>
                        </td>
                      </tr>
                      <?php
									$i++;
									}
									if($i < 6)
									{
									
										for($j = $i;$j<6;$j++)
										{
											
										
									?>
                      <tr>
                        <td colspan='3'>N/A</td>
                      </tr>
                      <?php
										}
									}
									
									if($i == 6)
									{
									?>
                      <tr>
                        <td colspan='2'><a
                            href='<?php echo base_url() ?>request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=00&customer_name=&order_by=DESC'>View
                            More...</a></td>
                      </tr>
                      <?php
									}
									else
									{
									?>
                      <tr>
                        <td>..</td>
                      </tr>
                      <?php
									}
									?>



                    </tbody>

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
                        <th class="col-xs-2 col-sm-2">Status</th>
                      </tr>
                    </thead>
                    <tbody class="selects">
                      <?php
									$i = 1;
									foreach ($total_pending_dp as $row_po)
									{
									
									?>
                      <tr>

                        <td>
                          <?php echo anchor('po_invoice_controller/view_po_invoice/'.$row_po->POUUID,$row_po->po_id); ?>
                        </td>
                        <td>
                          <?php echo anchor('isms_customer_management/view_customer/'.$row_po->CustomerUUID,$row_po->customer_name) ?>
                        </td>
                        <td style="width:30%">
                          <?php
											if($row_po->status_po=='00')
												{
													echo "Pending Verify";
												}
												else if($row_po->status_po=='01')
												{
													echo "Pending Customer Payment";
												}
												else if($row_po->status_po=='02')
												{
													echo "Processed";
												}
												else if($row_po->status_po=='03')
												{
													echo "All Incoming Items Checked";
												}
												else if($row_po->status_po=='04')
												{
													echo "Pending Last Payment";
												}
												else if($row_po->status_po=='05')
												{
													echo "Pending Admin Verify LP";
												}
												else if($row_po->status_po=='06')
												{
													echo "Ready to be Delivered";
												}
												else if($row_po->status_po=='07')
												{
													echo "Delivered";
												}
												else if($row_po->status_po=='08')
												{
													echo "Pending Payment Addendum";
												}
												else if($row_po->status_po=='09')
												{
													echo "Pending Verify Addendum";
												}


											?>
                        </td>
                      </tr>
                      <?php 	
									 $i++;
									}
									
									if($i < 6)
									{
									
										for($j = $i;$j<6;$j++)
										{
											
										
									?>
                      <tr>
                        <td colspan='3'>N/A</td>
                      </tr>
                      <?php
										}
									}
									
									
									if($i == 6)
									{
									?>
                      <tr>
                        <td colspan='3'><a
                            href='<?php echo base_url() ?>po_invoice_controller/search_filter_invoice?trans_date_start=&trans_date_end=&po_id=&batch_id=&status=00&customer_name=&order_by=DESC'>View
                            More...</a></td>
                      </tr>
                      <?php
									}
									else
									{
									?>
                      <tr>
                        <td>.</td>
                      </tr>
                      <?php
									}
									?>

                    </tbody>

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
                      <?php
									$i = 1;
									foreach ($total_pending_fp as $row_po)
									{
									
									?>
                      <tr>

                        <td>
                          <?php echo anchor('po_invoice_controller/view_po_invoice/'.$row_po->POUUID,$row_po->po_id); ?>
                        </td>
                        <td>
                          <?php echo anchor('isms_customer_management/view_customer/'.$row_po->CustomerUUID,$row_po->customer_name) ?>
                        </td>
                        <td style="width:80%">
                          <?php
											if($row_po->status_po=='00')
												{
													echo "DP Confirmation";
												}
												else if($row_po->status_po=='01')
												{
													echo "Pending Customer Payment";
												}
												else if($row_po->status_po=='02')
												{
													echo "Processed";
												}
												else if($row_po->status_po=='03')
												{
													echo "All Incoming Items Checked";
												}
												else if($row_po->status_po=='04')
												{
													echo "Pending LP";
												}
												else if($row_po->status_po=='05')
												{
													echo "Pending Verify";
												}
												else if($row_po->status_po=='06')
												{
													echo "Ready to be Delivered";
												}
												else if($row_po->status_po=='07')
												{
													echo "Delivered";
												}
												else if($row_po->status_po=='08')
												{
													echo "Pending Payment Addendum";
												}
												else if($row_po->status_po=='09')
												{
													echo "Pending Verify Addendum";
												}


											?>
                        </td>
                      </tr>
                      <?php 	
									 $i++;
									}
									
									if($i < 6)
									{
									
										for($j = $i;$j<6;$j++)
										{
											
										
									?>
                      <tr>
                        <td colspan='3'>N/A</td>
                      </tr>
                      <?php
										}
									}
									
									
									if($i == 6)
									{
									?>
                      <tr>
                        <td colspan='3'><a
                            href='<?php echo base_url() ?>po_invoice_controller/search_filter_invoice?trans_date_start=&trans_date_end=&po_id=&batch_id=&status=05&customer_name=&order_by=DESC'>View
                            More...</a></td>
                      </tr>
                      <?php
									}
									else
									{
									?>
                      <tr>
                        <td>..</td>
                      </tr>
                      <?php
									}
									?>

                    </tbody>

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
                          <th class="col-xs-2 col-sm-2">Date</th>
                        </tr>
                      </thead>
                      <tbody class="selects">
                        <?php
									$i = 1;
									foreach ($waiting_approval as $row_wait)
									{
									
									?>
                        <tr>



                          <td>
                            <?php  echo anchor('request_order_controller/view_request_order/'.$row_wait->RequestOrderUUID,$row_wait->request_id) ?>
                          </td>
                          <td>
                            <?php echo anchor('isms_customer_management/view_customer/'.$row_wait->CustomerUUID,$row_wait->customer_name) ?>
                          </td>
                          <td style="width:20%">
                            <?php  echo mdate($datestring,strtotime($row_wait->request_date)); ?>
                          </td>
                        </tr>



                        <?php 	
									 $i++;
									}
									
									if($i < 6)
									{
									
										for($j = $i;$j<6;$j++)
										{
											
										
									?>
                        <tr>
                          <td colspan='3'>N/A</td>
                        </tr>
                        <?php
										}
									}
										if($i == 6)
									{
									?>
                        <tr>
                          <td colspan='2'><a
                              href='<?php echo base_url() ?>request_order_controller/search_filter_request_transaction?trans_date_start=&trans_date_end=&request_id=&status=01&customer_name=&order_by=DESC'>View
                              More...</a></td>
                        </tr>
                        <?php
									}
									else
									{
									?>
                        <tr>
                          <td>.</td>
                        </tr>
                        <?php
									}
									?>

                      </tbody>

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
                        <?php
									$i = 1;
									foreach ($total_waiting_goodies as $row_po)
									{
									
									?>
                        <tr>

                          <td>
                            <?php echo anchor('po_invoice_controller/view_po_invoice/'.$row_po->POUUID,$row_po->po_id); ?>
                          </td>
                          <td>
                            <?php echo anchor('isms_customer_management/view_customer/'.$row_po->CustomerUUID,$row_po->customer_name) ?>
                          </td>

                        </tr>
                        <?php 	
									 $i++;
									}
									
									if($i < 6)
									{
									
										for($j = $i;$j<6;$j++)
										{
											
										
									?>
                        <tr>
                          <td colspan='3'>N/A</td>
                        </tr>
                        <?php
										}
									}
									
									
									if($i == 6)
									{
									?>
                        <tr>
                          <td colspan='3'><a
                              href='#'>View
                              More...</a></td>
                        </tr>
                        <?php
									}
									else
									{
									?>
                        <tr>
                          <td colspan='4'><a
                              href="#">Go to Waiting
                              Goodies</a></td>
                        </tr>
                        <?php
									}
									?>

                      </tbody>

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
                          <th class="col-xs-2 col-sm-2">Status</th>
                        </tr>
                      </thead>
                      <tbody class="selects">
                        <?php
									$i = 1;
									foreach ($total_waiting_processed as $row_po)
									{
									
									?>
                        <tr>

                          <td>
                            <?php echo anchor('po_invoice_controller/view_po_invoice/'.$row_po->POUUID,$row_po->po_id); ?>
                          </td>
                          <td>
                            <?php echo anchor('isms_customer_management/view_customer/'.$row_po->CustomerUUID,$row_po->customer_name) ?>
                          </td>
                          <td style="width:30%">
                            <?php
											if($row_po->status_po=='00')
												{
													echo "DP Confirmation";
												}
												else if($row_po->status_po=='01')
												{
													echo "Pending Customer Payment";
												}
												else if($row_po->status_po=='02')
												{
													echo "Waiting Goodies";
												}
												else if($row_po->status_po=='03')
												{
													echo "All Incoming Items Checked";
												}
												else if($row_po->status_po=='04')
												{
													echo "Pending Last Payment";
												}
												else if($row_po->status_po=='05')
												{
													echo "Pending Admin Verify LP";
												}
												else if($row_po->status_po=='06')
												{
													echo "Ready to Ship";
												}
												else if($row_po->status_po=='07')
												{
													echo "Delivered";
												}
												else if($row_po->status_po=='08')
												{
													echo "Pending Payment Addendum";
												}
												else if($row_po->status_po=='09')
												{
													echo "Pending Verify Addendum";
												}


											?>
                          </td>
                        </tr>
                        <?php 	
									 $i++;
									}
									
									if($i < 6)
									{
									
										for($j = $i;$j<6;$j++)
										{
											
										
									?>
                        <tr>
                          <td colspan='3'>N/A</td>
                        </tr>
                        <?php
										}
									}
									
									
									if($i == 6)
									{
									?>
                        <tr>
                          <td colspan='3'><a
                              href='<?php echo base_url() ?>po_invoice_controller/search_filter_invoice?trans_date_start=&trans_date_end=&po_id=&batch_id=&status=06&customer_name=&order_by=DESC'>View
                              More...</a></td>
                        </tr>
                        <?php
									}
									else
									{
									?>
                        <tr>
                          <td>.</td>
                        </tr>
                        <?php
									}
									?>

                      </tbody>

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