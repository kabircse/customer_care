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
                Product Category
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
                            <h2>Edit Product Category </h2>
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
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

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
                                        if ($getCategory) {
                                            foreach ($getCategory as $data) {
                                                ?>
                                                <form class="smart-form" method="post" action="<?php echo base_url() . 'product/updateCategory/'.$data['id']; ?>">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <?php
                                                                    if (set_value('parent')) {
                                                                        $parent = set_value('parent');
                                                                    } else {
                                                                        $parent = $data['parent'];
                                                                    }
                                                                    ?>
                                                            <script>
                                                                $(document).ready(function(e) {
                                                                    $(".parent_category option[value='<?php echo $parent; ?>']").attr('selected', 'selected');
                                                                });
                                                            </script>
                                                            <td style="width: 20%">Parent Category</td>
                                                            <td style="width: 50%">
                                                                <label class="select" name="parent_category">
                                                                    <select class="parent_category" name="parent">
                                                                        <option value="">Select Category</option>
                                                                        <option value="0">Parent</option>
                                                                        <?php
                                                                        if ($categories) {
                                                                            foreach ($categories as $category) {
                                                                                ?>
                                                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td style="width: 30%">
                                                            <td><span class="text-danger"><?php echo form_error('parent'); ?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                if (set_value('name')) {
                                                                    $name = set_value('name');
                                                                } else {
                                                                    $name = $data['name'];
                                                                }
                                                                ?>
                                                                <td style="width: 20%">Category Name</td>
                                                                <td style="width: 50%">
                                                                    <label class="input">
                                                                        <input type="text" placeholder="Enter Category Name" name="name" value="<?php echo $name; ?>">
                                                                    </label>
                                                                </td>
                                                                <td style="width: 30%"><span class="text-danger"><?php echo form_error('name'); ?></span></td>
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
                                            <?php }
                                        }
                                        ?>
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

        $(".add_product_dropdown, .parent_category").select2({
            width:'100%'
        });
				
    })
		
</script>