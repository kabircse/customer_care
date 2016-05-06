<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Month', 'Complain', 'Solved', 'Pending/Decline'],
            <?php
            foreach ($report_data as $data) {
                ?>
                                [<?php echo "'" . $data['month'] . "'"; ?>,  <?php echo $data['complain']; ?>, <?php echo $data['solved']; ?>, <?php echo $data['pending']; ?>],
                <?php
            }
            ?>
   
        ]);

        var options = {
            title: 'Complain, Solved and Pending Report',
            hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        
    }
    
    google.setOnLoadCallback(drawChart1);
    function drawChart1() {

        var data = google.visualization.arrayToDataTable([
            ['Month', 'Days'],
            <?php
            foreach ($solved_date as $data1) {
                ?>
                      [<?php echo "'" . $data1['month'] . "'"; ?>,  <?php echo $data1['date']; ?>],
                <?php
            }
            ?>

        ]);

        var options = {
            title: ' Average Days to Solve Customer Complain Report',
            hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
        
        }
        google.setOnLoadCallback(deviation);
        function deviation() {

            var data = google.visualization.arrayToDataTable([
                ['Month', 'Days'],
                <?php
                foreach ($deviation_date as $deviation_data) {
                    ?>
                          [<?php echo "'" . $deviation_data['month'] . "'"; ?>,  <?php echo $deviation_data['deviation']; ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                title: 'Deviation From Committed Date Report',
                hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
            };

            var chart1 = new google.visualization.ColumnChart(document.getElementById('deviation'));
            chart1.draw(data, options);
        
        }
        
        google.setOnLoadCallback(income);
        function income() {

            var data = google.visualization.arrayToDataTable([
                ['Month', 'Taka'],
                <?php
                foreach ($income as $income) {
                    ?>
                          [<?php echo "'" . $income['month'] . "'"; ?>,  <?php echo ceil($income['income']); ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                title: 'Income of Customer Care',
                hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
            };

            var chart1 = new google.visualization.ColumnChart(document.getElementById('income'));
            chart1.draw(data, options);
        
        }
        google.setOnLoadCallback(complete_price);
        function complete_price() {

            var data = google.visualization.arrayToDataTable([
                ['Month', 'Value'],
                <?php
                foreach ($complete_price as $complete_price) {
                    ?>
                          [<?php echo "'" . $complete_price['month'] . "'"; ?>,  <?php echo $complete_price['price']; ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                title: 'Total Value of Products Returned Due To Customer Problem',
                hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
            };

            var chart1 = new google.visualization.ColumnChart(document.getElementById('total_value'));
            chart1.draw(data, options);
        
        }
        
        google.setOnLoadCallback(repair_price);
        function repair_price() {

            var data = google.visualization.arrayToDataTable([
                ['Month', 'Value'],
                <?php
                foreach ($repair_price as $repair_price) {
                    ?>
                          [<?php echo "'" . $repair_price['month'] . "'"; ?>,  <?php echo $repair_price['price']; ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                title: 'Total Value of Products Returned Due To Customer Problem',
                hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
            };

            var chart1 = new google.visualization.ColumnChart(document.getElementById('repair_value'));
            chart1.draw(data, options);
        
        }
        
        google.setOnLoadCallback(repair_cost);
        function repair_cost() {

            var data = google.visualization.arrayToDataTable([
                ['Month', 'Value'],
                <?php
                foreach ($repair_cost as $repair_cost) {
                    ?>
                                [<?php echo "'" . $repair_cost['month'] . "'"; ?>,  <?php echo ceil($repair_cost['cost']); ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                title: 'Total Repairing Cost',
                hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
            };

            var chart1 = new google.visualization.ColumnChart(document.getElementById('repair_cost'));
            chart1.draw(data, options);
        
        }
</script>
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                Dashboard
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
                            <h2>Complain, Solved and Pending Report</h2>

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

                                <div class="col-md-12">
                                    <div id="chart_div"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->
                </article>
                <?php if(isset($showroom_id)!=0){?>
		<article class="col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
                            <h2>Average Days to Solve Customer Complain Report</h2>

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

                                <div class="col-md-12">
                                    <div id="chart_div1"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <article class="col-sm-12 col-md-12 col-lg-12">

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
                            <h2>Deviation from Committed Date Report</h2>

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

                                <div class="col-md-12">
                                    <div id="deviation"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                 <article class="col-sm-12 col-md-12 col-lg-12">

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
                            <h2>Income of Customer Care Report</h2>

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

                                <div class="col-md-12">
                                    <div id="income"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <article class="col-sm-12 col-md-12 col-lg-12">

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
                            <h2>Total Value of Products Returned Due To Customer Problem Report</h2>

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

                                <div class="col-md-12">
                                    <div id="total_value"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                 <article class="col-sm-12 col-md-12 col-lg-12">

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
                            <h2>Value of Return Product Reparing Continuing on Production Field  Report</h2>

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

                                <div class="col-md-12">
                                    <div id="repair_value"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <article class="col-sm-12 col-md-12 col-lg-12">

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
                            <h2>Total Repairing Report</h2>

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

                                <div class="col-md-12">
                                    <div id="repair_cost"></div>
                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <?php }?>
            </div>

            <!-- END ROW -->				
        </section>
        <!-- end widget grid -->


    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
