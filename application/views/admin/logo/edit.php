<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Logo</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/logo/listing'?>">Manage Logo</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Logo</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/logo/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="<?php echo $logo->website_name?>" name="website_name">
                                            </div>
                                            <?php echo form_error('website_name', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" id="editor"><?php echo $logo->description?></textarea>
                                            </div>
                                            <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($logo->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($logo->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Logo Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="logo_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" class="form-control" name="old_logo_image" value="<?php echo $logo->logo_image?>">
                                                </div>
                                            </div>    
                                            <?php echo form_error('logo_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <img src="<?php echo base_url().'resource/images/other_images/'.$logo->logo_image?>" style="width:100px" />
                                                </div>
                                            </div>    
                                            <?php echo form_error('logo_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_logo" value="edit_logo" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        