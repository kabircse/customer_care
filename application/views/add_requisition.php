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
                Add Requisition
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
                                            <?php } elseif ($flag == 'error') {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    Failed to Add In cart. Please Try again.

                                                </div>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <form class="smart-form" method="post" action="<?php echo base_url() . 'customerCare/addCartRequisition' ?>" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Problem</td>
                                                            <td>
                                                                <label class="select" >
                                                                    <select class="parent_category" name="problem_id">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        if ($problemlist) {
                                                                            foreach ($problemlist as $problem) {
                                                                                ?>
                                                                                <option value="<?php echo $problem['id']; ?>"><?php echo $problem['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('problem_id'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Select Product</td>
                                                            <td>
                                                                <label class="select" name="parent_category">
                                                                    <select class="parent_category product_id" name="product_id">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        if ($product) {
                                                                            foreach ($product as $productList) {
                                                                                ?>
                                                                                <option value="<?php echo $productList['id']; ?>"><?php echo $productList['code'] . '->' . $productList['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('product_id'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Product Color</td>
                                                            <td>
                                                                <label class="select">
                                                                    <select class="form-control color_list" name="color">
                                                                        <option>--Select--</option>
                                                                        <?php
                                                                        if ($color) {
                                                                            foreach ($color as $colorlist) {
                                                                                ?>
                                                                                <option value="<?php echo $colorlist['id']; ?>"><?php echo $colorlist['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('color'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantity</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Quantity" name="quantity">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('quantity'); ?></span></td>
                                                        </tr>
                                                        <?php
                                                            $session = $this->session->userdata('check');
                                                            $showroom_id = $session['showroom'];
                                                            if($showroom_id ==0){?>
                                                        <tr>
                                                            <td>Approved Quantity</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Quantity" name="aquantity">  
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('aquantity'); ?></span></td>
                                                        </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td>Amount</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Amount" name="amount">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('amount'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Upload Image</td>
                                                            <td>
                                                                <input type="file" name="product_image">
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('product_image'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Product Of</td>
                                                            <td>
                                                                <label class="select" >
                                                                    <select class="parent_category" name="product_of">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        if ($showroom) {
                                                                            foreach ($showroom as $showroomlist) {
                                                                                ?>
                                                                                <option value="<?php echo $showroomlist['id']; ?>"><?php echo $showroomlist['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('product_of'); ?></span></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Invoice No</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Invoice" name="invoice">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('invoice'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Customer Name</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Customer Name" name="cname">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('cname'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Customer Contact</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Customer Contact" name="ccontact">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('ccontact'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                <label class="input">
                                                                    <input type="text" placeholder="Customer Address" name="caddress">
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('caddress'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Remarks</td>
                                                            <td>
                                                                <label class="textarea">
                                                                    <textarea class="form-control" name="remarks"></textarea>
                                                                </label>
                                                            </td>
                                                            <td><span class="text-danger"><?php echo form_error('remarks'); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Solution Type</td>
                                                            <td>
                                                                <input type="radio" value="1" name="repair" checked>Repair
                                                                <input type="radio" value="2" name="repair">Replace
                                                            </td>
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
                            <h2>Product List </h2>

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
                                <form class="smart-form" method="post" action="<?php echo base_url() . 'customerCare/insertRequisition' ?>">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-1">Complain Date</td>
                                                    <td class="col-md-3"><label class="input"><input type="date" placeholder="Date" class="datepicker" name="date" readonly data-dateformat="yy-mm-dd" value="<?php echo date('Y-m-d')?>"></label> <span class="text-danger"><?php echo form_error('date'); ?></span></td>
                                                    <td class="col-md-1">Select Showroom</td>
                                                    <td class="col-md-3">
                                                        <label class="select">
                                                            <?php if($showroom_id==0){?>
                                                            <select name="showroom">
                                                                <option value="0">No Showroom</option>
                                                                <?php
                                                                if ($showroom) {
                                                                    foreach ($showroom as $showroomadd) {
                                                                        ?>
                                                                        <option value="<?php echo $showroomadd['id']; ?>"><?php echo $showroomadd['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php }
                                                            else{
                                                                foreach ($showroom as $showroomadd)
                                                                    $showroom_array[$showroomadd['id']] = $showroomadd['name'];
                                                                    echo form_dropdown('showroom',$showroom_array,$showroom_id,'disabled="true"');
                                                                echo form_hidden('showroom',$showroom_id);    
                                                            ?>
                                                            
                                                            <?php }?>
                                                        </label>
                                                        <span class="text-danger"><?php echo form_error('showroom'); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Problem</th>
                                                    <th>Product Code</th>
                                                    <th>Product Name</th>
                                                    <th>Product Color</th>
                                                    <th>Quantity</th>
                                                    <th>Approved Quantity</th>
                                                    <th>Amount</th>
                                                    <th>Product of</th>
                                                    <th>Invoice</th>
                                                    <th>Remarks</th>
                                                    <th>Image</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Contact</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($this->cart->contents()) {
                                                    //print_r($this->cart->contents());exit;
                                                    foreach ($this->cart->contents() as $cart) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $cart['options']['problem']; ?></td>
                                                            <td><?php echo $cart['options']['code']; ?></td>
                                                            <td><?php echo $cart['name']; ?></td>
                                                            <td><?php echo $cart['options']['color_name']; ?></td>
                                                            <td><?php echo $cart['options']['quantity']; ?></td>
                                                            <td><?php echo $cart['options']['aquantity']; ?></td>
                                                            <td><?php echo $cart['price']; ?></td>
                                                            <td><?php echo $cart['options']['product_of_name']; ?></td>
                                                            <td><?php echo $cart['options']['invoice']; ?></td>
                                                            <td><?php echo $cart['options']['remarks']; ?></td>
                                                            <td><a href="<?php echo $cart['options']['img_src']; ?>" target="_blank"><img src="<?php echo $cart['options']['img_src']; ?>" height="50" width="50"></a></td>
                                                            <td><?php echo $cart['options']['customer_name']; ?></td>
                                                            <td><?php echo $cart['options']['customer_contact']; ?></td>
                                                            <td><?php echo $cart['options']['caddress']; ?></td>
                                                            <td><a href="<?php echo base_url() . 'customerCare/deleteCart/' . $cart['rowid']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td>No Data Found</td>
                                                    </tr>
                                                <?php }
                                                ?>
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

        $('.product_id').on('change', function(){
            var product_id = $(this).val();
            if(product_id)
            {
                var url_op = "<?php echo base_url(); ?>"+"product/get_product_color_data/"+product_id;
                $.ajax({        
                    type: "POST",
                    url: url_op,
                    data: 'product_id='+product_id,
                    success: function(msg) {
                        //alert(msg);
                        if(msg != 'false')
                        {
                            var get_product_data = jQuery.parseJSON(msg);
                            var create_option = '<option value="">Select Color</option>';
                            for(i=0; i<get_product_data.length; i++)
                            {
                                create_option += '<option value="'+get_product_data[i].color_id+'">'+get_product_data[i].name+'</option>';
                            }
                            $('.color_list').html(create_option);
                        }
                        else{
                            var create_option = '<option value="">Select Color</option>';
                            $('.color_list').html(create_option);
                        }
                    }
                });
            }else{
                var create_option = '<option value="">Select Color</option>';
                $('.color_list').html(create_option);
            }
        });

        $(".add_product_dropdown, .parent_category").select2({
            width:'100%'
        });
				
    });
		
</script>