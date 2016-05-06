<body class="">
    <!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

    <!-- HEADER -->
    <header id="header">
        <div id="logo-group">

            <!-- PLACE YOUR LOGO HERE -->
            <span id="logo"> <img src="<?php echo base_url();?>img/logo.png" alt="SmartAdmin"> </span>
            <!-- END LOGO PLACEHOLDER -->
        </div>

        <!-- pulled right: nav area -->
        <div class="pull-right">
        <span class="btn btn-success">
        <?php
        $session = $this->session->userdata('check');
        $showroom_id = $session['showroom'];
        if($showroom_id !=0){
            $showroom = $this->db->query("SELECT name FROM cc_showroom WHERE id=$showroom_id")->row()->name;
            echo $showroom.' showroom';
        }
        else
            echo 'Admin';
        ?>
        </span>
            <!-- collapse menu button -->
            <div id="hide-menu" class="btn-header pull-right">
                <span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
            </div>
            <!-- end collapse menu -->

            <!-- logout button -->
            <div id="logout" class="btn-header transparent pull-right">
                <span> <a href="<?php echo base_url().'login/logout'?>" title="Sign Out"><i class="fa fa-sign-out"></i></a> </span>
            </div>
            <!-- end logout button -->

            <!-- search mobile button (this is hidden till mobile view port) -->
<!--            <div id="search-mobile" class="btn-header transparent pull-right">
                <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
            </div>-->
            <!-- end search mobile button -->

            <!-- input: search field -->
<!--            <form action="#search.html" class="header-search pull-right">
                <input type="text" placeholder="Find reports and more" id="search-fld">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
                <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
            </form>-->
            <!-- end input: search field -->

        </div>
        <!-- end pulled right: nav area -->

    </header>
    <!-- END HEADER -->

    <!-- Left panel : Navigation area -->
    <!-- Note: This width of the aside area can be adjusted through LESS variables -->
   