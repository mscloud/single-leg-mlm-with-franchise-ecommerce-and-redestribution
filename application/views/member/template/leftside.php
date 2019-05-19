    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('member/images/user.png'); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->ylifename; ?></div>
                    <div class="mobile">YLF<?php echo $this->session->ylifecontact; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url('member/personal_info'); ?>"><i class="material-icons">person_pin</i>Personal Info</a></li>
                            <li><a href="<?php echo base_url('member/banking_details'); ?>"><i class="material-icons">person_pin</i>Banking Info</a></li>
                            <li><a href="<?php echo base_url('member/nominee_details'); ?>"><i class="material-icons">person_pin</i>Nominee Details</a></li>
                            <li><a href="<?php echo base_url('member/update_password'); ?>"><i class="material-icons">person_pin</i>Password</a></li>
                            <!--li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li -->
                            <li><a href="<?php echo base_url('member/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url('member/home'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('member/order_now'); ?>">
                            <i class="material-icons">list</i>
                            <span>Purchase Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Members</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('member/my_members'); ?>">
                                    <span>My Sponsor</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('member/inactive_my_members'); ?>">
                                    <span>Inactive Sponsor</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('member/my_downline'); ?>"><span>My Downline</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>Payments</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('member/wallet'); ?>">
                                    <span>Wallet</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Repurchase Boucher</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('member/withdrawls'); ?>"><span>Widthrawls</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('member/withdraw'); ?>"><span>Fund Widthraw</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('member/my_orders'); ?>">
                            <i class="material-icons">list</i>
                            <span>My Orders</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 <a href="javascript:void(0);">YLIFE - Ciesta Technologies</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.2.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->