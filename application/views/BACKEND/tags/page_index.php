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
    white-space: nowrap;
}

td {
    text-align: center;
    vertical-align: middle !important;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="bd">

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Tags</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('blog-admin'); ?>">Blog</a></li>
                        <li class="breadcrumb-item active">Blog Tags</li>
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
                                        <th>Tags Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($get->result_array() as $key){
                                      
                                    ?>
                                        <tr>
                                            <td align="center" style="width: 50px"><?php echo $no++;?></td>
                                            <td><?php echo $key['BlogTagsName'];?></td>
                                            <td><?php echo $key['Slug'];?></td>
                                            <td style="width: 120px">
                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#modal_update<?php echo $key['BlogTagsID']; ?>"><span
                                                    class="glyphicon fas fa-edit" aria-hidden="true"></span></button>
                                            |
                                            <a href="<?php echo base_url('TagsController/delete/').$key['BlogTagsID']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure for delete this?')" ><span class="glyphicon fa fa-trash" aria-hidden="true"></span></a>
                                            
                                            
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Blog Tags</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('TagsController/store'); ?>
                <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" class="form-control" value="" name="tags"
                                    placeholder="Tags" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" value="" name="slug"
                                    placeholder="Slug" required>

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
foreach ($get->result_array() as $update) {

    ?>
<div class="modal fade bd-example-modal-lg" id="modal_update<?php echo $update['BlogTagsID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <?php echo form_open('TagsController/store_edit'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Tags</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-6">
                        <label>Tags</label>
                        <input type="text" class="form-control" value="<?php echo $update['BlogTagsName']; ?>"
                            name="tags" required>
                        <input type="hidden" name="id" value="<?php echo $update['BlogTagsID'];?>">
                 
                    </div>
                    <div class="form-group col-md-6">
                        <label>Slug</label>
                        <input type="text" class="form-control" value="<?php echo $update['Slug']; ?>"
                            name="slug" required>
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




