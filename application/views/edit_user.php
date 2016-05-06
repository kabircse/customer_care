<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                Blank Page
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
                            <h2>Add User </h2>

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
                                //this variable contains user information for updating comes from user controller and editUser method
                                if ($userinfo) {
                                    foreach ($userinfo as $information) {
                                        ?>
                                        <form class="smart-form" method="post" action="<?php echo base_url() . 'user/updateUser/' . $information['id'] ?>">
                                            <input type="hidden" name="id" value="<?php echo $information['id']?>">
                                            <fieldset>
                                                <div class="row">
                                                    <?php
                                                    if (set_value('fname')) {
                                                        $fname = set_value('fname');
                                                    } else {
                                                        $fname = $information['fname'];
                                                    }
                                                    ?>

                                                    <section class="col col-6">
                                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $fname; ?>">
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('fname'); ?></span>
                                                    </section>
                                                    <?php
                                                    if (set_value('lname')) {
                                                        $lname = set_value('lname');
                                                    } else {
                                                        $lname = $information['lname'];
                                                    }
                                                    ?>
                                                    <section class="col col-6">
                                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                            <input type="text" name="lname" placeholder="Last name" value="<?php echo $lname; ?>">
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('lname'); ?></span>
                                                    </section>
                                                </div>

                                                <div class="row">
                                                    <?php
                                                    if (set_value('email')) {
                                                        $email = set_value('email');
                                                    } else {
                                                        $email = $information['email'];
                                                    }
                                                    ?>
                                                    <section class="col col-6">
                                                        <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                    </section>

                                                    <?php
                                                    if (set_value('section_id')) {
                                                        $showroom_id = set_value('section_id');
                                                    } else {
                                                        $showroom_id = $information['section_id'];
                                                    }
                                                    ?>
                                                    <script type="text/javascript">
                                                        $(document).ready(function(e) {
                                                            $(".section_id option[value='<?php echo $showroom_id; ?>']").attr('selected', 'selected');
                                                        });
                                                    </script>
                                                    <section class="col col-6">
                                                        <label class="select">
                                                            <select name="section_id" class="section_id">
                                                                <option value="0">No Showroom</option>
                                                                <?php
                                                                if ($section) {
                                                                    foreach ($section as $section) {
                                                                        ?>
                                                                        <option value="<?php echo $section['id']; ?>"><?php echo $section['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select> 
                                                            <i></i> 
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('showroom_id'); ?></span>
                                                    </section>
                                                </div>

                                                <div class="row">
                                                    <?php
                                                    if (set_value('username')) {
                                                        $username = set_value('username');
                                                    } else {
                                                        $username = $information['username'];
                                                    }
                                                    ?>
                                                    <section class="col col-6">
                                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                            <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                            <input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                                    </section>
                                                </div>
                                                <?php
                                                if (set_value('group')) {
                                                    $group = set_value('group');
                                                } else {
                                                    $group = $information['group'];
                                                }
                                                ?>
                                                <div class="row">
                                                    <script type="text/javascript">
                                                        $(document).ready(function(e) {
                                                            $(".group option[value='<?php echo $group; ?>']").attr('selected', 'selected');
                                                        });
                                                    </script>
                                                    <section class="col col-6">
                                                        <label class="select">
                                                            <select name="group" class="group">
                                                                <option value="" selected="">Select User Group</option>
                                                                <option value="1">Administrator</option>
                                                                <option value="2">Normal User</option>
                                                            </select> 
                                                            <i></i> 
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('group'); ?></span>
                                                    </section>
                                                    <?php
                                                    if (set_value('status')) {
                                                        $status = set_value('status');
                                                    } else {
                                                        $status = $information['status'];
                                                    }
                                                    ?>
                                                    <script type="text/javascript">
                                                        $(document).ready(function(e) {
                                                            $(".status option[value='<?php echo $status; ?>']").attr('selected', 'selected');
                                                        });
                                                    </script>
                                                    <section class="col col-6">
                                                        <label class="select">
                                                            <select name="status" class="status">
                                                                <option value="">Select Status</option>
                                                                <option value="1">Enable</option>
                                                                <option value="2">Disable</option>
                                                            </select> 
                                                            <i></i> 
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('status'); ?></span>
                                                    </section>
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
                                }
                                ?>
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