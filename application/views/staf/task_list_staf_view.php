<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
   <?php $this->load->view('include/include_style.php'); ?>
   <?php $this->load->view('./include/include_costom.php'); ?>
</head>
<body>
   <div id="page-wrapper">
      <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
         <?php $this->load->view('include/side_bar_staf.php'); ?>
         <!-- Main Container -->
         <div id="main-container">
            <!-- Page content -->
            <div id="page-content">
               <div class="content-header">
                  <div class="header-section">
                     <h1>
                     <i class="fa fa-ticket"></i>Request List<br><small>Manage your update, Revision and progress for this project!</small>
                     </h1>
                  </div>
               </div>
               <ul class="breadcrumb breadcrumb-top">
                  <li><a href="<?php echo base_url('index.php/staf/dashboard'); ?>">Projects</a></li>
                  <li><a href="">Project Detail</a></li>
               </ul>
               <!-- END Tickets Header -->
               <!-- Tickets Content -->
               <div class="row">
                  <div class="col-sm-4 col-lg-3">
                     <!-- Menu Block -->
                     <div class="block full">
                        <!-- Menu Title -->
                        <div class="block-title clearfix">
                           <div class="block-options pull-right">
                              <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                           </div>
                           <h2><i class="fa fa-briefcase"></i> Projects <strong>Info</strong></h2>
                        </div>
                        <!-- END Menu Title -->
                        <?php foreach ($data_project as $row): $kode_project = $row->kode_project; ?>
                        <!-- Menu Content -->
                        <h3><?php echo $row->project_name; ?></h3>
                        <p><i class="fa fa-user-secret"></i>&nbsp;<strong>Ordered By: <?php echo $row->ae_name; ?></strong>&nbsp;</p>
                        <p><i class="fa fa-clock-o"></i>&nbsp;<strong>Deadline</strong> : <?php echo $row->deadline_project; ?></p>
                        <p><i class="fa fa-bolt"></i>&nbsp;<strong>Rational Finish Time</strong> : <?php echo $row->deadline_project; ?> </p>
                        <br/>
                        <a href="<?php echo base_url('index.php/staf/dashboard/brief_staf/'.$row->kode_project); ?>"><button type="button" class="btn btn-primary">Open Brief</button></a>
                        <!-- END Menu Content -->
                        <?php endforeach ?>
                     </div>
                     <!-- END Menu Block -->
                     <!-- Quick Month Stats Block -->
                     <!-- END Quick Month Stats Block -->
                  </div>
                  <div class="col-sm-8 col-lg-9">

                     <div class="block">
                        <!-- Tickets Title -->
                        <div class="block-title">
                           <div class="block-options pull-right">
                              <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                           </div>
                           <ul class="nav nav-tabs" data-toggle="tabs">
                              <li class="active"><a href="#tickets-list">Request List</a></li>
                              <li><a href="#tickets-single">Complete List</a></li>
                           </ul>
                        </div>
                        <!-- END Tickets Title -->
                        <!-- Tabs Content -->
                        <div class="tab-content">
                           <!-- Tickets List -->
                           <div class="tab-pane active" id="tickets-list">
                              <div class="block-content-full">
                                 <div class="table-responsive remove-margin-bottom">
                                    <table class="table table-striped table-vcenter remove-margin-bottom">
                                       <thead>
                                          <tr>
                                             <th class="text-center">ID</th>
                                             <th>Title</th>
                                             <th>Status</th>
                                             <th>Requester</th>
                                             <th class="text-center">Handle By</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php foreach ($data_task_order as $row_task_desc): $status = $row_task_desc->status_task; ?>
                                          <?php if ($status === "Finish"): continue; ?>
                                          <?php endif ?>
                                          <tr>
                                             <td class="text-center"># <?php echo $row_task_desc->kode_task; ?></td>
                                             <td>
                                                <a href="<?php echo base_url('index.php/staf/dashboard/detail_task/'.$row_task_desc->kode_task); ?>"><strong><?php echo $row_task_desc->judul_task; ?></strong> </a><br>
                                                <span class="text-muted"><strong><?php echo time_elapsed_string($row_task_desc->waktu);?></strong></span>
                                             </td>
                                             <td>
                                                <?php
                                                if ($status == 'Start'){
                                                echo '<span class="label label-success">WAITING</span>';
                                                } else if ($status == 'Proses'){
                                                echo '<span class="label label-warning">PROCESS</span>';
                                                } else {
                                                echo '<span class="label label-danger">PENDING</span>';
                                                }
                                                ?>
                                             </td>
                                             <td> <?php echo $row_task_desc->task_request; ?> </td>
                                             <td class="text-center">
                                                <?php
                                                $data_staf = $this->db->query("SELECT * FROM data_staf WHERE id_staf = '$row_task_desc->kode_staf'");
                                                $value_staf = $data_staf->row_array();
                                                echo $value_staf['nama_staf'];
                                                ?>
                                             </td>
                                          </tr>
                                          <?php endforeach ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <!-- END Tickets List -->
                           <!-- Ticket View -->
                           <div class="tab-pane" id="tickets-single">
                              <div class="block-content-full">
                                 <div class="table-responsive remove-margin-bottom">
                                    <table class="table table-striped table-vcenter remove-margin-bottom">
                                       <thead>
                                          <tr>
                                             <th class="text-center">ID</th>
                                             <th>Title</th>
                                             <th>Status</th>
                                             <th>Requester</th>
                                             <th class="text-center">Handle By</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php foreach ($data_task as $row_data_task): ?>
                                          <tr>
                                             <td class="text-center"># <?php echo $row_data_task->kode_staf; ?></td>
                                             <td>
                                                <a href="detail_task.php"><strong> <?php echo $row_data_task->judul_task; ?> </strong></a><br>
                                                <span class="text-muted"><strong> <?php echo time_elapsed_string($row_data_task->waktu);?> </strong></span>
                                             </td>
                                             <td><span class="label label-default">CLOSED</span></td>
                                             <td> <?php echo $row_data_task->task_request; ?> </td>
                                             <td class="text-center">
                                                <?php
                                                $data_staf = $this->db->query("SELECT * FROM data_staf WHERE id_staf = '$row_task_desc->kode_staf'");
                                                $value_staf = $data_staf->row_array();
                                                echo $value_staf['nama_staf'];
                                                ?>
                                             </td>
                                          </tr>
                                          <?php endforeach ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <!-- END Ticket View -->
                        </div>
                        <!-- END Tabs Content -->
                     </div>
                     <!-- END Tickets Block -->
                  </div>
                  <!-- END Tickets Content -->
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
