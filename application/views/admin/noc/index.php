<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Noc/Download 
                <a href="<?php echo base_url().'admin/noc/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Noc/Download</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Noc/Download</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/noc/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('nocsearch') != ''){
                                        $searchVal = $this->session->userdata('nocsearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="nocsearch" value="<?php echo $searchVal?>" placeholder="Search Noc/Download">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('nocsearch') != ''){
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
                                                <th scope="col">Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($nocs) > 0){
                                                foreach($nocs as $noc){
                                        ?>
                                                <tr id="noc_id-<?php echo $noc->noc_id?>">
                                                    <td>
                                                        <?php 
                                                            echo $noc->noc_image;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $noc->title?></td>
                                                    <td>
                                                        <?php 
                                                            if($noc->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$noc->noc_id.','.$status.')" class="btn btn-success">'.$noc->status.'</a>';
                                                            } else if($noc->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$noc->noc_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $noc->noc_type;?></td>
                                                    <td><?php echo $noc->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/noc/edit/'.base64_encode($noc->noc_id)?>">Update</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/noc/delete/'.base64_encode($noc->noc_id)?>">Delete</a>
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
            url : '<?php echo base_url()?>Noc/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/noc/listing';
                }
            }
        });
    }
    function change_status(noc_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Noc/change_status',
            data: 'noc_id='+noc_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/noc/listing';
                }
            }
        });
    }
</script>    