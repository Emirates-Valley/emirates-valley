<link rel="stylesheet" href="<?php echo base_url()?>resource/vendors/select2/css/select2.min.css" type="text/css">
<div class="content-body">
    <div class="content ">            
        <div class="page-header">
            <div>
                <h3>Profile</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url().'admin/dashboard'?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-item nav-link active" id="v-pills-home-tab" data-toggle="pill"
                            href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Your
                                Profile</a>
                            <a class="nav-item nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Password</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <?php
                                    if (isset($message_error)) {
                                        echo '<div class="alert alert-danger">';
                                            echo $message_error;
                                        echo "</div>";
                                    }
                                    if (isset($message_success)) {
                                        echo '<div class="alert alert-success">';
                                            echo $message_success;
                                        echo "</div>";
                                    }
                                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Your Profile</h6>
                                        <?php 
                                            if($user_record->company_logo != ''){
                                                $company_logo = base_url().'resource/images/user_images/'.$user_record->company_logo;
                                            } else {
                                                $company_logo = base_url().'resource/images/user_images/suisse-logo.png';
                                            }
                                            if($user_record->profile_pic != ''){
                                                $profile_pic = base_url().'resource/images/user_images/'.$user_record->profile_pic;
                                            } else {
                                                $profile_pic = base_url().'assets/media/image/user/women_avatar1.jpg';
                                            }
                                        ?>
                                        <div class="d-flex mb-3">
                                            <figure class="mr-3">
                                                <img width="100" class="rounded-pill" id="uploadedproPic"
                                                    src="<?php echo $profile_pic?>" alt="...">
                                            </figure>
                                            <div>
                                                <p><?php echo $user_record->username?></p>
                                                <button class="btn btn-outline-light mr-2">Change Avatar</button>
                                                <input type="file" name="myfile" id="fileToUpload1" />
                                                <style>
                                                    div input[type=file] {
                                                        position: absolute;
                                                        left: 141px;
                                                        opacity: 0;
                                                        cursor: pointer;
                                                        width: 130px;
                                                        margin-top:5px;
                                                    }
                                                </style> 
                                                <?php if($user_record->profile_pic != ''){ ?>   
                                                    <button class="btn btn-outline-danger" onclick="remove_avatar('<?php echo $user_record->profile_pic?>')">Remove Avatar</button>
                                                <?php } ?>    
                                                <p class="small text-muted mt-3">For best results, use an image at least
                                                    256px by 256px in either .jpg or .png format</p>
                                            </div>
                                        </div>
                                        <form method="Post" action="<?php echo base_url().'admin/profile'?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->name?>" id="company_name" name="company_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->email?>" id="email" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->username?>" id="username" name="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->phone?>" id="phone" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->street?>" id="street" name="street">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select class="form-control state" id="state" name="state">
                                                            <?php 
                                                                foreach(getstates() as $state){
                                                            ?>        
                                                                    <option value="<?php echo $state->states?>" <?php if( $user_record->state == $state->states) echo 'selected="selected"';?>><?php echo $state->states?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Headline Text</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->headline_text?>" id="headline_text" name="headline_text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->city?>" id="city" name="city">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Post Code</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->zip?>" id="zip" name="zip">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Link</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_record->link?>" id="link" name="link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group custom-file">
                                                        <label for="exampleFormControlFile1">Company Logo <strong>(.png   .jpg   .jpeg   .bmp   .gif   files are allowed)</strong></label>
                                                        <input type="file" class="custom-file-input" id="customFile" name="company_logo">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>        
                                                    </div>
                                                    <input type="hidden" name="oldcompanyfile" value="<?php echo $user_record->company_logo?>">
                                                    <br />
                                                    <br />
                                                    <figure class="mr-3">
                                                        <img width="100" class="rounded-pill"
                                                            src="<?php echo $company_logo?>" alt="...">
                                                    </figure>          
                                                </div>
                                            </div>
                                            <button type="submit" name="update_profile" value="update_profile" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Password</h6>
                                        <form class="userPassword" method="Post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input type="password" name="oldpassword" id="oldpassword" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="newpassword" id="newpassword" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password Repeat</label>
                                                        <input type="password" name="cpassword" id="cpassword" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary save_password">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url()?>assets/js/examples/toast.js"></script>    
<script src="<?php echo base_url()?>resource/vendors/select2/js/select2.min.js"></script> 
<script>
    $('.state').select2({
        placeholder: 'Select State'
    });
    $('.save_password').on('click',function(){
        var formData = $(".userPassword").serialize();
        $.ajax({
            url : '<?php echo base_url()?>Dashboard/update_password',
            type : 'POST',
            data : formData,
            success : function(res){
                var obj = $.parseJSON(res);
                if(obj['status'] == 'error'){
                    toastr.error(obj['msg']);
                } else {
                    $('#oldpassword').val('');
                    $('#newpassword').val('');
                    $('#cpassword').val('');
                    toastr.success(obj['msg']);
                }
            }
        })
    })
    function remove_avatar(imgName){
        $.ajax({
            url : '<?php echo base_url()?>Dashboard/remove_avatar',
            type : 'POST',
            data : 'userId=<?php echo $this->userId?>&imgName='+imgName,
            success : function(res){
                window.location.reload();
            }
        });
    }
    $(document).ready(function(){
        $('#fileToUpload1').change(function(){
            var formData = new FormData();
            formData.append("files", document.getElementById('fileToUpload1').files[0]);
            $.ajax({
                url: '<?php echo base_url()?>Dashboard/upload_avatar', 
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if(data['status'] == 'error'){
                        toastr.error(data['msg']);
                    } else {
                        $('#uploadedproPic').attr('src',data['msg']);
                        toastr.success('Password updated successfully!');
                    }
                }
            });
        });
    });
</script>    