<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Category Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Sub Category Edit</li>
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
                <?php echo form_open('SubCategory_controller/store_edit'); ?>
                <div class="card card-default">
                    <div class="card-header">
                       
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="cat">
                                    
                                    <?php foreach($cat->result_array() as $sb){?>

                                        <option value="<?php echo $sb['CategoryID'];?>" <?php if($sb['CategoryID'] == 
                                        $subcat_edit[0]->CategoryID){echo "selected";}?> ><?php echo $sb['CategoryName']?></option>
                                    
                                    <?php }?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sub Category</label>
                            <input type="text" class="form-control" value="<?php echo $subcat_edit[0]->SubCategoryName;?>" name="subcat" placeholder="Enter Sub Category" required>
                            <input type="hidden" class="form-control" value="<?php echo $subcat_edit[0]->SubCategoryID;?>" name="subcatid">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Sub Category Position</label>
                            <input type="text" class="form-control" value="<?php echo $subcat_edit[0]->SubCatPosition;?>" name="subcatpos" placeholder="Enter Sub Category Position" required>
                        </div>

                        <div class="form-group">
                            <label>Sub Category Url</label>
                            <input type="text" class="form-control" value="<?php echo $subcat_edit[0]->SubUrl;?>" name="subcaturl" placeholder="Enter Sub Category Url" required>
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