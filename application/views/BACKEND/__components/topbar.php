<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-navy" style="background-color:black;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="margin-top:6px;">
        
        <li class="nav-items">

            <a class="nav-link" href="">
                           
                <i class="fa fa-circle-o">
                    <p style="float: left;font-family:Helvetica;"><?php echo $this->session->userdata('StoreName');?></p>
                </i>
            </a>
            
             
        </li>
       
        <!-- Sign Out -->
        <li class="nav-item">
            <a class="nav-link swt" href="<?php echo base_url('auth_controller/logout_admin'); ?>">
                <i class="fas fa-sign-out-alt">
                    <p style="float: right; margin-left: 0.5em; font-family:Helvetica;"> Sign Out</p>
                </i>
            </a>
        </li>

        
    </ul>
</nav>
<!-- /.navbar -->
