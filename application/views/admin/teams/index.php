<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Manage Team 
                <a href="<?php echo base_url().'admin/team/add'?>" style="margin-right:10px" class="btn btn-outline-primary pull-right">Add Team</a></h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Team</li>
                    </ol>
                </nav>
                <br />
                <label>Search</label>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo base_url().'admin/team/listing'?>">
                            <div class="col-md-3" style="padding:0;float: left;">
                                <?php 
                                    $searchVal = '';
                                    if($this->session->userdata('teamsearch') != ''){
                                        $searchVal = $this->session->userdata('teamsearch');
                                    }    
                                ?>
                                <input type="text" class="form-control" name="teamsearch" value="<?php echo $searchVal?>" placeholder="Search Team">
                            </div>
                            <div class="col-md-3" style="float: left;">
                                <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                                <?php 
                                    if($this->session->userdata('teamsearch') != ''){
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Dated</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(count($teams) > 0){
                                                foreach($teams as $team){
                                        ?>
                                                <tr id="team_id-<?php echo $team->team_id?>">
                                                    <td>
                                                        <figure class="avatar avatar-sm">
                                                            <?php 
                                                                if($team->team_image != ''){
                                                                    $team_image = base_url().'resource/images/other_images/'.$team->team_image;
                                                                } else {
                                                                    $team_image = base_url().'assets/media/image/user/man_avatar3.jpg';
                                                                }
                                                            ?>
                                                            <img src="<?php echo $team_image?>"
                                                                class="rounded-circle" alt="<?php echo $team->name?>">
                                                        </figure>
                                                    </td>
                                                    <td><?php echo $team->name?></td>
                                                    <td><?php echo $team->designation?></td>
                                                    <td><?php echo $team->phone?></td>
                                                    <td><?php echo $team->email?></td>
                                                    <td>
                                                        <?php 
                                                            if($team->status == 'Active'){
                                                                $status = "'Inactive'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$team->team_id.','.$status.')" class="btn btn-success">'.$team->status.'</a>';
                                                            } else if($team->status == 'Inactive'){
                                                                $status = "'Active'";
                                                                echo '<a href="javascript:;" onclick="change_status('.$team->team_id.','.$status.')" class="btn btn-danger">Inactive</a>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $team->dated;?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline-light tn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/team/edit/'.base64_encode($team->team_id)?>">Update Team</a>
                                                                <a class="dropdown-item" href="<?php echo base_url().'admin/team/delete/'.base64_encode($team->team_id)?>">Delete Team</a>
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
            url : '<?php echo base_url()?>Team/reset_filter',
            data: 'reset=1',
            type: 'POST',
            success: function ( data ) { 
                if(data == 1){
                    window.location = '<?php echo base_url()?>admin/team/listing';
                }
            }
        });
    }
    function change_status(team_id,status){
        $.ajax({
            url : '<?php echo base_url()?>Team/change_status',
            data: 'team_id='+team_id+'&status='+status,
            type: 'POST',
            success: function ( data ) { 
                if(data != ''){
                    window.location = '<?php echo base_url()?>admin/team/listing';
                }
            }
        });
    }
</script>    