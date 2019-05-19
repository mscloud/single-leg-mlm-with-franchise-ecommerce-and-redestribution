<header id="header">
    <nav class="navbar navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
              <a class="navbar-brand" href="<?php echo base_url(); ?>">YLIFE</a>
            </div>
            <div class="collapse navbar-collapse navbar-right">
              <ul class="nav navbar-nav">
                <li class="<?php if ($page == "about-us") echo 'active'; ?>"><a href="<?php echo base_url("about-us"); ?>">About</a></li>
                <li class="<?php if ($page == "products") echo 'active'; ?>"><a href="<?php echo base_url("products"); ?>">Products</a></li>
                <li class="<?php if ($page == "plan") echo 'active'; ?>"><a href="<?php echo base_url("plan"); ?>">Business Plan</a></li>
                <li class="<?php if ($page == "frienchies") echo 'active'; ?>"><a href="<?php echo base_url("frienchies"); ?>">Frienchie's</a></li>
                <li class="<?php if ($page == "producers") echo 'active'; ?>"><a href="<?php echo base_url("producers"); ?>">Producers</a></li>
                <li class="<?php if ($page == "gallery") echo 'active'; ?>"><a href="<?php echo base_url("gallery"); ?>">Gallery</a></li>
                <li class="<?php if ($page == "legal") echo 'active'; ?>"><a href="<?php echo base_url("legal"); ?>">Legal</a></li>
                <li class="<?php if ($page == "contact") echo 'active'; ?>"><a href="<?php echo base_url("contact"); ?>">Contact</a></li>
              </ul>
            </div>
        </div>
    </nav>
</header>