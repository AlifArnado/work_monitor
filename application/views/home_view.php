<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <?php $this->load->view('include/include_style.php'); ?>
  <?php $this->load->view('include/include_costom.php'); ?>
</head>
<body>
  <div id="page-wrapper">
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
      <?php $this->load->view('include/side_bar.php'); ?>
      <!-- Main Container -->
      <div id="main-container">
        <!-- Page content -->
        <div id="page-content">

          <?php
                $email =  $this->session->userdata('email');
                $data_register = $this->db->query("SELECT * FROM data_register where email = '$email'");
                $value = $data_register->row_array();
                $nomor_telepon = $value['nomor_telepon'];
           ?>

           <?php if ($nomor_telepon == "Not Set"): ?>
             <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="fa fa-times-circle"></i> IMPORTANT</h4> Please provide your mobile phone number  <a href="<?php echo base_url('welcome/profile'); ?>" data-toggle="modal">here</a>!
            </div>
           <?php else: ?>

           <?php endif ?>

          <!-- Dashboard Header -->
          <!-- Mini Top Stats Row -->
          <div class="row">
            <div class="header-section">
              <h1>ACTIVE PROJECT</h1>
            </div>

            <?php foreach ($data_project as $row): ?>
              <?php
                $project_name = $row->project_name;
                $ae_name = $row->ae_name;
                $kode_project = $row->kode_project;

                $data_task = $this->db->query("SELECT * FROM data_task where kode_project = '$kode_project' order by kode_task DESC");
                $value = $data_task->row_array();
                $time = time_elapsed_string($value['waktu']);
                $handled = $value['kode_staf'];

                $data_staf = $this->db->query("SELECT * FROM data_staf where id_staf = '$handled'");
                $value_staf = $data_staf->row_array();

                $nama_staf = $value_staf['nama_staf'];
                $posisi = $value_staf['posisi'];
               ?>

            <div class="col-sm-6 col-lg-4">
              <!-- Widget -->
              <a href="<?php echo base_url('index.php/welcome/task_list/'.$kode_project); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                  <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">

                    <?php

                      if ($posisi == 'Programmer ( Backend )'){
                        echo '<i class="fa fa-codepen"></i><br/><p><font color="black" size="1">Backend</font></p>';
                      }

                      elseif ($posisi == 'Programmer ( Frontend )'){
                        echo '<i class="fa fa-gg"></i><br/><p><font color="black" size="1">Frontend</font></p>';
                      }

                      elseif ($posisi == 'Full Stack Developer'){
                        echo '<i class="fa fa-gg"></i><br/><p><font color="black" size="1">Full Stack</font></p>';
                      }

                      elseif ($posisi == 'Programmer ( Game )'){
                        echo '<i class="fa fa-gg"></i><br/><p><font color="black" size="1">Game Dev</font></p>';
                      }
                      elseif ($posisi == 'Visual Designer'){
                        echo '<i class="fa fa-magic"></i><br/><p><font color="black" size="1">Designer</font></p>';
                      }
                      elseif ($posisi == 'Content Writer'){
                        echo '<i class="fa fa-pencil"></i><br/><p><font color="black" size="1">Writer</font></p>';
                      }
                      elseif ($posisi == 'Sekretaris'){
                        echo '<i class="fa fa-star"></i><br/><p><font color="black" size="1">Sekretaris</font></p>';
                      }
                      else {
                        echo '<i class="fa fa-question"></i><br/><p><font color="black" size="1">Pending</font></p>';
                      }

                      $posisi = 'kosong';

                      ?>
                  </div>
                  <h3 class="widget-content text-right animation-pullDown">
                  <strong><?php echo $project_name; ?></strong><br>
                  <small><i class="fa fa-clock-o"></i>&nbsp;
                  <strong>Last Update</strong> : <?php echo $time; ?> </small>
                  <small><i class="fa fa-user-secret"></i>&nbsp;<strong>Ordered By:</strong>&nbsp; <?php echo $ae_name; ?> </small>
                  <small><i class="fa fa-user"></i>&nbsp;<strong>Handled By: <?php echo $nama_staf; ?></strong>&nbsp;
                  </small>
                  </h3>
                </div>
              </a>
              <!-- END Widget -->
            </div>

            <?php endforeach ?>


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
