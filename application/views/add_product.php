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
            <li>Home</li><li>Products</li><li>Add Product</li>
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
                            <h2>Add Product</h2>
                            
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
                                                Successfully Inserted.
                                            </div>
                                        <?php } elseif ($flag == 'failed') {
                                            ?>
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                Insertion Error. Please Try again.

                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                                <form class="form-horizontal" method="post" action="<?php echo base_url().'product/insertProduct'?>">

                                    <fieldset>

                                        <div class="col-md-6">
                                            <div class="row margintb20">
                                                <label class="col-md-4 control-label">Select Category</label>
                                                <div class="col-md-8">

                                                    <select class="category_list" name="category_id">
                                                         <option value="">--Select--</option>
                                                        <?php 
                                                        if($categories){
                                                            foreach ($categories as $categories){?>
                                                                <option value="<?php echo $categories['id'];?>"><?php echo $categories['name'];?></option>
                                                           <?php }
                                                            
                                                        }
                                                        ?>

                                                    </select> 

                                                </div>
                                                <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('category_id');?></span></div>
                                            </div>
                                            <div class="row margintb20">
                                                <label class="col-md-4 control-label">Product Code
                                                </label>
                                                <div class="col-md-8">

                                                    <input type="text" name="code" class="form-control repeat_product_code" value="<?php echo set_value('code');?>">
                                                </div>
                                                <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('code');?></span></div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-4 control-label">Product Name
                                                </label>
                                                <div class="col-md-8">

                                                    <input type="text" class="form-control product_name" value="" name="name">
                                                </div>
                                                <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('name');?></span></div>
                                            </div>
                                              
                                        </div> <!-- left side -->
                                        <div class="col-md-6">
                                          
                                            <div class="row margintb20">
                                                <label class="col-md-4 control-label">Select Color</label>
                                                <div class="col-md-8">

                                                    <select class="color_list" multiple name="color_id[]">
                                                        <?php 
                                                        if($colorlist){
                                                            foreach ($colorlist as $color){?>
                                                                <option value="<?php echo $color['id'];?>"><?php echo $color['name'];?></option>
                                                           <?php }
                                                            
                                                        }
                                                        else{?>
                                                                <option>No Data Found</option>
                                                        <?php }
                                                        ?>

                                                    </select> 

                                                </div>
                                                <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('color_id');?></span></div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-4 control-label">Select Supplier</label>
                                                <div class="col-md-8">

                                                    <select class="supplier_list" multiple name="supplier_id[]">
                                                        <?php 
                                                        if($supplier){
                                                            foreach ($supplier as $supplier){?>
                                                                <option value="<?php echo $supplier['id'];?>"><?php echo $supplier['name'];?></option>
                                                           <?php }
                                                            
                                                        }
                                                        else{?>
                                                                <option>No Data Found</option>
                                                        <?php }
                                                        ?>
                                                        ?>

                                                    </select> 

                                                </div>
                                                <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('supplier_id');?></span></div>
                                            </div>
                                            <div class="row margintb20">
                                                <label class="col-md-4 control-label">Unit Price
                                                </label>
                                                <div class="col-md-8">

                                                    <input type="text" class="form-control product_name" value="" name="price">
                                                </div>
                                                <div class="col-md-8 col-md-offset-4"><span class="text-danger"><?php echo form_error('price');?></span></div>
                                            </div>

                                        </div> <!-- right side -->   
                                    </fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-save"></i>
                                                    Add Product
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

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