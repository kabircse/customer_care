<script>
    $(function(){
        $('.showroom').hide('fast');
       $('.group').on('change',function(){
            var grup = $(this).val();
            if (grup=='2') {
                $('.showroom').show('slow');
            }
            else{
                $('.showroom').hide('slow');
            }
       });
    });
</script>

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
               User
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
                                                    Insertion Error. Please Try again.
                                                    
                                                </div>
                                                <?php } elseif ($flag == 'failed') {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Failed To Delete. Please Try again.
                                                    
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <form class="smart-form" method="post" action="<?php echo base_url() . 'user/insertUser' ?>">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                    <input type="text" name="fname" placeholder="First name" value="<?php echo set_value('fname'); ?>">
                                                </label>
                                                <span class="text-danger"><?php echo form_error('fname'); ?></span>
                                            </section>
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                    <input type="text" name="lname" placeholder="Last name" value="<?php echo set_value('lname'); ?>">
                                                </label>
                                                <span class="text-danger"><?php echo form_error('lname'); ?></span>
                                            </section>
                                        </div>

                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                                    <input type="email" name="email" placeholder="E-mail" value="<?php echo set_value('email'); ?>">
                                                </label>
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </section>
                                            <section class="col col-6">
                                                <label class="select">
                                                    <select name="section_id">
                                                        <option value="0">No Section</option>
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
                                                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </section>
                                        </div>

                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                    <input type="text" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
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

                                        <div class="row">
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
                                            <section class="col col-6">
                                                <label class="select">
                                                    <select name="status">
                                                        <option value="">Select Status</option>
                                                        <option value="1">Enable</option>
                                                        <option value="2">Disable</option>
                                                    </select> 
                                                    <i></i> 
                                                </label>
                                                <span class="text-danger"><?php echo form_error('status'); ?></span>
                                            </section>
                                        </div>
                                        <div class="row showroom">
                                            <section class="col col-6">
                                                <label class="select">
                                                   <?php
                                                   $showroom_array = array('0'=>'--Select Showroom--');
                                                    if($show_rooms){
                                                        foreach($show_rooms as $showroom)
                                                            $showroom_array[$showroom['id']] = $showroom['name'];
                                                        $js = 'required="true"';
                                                    }
                                                    echo form_dropdown('show_room_id',$showroom_array,'',$js);?>
                                                    <i></i> 
                                                </label>
                                                <span class="text-danger"><?php echo form_error('show_room_id'); ?></span>
                                            </section>
                                        </div>
                                    </fieldset>											
                                    <footer>
                                        <button type="reset" class="btn btn-default">
                                            Clear
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </footer>
                                </form>

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
                        <header>
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>User List </h2>

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

                                
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                        <th>User Group</th>
                                                        <th>Showroom</th>
                                                        <th>Status</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        //this variable contains all user information from cc_user table and user controller , index method
                                                        if ($userlist) {
                                                            foreach ($userlist as $user) {
                                                                ?>
                                                                <td><?php echo $user['username'] ?></td>
                                                                <td><?php echo $user['fname'] ?></td>
                                                                <td><?php echo $user['lname'] ?></td>
                                                                <td><?php echo $user['email'] ?></td>
                                                                <td>
                                                                    <?php
                                                                    if($user['group'] == 1){
                                                                        echo 'Administrator';
                                                                    }
                                                                    else{
                                                                        echo 'Normal USer';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    if($user['show_room_id'] == 0){
                                                                        echo 'Administrator';
                                                                    }
                                                                    else{
                                                                    $this->load->model('user_model');
                                                                    $name = user_model::get_showroom_name($user['show_room_id']);
                                                                        echo $name.' showroom';
                                                                    }
                                                                ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php
                                                                    if($user['status'] == 1){
                                                                        echo 'Enable';
                                                                    }
                                                                    else{
                                                                        echo 'Disable';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url().'user/editUser/'.$user['id'];?>" class="btn btn-xs btn-warning">Edit</a>
                                                                    <a href="<?php echo base_url().'user/deleteUser/'.$user['id'];?>" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure???')">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>											
                                    
                                

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