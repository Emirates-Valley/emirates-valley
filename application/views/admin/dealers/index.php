<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Dealer 
                <a href="<?php echo base_url().'admin/dealer/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Dealer</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Dealer</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/dealer/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('dealersearch') != ''){
                                        $searchVal = $this->session->userdata('dealersearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="dealersearch" value="<?php echo $searchVal?>" placeholder="Search Dealer">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('dealersearch') != ''){
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($dealers) > 0){
                                                foreach($dealers as $dealer){
                                        ?>
                                                <tr id="dealer_id-<?php echo $dealer->dealer_id?>">
                                                    <td><?php echo $dealer->name?></td>
                                                    <td><?php echo $dealer->phone?></td>
                                                    <td><?php echo $dealer->email?></td>
                                                    <td><?php echo $dealer->address?></td>
                                                    <td>
                                                        <?php 
                                                            if($dealer->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$dealer->dealer_id.','.$status.')" class="btn btn-success">'.$dealer->status.'</a>';
                                                            } else if($dealer->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$dealer->dealer_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $dealer->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/dealer/edit/'.base64_encode($dealer->dealer_id)?>">Update Dealer</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/dealer/delete/'.base64_encode($dealer->dealer_id)?>">Delete Dealer</a>
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
            url : '<?php echo base_url()?>Dealer/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/dealer/listing';
                }
            }
        });
    }
    function change_status(dealer_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Dealer/change_status',
            data: 'dealer_id='+dealer_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/dealer/listing';
                }
            }
        });
    }
</script>    