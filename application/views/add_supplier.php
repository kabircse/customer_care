<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                Supplier
            </li>
        </ol>

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
<!--            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-edit fa-fw "></i>
                    Supplier
                    <span>>
                        Add Supplier
                    </span>
                </h1>
            </div>-->
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
                                Insertion Error.
                                 Please Try again.
                            </div>
                    <?php } elseif ($flag == 'deletefailed') {
                            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="icon-remove"></i>
                                </button>
                                Failed to delete.Please Try again.
                                 
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

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
                            <h2>Add Supplier Information</h2>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">

                                        <form class="smart-form" action="<?php echo base_url() . 'creation/insertSupplier' ?>" method="post">
                                            <fieldset>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td style="width: 20%">Supplier Name : </td>
                                                            <td style="width: 50%"><input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control"></td>
                                                            <td style="width: 30%"><span class="text-danger"><?php echo form_error('name'); ?></span></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">Supplier Address : </td>
                                                            <td style="width: 50%"><textarea class="form-control" rows="5" name="address"><?php echo set_value('address'); ?></textarea></td>
                                                            <td style="width: 30%"><span class="text-danger"><?php echo form_error('address'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">Supplier Phone : </td>
                                                            <td style="width: 50%"><input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control"></td>
                                                            <td style="width: 30%"><span class="text-danger"><?php echo form_error('phone'); ?></span></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                            </fieldset>
                                            <footer>
                                                <button type="reset" class="btn btn-default">
                                                    Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </footer>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->
                    
                    
                    
                    
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
                            <h2>Supplier List </h2>

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
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                                                                    
                                            if ($supplier) {
                                                
                                                foreach ($supplier as $supplier) {
                                                    //print_r($colorname);
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $supplier['name']; ?></td>
                                                        <td><?php echo $supplier['phone']; ?></td>
                                                        <td><?php echo $supplier['address']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'creation/editSupplier/' . $supplier['id'] ?>" class="btn btn-xs btn-warning">Edit</a>
                                                            <a href="<?php echo base_url() . 'creation/deleteSupplier/' . $supplier['id'] ?>" onclick="return confirm('Are You Sure?????')" class="btn btn-xs btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                          else{?>
                                                    <tr>
                                                        <td colspan="2">No Data Found</td>
                                                    </tr>
                                            <?php }
                                            ?>
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

