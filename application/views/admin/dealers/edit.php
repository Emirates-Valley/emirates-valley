<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit Dealer</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dealer/listing'?>">Manage Dealer</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Dealer</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/dealer/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" value="<?php echo $dealer->name?>" name="name">
                                            </div>
                                            <?php echo form_error('name', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" value="<?php echo $dealer->phone?>" name="phone">
                                            </div>
                                            <?php echo form_error('phone', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="<?php echo $dealer->email?>" name="email">
                                            </div>
                                            <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" value="<?php echo $dealer->address?>" name="address">
                                            </div>
                                            <?php echo form_error('address', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($dealer->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($dealer->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>    
                                        </div>    
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_dealer" value="edit_dealer" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        