<style>
.img-table {
    width: 100px;
    height: auto;
    display: block;
    text-align: center;
}

th {
    text-align: center;
    vertical-align: middle !important;
}

td {
    text-align: center;
    vertical-align: middle !important;
}

.pic {

      overflow: hidden;
      width:100px;
      height: 100px;
    }

.cover {object-fit: cover;}

.wrs {
    background: #39E2B6;
    height: 100%;
    width: 100%;
    position: fixed;
    top: 0;
    z-index: 9999;
    text-align: center;
    left: 0;
    font-size: 100px;
    font-family: calibri;
    color: white;
    line-height: 100vh;
}

.dropzone {
  width: 50%;
  margin: 1%;
  border: 2px dashed #3498db !important;
  border-radius: 5px;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="bd">

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Picture Product </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('product'); ?>">Product</a></li>
                        <li class="breadcrumb-item active">Picture Product <?php echo $product[0]->ProductName;?></a></li>
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
                                <h4><?php echo $product[0]->ProductName;?></h4>
                                <button type="button" class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
                                    data-target="#modal-add">Add
                                    +<span class="caret"></span>
                                </button>
                                
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Picture Product</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($pic as $key){
                                      
                                    ?>
                                        <tr>
                                            <td align="center" style="width: 50px"><?php echo $no++;?></td>
                                            <td>
                                                 <img class="pic" src="https://demo.aed.co.id/@static/img/products/<?php echo $key->PicName;?>" alt="">
                                            </td>
                                            <td style="width: 120px">
                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#modal_update<?php echo $key->PicID; ?>"><span
                                                    class="glyphicon fas fa-edit" aria-hidden="true"></span></button>
                                            |
                                            <a href="<?php echo base_url('Product_controller/delete_pic/').$key->PicID.'/'.$key->ProductID?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure for delete this?')" ><span class="glyphicon fa fa-trash" aria-hidden="true"></span></a>
                                            
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
<div class="modal fade bd-example-modal-lg" id="modal-add" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Picture Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('Product_controller/store_pic'); ?>
                <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input id="customername" type="file" value="" name="pic"
                                    placeholder="Menu Name" required>
                                <input type="hidden" name="id" value="<?php echo $product[0]->ProductID;?>">

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="btn">Save</button></a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
   
    </div>
</div>

<?php
foreach ($pic as $update) {

    ?>
<div class="modal fade bd-example-modal-lg" id="modal_update<?php echo $update->PicID; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <?php echo form_open_multipart('Product_controller/store_editpic'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Picture Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input id="customername" type="file" value="" name="pic" placeholder="Menu Name" required>
                                <input type="hidden" name="idproduct" value="<?php echo $update->ProductID;?>">
                                <input type="hidden" name="idpic" value="<?php echo $update->PicID;?>">
                            </div>
                            <img class="pic" src="https://demo.aed.co.id/@static/img/products/<?php echo $update->PicName;?>" alt="">
                        </div>
                </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button></a>
                </div>
            </div>
         <?php echo form_close(); ?>
    </div>
</div>
<?php } ?>


<script type='text/javascript'>
        
</script>



