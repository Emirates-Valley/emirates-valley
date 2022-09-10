<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Add Noc/Download</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/noc/listing'?>">Manage Noc/Download</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Noc/Download</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/noc/add'?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="<?php echo set_value('title')?>" name="title">
                                            </div>
                                            <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo (set_value('status') == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo (set_value('status') == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div> 
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="noc_type">
                                                    <option value="Noc" <?php echo (set_value('noc_type') == 'Noc' ? 'selected="selected"':'');?>>Noc</option>
                                                    <option value="Download" <?php echo (set_value('noc_type') == 'Download' ? 'selected="selected"':'');?>>Download</option>
                                                </select>
                                            </div>   
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Noc Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="noc_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>    
                                            <?php echo form_error('noc_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="add_noc" value="add_noc" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        