<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php $this->load->view('include/side_bar.php'); ?>

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->

                        <!-- Calendar Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-calendar"></i>Calendar<br><small>An awesome calendar for your events!</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Components</li>
                            <li><a href="<?php echo base_url('welcome/calender'); ?>">Calendar</a></li>
                            <li><a href="">Add Event</a></li>
                        </ul>
                        <!-- END Calendar Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <h2><strong>Event</strong> </h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <form action="<?php echo base_url('welcome/add_event'); ?>" method="POST" class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-text-input">Event Title</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Event Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-daterange1">Select Date Range Event</label>
                                            <div class="col-md-8">
                                                <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                                                    <input type="text" id="example-daterange1" name="example-daterange1" class="form-control text-center" placeholder="From">
                                                    <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                                    <input type="text" id="example-daterange2" name="example-daterange2" class="form-control text-center" placeholder="To">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-colorpicker2">Color Tags Event</label>
                                            <div class="col-md-8">
                                                <div class="input-group input-colorpicker">
                                                    <input type="text" id="example-colorpicker2" name="example-colorpicker2" class="form-control" value="#1bbae1">
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-md btn-primary btn-block" name="proses" value="Add Event">
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                        </div>
                        <!-- END Mini Top Stats Row -->
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->



        <?php $this->load->view('include/include_script.php'); ?>
    </body>
</html>
