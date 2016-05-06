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
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-edit fa-fw "></i>
                    Supplier
                    <span>>
                        Add Supplier
                    </span>
                </h1>
            </div>
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
                                Failed to Update. Please Try Again.
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
                                        <?php 
                                        if($supplierList){
                                            
                                            foreach ($supplierList as $supplier){
                                        ?>
                                        <form class="smart-form" action="<?php echo base_url() . 'creation/updateSupplier/'.$supplier['id'] ?>" method="post">
                                            <fieldset>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <?php 
                                                        if(set_value('name')){
                                                            $name = set_value('name');
                                                        }
                                                        else{
                                                            $name = $supplier['name'];
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td style="width: 20%">Supplier Name : </td>
                                                            <td style="width: 50%"><input type="text" name="name" value="<?php echo $name; ?>" class="form-control"></td>
                                                            <td style="width: 30%"><span class="text-danger"><?php echo form_error('name'); ?></span></td>

                                                        </tr>
                                                        <?php 
                                                        if(set_value('address')){
                                                            $address = set_value('address');
                                                        }
                                                        else{
                                                            $address = $supplier['address'];
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td style="width: 20%">Supplier Address : </td>
                                                            <td style="width: 50%"><textarea class="form-control" rows="5" name="address"><?php echo $address; ?></textarea></td>
                                                            <td style="width: 30%"><span class="text-danger"><?php echo form_error('address'); ?></span></td>
                                                        </tr>
                                                        <?php 
                                                        if(set_value('phone')){
                                                            $phone= set_value('phone');
                                                        }
                                                        else{
                                                            $phone = $supplier['phone'];
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td style="width: 20%">Supplier Phone : </td>
                                                            <td style="width: 50%"><input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control"></td>
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
                                        <?php }
                                        } ?>
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

