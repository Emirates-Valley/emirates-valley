<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Noc/Download</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/noc/listing'?>">Manage Noc/Download</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Noc/Download</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/noc/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="<?php echo $noc->title?>" name="title">
                                            </div>
                                            <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($noc->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($noc->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="noc_type">
                                                    <option value="Noc" <?php echo ($noc->noc_type == 'Noc' ? 'selected="selected"':'');?>>Noc</option>
                                                    <option value="Download" <?php echo ($noc->noc_type == 'Download' ? 'selected="selected"':'');?>>Download</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Noc Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="noc_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" class="form-control" name="old_noc_image" value="<?php echo $noc->noc_image?>">
                                                </div>
                                            </div>    
                                            <?php echo form_error('noc_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <?php 
                                                        $file_ext = end(@explode('.',$noc->noc_image));
                                                        if($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png' || $file_ext == 'gif'){
                                                    ?>
                                                            <img src="<?php echo base_url().MEDIA_PATH.$noc->noc_image?>" style="width:100px" />
                                                    <?php } else { ?>
                                                            <a href="<?php echo base_url().MEDIA_PATH.$noc->noc_image?>"><?php echo $noc->noc_image?></a>
                                                   <?php     
                                                    }   
                                                    ?>     
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_noc" value="edit_noc" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        