<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Feature</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/feature/listing'?>">Manage Features</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Feature</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-body">
                                <form method="Post" action="<?php echo base_url().'admin/feature/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="<?php echo $feature->title?>" name="title">
                                            </div>
                                            <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" id="editor"><?php echo $feature->description?></textarea>
                                            </div>
                                            <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($feature->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($feature->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Feature Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="feature_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" class="form-control" name="old_feature_image" value="<?php echo $feature->feature_image?>">
                                                </div>
                                            </div>    
                                            <?php echo form_error('feature_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <img src="<?php echo base_url().MEDIA_PATH.$feature->feature_image?>" style="width:100px" />
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_feature" value="edit_feature" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        