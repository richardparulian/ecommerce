<style>
.img-table {
    width: 100px;
    height: auto;
    display: block;
    text-align: center;
}

th {
    text-align: center;
    white-space: nowrap;
    vertical-align: middle !important;
}

td {
    vertical-align: middle !important;
}

.asd {
      border-radius: 100%;
      overflow: hidden;
      width:70px;
      height: 70px;
    }

    .cover {object-fit: cover;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="bd">

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <div class="flash-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
    </section>


    <section class="content">
        <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="<?php echo base_url('product-admin/add_product')?>" class="btn btn-sm btn-primary"><span class="glyphicon fa fa-plus" aria-hidden="true"></span></a>
                                
                            </h3>
                        </div>
                        
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sub Category</th>
                                        <th>Product Name</th>
                                        <th>Product SKU</th>
                                        <th>Product Price</th>
                                        <th>Product Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($product->result_array() as $key){
                                      
                                    ?>
                                        <tr>
                                            <td align="center" style="width: 50px"><?php echo $no++;?></td>
                                            <td></td>
                                            <td><?php echo $key['ProductName'];?></td>
                                            <td><?php echo $key['ProductSKU'];?></td>
                                            <td style="text-align:right;">IDR <?php echo number_format($key['ProductPrice'], 0, ',', '.');?>
                                                
                                            </td>
                                            <td><?php 
                                            if ($key['ProductStatus'] == '1') {
                                                echo "Sold Out";
                                            }elseif ($key['ProductStatus'] == '2') {
                                                echo "Promo"; 
                                            }else{
                                                echo "-";
                                            }
                                             ?></td>
                                            
                                            <td style="width: 120px">
                                            <a href="<?php echo base_url('product-admin/add_picture/').$key['ProductID']?>" class="btn btn-sm btn-success"><span class="glyphicon fa fa-image" aria-hidden="true"></span></a>
                                            |
                                            <a href="<?php echo base_url('product-admin/edit/').encrypt_url($key['ProductID'])?>" class="btn btn-sm btn-warning"><span class="glyphicon fa fa-edit" aria-hidden="true"></span></a>
                                            |
                                            <a href="<?php echo base_url('Product_controller/delete/').$key['ProductID']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure for delete this?')" ><span class="glyphicon fa fa-trash" aria-hidden="true"></span></a>
                                            
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                       
                            </table>
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


</div>
<!-- /.content-wrapper -->

<!-- modal add -->





