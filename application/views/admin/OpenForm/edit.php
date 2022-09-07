<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Open File</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/open/file'?>">Manage Open File</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Open File</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/open/file/edit/'.$this->uri->segment(5)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Dealer</label>
                                                <select class="form-control" name="dealer_id">
                                                    <?php 
                                                        $dealers = get_active_dealers();
                                                        if(!empty($dealers)){
                                                            foreach($dealers as $dealer){
                                                    ?>
                                                                <option value="<?php echo $dealer->dealer_id?>" <?php echo ($dealer->dealer_id == $open_file->dealer_id ? 'selected="selected"':'');?>><?php echo $dealer->name;?></option>
                                                    <?php            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('dealer_id', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>App. Form Number</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->app_form_number?>" <?php echo ($open_file->app_form_number)?'readonly':''; ?> name="app_form_number">
                                            </div>
                                            <?php echo form_error('app_form_number', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Registration Number</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->registration_number?>" <?php echo ($open_file->registration_number)?'readonly':''; ?> name="registration_number">
                                            </div>
                                            <?php echo form_error('registration_number', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Plot Size</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->plot_size?>" <?php echo ($open_file->plot_size)?'readonly':''; ?> name="plot_size">
                                            </div>
                                            <?php echo form_error('plot_size', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Plot Type</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->plot_type?>" <?php echo ($open_file->plot_type)?'readonly':''; ?> name="plot_type">
                                            </div>
                                            <?php echo form_error('plot_type', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Security Code</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->security_code?>" <?php echo ($open_file->security_code)?'readonly':''; ?> name="security_code">
                                            </div>
                                            <?php echo form_error('security_code', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->name?>" name="name">
                                            </div>
                                            <?php echo form_error('name', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>CNIC</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->cnic?>" name="cnic">
                                            </div>
                                            <?php echo form_error('cnic', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->contact?>" name="contact">
                                            </div>
                                            <?php echo form_error('contact', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" value="<?php echo $open_file->address?>" name="address">
                                            </div>
                                            <?php echo form_error('address', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($open_file->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($open_file->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Profile Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="logo_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>    
                                            <?php echo form_error('logo_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <?php 
                                            if($open_file->profile_photo != ''){
                                        ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <img src="<?php echo base_url().'intimation_letter/'.$open_file->profile_photo?>" style="width:100px" />
                                                        </div>
                                                    </div>    
                                                </div>
                                        <?php } ?>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="open_form_edit" value="open_form_edit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        