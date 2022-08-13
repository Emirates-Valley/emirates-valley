<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Edit News</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/news/listing'?>">Manage News</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit News</li>
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
                                <form method="Post" action="<?php echo base_url().'admin/news/edit/'.$this->uri->segment(4)?>" enctype="multipart/form-data" onsubmit="$('.preloader').show();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>News Title</label>
                                                <input type="text" class="form-control" value="<?php echo $news->news_title?>" name="news_title">
                                            </div>
                                            <?php echo form_error('news_title', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" id="editor"><?php echo $news->description?></textarea>
                                            </div>
                                            <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Active" <?php echo ($news->status == 'Active' ? 'selected="selected"':'');?>>Active</option>
                                                    <option value="Inactive" <?php echo ($news->status == 'Inactive' ? 'selected="selected"':'');?>>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="news_type">
                                                    <option value="News" <?php echo ($news->news_type == 'News' ? 'selected="selected"':'');?>>News</option>
                                                    <option value="Blog" <?php echo ($news->news_type == 'Blog' ? 'selected="selected"':'');?>>Blog</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>News Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="news_image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" class="form-control" name="old_news_image" value="<?php echo $news->news_image?>">
                                                </div>
                                            </div>    
                                            <?php echo form_error('news_image', '<div class="alert alert-danger">', '</div>'); ?> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <img src="<?php echo base_url().MEDIA_PATH.$news->news_image?>" style="width:100px" />
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <button type="submit" name="edit_news" value="edit_news" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        