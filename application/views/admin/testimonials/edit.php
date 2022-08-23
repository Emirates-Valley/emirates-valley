<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Testimonial</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/testimonial/listing'?>">Manage Testimonials</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/testimonial/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" value="<?php echo $testimonial->name?>" name="name">
                                            </div>
                                            <?php echo form_error('name', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" value="<?php echo $testimonial->designation?>" name="designation">
                                            </div>
                                            <?php echo form_error('designation', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Comments</label>
                                                <textarea class="form-control" name="comments" id="editor"><?php echo $testimonial->comments?></textarea>
                                            </div>
                                            <?php echo form_error('comments', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($testimonial->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($testimonial->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Testimonial Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="testimonial_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" class="form-control" name="old_testimonial_image" value="<?php echo $testimonial->testimonial_image?>">
                                                </div>
                                            </div>    
                                            <?php echo form_error('testimonial_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <img src="<?php echo base_url().MEDIA_PATH.$testimonial->testimonial_image?>" style="width:100px" />
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_testimonial" value="edit_testimonial" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        