<div id="page-container">
        <!-- BEGIN SIDEBAR -->
        <nav id="page-leftbar" role="navigation">
                <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
                <li class="divider"></li>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Home</span></a>
                </li> 
				<li>
                    <a href="javascript:;"><i class="fa fa-user">  
                </i>
                <span>Admin Management</span>
                </a>
                <ul class="acc-menu">
                    <li>
                        <a href="{{ route('user.create') }}" class="menu">Create New User</a>
                    </li>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" class="menu">List of User</a>
                    </li>
                    </li>
                </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-th"></i><span>CMS</span></a>
                    <ul class="acc-menu"><li><a href="{{ route('page_management.index') }}" class="menu">Page Management</a>
                        </li>
                        </li>
                        <li>
                            <a href="{{ route('slideshow_management.index') }}" class="menu">Slideshow Management</a>
                        </li>
                        </li>
                    </ul></li>
                    <li>
                        <a href="javascript:;"><i class="fa fa-group"></i><span>CRM</span></a>
                        <ul class="acc-menu"><li>
                            <a href="{{ route('costumer_management.index') }}" class="menu">Customer Management</a>
                            </li></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="fa fa-money"></i><span>Pre Order </span></a>
                        <ul class="acc-menu">
                            <li>
                                <a href="{{ route('preorder.index') }}?status=00" class="menu">New<span style=" display: inline;" class="badge badge-danger">0</span></a>
                            </li>
                    </li>
                    <li>
                        <a href="{{ route('preorder.index') }}?status=01" class="menu">Waiting Approval<span class="badge badge-primary">9646</span></a>
                    </li>
                    </li><li><a href="{{ route('payment.index') }}" class="menu">Waiting Payment<span class="badge badge-orange">443</span></a></li>
                    </li>
                    <li><a href="{{ route('dpconfirmation.index') }}" class="menu">DP Confirmation<span class="badge badge-indigo">0</span></a></li></li>
                    <li><a href="{{ route('Waitinggood.index') }}" class="menu">Waiting Goodies<span class="badge badge-info">54</span></a></li></li>
                    <li><a href="{{ route('lpconfirmation.index') }}" class="menu">LP Confirmation<span class="badge badge-warning">78</span></a></li></li>
                    <li><a href="{{ route('ready.index') }}" class="menu">Ready to Ship<span class="badge badge-success">16</span></a></li></li>
                    <li><a href="{{ route('overall.index') }}" class="menu">Overall Order Report</a></li></li></ul></li>
                    <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span></a>
                    <ul class="acc-menu">
                        <li><a href="{{ route('bank_management.index') }}" class="menu">Bank Management</a></li></li>
                        <li><a href="{{ route('email.index') }}" class="menu">Email Content Management</a></li></li>
                        <li><a href="{{ route('voucher_management.index') }}" class="menu">Voucher Management</a></li></li>
                    </ul></li><li><a href="javascript:;"><i class="fa fa-globe"></i><span>Global Configuration</span></a><ul class="acc-menu">
                    <li><a href="{{ route('system_params') }}" class="menu">System Parameter</a></li></li></ul></li>				
                
            </ul>
            <!-- END SIDEBAR MENU -->
        </nav> 
        <div id="chart-1-container"></div>
        <div id="chart-2-container"></div>