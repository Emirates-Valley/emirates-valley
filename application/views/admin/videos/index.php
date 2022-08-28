<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Gallery 
                <a href="<?php echo base_url().'admin/video/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Image / Video</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Gallery</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/video/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('videosearch') != ''){
                                        $searchVal = $this->session->userdata('videosearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="videosearch" value="<?php echo $searchVal?>" placeholder="Search Video">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('videosearch') != ''){
                                ?>
                                        <button type="button" onclick="reset_search()" class="btn btn-success">Reset</button>
                                <?php 
                                    } 
                                ?>        
                            </div>
                        </form>    
                    </div>
                </div>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">File</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($videos) > 0){
                                                foreach($videos as $video){
                                        ?>
                                                <tr id="video_id-<?php echo $video->gallery_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($video->video_file != ''){
                                                                    $video_file = base_url().MEDIA_PATH.$video->video_file;
                                                                    if($video->gallery_type == 'Video'){
                                                            ?>        
                                                                        <video width="100" height="70" controls>
                                                                            <source src="<?php echo $video_file?>" type="video/mp4">
                                                                            <source src="<?php echo $video_file?>" type="video/ogg">
                                                                        </video>
                                                            <?php
                                                                    } elseif($video->gallery_type == 'Image'){
                                                            ?>
                                                                        <img src="<?php echo $video_file?>"  class="rounded-circle" alt="<?php echo $video->title?>">
                                                            <?php            
                                                                    }    
                                                                } else {
                                                                    $video_file = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                            ?>
                                                                    <img src="<?php echo $video_file?>"  class="rounded-circle" alt="<?php echo $video->title?>">
                                                            <?php        
                                                                }
                                                            ?>
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $video->title?></td>
                                                    <td>
                                                        <?php 
                                                            if($video->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$video->gallery_id.','.$status.')" class="btn btn-success">'.$video->status.'</a>';
                                                            } else if($video->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$video->gallery_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $video->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/video/edit/'.base64_encode($video->gallery_id)?>">Update Video</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/video/delete/'.base64_encode($video->gallery_id)?>">Delete Video</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php            
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($links))
                                echo $links;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->session->unset_userdata('message_success');?>
<script>
    function reset_search(){
        $.ajax({
            url : '<?php echo base_url()?>Video/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/video/listing';
                }
            }
        });
    }
    function change_status(video_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Video/change_status',
            data: 'video_id='+video_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/video/listing';
                }
            }
        });
    }
</script>    