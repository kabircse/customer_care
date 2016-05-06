<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

            <a href="javascript:void(0);" id="show-shortcut"> 
                <span class="btn btn-danger">
                    <?php
                    $session = $this->session->userdata('check');
                    echo $session['fname'].' '.$session['lname'];
                    ?>
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive

    To make this navigation dynamic please make sure to link the node
    (the reference to the nav > ul) after page load. Or the navigation
    will not initialize.
    -->
    <nav>
            <!-- NOTE: Notice the gaps after each icon usage <i></i>..
            Please note that these links work a bit different than
            traditional hre="" links. See documentation for details.
        -->
        <?php
        //view for showroom user
        if($session['showroom']!=0){ ?>
            <ul>
            <li>
                <a href="<?php echo base_url().'dashboard'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Customer Care</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url().'customerCare/addRequisition'?>">Add Requisition</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'customerCare/requisitionListShowroom'?>">Requisition list</a>
                    </li>
                </ul>
            </li>
<!--            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Report</span></a>
                <ul>
                    <li>
                        <a href="<?php //echo base_url().'report/complainReport'?>">Complain and Solved Problem</a>
                    </li>
                    
                </ul>
            </li>-->
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Product</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url().'product/productList'?>">Product list</a>
                    </li>
                </ul>
            </li>
        <?php }
        
        //next for main branch user or admin
        ?>
        
        
        <ul>
            <li>
                <a href="<?php echo base_url().'dashboard'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Customer Care</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url().'customerCare/addRequisition'?>">Add Requisition</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'customerCare/requisitionList'?>">Requisition list</a>
                    </li>
                </ul>
            </li>
<!--            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Report</span></a>
                <ul>
                    <li>
                        <a href="<?php //echo base_url().'report/complainReport'?>">Complain and Solved Problem</a>
                    </li>
                    
                </ul>
            </li>-->
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Product</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url().'product/addCategory'?>">Add Product Category</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'product/addProduct'?>">Add Product</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'product/productList'?>">Product list</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'product/repaired'?>">Product Repaired List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'product/replaced'?>">Product Replaced list</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Showroom</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url().'showroom/addShowroom'?>">Add Showroom</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'showroom/showroomList'?>">Showroom list</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Creation</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url().'user'?>">User</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'creation/addColor'?>">Color</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'creation/addSupplier'?>">Supplier</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'creation/addProblem'?>">Problem</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'creation/addSection'?>">Section</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'creation/addStore'?>">Store</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
<!-- END NAVIGATION -->