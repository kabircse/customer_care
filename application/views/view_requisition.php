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
                Add Requisition
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
        <section class="">

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
                            <h2>Product List </h2>

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
                                <div class="table-responsive overflow_table">
                                   <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Product Color</th>
                                                <th>Quantity</th>
                                                <th>Approved Quantity</th>
                                                <th>Amount</th>
                                                <th>Image</th>
                                                <th>Product of</th>
                                                <th>Problem</th>
                                                <th>Invoice</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
                                                <th>Complain Date</th>
                                                <th>Committed Date</th>
                                                <th>Action Date</th>
                                                <th>Repair/Replace</th>
                                                <th>Remarks</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $amount = 0;
                                            if ($requisition) {
                                                foreach ($requisition as $info) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $info['code']; ?></td>
                                                        <td><?php echo $info['product_name']; ?></td>
                                                        <td><?php echo $info['color_name']; ?></td>
                                                        <td><?php echo $info['quantity']; ?></td>
                                                        <td><?php echo $info['aquantity']; ?></td>
                                                        <td><?php echo $info['amount']; ?></td>
                                                        <td><a href="<?php echo $info['image']; ?>" target="_blank"><img src="<?php echo $info['image']; ?>" height="50" width="50"></a></td>
                                                        <td><?php echo $info['showroom_name']; ?></td>
                                                        <td><?php echo $info['problem_name']; ?></td>
                                                        <td><?php echo $info['invoice']; ?></td>
                                                        <td><?php echo $info['customer_name']; ?></td>
                                                        <td><?php echo $info['customer_address']; ?></td>
                                                        <td><?php echo $info['customer_contact']; ?></td>
                                                        <td><?php echo $info['complain_date']; ?></td>
                                                        <td><?php echo $info['commited_date']; ?></td>
                                                        <td><?php echo $info['action_date']; ?></td>
                                                        <td>
                                                            <?php 
                                                                if($info['repair_or_replace'] == 1)
                                                                    echo 'Repair';
                                                                else
                                                                    echo 'Replace';
                                                            ?>
                                                        </td>
                                                        <td><?php echo $info['remarks']; ?></td>
                                                        <td><?php
                                                            if ($info['status'] == 0) {
                                                                echo 'Pending';
                                                            }elseif ($info['status'] == 1) {
                                                                echo 'Processing';
                                                            } elseif ($info['status'] == 2) {
                                                                echo 'Shipped';
                                                            } else {
                                                                echo 'Decline';
                                                            }
                                                    ?></td>
                                                        
                                                    </tr>
                                                    <?php
                                                    $amount+= $info['amount'];
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td class="text-right" colspan="5">Total : </td>
                                                <td class="text-left"><?php echo $amount;?></td>
                                                <td colspan="13">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
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