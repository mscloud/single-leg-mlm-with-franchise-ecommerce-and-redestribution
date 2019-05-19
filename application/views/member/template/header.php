<body class="theme-red">
    <!--div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div >
    <div class="overlay"></div>
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('member/home'); ?>">YLIFE - BSB</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <?php if ($this->session->ylifetype == 'S' || $this->session->ylifetype == 'A') { ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">shop</i>
                            <span class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Products</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php if ($this->session->ylifetype == 'A') { ?>
                                    <li>
                                        <a href="<?php echo base_url('shop/new_product'); ?>">
                                            <div class="icon-circle bg-light-green"><i class="material-icons">person_add</i></div>
                                            <div class="menu-info">
                                                <h4>New Product</h4>
                                                <p><i class="material-icons">access_time</i> Products</p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo base_url('shop/products'); ?>">
                                            <div class="icon-circle bg-cyan"><i class="material-icons">shop</i></div>
                                            <div class="menu-info">
                                                <h4>Products</h4>
                                                <p><i class="material-icons">access_time</i> Products</p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php if ($this->session->ylifetype == 'A') { ?>
                                    <li>
                                        <a href="<?php echo base_url('shop/images'); ?>">
                                            <div class="icon-circle bg-red"><i class="material-icons">image</i></div>
                                            <div class="menu-info"><h4><b>Images</b></h4>
                                                <p><i class="material-icons">access_time</i> Products</p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">shop_two</i>
                            <span class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Orders</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo base_url('shop/new_orders'); ?>">
                                            <div class="icon-circle bg-light-green"><i class="material-icons">person_add</i></div>
                                            <div class="menu-info">
                                                <h4>New Order</h4>
                                                <p><i class="material-icons">access_time</i> Products</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('shop/delivered_orders'); ?>">
                                            <div class="icon-circle bg-cyan"><i class="material-icons">shop</i></div>
                                            <div class="menu-info">
                                                <h4>Delivered Order</h4>
                                                <p><i class="material-icons">access_time</i> Products</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('shop/cancelled_orders'); ?>">
                                            <div class="icon-circle bg-red"><i class="material-icons">image</i></div>
                                            <div class="menu-info"><h4><b>Cancelled</b></h4>
                                                <p><i class="material-icons">access_time</i> Products</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">money</i>
                            <span class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Business Plan</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo base_url('member/business-plan'); ?>">
                                            <div class="icon-circle bg-light-green"><i class="material-icons">money</i></div>
                                            <div class="menu-info">
                                                <h4>Business Plan</h4>
                                                <p><i class="material-icons">access_time</i> Business</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->