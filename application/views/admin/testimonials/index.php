<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Testimonials 
                <a href="<?php echo base_url().'admin/testimonial/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Testimonial</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Testimonial</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/testimonial/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('testimonialsearch') != ''){
                                        $searchVal = $this->session->userdata('testimonialsearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="testimonialsearch" value="<?php echo $searchVal?>" placeholder="Search Testimonial">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('testimonialsearch') != ''){
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
                                                <th scope="col">Testimonial Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($testimonials) > 0){
                                                foreach($testimonials as $testimonial){
                                        ?>
                                                <tr id="testimonial_id-<?php echo $testimonial->testimonial_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($testimonial->testimonial_image != ''){
                                                                    $testimonial_image = base_url().MEDIA_PATH.$testimonial->testimonial_image;
                                                                } else {
                                                                    $testimonial_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $testimonial_image?>"
                                                                class="rounded-circle" alt="<?php echo $testimonial->name?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $testimonial->name?></td>
                                                    <td><?php echo $testimonial->designation?></td>
                                                    <td>
                                                        <?php 
                                                            if($testimonial->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$testimonial->testimonial_id.','.$status.')" class="btn btn-success">'.$testimonial->status.'</a>';
                                                            } else if($testimonial->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$testimonial->testimonial_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $testimonial->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/testimonial/edit/'.base64_encode($testimonial->testimonial_id)?>">Update Testimonial</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/testimonial/delete/'.base64_encode($testimonial->testimonial_id)?>">Delete Testimonial</a>
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
            url : '<?php echo base_url()?>Testimonial/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/testimonial/listing';
                }
            }
        });
    }
    function change_status(testimonial_id,status){
        $.ajax({
            url : '<?php echo base_url()?>testimonial/change_status',
            data: 'testimonial_id='+testimonial_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/testimonial/listing';
                }
            }
        });
    }
</script>    