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
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-ticket"></i>Profil<br><small>Easily push project to Oranyelab Team!</small>
                                </h1>
                            </div>
                        </div>

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <h2><strong>Profil</strong> Elements</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <form action="<?php echo base_url('index.php/profile/update_profile'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="hidden" name="kode_register" value="<?php echo $this->session->userdata('kode_register'); ?>" placeholder="">
                                                <input type="text" id="example-text-input" name="nama" value="<?php echo $this->session->userdata('nama'); ?>" class="form-control" placeholder="Text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="email" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" placeholder="Text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nomor Telepon</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="nomor_telepon" value="<?php echo $this->session->userdata('nomor_telepon'); ?>" class="form-control" placeholder="<?php echo $this->session->userdata('nomor_telepon'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Icon Profil</label>
                                            <div class="col-md-9">
                                                <input type="file" name="img_profile" accept="image/*" onchange="loadFile(event)">
                                            </div>
                                            <div class="col-md-9">
                                                <img id="output" height="100" class="img img-circle" style="margin-top: 10px; width: 95px; " />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9">
                                                <input type="submit" class="btn btn-success" name="proses" value="UPDATE DATA">
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

        <script type="text/javascript">
            var loadFile = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('output');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };
        </script>
    </body>
</html>
