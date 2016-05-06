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
                Edit Requisition
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
                            <h2>Edit Requisition</h2>

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
                                            if ($flag == 'success') {
                                                ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Successfully Updated.
                                                </div>
                                            <?php } elseif ($flag == 'failed') {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Failed to Update. Please Try again.

                                                </div>
                                        <?php } elseif ($flag == 'error') {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Error!!!
                                                    You don't allocate any expense or still not complete allocate expense.

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <?php foreach ($product as $product) { ?>
                                            <form class="smart-form" method="post" action="<?php echo base_url() . 'customerCare/updateRequisitionProduct/' . $product['rstn_data_id']; ?>">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                                                if (set_value('problem_id')) {
                                                                    $problem_id = set_value('problem_id');
                                                                } else {
                                                                    $problem_id = $product['problem_id'];
                                                                }
                                                                ?>
                                                        <script>
                                                            $(document).ready(function(e) {
                                                                $(".parent_category option[value='<?php echo $problem_id; ?>']").attr('selected', 'selected');
                                                            });
                                                        </script>
                                                        <td>Problem</td>
                                                        <td>
                                                            <label class="select" >
                                                                <select class="parent_category" name="problem_id">
                                                                    <option value="">--select--</option>
                                                                    <?php
                                                                    if ($problemlist) {
                                                                        foreach ($problemlist as $problem) {
                                                                            ?>
                                                                            <option value="<?php echo $problem['id']; ?>"><?php echo $problem['name']; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td><span class="text-danger"><?php echo form_error('problem_id'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('product_code')) {
                                                                $pcode = set_value('product_code');
                                                            } else {
                                                                $pcode = $product['code'];
                                                            }
                                                            ?>
                                                            <td>Product Code</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Product Code" name="product_code" readonly="readonly" value="<?php echo $pcode; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('product_code'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('product_name')) {
                                                                $pname = set_value('product_name');
                                                            } else {
                                                                $pname = $product['name'];
                                                            }
                                                            ?>
                                                            <td>Product Name</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Product Name" name="product_name" value="<?php echo $pname; ?>" readonly="readonly">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('product_name'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Product Color</td>
                                                            <td>
                                                                <?php
                                                                if (set_value('color')) {
                                                                    $color_id = set_value('color');
                                                                } else {
                                                                    $color_id = $product['color_id'];
                                                                }
                                                                ?>
                                                                <script>
                                                                    $(document).ready(function(e) {
                                                                        $(".color option[value='<?php echo $color_id; ?>']").attr('selected', 'selected');
                                                                    });
                                                                </script>
                                                                <label class="select">
                                                                    <select class="form-control color" id="select-1" name="color">
                                                                        <option value="">--Select--</option>
                                                                        <?php
                                                                        if ($color) {
                                                                            foreach ($color as $colorlist) {
                                                                                ?>
                                                                                <option value="<?php echo $colorlist['id']; ?>"><?php echo $colorlist['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>

                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('color'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('quantity')) {
                                                                $quantity = set_value('quantity');
                                                            } else {
                                                                $quantity = $product['quantity'];
                                                            }
                                                            ?>
                                                            <td>Quantity</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Quantity" name="quantity" value="<?php echo $quantity; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('quantity'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('aquantity')) {
                                                                $aquantity = set_value('aquantity');
                                                            } else {
                                                                $aquantity = $product['aquantity'];
                                                            }
                                                            ?>
                                                            <td>Approved Quantity</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Quantity" name="aquantity" value="<?php echo $aquantity; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('aquantity'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('amount')) {
                                                                $amount = set_value('amount');
                                                            } else {
                                                                $amount = $product['amount'];
                                                            }
                                                            ?>
                                                            <td>Amount</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Amount" name="amount" value="<?php echo $amount; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('amount'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('commited_date')) {
                                                                $commited_date = set_value('commited_date');
                                                            } else {
                                                                $commited_date = $product['commited_date'];
                                                            }
                                                            ?>
                                                            <td>Committed Date</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Date" class="datepicker" name="date" readonly data-dateformat="yy-mm-dd" value="<?php echo $commited_date; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('date'); ?></span></td>
                                                        </tr>

                                                        <tr>
                                                            <?php
                                                            if (set_value('image')) {
                                                                $image = set_value('image');
                                                            } else {
                                                                $image = $product['image'];
                                                            }
                                                            ?>
                                                            <td>Preview Image</td>
                                                            <td>
                                                                <a href="<?php echo $product['image']; ?>" target="_blank"><img src="<?php echo $product['image']; ?>" height="50" width="50"></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Store Name</td>
                                                            <td>
                                                                <?php
                                                                if (set_value('store')) {
                                                                    $store_name = set_value('store');
                                                                } else {
                                                                    $store_name = $product['store_id'];
                                                                }
                                                                ?>
                                                                <script>
                                                                    $(document).ready(function(e) {
                                                                        $(".store option[value='<?php echo $store_name; ?>']").attr('selected', 'selected');
                                                                    });
                                                                </script>
                                                                <label class="select" >
                                                                    <select class="store" name="store">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        if ($store) {
                                                                            foreach ($store as $storelist) {
                                                                                ?>
                                                                                <option value="<?php echo $storelist['id']; ?>"><?php echo $storelist['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('store'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Showroom Name</td>
                                                            <td>
                                                                <?php
                                                                if (set_value('product_of')) {
                                                                    $name = set_value('product_of');
                                                                } else {
                                                                    $name = $product['product_of'];
                                                                }
                                                                ?>
                                                                <label class="select" >
                                                                    <select class="product_of" name="product_of">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        if ($showroom) {
                                                                            foreach ($showroom as $showroomlist) {
                                                                                ?>
                                                                                <option value="<?php echo $showroomlist['id']; ?>"><?php echo $showroomlist['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                                <script>
                                                                    $(document).ready(function(e) {
                                                                        $(".product_of option[value='<?php echo $name; ?>']").attr('selected', 'selected');
                                                                    });
                                                                </script>

                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('product_of'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('invoice')) {
                                                                $invoice = set_value('invoice');
                                                            } else {
                                                                $invoice = $product['invoice'];
                                                            }
                                                            ?>
                                                            <td>Invoice No</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Invoice" name="invoice" value="<?php echo $invoice; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('invoice'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('cname')) {
                                                                $cname = set_value('cname');
                                                            } else {
                                                                $cname = $product['customer_name'];
                                                            }
                                                            ?>
                                                            <td>Customer Name</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Customer Name" name="cname" value="<?php echo $cname; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('cname'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('ccontact')) {
                                                                $ccontact = set_value('ccontact');
                                                            } else {
                                                                $ccontact = $product['customer_contact'];
                                                            }
                                                            ?>
                                                            <td>Customer Contact</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Customer Contact" name="ccontact" value="<?php echo $ccontact; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('ccontact'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('caddress')) {
                                                                $caddress = set_value('caddress');
                                                            } else {
                                                                $caddress = $product['customer_address'];
                                                            }
                                                            ?>
                                                            <td>Customer Address</td>
                                                            <td>
                                                                <label class="textarea">
                                                                    <textarea class="form-control" name="caddress"><?php echo $caddress; ?></textarea>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('caddress'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('remarks')) {
                                                                $remarks = set_value('remarks');
                                                            } else {
                                                                $remarks = $product['remarks'];
                                                            }
                                                            ?>
                                                            <td>Remarks</td>
                                                            <td>
                                                                <label class="textarea">
                                                                    <textarea class="form-control" name="remarks"><?php echo $remarks; ?></textarea>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('remarks'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('repair')) {
                                                                $repair = set_value('repair');
                                                            } else {
                                                                $repair = $product['repair_or_replace'];
                                                            }
                                                            ?>
                                                        <script>
                                                            $(document).ready(function(e) {
                                                                $(".radioclass[value='<?php echo $repair; ?>']").attr('checked', 'checked');
                                                            });
                                                        </script>
                                                        <td>Solution Type</td>
                                                        <td>
                                                            <input type="radio" class="radioclass" value="1" name="repair">Repair
                                                            <input type="radio" class="radioclass" value="2" name="repair">Replace
                                                        </td>
                                                        <td><span class="text-danger"><?php echo form_error('repair'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('ccarcost')) {
                                                                $ccarcost = set_value('ccarcost');
                                                            } else {
                                                                $ccarcost = $product['ccarcost'];
                                                            }
                                                            ?>
                                                            <td>Car Cost</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Car Cost" name="ccarcost" value="<?php echo $ccarcost; ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('ccarcost'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            if (set_value('status')) {
                                                                $status = set_value('status');
                                                            } else {
                                                                $status = $product['status'];
                                                            }
                                                            ?>
                                                            <td>Status</td>
                                                            <td>
                                                                <label class="select">
                                                                    <select class="form-control status" id="select-1" name="status">
                                                                        <option value="">Select Status</option>
                                                                        <?php if ($status == 2) { ?>
                                                                            <option value="3">Decline</option>
                                                                            <?php } else {
                                                                            ?>
                                                                            <option value="1">Processing</option>
                                                                            <option value="2">Shipped</option>
                                                                            <option value="3">Decline</option>
                                                                        <?php }
                                                                        ?>

                                                                    </select>
                                                                </label>
                                                                <script>
                                                                    $(document).ready(function(e) {
                                                                        $(".status option[value='<?php echo $status; ?>']").attr('selected', 'selected');
                                                                    });
                                                                </script>

                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('status'); ?></span></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>									
                                                <footer>
                                                    <button type="submit" class="btn btn-primary">
                                                        Submit
                                                    </button>
                                                </footer>
                                            </form>
                                        <?php } ?>
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
<script type="text/javascript">

    $(document).ready(function() {
			 	
        /* DO NOT REMOVE : GLOBAL FUNCTIONS!
         *
         * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
         *
         * // activate tooltips
         * $("[rel=tooltip]").tooltip();
         *
         * // activate popovers
         * $("[rel=popover]").popover();
         *
         * // activate popovers with hover states
         * $("[rel=popover-hover]").popover({ trigger: "hover" });
         *
         * // activate inline charts
         * runAllCharts();
         *
         * // setup widgets
         * setup_widgets_desktop();
         *
         * // run form elements
         * runAllForms();
         *
         ********************************
         *
         * pageSetUp() is needed whenever you load a page.
         * It initializes and checks for all basic elements of the page
         * and makes rendering easier.
         *
         */
				
        pageSetUp();
				 
        /*
         * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
         * eg alert("my home function");
         * 
         * var pagefunction = function() {
         *   ...
         * }
         * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
         * 
         * TO LOAD A SCRIPT:
         * var pagefunction = function (){ 
         *  loadScript(".../plugin.js", run_after_loaded);	
         * }
         * 
         * OR
         * 
         * loadScript(".../plugin.js", run_after_loaded);
         */

        $(".add_product_dropdown, .parent_category, .status, .store, .product_of").select2({
            width:'100%'
        });
				
    })
		
</script>