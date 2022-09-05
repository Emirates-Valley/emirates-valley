<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Image / Video</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/video/listing'?>">Manage Gallery</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Image / Video</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/video/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="<?php echo $video->title?>" name="title">
                                            </div>
                                            <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" id="editor"><?php echo $video->description?></textarea>
                                            </div>
                                            <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($video->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($video->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label>Gallery Type</label>
                                                <select class="form-control" name="gallery_type" onchange="gallery_types(this.value)">
                                                    <option value="Image" <?php echo ($video->gallery_type == 'Image' ? 'selected="selected"':'');?>>Image</option>
                                                    <option value="Video" <?php echo ($video->gallery_type == 'Video' ? 'selected="selected"':'');?>>Video</option>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group video_gallery" <?php echo ($video->gallery_type == 'Video' ? '':'style="display:none"');?>>
                                                <label>Embed Code</label>
                                                <textarea class="form-control" name="embed_code"><?php echo $video->embed_code?></textarea>
                                            </div>
                                            <?php echo form_error('embed_code', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label id="video_gallery_label"><?php echo ($video->gallery_type == 'Video' ? 'Video':'Image');?> File</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="video_file">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" class="form-control" name="old_video_file" value="<?php echo $video->video_file?>">
                                                </div>
                                            </div>    
                                            <?php echo form_error('video_file', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <?php 
                                                        if($video->gallery_type == 'Video'){
                                                    ?>
                                                            <video width="320" height="240" controls>
                                                                <source src="<?php echo base_url().MEDIA_PATH.$video->video_file?>" type="video/mp4">
                                                                <source src="<?php echo base_url().MEDIA_PATH.$video->video_file?>" type="video/ogg">
                                                            </video>
                                                    <?php 
                                                        } elseif($video->gallery_type == 'Image'){
                                                    ?>
                                                            <img src="<?php echo base_url().MEDIA_PATH.$video->video_file?>" style="width:100px" />
                                                    <?php        
                                                        }
                                                    ?>        
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_video" value="edit_video" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        