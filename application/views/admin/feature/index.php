<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Features 
                <a href="<?php echo base_url().'admin/feature/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Feature</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Features</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/feature/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('featuresearch') != ''){
                                        $searchVal = $this->session->userdata('featuresearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="featuresearch" value="<?php echo $searchVal?>" placeholder="Search Feature">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('featuresearch') != ''){
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
                                                <th scope="col">Feature Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($features) > 0){
                                                foreach($features as $feature){
                                        ?>
                                                <tr id="feature_id-<?php echo $feature->feature_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($feature->feature_image != ''){
                                                                    $feature_image = base_url().MEDIA_PATH.$feature->feature_image;
                                                                } else {
                                                                    $feature_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $feature_image?>"
                                                                class="rounded-circle" alt="<?php echo $feature->title?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $feature->title?></td>
                                                    <td>
                                                        <?php 
                                                            if($feature->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$feature->feature_id.','.$status.')" class="btn btn-success">'.$feature->status.'</a>';
                                                            } else if($feature->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$feature->feature_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $feature->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/feature/edit/'.base64_encode($feature->feature_id)?>">Update Feature</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/feature/delete/'.base64_encode($feature->feature_id)?>">Delete Feature</a>
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
            url : '<?php echo base_url()?>Feature/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/feature/listing';
                }
            }
        });
    }
    function change_status(feature_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Feature/change_status',
            data: 'feature_id='+feature_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/feature/listing';
                }
            }
        });
    }
</script>    