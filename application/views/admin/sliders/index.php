<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Slider 
                <a href="<?php echo base_url().'admin/slider/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Slider</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Slider</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/slider/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('slidersearch') != ''){
                                        $searchVal = $this->session->userdata('slidersearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="slidersearch" value="<?php echo $searchVal?>" placeholder="Search Slider">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('slidersearch') != ''){
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
                                                <th scope="col"><input type="checkbox" id="checked_all" class="checkbox"></th>
                                                <th scope="col">Slider Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($sliders) > 0){
                                                foreach($sliders as $slider){
                                        ?>
                                                <tr id="slider_id-<?php echo $slider->slider_id?>">
                                                    <th scope="row"><input type="checkbox" value="<?php echo $slider->slider_id?>" class="checkbox"></th>
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($slider->slider_image != ''){
                                                                    $slider_image = base_url().'resource/images/other_images/'.$slider->slider_image;
                                                                } else {
                                                                    $slider_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $slider_image?>"
                                                                class="rounded-circle" alt="<?php echo $slider->title?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $slider->title?></td>
                                                    <td>
                                                        <?php 
                                                            if($slider->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$slider->slider_id.','.$status.')" class="btn btn-success">'.$slider->status.'</a>';
                                                            } else if($slider->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$slider->slider_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $slider->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/slider/edit/'.base64_encode($slider->slider_id)?>">Update Slider</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/slider/delete/'.base64_encode($slider->slider_id)?>">Delete Slider</a>
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
    $('#checked_all').on('change', function() {     
        $('.checkbox').prop('checked', $(this).prop("checked"));
        var len = $("input:checked.checkbox").length;
        if(len != 0){
            $('.set_initial').show();
        } else {
            $('.set_initial').hide();
        }              
    });
    $('.checkbox').on('change', function() {     
        var len = $("input:checked.checkbox").length;
        if(len != 0){
            $('.set_initial').show();
        } else {
            $('.set_initial').hide();
        }             
    });
    function reset_search(){
        $.ajax({
            url : '<?php echo base_url()?>Slider/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/slider/listing';
                }
            }
        });
    }
    function change_status(slider_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Slider/change_status',
            data: 'slider_id='+slider_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/slider/listing';
                }
            }
        });
    }
</script>    