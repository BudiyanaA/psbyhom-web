@extends('layouts.app')
@section('content')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="https://psbyhom.com/admin_area/index.html">Dashboard</a></li>

                <li class="active">Email Content Management</li>
            </ol>

            <h1>Email Content Management</h1>
            <div class="options">
                <div class="btn-toolbar">
              
                   
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="panel panel-midnightblue">
                        <div class="panel-heading">
                            <h4>List of Email Notification</h4>
                            <div class="options">   
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
						                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered  " id="example">
                                <thead>
                                    <tr>
										<th>No</th>
										<th>Email Name</th>
										<th>Email Title</th>
										<th>Created Date</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								<tr><td valign='top'>1</td><td><a href="https://psbyhom.com/email_controller/view_email/55bc48fe-ec90-463c-9897-825c5ce3a393.html">Payment Confirmation Notification</a></td><td valign='top'>New Payment Confirmation for PO ID : $po_id</td><td valign='top'>19 Apr 2019</td></tr><tr><td valign='top'>2</td><td><a href="https://psbyhom.com/email_controller/view_email/609cd8c1-eb0b-4256-b2c6-e0942abd234e.html">Verified Payment Notification</a></td><td valign='top'>Wohoo! Your Payment Verified $po_id</td><td valign='top'>03 May 2019</td></tr><tr><td valign='top'>3</td><td><a href="https://psbyhom.com/email_controller/view_email/6ebb641b-4028-40fd-b1b2-78fada074132.html">Invoice PO for Last Payment</a></td><td valign='top'>Your Goodies is Coming : $po_id</td><td valign='top'>19 Apr 2019</td></tr><tr><td valign='top'>4</td><td><a href="https://psbyhom.com/email_controller/view_email/93e9ba8e-5baf-48ef-ae77-862c5a65e09e.html">Request E-Wallet Withdrawal Notification</a></td><td valign='top'>Request E-Wallet Withdrawal : $customer_name</td><td valign='top'>25 Apr 2019</td></tr><tr><td valign='top'>5</td><td><a href="https://psbyhom.com/email_controller/view_email/9db5502b-cddb-4ae9-bd07-060a9fdc629c.html">Quotation </a></td><td valign='top'>Price Quotation $po_id </td><td valign='top'>22 Apr 2019</td></tr><tr><td valign='top'>6</td><td><a href="https://psbyhom.com/email_controller/view_email/a89c2b04-b29e-4dea-8efb-e03fb548a28e.html">Reset Password Notification</a></td><td valign='top'>Reset Password</td><td valign='top'>03 Jun 2019</td></tr><tr><td valign='top'>7</td><td><a href="https://psbyhom.com/email_controller/view_email/b1aa97ee-6a1c-4ce5-be19-b664200f2784.html">New Order Notifications</a></td><td valign='top'>New Order House of Makeup PO ID : $po_id</td><td valign='top'>19 Apr 2019</td></tr><tr><td valign='top'>8</td><td><a href="https://psbyhom.com/email_controller/view_email/c40d3bd4-cd6c-4915-a76f-25c3c7d459a7.html">Invalid Payment Notification</a></td><td valign='top'>House of Makeup - Invalid Payment $po_id</td><td valign='top'>23 Apr 2019</td></tr><tr><td valign='top'>9</td><td><a href="https://psbyhom.com/email_controller/view_email/ce7926a7-126b-474c-b6d8-cdab04f96d88.html">No Resi Notification</a></td><td valign='top'>Yay! Your Order Has Been Shipped $po_id</td><td valign='top'>19 Apr 2019</td></tr><tr><td valign='top'>10</td><td><a href="https://psbyhom.com/email_controller/view_email/d5dac8ca-f68d-4122-9b18-da8de83f93f2.html">Refund Notification</a></td><td valign='top'>Goodies Arrived - Cancellation $po_id</td><td valign='top'>25 Apr 2019</td></tr><tr><td valign='top'>11</td><td><a href="https://psbyhom.com/email_controller/view_email/eb7498f1-0820-4171-a20f-1fe32b5b06e9.html">Invoice for DP</a></td><td valign='top'>Invoice For Down Payment $po_id</td><td valign='top'>19 Apr 2019</td></tr>                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div>
@endsection