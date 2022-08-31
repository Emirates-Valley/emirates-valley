<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Open File 
                <a href="<?php echo base_url().'admin/open/file/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Open File</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Open File</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/open/file'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('opnsearch') != ''){
                                        $searchVal = $this->session->userdata('opnsearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="opnsearch" value="<?php echo $searchVal?>" placeholder="Search Open File">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('opnsearch') != ''){
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
                                                <th scope="col">App. Form Number</th>
                                                <th scope="col">Registration Number</th>
                                                <th scope="col">Plot Size</th>
                                                <th scope="col">Plot Type</th>
                                                <th scope="col">Security Code</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">CNIC</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($openfiles) > 0){
                                                foreach($openfiles as $openfile){
                                        ?>
                                                <tr id="file_id-<?php echo $openfile->file_id?>">
                                                    <td><?php echo $openfile->app_form_number?></td>
                                                    <td><?php echo $openfile->registration_number?></td>
                                                    <td><?php echo $openfile->plot_size?></td>
                                                    <td><?php echo $openfile->plot_type?></td>
                                                    <td><?php echo $openfile->security_code?></td>
                                                    <td><?php echo $openfile->name?></td>
                                                    <td><?php echo $openfile->cnic?></td>
                                                    <td><?php echo $openfile->contact?></td>
                                                    <td><?php echo $openfile->address?></td>
                                                    <td>
                                                        <?php 
                                                            if($openfile->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$openfile->file_id.','.$status.')" class="btn btn-success">'.$openfile->status.'</a>';
                                                            } else if($openfile->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$openfile->file_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $openfile->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/open/file/edit/'.base64_encode($openfile->file_id)?>">Update Open File</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/open/file/delete/'.base64_encode($openfile->file_id)?>">Delete Open File</a>
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
            url : '<?php echo base_url()?>OpenForm/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/open/file';
                }
            }
        });
    }
    function change_status(file_id,status){
        $.ajax({
            url : '<?php echo base_url()?>OpenForm/change_status',
            data: 'file_id='+file_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/open/file';
                }
            }
        });
    }
</script>    