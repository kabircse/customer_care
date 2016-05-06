
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
                Print Requisition
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
                            <h2 class="heading">Print Requisition</h2>
                        </header>
                       
                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body mydiv-center">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <?php foreach ($product as $product) { ?>
                                            <form class="smart-form" method="post" action="<?php echo base_url() . 'customerCare/updateRequisitionProduct/' . $product['rstn_data_id']; ?>">
                                                <div class="table-responsive">
                                                    <div class="image">
                                                        <span class="device_image">Device Image</span>
                                                            <?php
                                                            if (set_value('image')) {
                                                                $image = set_value('image');
                                                            } else {
                                                                $image = $product['image'];
                                                            }
                                                            ?>
                                                            <a href="<?php echo $product['image']; ?>" target="_blank"><img src="<?php echo $product['image']; ?>" height="320" width="260"></a>
                                                        </div>
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
                                                            
                                                        <td>Problem</td>
                                                        <td>
                                                           <label class="input">
                                                                
                                                             <?php
                                                                    if ($problemlist) {
                                                                        $data=array();
                                                                        foreach ($problemlist as $problem) {
                                                                            $data[$problem['id']] = $problem['name'];
                                                                        }
                                                                        echo $data[$problem_id];
                                                                        //echo form_dropdown('problem_id',$data,$problem_id);    
                                                                           
                                                                    }
                                                                    ?>
                                                           </label>
                                                        </td>
                                                       
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
                                                                   <?php echo $pcode; ?>
                                                                </label>
                                                            </td>
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
                                                                   <?php echo $pname; ?>
                                                                </label>
                                                            </td>
                                                           
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
                                                                <label class="select input">
                                                                    <?php
                                                                        if ($color) {
                                                                            foreach ($color as $colorlist)
                                                                                $data[$colorlist['id']] = $colorlist['name'];
                                                                            echo $data[$color_id] ;
                                                                               
                                                                        }
                                                                    ?>
                                                                    
                                                                </label>

                                                            </td>
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
                                                                  <?php echo $quantity; ?>
                                                                </label>
                                                            </td>
                                                            
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
                                                                    <?php echo $aquantity; ?>
                                                                </label>
                                                            </td>
                                                        
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
                                                                    <?php echo $amount; ?>
                                                                </label>
                                                            </td>
                                                            
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
                                                                    <?php echo $commited_date; ?>
                                                                </label>
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
                                                                <label class="select input">
                                                                    <?php
                                                                        if ($store) {
                                                                            foreach ($store as $storelist)
                                                                                $data[$storelist['id']] = $storelist['name'];
                                                                            echo $data[$store_name] ;
                                                                               
                                                                        }
                                                                    ?>
                                                                    
                                                                </label>
                                                            </td>
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
                                                                <label class="select input">
                                                                    <?php
                                                                        if ($showroom) {
                                                                            foreach ($showroom as $showroomlist)
                                                                                $data[$showroomlist['id']] = $showroomlist['name'];
                                                                            echo $data[$name] ;
                                                                               
                                                                        }
                                                                    ?>
                                                                </label>
                                                                <script>
                                                                    $(document).ready(function(e) {
                                                                        $(".product_of option[value='<?php echo $name; ?>']").attr('selected', 'selected');
                                                                    });
                                                                </script>

                                                            </td>
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
                                                                    <?php echo $invoice; ?>
                                                                </label>
                                                            </td>
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
                                                                    <?php echo $cname; ?>
                                                                </label>
                                                            </td>
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
                                                                    <?php echo $ccontact; ?>
                                                                </label>
                                                            </td>
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
                                                                <label class="textarea input">
                                                                    <?php echo $caddress; ?>
                                                                </label>
                                                            </td>
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
                                                                <label class="textarea input">
                                                                    <?php echo $remarks; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td>Solution Type</td>
                                                        <td>
                                                            <label class="input">
                                                            <?php
                                                            if($product['repair_or_replace']==1)
                                                                echo "Repair";
                                                            else
                                                                echo "Replace";
                                                            ?>
                                                            </label>
                                                        </td>
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
                                                                    <?php echo $ccarcost; ?>
                                                                </label>
                                                            </td>
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
                                                                <label class="select input">
                                                                        <?php if ($status == 1) 
                                                                                echo "Processing";
                                                                            if ($status == 2) 
                                                                                echo "Shipped";
                                                                            if ($status == 3) 
                                                                                echo "Decline";
                                                                        ?>
                                                                            
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>									
                                                <footer>
                                                   
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
        window.print();				
    });
		
</script>
<style>
    .image{
        margin-left: 70%;
        margin-top: 6%;
    }
    .device_image{
        margin-left: 28%;
        color: black;
        font-size: medium;
    }
    .table{
        margin-top: -50%;
        font-size: medium;
    }
    @media print{
                .mydiv-center{
		    margin-left: 15%;
                    width:'100%';
                      
		}
		.paid{
			text-align: center;
		}
		.heading{
			margin-left: 20%;
			margin-top: 3%;
                        
		}
                .input{
                    margin-left: 35%;
                    color: black;
                    font-size: smaller;
                }    
            head,#ribbon,#shortcut,#header,#left-panel{
                display:none;
            }
            .image{
                margin-left: 50%;
                margin-top: 10%;
            }
            .device_image{
                margin-left: 18%;
                color: black;
                font-size: small;
            }
            .table{
                margin-top: -50%;
                font-size: small;
            }
    }
</style>