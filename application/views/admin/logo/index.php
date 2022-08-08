<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Logo 
                <a href="<?php echo base_url().'admin/logo/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Logo</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Logo</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/logo/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('logosearch') != ''){
                                        $searchVal = $this->session->userdata('logosearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="logosearch" value="<?php echo $searchVal?>" placeholder="Search Logo">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('logosearch') != ''){
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
                                                <th scope="col">Logo Image</th>
                                                <th scope="col">Website Name</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($logos) > 0){
                                                foreach($logos as $logo){
                                        ?>
                                                <tr id="logo_id-<?php echo $logo->logo_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($logo->logo_image != ''){
                                                                    $logo_image = base_url().'resource/images/other_images/'.$logo->logo_image;
                                                                } else {
                                                                    $logo_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $logo_image?>"
                                                                class="rounded-circle" alt="<?php echo $logo->website_name?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $logo->website_name?></td>
                                                    <td>
                                                        <?php 
                                                            if($logo->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$logo->logo_id.','.$status.')" class="btn btn-success">'.$logo->status.'</a>';
                                                            } else if($logo->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$logo->logo_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $logo->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/logo/edit/'.base64_encode($logo->logo_id)?>">Update Logo</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/logo/delete/'.base64_encode($logo->logo_id)?>">Delete Logo</a>
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
            url : '<?php echo base_url()?>Logo/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/logo/listing';
                }
            }
        });
    }
    function change_status(logo_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Logo/change_status',
            data: 'logo_id='+logo_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/logo/listing';
                }
            }
        });
    }
</script>    