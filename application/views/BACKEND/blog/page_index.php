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
                    <h1>Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
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
                            <table id="exampleScroll" class="table table-bordered table-striped" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publish</th>
                                        <th>Status</th>
                                        <th>Tags</th>
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
                                            <td><?php echo $key['BlogCategoryName'];?></td>
                                            <td><?php echo $key['Slug'];?></td>
                                            <td><img class="img-table" src="./@static/img/blog/<?php echo $key['BlogImage']; ?>">
                                            </td>
                                            <td><?php echo $key['BlogTitle'];?></td>
                                            <td><?php echo $key['BlogAuthor'];?></td>
                                            <td><?php echo $key['BlogPublish'];?></td>
                                            <td><?php
                                            if ($key['BlogStatus'] == 1) {
                                                echo "Show";
                                            }else{echo "Hidden";}
                                            ?></td>
                                            <td>
                                                <?php foreach($gettags->result_array() as $gt){

                                                    if ($key['BlogID'] == $gt['BlogID']) {
                                                        echo $gt['BlogTagsName'].'<br>';
                                                    }

                                                }?>

                                            </td>
                                            <td style="width: 120px">
                                            <a href="<?php echo base_url('blog-admin/edit/').$key['BlogID']?>" class="btn btn-sm btn-warning"><span class="glyphicon fa fa-edit" aria-hidden="true"></span></a>
                                            |
                                            <a href="<?php echo base_url('Blog_controller/delete/').$key['BlogID']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure for delete this?')" ><span class="glyphicon fa fa-trash" aria-hidden="true"></span></a>
                                            
                                            
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('blog_controller/store'); ?>
                <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Blog Category</label>
                                <select class="form-control select2bs4" name="cat">
                                    <?php 
                                    foreach($getcat->result_array() as $category){
                                    ?>

                                    <option value="<?php echo $category['BlogCategoryID'];?>"><?php echo $category['BlogCategoryName'];?></option>
                                    <?php }?>
                                </select>

                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tags</label>
                            <?php foreach($gettagsonly->result_array() as $sc){?>
                                <div class="col-xs-12">
                                <input type="checkbox" name="tags[]" value="<?php echo $sc['BlogTagsID']?>">&nbsp;<?php echo $sc['BlogTagsName']?>
                                </div>

                            <?php }?>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" value="" name="slug"
                                    placeholder="Slug" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" value="" name="image" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" value="" name="title"
                                    placeholder="Title" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control" value="" name="author"
                                    placeholder="Author" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Publish</label>
                                <input type="date" class="form-control" value="" name="date"
                                    placeholder="Publish" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control summernote" rows="5" name="desc"></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Show</option>
                                    <option value="2">Hidden</option>
                                </select>

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




