<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                Requisition
            </li>
            <li>
                Requisition List
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
                    <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
                            <h2>Requisition List</h2>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body">
                                <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <?php
                                    if (isset($flag) && $flag) {
                                        if ($flag == 'failed') {
                                            ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                Failed to Delete. Please try again.
                                            </div>
                                        

                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Showroom Name</th>
                                                <th>Requisition Date</th>
                                                <th>Committed Date</th>
                                                <th>Quantity</th>
                                                <th>Approved Quantity</th>
                                                <th>Product Status</th>
                                                <th>Status</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 1;
                                            if($requisition){
                                                foreach ($requisition as $requisitionList){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; $i++;?></td>
                                                <td><?php if(!$requisitionList['name']){
                                                    echo 'Directly Received';
                                                }
                                                else{
                                                    echo $requisitionList['name'];
                                                }
                                                ?></td>
                                                <td><?php echo $requisitionList['date'];?></td>
                                                <td><?php echo $requisitionList['commited_date'];?></td>
                                                <td><?php echo $requisitionList['quantity'];?></td>
                                                <td><?php echo $requisitionList['aquantity'];?></td>
                                                <td><?php
                                                    if($requisitionList['repair_or_replace']==1)
                                                        echo 'Repair';
                                                    else if($requisitionList['repair_or_replace']==2)
                                                        echo 'Replace';
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if($requisitionList['status']==1)
                                                        echo 'Processing';
                                                    else if($requisitionList['status']==2)
                                                        echo 'Shipped';
                                                    else if($requisitionList['status']==3)
                                                        echo 'Decline';
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                    <!-- Single button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="<?php echo base_url().'customerCare/viewRequisition/'.$requisitionList['rqtn_id'];?>">View</a></li>
                                                            <li><a href="<?php echo base_url().'customerCare/print_req_4showroom/'.$requisitionList['id'];?>">Print</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
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