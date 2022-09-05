<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Add Image / Video</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/video/listing'?>">Manage Gallery</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Image / Video</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/video/add'?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="<?php echo set_value('title')?>" name="title">
                                            </div>
                                            <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" id="editor"><?php echo set_value('description')?></textarea>
                                            </div>
                                            <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo (set_value('status') == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo (set_value('status') == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label>Gallery Type</label>
                                                <select class="form-control" name="gallery_type" onchange="gallery_types(this.value)">
                                                    <option value="Image" <?php echo (set_value('gallery_type') == 'Image' ? 'selected="selected"':'');?>>Image</option>
                                                    <option value="Video" <?php echo (set_value('gallery_type') == 'Video' ? 'selected="selected"':'');?>>Video</option>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group video_gallery" <?php echo (set_value('gallery_type') == 'Video' ? '':'style="display:none"');?>>
                                                <label>Embed Code</label>
                                                <textarea class="form-control" name="embed_code"><?php echo set_value('embed_code')?></textarea>
                                            </div>
                                            <?php echo form_error('embed_code', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label id="video_gallery_label"><?php echo (set_value('gallery_type') == 'Video' ? 'Video':'Image');?> File</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="video_file">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>    
                                            <?php echo form_error('video_file', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="add_video" value="add_video" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        