<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
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
                <?php echo form_open('product_controller/store_edit'); ?>
                <div class="card card-default">
                    <div class="card-header">
                       
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control col-sm-6" value="<?php echo $product_edit[0]->ProductName;?>" name="product" placeholder="Enter Product Name" required>
                            <input type="hidden" class="form-control col-sm-6" value="<?php echo $product_edit[0]->ProductID;?>" name="productid">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Product SKU</label>
                           <input type="text" class="form-control col-sm-6" value="<?php echo $product_edit[0]->ProductSKU;?>" name="productsku" placeholder="Enter Product SKU" required>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" class="form-control col-sm-6" value="<?php echo $product_edit[0]->ProductPrice;?>" name="productprice" placeholder="Enter Product SKU" required>
                        </div>
                        <div class="form-group">
                            <label>Product Price Old</label>
                            <input type="number" class="form-control col-sm-6" value="<?php echo $product_edit[0]->ProductPriceOld;?>" placeholder="Product Price Old" name="priceold" required>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control col-sm-6 summernote" rows="5" name="desc"><?php echo $product_edit[0]->ProductDescription;?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control col-sm-6" value="<?php echo $product_edit[0]->Slug;?>" name="slug" placeholder="Product Slug" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Product Detail</label>
                            <select class="form-control col-sm-6" name="detail">
                                <option>--Choose Detail--</option>
                                <option value="1" <?php if($product_edit[0]->ProductStatus == 1){echo "selected";}?>>Sold Out</option>
                                <option value="2" <?php if($product_edit[0]->ProductStatus == 2){echo "selected";}?>>Promo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Choice</label>
                            <select class="form-control col-sm-6" name="choice">
                                <option>--Choose Choice--</option>
                                <option value="1" <?php if($product_edit[0]->ProductStatus == 1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($product_edit[0]->ProductStatus == 0){echo "selected";}?>>No</option>
                            </select>
                            
                            
                        </div>
                        <div class="form-group">
                            <label>Sub Category</label>
                            <?php foreach($subcat->result_array() as $sc){?>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="subcatid[]" value="<?php echo $sc['SubCategoryID']?>" <?php

                                        foreach($product_edit as $qq)
                                        {
                                             if($qq->SubCategoryID == $sc['SubCategoryID']){echo "checked";}
                                        }
                                        
                                         ?>

                                         >&nbsp;<?php echo $sc['SubCategoryName']?>
                                    </div>
                    
                            <?php }?>
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