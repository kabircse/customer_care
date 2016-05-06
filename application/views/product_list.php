<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                Product
            </li>
            <li>
                Product List
            </li>
        </ol>
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right">
        <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
        <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
        <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
        </span> -->

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- START ROW -->
            <div class="row">

                <!-- NEW COL START -->
                <article class="col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false">
                        <!-- widget options:
                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"

                        -->
                        <header>
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Product List</h2>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->
                    <?php
                        $session = $this->session->userdata('check');
                    ?>
                            <!-- widget content -->
                            <div class="widget-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Product Code</td>
                                                <td>Product Name</td>
                                                <td>Category</td>
                                                <?php if($session['showroom']==0){ ?>
                                                <td>Action</td>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($product){
                                                
                                                foreach ($product as $productList){
                                            ?>
                                            <tr>
                                                <td><?php echo $productList['code'];?></td>
                                                <td><?php echo $productList['product_name'];?></td>
                                                <td><?php echo $productList['category_name'];?></td>
                                                <?php if($session['showroom']==0){ ?>
                                                <td>
                                                    <a href="<?php echo base_url().'product/editProduct/'.$productList['product_id']?>" class="btn btn-warning btn-xs">Edit</a>
                                                    <!-- <a href="#" class="btn btn-success btn-xs">View Stock Report</a> -->
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php }
                                            }else{ ?>
                                            <tr>
                                                <td colspan="4">No Data Found</td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        	
                                    </div>

                                </div>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <!-- END COL -->

            </div>

            <!-- END ROW -->				
        </section>
        <!-- end widget grid -->


    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
