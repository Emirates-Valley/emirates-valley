<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Payment Plan 
                <a href="<?php echo base_url().'admin/payment/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Payment Plan</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Payment Plan</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/payment/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('paymentsearch') != ''){
                                        $searchVal = $this->session->userdata('paymentsearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="paymentsearch" value="<?php echo $searchVal?>" placeholder="Search Payment Plan">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('paymentsearch') != ''){
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
                                                <th scope="col">Plan Image</th>
                                                <th scope="col">Plan Title</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($payments) > 0){
                                                foreach($payments as $payment){
                                        ?>
                                                <tr id="plan_id-<?php echo $payment->plan_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($payment->plan_image != ''){
                                                                    $plan_image = base_url().MEDIA_PATH.$payment->plan_image;
                                                                } else {
                                                                    $plan_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $plan_image?>"
                                                                class="rounded-circle" alt="<?php echo $payment->plan_title?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $payment->plan_title?></td>
                                                    <td>
                                                        <?php 
                                                            if($payment->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$payment->plan_id.','.$status.')" class="btn btn-success">'.$payment->status.'</a>';
                                                            } else if($payment->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$payment->plan_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $payment->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/payment/edit/'.base64_encode($payment->plan_id)?>">Update Payment Plan</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/payment/delete/'.base64_encode($payment->plan_id)?>">Delete Payment Plan</a>
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
            url : '<?php echo base_url()?>Payment/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/payment/listing';
                }
            }
        });
    }
    function change_status(plan_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Payment/change_status',
            data: 'plan_id='+plan_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/payment/listing';
                }
            }
        });
    }
</script>    