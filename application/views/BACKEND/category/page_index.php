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
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
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
                                        <th>Category Name</th>
                                        <th>Category Url</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($menu->result_array() as $key){
                                      
                                    ?>
                                        <tr>
                                            <td align="center" style="width: 50px"><?php echo $no++;?></td>
                                            <td><?php echo $key['CategoryName'];?></td>
                                            <td><?php echo $key['CategoryUrl'];?></td>
                                            <td><?php echo $key['CatPosition'];?></td>
                                            <td style="width: 120px">
                                            <a href="<?php echo base_url('category/edit/').$key['CategoryID']?>" class="btn btn-sm btn-warning"><span class="glyphicon fa fa-edit" aria-hidden="true"></span></a>
                                            |
                                            <a href="<?php echo base_url('Category_controller/delete/').$key['CategoryID']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure for delete this?')" ><span class="glyphicon fa fa-trash" aria-hidden="true"></span></a>
                                            
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('category_controller/store'); ?>
                <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input id="customername" type="text" class="form-control" value="" name="category"
                                    placeholder="Category Name" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Position</label>
                                <input id="customername" type="number" class="form-control" value="" name="categorypos"
                                    placeholder="Category Position" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Url</label>
                                <input id="customername" type="text" class="form-control" value="" name="categoryurl"
                                    placeholder="Category Url" required>

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




