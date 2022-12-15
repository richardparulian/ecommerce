<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                <?php echo form_open('Product_controller/store'); ?>
                <div class="card card-default">
                    <div class="card-header">
                       
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control col-sm-6" value="" name="name" placeholder="Product Name" required>
                            
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Product SKU</label>
                            <input type="text" class="form-control col-sm-6" value="" placeholder="Product SKU" name="sku" required>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" class="form-control col-sm-6" value="" placeholder="Product Price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label>Product Price Old</label>
                            <input type="number" class="form-control col-sm-6" value="" placeholder="Product Price Old" name="priceold" required>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control col-sm-6 summernote" rows="5" name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control col-sm-6" value="" name="slug" placeholder="Product Slug" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Product Detail</label>
                            <select class="form-control col-sm-6" name="detail">
                                <option>--Choose Detail--</option>
                                <option value="1">Sold Out</option>
                                <option value="1">Promo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Choice</label>
                            <select class="form-control col-sm-6" name="choice">
                                <option>--Choose Choice--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            
                            
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <?php foreach($cat->result_array() as $sc){?>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="category[]" value="<?php echo $sc['CategoryID']?>">&nbsp;<?php echo $sc['CategoryName']?>
                                    </div>
                    
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label>Sub Category</label>
                            <?php foreach($subcat->result_array() as $sc){?>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="subcatid[]" value="<?php echo $sc['SubCategoryID']?>">&nbsp;<?php echo $sc['SubCategoryName']?>
                                    </div>
                    
                            <?php }?>
                        </div>

                        <!-- /.form-group -->
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm btn-secondary" onclick="history.back()">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
           <?php echo form_close(); ?>
           
        </div>
    </section>
</div>