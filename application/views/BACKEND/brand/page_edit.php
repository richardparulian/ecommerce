<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Brand Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
                <?php echo form_open('brand_controller/store_edit'); ?>
                <div class="card card-default">
                    <div class="card-header">
                       
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product</label>
                            <select class="form-control select2bs4" name="prodid">
                                <?php
                                foreach($getproduct->result_array() as $br)
                                {
                                ?>
                                <option value="<?php echo $br['ProductID'];?>"><?php echo $br['ProductName'];?></option>
                                <?php }?>
                                </select>
                            <input type="hidden" class="form-control" value="<?php echo $get[0]->BrandID;?>" name="catid">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Brand</label>
                            <input type="text" class="form-control" value="<?php echo $get[0]->BrandName;?>" name="brand" placeholder="Enter Brand" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2bs4" name="status">
                                    
                                    <option value="1">Show</option>
                                    <option value="2">Hide</option>

                                </select>
                        </div>
                    
                        <!-- /.form-group -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm btn-secondary" onclick="history.back()">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary">Save</button></a>
                    </div>
                </div>
           <?php echo form_close(); ?>
        </div>
    </section>
</div>