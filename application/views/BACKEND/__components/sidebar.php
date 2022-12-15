<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-1">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background-color: black; height:63px;">
      <img src="<?php echo base_url('@static/img/logo.png'); ?>"
            class="brand-text img-logo-text" style="margin-top: 2%; margin-left:15%; margin-bottom: 0%; width:125px; ">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('@static_backend/img/Icon Apps_Gray_Profile.png'); ?>"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('r_sess_user_email');?> </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                

             <li class="nav-header">MASTER</li>   

               <li class="nav-item">
                    <a href="<?php echo base_url('blog-category'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'blog-category' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Blog Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('category'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'category' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('sub-category'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'sub-category' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Sub Category
                        </p>
                    </a>
                </li>
                <li class="nav-item menujo" id="">
                    <a href="<?php echo base_url('tags'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'tags' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                         Tags
                        </p>
                    </a>
                </li>

                <li class="nav-item menujo" id="">
                    <a href="<?php echo base_url('product-admin'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'product-admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas ion-cube"></i>
                        <p>
                         Product
                        </p>
                    </a>
                </li>
                <li class="nav-item menujo" id="brand-admin">
                    <a href="<?php echo base_url('brand-admin'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'brand-admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                         Brand
                        </p>
                    </a>
                </li>

                <li class="nav-header">OTHERS</li>   
                
                <li class="nav-item menujo" id="">
                    <a href="<?php echo base_url('info-aed'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'info-aed' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            AED Info
                        </p>
                    </a>
                </li>
                <li class="nav-item menujo" id="">
                    <a href="<?php echo base_url('blog-admin'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'blog-admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>

                <?php echo form_open('backend_controller/backup_database'); ?>
                <li class="nav-item">
                    <button type="submit" class="btn">
                        <i class="nav-icon fas fa-database"></i>&nbsp;MariaDB Download
                    </button>
                </li>
                <?php echo form_close(); ?>

                <!-- <li class="nav-item">
                    <a href="<?php echo base_url('AdminLogin'); ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'AdminLogin' ? 'active' : '' ?>">
                        <i class="nav-icon fas ion-android-contact"></i>
                        <p>
                            Admin Login 
                        </p>
                    </a>
                </li> -->


                <!-- <li class="nav-header">REPORT</li> 
                  <li class="nav-item">
                    <a href="#" class="nav-link <?= $this->uri->segment(1) == 'Report' ? 'active' : '' ?> ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Report
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Report/report_trans'); ?>"
                                class="nav-link <?= $this->uri->segment(2) == 'report_trans' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaction Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Report/daily_report'); ?>"
                                class="nav-link <?= $this->uri->segment(2) == 'daily' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Transaction</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('Report/void_report'); ?>"
                                class="nav-link <?= $this->uri->segment(2) == 'void' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Void Report</p>
                            </a>
                        </li>
                        
                        
                         
                    </ul> -->
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>