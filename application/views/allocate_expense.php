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
            <li>
                Allocate Expense
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
                            <h2>Allocate Expense</h2>

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
                                                    Successfully Inserted.
                                                </div>
                                            <?php } elseif ($flag == 'failed') {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Failed to Insert. Please Try again.

                                                </div>
                                            <?php } elseif ($flag == 'repaired') {
                                                ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Successfully Repaired.

                                                </div>
                                            <?php } elseif ($flag == 'repairedfailed') {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Failed to Repaired. Please Try again.

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <form class="smart-form" method="post" action="<?php echo base_url() . 'customerCare/insertAllocateExpense/' . $rqtn_id; ?>">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Section</td>
                                                            <td>
                                                                <label class="select" >
                                                                    <select class="cc_section" name="section_id">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        if ($sections) {
                                                                            foreach ($sections as $section) {
                                                                                ?>
                                                                                <option value="<?php echo $section['id']; ?>"><?php echo $section['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('section_id'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Committed Date</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Committed Date" class="datepicker" name="commited_date" readonly data-dateformat="yy-mm-dd" value="<?php echo set_value('commited_date'); ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('commited_date'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repair Cost</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Repair Cost" name="repair_cost" value="<?php echo set_value('repair_cost'); ?>">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('repair_cost'); ?></span></td>
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
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Commited Date of Various Section to Solve the Problem & Daviation Analysis</h2>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Section</th>
                                                        <th>Committed Service Date</th>
                                                        <th>Actual Service Date</th>
                                                        <th>Daviation (Days)</th>
                                                        <th>Section Wise Repair Cost</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($expense) {

                                                        foreach ($expense as $expense) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $expense['name']; ?></td>
                                                                <td><?php echo $expense['committed_date']; ?></td>
                                                                <td><?php echo $expense['service_date']; ?></td>
                                                                <td><?php
                                                                    if (!$expense['difference']) {
                                                                        echo '0';
                                                                    } else {
                                                                        if($expense['difference']<0){
                                                                            echo 'Repaired Before '.  abs($expense['difference']).' Days';
                                                                        }else{
                                                                            echo $expense['difference'];
                                                                        }
                                                                    }
                                                                    ?></td>

                                                                 <td><?php echo $expense['repair_cost']; ?></td>
                                                                 <?php if($expense['is_repaired'] == 1){?>
                                                                     <td><a href="<?php echo base_url() . 'customerCare/repaired/' . $expense['allocate_id'] . '/' . $expense['rqtn_data_id'] ?>" class="btn btn-xs btn-warning">Repair</a></td>
                                                                 <?php
                                                                     }else{?>
                                                                     <td>Repaired</td>
                                                                 <?php }
                                                                    ?>
                                                                 
                                                                 
                                                                
                                                                 
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
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
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-12">
                    <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                        <div>

                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <th>Product Ready to Delivary on (Date)</th>
                                            <th>Actual Delivary Date</th>
                                            <th>Delay to Delivary (Days)</th>
                                            </thead>
                                            <tbody>
                                                <?php if($delivery){
                                                    
                                                    foreach ($delivery as $delivery){
                                               ?>
                                                <tr>
                                                    <td><?php echo $delivery['max_service'];?></td>
                                                    <td><?php echo $delivery['action_date'];?></td>
                                                    <td>
                                                        <?php
                                                            if($delivery['difference']<0){
                                                                echo 'Deliverd before '.  abs($delivery['difference']).' Days';
                                                            }else{
                                                                echo $delivery['difference'];
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php }
                                                }
                                                else{?>
                                                <tr>
                                                    <td colspan="3">No Data Found</td>
                                                </tr>
                                                <?php }
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>


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

        $(".cc_section").select2({
            width:'100%'
        });
				
    })
		
</script>