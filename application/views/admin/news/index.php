<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage News 
                <a href="<?php echo base_url().'admin/news/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add News</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage News</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/news/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('newssearch') != ''){
                                        $searchVal = $this->session->userdata('newssearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="newssearch" value="<?php echo $searchVal?>" placeholder="Search News">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('newssearch') != ''){
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
                                                <th scope="col">News Image</th>
                                                <th scope="col">News Title</th>
                                                <th scope="col">News Type</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($news) > 0){
                                                foreach($news as $new){
                                        ?>
                                                <tr id="news_id-<?php echo $new->news_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($new->news_image != ''){
                                                                    $news_image = base_url().MEDIA_PATH.$new->news_image;
                                                                } else {
                                                                    $news_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $news_image?>"
                                                                class="rounded-circle" alt="<?php echo $new->news_title?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $new->news_title?></td>
                                                    <td>
                                                        <?php 
                                                            if($new->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$new->news_id.','.$status.')" class="btn btn-success">'.$new->status.'</a>';
                                                            } else if($new->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$new->news_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $new->news_type;?></td>
                                                    <td><?php echo $new->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/news/edit/'.base64_encode($new->news_id)?>">Update News</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/news/delete/'.base64_encode($new->news_id)?>">Delete News</a>
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
            url : '<?php echo base_url()?>News/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/news/listing';
                }
            }
        });
    }
    function change_status(news_id,status){
        $.ajax({
            url : '<?php echo base_url()?>News/change_status',
            data: 'news_id='+news_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/news/listing';
                }
            }
        });
    }
</script>    