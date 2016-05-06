<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
               Showroom
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

        <div class="row">
<!--            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-edit fa-fw "></i> 
                    Showroom 
                    <span>> 
                        Showroom List
                    </span>
                </h1>
            </div>-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?php
                    if (isset($flag) && $flag) {
                        if ($flag == 'failed') {
                            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="icon-remove"></i>
                                </button>
                                Failed to Delete.
                                Please Try again.
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
                            <h2>Showroom List </h2>

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
                                        <tbody>
                                            <tr>
                                                <td>No</td>
                                                <td>Showroom Type</td>
                                                <td>Showroom Name</td>
                                                <td>Showroom Address</td>
                                                <td>Showroom Code</td>
                                                <td>Action</td>
                                            </tr>
                                            <tr>
                                                <?php
                                                //this variable contains showroom data from cc_showroom table and it comes from showroom controller and showroomList method
                                                if ($showroomlist) {
                                                    $i = 1;
                                                    foreach ($showroomlist as $data) {
                                                        ?>
                                                        <td><?php echo $i;
                                                $i++;
                                                        ?></td>
                                                        <td><?php
                                                    if ($data['type'] == 1) {
                                                        echo 'Own';
                                                    } else {
                                                        echo 'Dealer';
                                                    }
                                                    ?></td>
                                                        <td><?php echo $data['name']; ?></td>
                                                        <td><?php echo $data['address']; ?></td>
                                                        <td><?php echo $data['code']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url().'showroom/editShowroom/'.$data['id'];?>" class="btn btn-warning btn-xs">Edit</a>
                                                            <a href="<?php echo base_url().'showroom/deleteShowroom/'.$data['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }else{?>
                                                    <tr>
                                                        <td colspan="6">No Data Found</td>
                                                    </tr>
                                                        
                                           <?php  }
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

