<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Category Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Blog Category Edit</li>
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
                <?php echo form_open('blogcategory_controller/store_edit'); ?>
                <div class="card card-default">
                    <div class="card-header">
                       
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Blog Category Name</label>
                            <input type="text" class="form-control" value="<?php echo $cat_edit[0]->BlogCategoryName;?>" name="category" placeholder="Enter Blog Category Name" required>
                            <input type="hidden" class="form-control" value="<?php echo $cat_edit[0]->BlogCategoryID;?>" name="catid">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" value="<?php echo $cat_edit[0]->Slug;?>" name="slug" placeholder="Enter Slug" required>
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