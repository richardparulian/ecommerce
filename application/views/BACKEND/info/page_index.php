<style>
.img-table {
    width: 100px;
    height: 100px;
    display: block;
    align: center;
}

th {
    text-align: center;
}

td {
    vertical-align: middle!important;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>AED Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">AED Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <div class="flash-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <?php echo form_open('info_controller/store'); ?>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Terms And Condition</label>
                                        <textarea class="form-control summernote" rows="10" value="" name="tnc"
                                            placeholder="Enter Terms And Condition..." required><?php
                                            if (!empty($info)) {
                                               echo $info[0]['TnC'];
                                            }
                                             ?></textarea>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label>Privacy Policy</label>
                                        <textarea class="form-control summernote" rows="10" value="" name="policy"
                                            placeholder="Enter Privacy Policy..." required><?php 
                                            if (!empty($info)) {
                                               echo $info[0]['PrivacyPolicy'];
                                            } ?></textarea>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $info[0]['InformationID'];?>">
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </div>
                         <?php echo form_close(); ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal update -->



