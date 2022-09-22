<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Team</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/team/listing'?>">Manage Team</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Team</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/team/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" value="<?php echo $team->name?>" name="name">
                                            </div>
                                            <?php echo form_error('name', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" value="<?php echo $team->designation?>" name="designation">
                                            </div>
                                            <?php echo form_error('designation', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" value="<?php echo $team->phone?>" name="phone">
                                            </div>
                                            <?php echo form_error('phone', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="<?php echo $team->email?>" name="email">
                                            </div>
                                            <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($team->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($team->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div> 
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="descriptions" id="editor"><?php echo $team->descriptions?></textarea>
                                            </div>
                                            <?php echo form_error('descriptions', '<div class="alert alert-danger">', '</div>'); ?>   
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="team_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>    
                                            <?php echo form_error('team_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <?php if($team->team_image != ''){?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <img src="<?php echo base_url().MEDIA_PATH.$team->team_image?>" style="width:100px" />
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php } ?>    
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_team" value="edit_team" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        