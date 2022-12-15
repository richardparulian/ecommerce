<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Blog Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <div class="flash-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
                <?php echo form_open_multipart('blog_controller/store_edit'); ?>
                <div class="card card-default">
                    <div class="card-header">
                       
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Blog Category</label>
                            <select class="form-control select2bs4" name="cat">
                                <?php 
                                foreach($getcat->result_array() as $gt)
                                {
                                ?>
                                <option value="<?php echo $gt['BlogCategoryID'];?>"><?php echo $gt['BlogCategoryName'];?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" class="form-control" value="<?php echo $get[0]->bgid;?>" name="id_blog" required>
                            <input type="hidden" class="form-control" value="<?php echo $get[0]->BlogImage;?>" name="nameimage" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tags</label>
                            <?php foreach($gettagsonly->result_array() as $sc){?>
                                <div class="col-xs-12">
                                <input type="checkbox" name="tags[]" value="<?php echo $sc['BlogTagsID']?>" <?php 
                                foreach($get as $gt){
                                if($sc['BlogTagsID'] == $gt->BlogTagsID ){echo "checked";}}

                                ?>

                                >&nbsp;<?php echo $sc['BlogTagsName']?>
                                </div>

                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" value="<?php echo $get[0]->Slug;?>" name="slug" placeholder="Enter Slug" required>
                        </div>
                        <div class="form-group">
                                <label>Image</label>
                                <input type="file" value="" name="image">
                        </div>
                        <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" value="<?php echo $get[0]->BlogTitle;?>" name="title"
                                    placeholder="Title" required>
                        </div>
                        <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control" value="<?php echo $get[0]->BlogAuthor;?>" name="author"
                                    placeholder="Author" required>

                        </div>
                        <div class="form-group">
                                <label>Publish</label>
                                <input type="date" class="form-control" value="<?php echo $get[0]->BlogPublish;?>" name="date"
                                    placeholder="Publish" required>

                        </div>
                        <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control summernote" rows="5" name="desc"><?php echo $get[0]->BlogDesc;?></textarea>

                        </div>
                        <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Show</option>
                                    <option value="2">Hidden</option>
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