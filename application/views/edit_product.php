
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li><li>Products</li><li>Edit Product</li>
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
        <section id="widget-grid">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
                            <span class="widget-icon"> <i class="fa fa-plus-square-o"></i> </span>
                            <h2>Edit Product</h2>

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
                                    <div class="col-md-12">
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
                                                    Failed To Update. Please Try again.

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                foreach ($productinfo as $product) {
                                    ?>
                                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'product/updateProduct/'.$product['id'] ?>">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
                                        <fieldset>
                                            <?php
                                            if (set_value('category_id')) {
                                                $category = set_value('category_id');
                                            } else {
                                                $category = $product['category'];
                                            }
                                            ?>
                                            <script type="text/javascript">
                                                $(document).ready(function(e) {
                                                    $(".category_list option[value='<?php echo $category; ?>']").attr('selected', 'selected');
                                                });
                                            </script>
                                            <div class="col-md-6">
                                                <div class="row margintb20">
                                                    <label class="col-md-4 control-label">Select Category</label>
                                                    <div class="col-md-8">

                                                        <select class="category_list" name="category_id">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                            if ($categories) {
                                                                foreach ($categories as $categories) {
                                                                    ?>
                                                                    <option value="<?php echo $categories['id']; ?>"><?php echo $categories['name']; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                        </select> 

                                                    </div>
                                                    <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('category_id'); ?></span></div>
                                                </div>
                                                <?php
                                                if (set_value('code')) {
                                                    $code = set_value('code');
                                                } else {
                                                    $code = $product['code'];
                                                }
                                                ?>
                                                <div class="row margintb20">
                                                    <label class="col-md-4 control-label">Product Code
                                                    </label>
                                                    <div class="col-md-8">

                                                        <input type="text" name="code" class="form-control repeat_product_code" value="<?php echo $code; ?>">
                                                    </div>
                                                    <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('code'); ?></span></div>
                                                </div>
                                                <?php
                                                if (set_value('name')) {
                                                    $name = set_value('name');
                                                } else {
                                                    $name = $product['name'];
                                                }
                                                ?>
                                                <div class="row">
                                                    <label class="col-md-4 control-label">Product Name
                                                    </label>
                                                    <div class="col-md-8">

                                                        <input type="text" class="form-control product_name" value="<?php echo $name; ?>" name="name">
                                                    </div>
                                                    <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('name'); ?></span></div>
                                                </div>

                                            </div> <!-- left side -->
                                            <div class="col-md-6">
                                                <?php
                                                foreach ($colorinfo as $colorinfo) {
                                                    if (set_value('color_id')) {
                                                        $color = set_value('color_id');
                                                    } else {
                                                        $color = $colorinfo['color_id'];
                                                    }
                                                    ?>
                                                    <script type="text/javascript">
                                                        $(document).ready(function(e) {
                                                            $(".color_list option[value='<?php echo $color; ?>']").attr('selected', 'selected');
                                                        });
                                                    </script>
                                                <?php }
                                                ?>

                                                <div class="row margintb20">
                                                    <label class="col-md-4 control-label">Select Color</label>
                                                    <div class="col-md-8">

                                                        <select class="color_list" multiple name="color_id[]">
                                                            <?php
                                                            if ($colorlist) {
                                                                foreach ($colorlist as $color) {
                                                                    ?>
                                                                    <option value="<?php echo $color['id']; ?>"><?php echo $color['name']; ?></option>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <option>No Data Found</option>
                                                            <?php }
                                                            ?>

                                                        </select> 

                                                    </div>
                                                    <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('color_id'); ?></span></div>
                                                </div>
                                                <?php
                                                foreach ($supplierinfo as $supplierinfo) {
                                                    if (set_value('supplier_id')) {
                                                        $supplierifo = set_value('supplier_id');
                                                    } else {
                                                        $supplierifo = $supplierinfo['supplier_id'];
                                                    }
                                                    ?>
                                                    <script type="text/javascript">
                                                        $(document).ready(function(e) {
                                                            $(".supplier_list option[value='<?php echo $supplierifo; ?>']").attr('selected', 'selected');
                                                        });
                                                    </script>
                                                <?php }
                                                ?>
                                                <div class="row">
                                                    <label class="col-md-4 control-label">Select Supplier</label>
                                                    <div class="col-md-8">

                                                        <select class="supplier_list" multiple name="supplier_id[]">
                                                            <?php
                                                            if ($supplier) {
                                                                foreach ($supplier as $supplier) {
                                                                    ?>
                                                                    <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['name']; ?></option>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <option>No Data Found</option>
                                                            <?php }
                                                            ?>
                                                            ?>

                                                        </select> 

                                                    </div>
                                                    <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('supplier_id'); ?></span></div>
                                                </div>

                                            </div> <!-- right side -->   
                                        </fieldset>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="fa fa-save"></i>
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                <?php } ?>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->





                </article>
                <!-- WIDGET END -->



            </div>

            <!-- end row -->
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

        $(".add_product_dropdown, .category_list, .supplier_list, .color_list").select2({
            width:'100%'
        });
				
    })
		
</script>