<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Social Media</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Social Media</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    if ($this->session->userdata('message_success') != '') {
                        echo '<div class="alert alert-success">';
                            echo $this->session->userdata('message_success');
                        echo "</div>";
                    }
                ?>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-body">
                                <form method="Post" action="<?php echo base_url().'admin/social-media'?>" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" value="<?php echo ($social_media->facebook)?$social_media->facebook:set_value('facebook')?>" name="facebook">
                                            </div>
                                            <?php echo form_error('facebook', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control" value="<?php echo ($social_media->twitter)?$social_media->twitter:set_value('twitter')?>" name="twitter">
                                            </div>
                                            <?php echo form_error('twitter', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" class="form-control" value="<?php echo ($social_media->instagram)?$social_media->instagram:set_value('instagram')?>" name="instagram">
                                            </div>
                                            <?php echo form_error('instagram', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" class="form-control" value="<?php echo ($social_media->linkedin)?$social_media->linkedin:set_value('linkedin')?>" name="linkedin">
                                            </div>
                                            <?php echo form_error('linkedin', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="text" class="form-control" value="<?php echo ($social_media->youtube)?$social_media->youtube:set_value('youtube')?>" name="youtube">
                                            </div>
                                            <?php echo form_error('youtube', '<div class="alert alert-danger">', '</div>'); ?>    
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="social_media" value="social_media" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->session->unset_userdata('message_success');?>        