 <?php 
 	$session_user_type = $this->session->userdata("type");

	 if($session_user_type == 'BIDDER'){
		$this->load->view('BIDDER/layouts/head');
		$this->load->view('BIDDER/layouts/header');
		$this->load->view('BIDDER/layouts/sidebar');
	 }
	 else{
		$this->load->view('BAC/layouts/head');
		$this->load->view('BAC/layouts/header');
		$this->load->view('BAC/layouts/sidebar');
	 }
	
 ?>
 
 <style>
 .cover-image img {
    max-height: 350px;
    object-fit: cover;
}
.profile .img-container {
    border-radius: 50%;
    width: 200px;
    height: 200px;
	position: relative;
    margin-top: -100px;
    margin-left: 10%;
    border: 10px solid #ffffff;
	background-color: #003924;
}
.img-container img {
    object-fit: cover;
    width: 100%;
	height: 100%;
	border-radius: 50%;
}
.profile {
    position: relative;
	display: flex;
	flex-wrap: wrap;
}
.name-container h2 {
    margin-left: 20px;
	text-transform: capitalize;
	font-weight: 700;
}
.edit-icon{
	position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border-radius: 50%;
    background: #005841;
    width: 40px;
    height: 40px;
	right: -12px;
    bottom: 20%;
}
.img-container:hover {
    cursor: pointer;
}

.edit-icon:hover {
    background: #af9500;
}

i.fa-camera{
    font-size: 20px;
    color: #fff;
    cursor: pointer;
}

.image_preview{
	width: 250px;
    height: 250px;
    object-fit: cover;
    background-color: #003924;
    border-radius: 50%;
    border: 4px solid #0a3827;
    margin-bottom: 30px;
}
.change-prof-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
	margin-bottom: 50px;
}


.button-wrapper {
  position: relative;
  width: 150px;
  text-align: center;
  overflow: hidden;
}

.button-wrapper span.label {
  position: relative;
  z-index: 0;
  display: inline-block;
  width: 100%;
  background: #005841;
  cursor: pointer;
  color: #fff;
  padding: 12px 0;
  text-transform:uppercase;
  font-size: 12px;
  border-radius:0;
}
#image_file:hover{
	cursor: pointer;
}
#image_file {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 300px;
    height: 50px;
	top: 0;
	right: 0;
    opacity: 0;
	cursor: pointer;
	height: 100%;
}

.profile-sidebar {
    width: 35%;
	float: left;
	margin-right: 20px;
}

.profile-content {
    overflow: hidden;
}

/* RESPONSIVE MODE */
@media (max-width: 991px) {
  /* 991px */
  /* 991px */
  .profile-sidebar {
    float: none;
    width: 100% !important;
    margin: 0;
  }

  .profile-sidebar > .portlet {
    margin-bottom: 20px;
  }

  .profile-content {
    overflow: visible;
  }
}
.tabbable-line {
    margin-bottom: 20px;
}

/*--------- password validation start -------- */
span#popover-password-top,
span#popover-cpassword {
	margin-left: 10px;
	color: #ff0000;
}
#popover-password > p {
    font-size: 12px;
    font-weight: 400;
    margin-top: 5px;
	
}
div#popover-password {
    margin: 0 20px;
}
.progress {
    height: 15px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 10px!important;
    -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
    box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
}
#popover-password li {
    font-size: 14px;
    font-weight: 500;
    color: #003924;
}
.progress-bar-success {
    background-color: #005841;
}
/*--------- password validation end-------- */
 </style>
	


 <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			My Account
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url()?>">Home</a>
						 <i class="fa fa-angle-right"></i>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
            <div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="profile-sidebar">
						<div class="portlet box grey-cascade">
							<div class="portlet-body">
								<div class="cover-image"> 
									<img width="100%"  src="<?php echo base_url().'/assets/images/testbg.jpg'?>">
								</div>
								<div class="profile"> 
									<div class="img-container"> 
										<?php 
										if(!empty($profile_path)){
											echo '<img alt=""  src="'.base_url().$profile_path.'"/>';
										}
										else{
											echo '<img alt=""  src="'.base_url().'/assets/images/profile-white.svg"/>';
										} ?>
											<span class="edit-icon"><i class="fa fa-camera" aria-hidden="true"></i></span>
									</div>
									<div class="name-container">
										<h2> <?php echo $firstname ." ". $lastname;?> </h2>
									</div>
								</div>

							</div>
							
						</div>
						<div class="portlet light">
							<!-- STAT -->
							<?php 
								if($session_user_type == 'BIDDER'){?>
									<div class="row list-separated profile-stat">
										<div class="col-md-4 col-sm-4 col-xs-6">
											<div class="uppercase profile-stat-title">
												37
											</div>
											<div class="uppercase profile-stat-text">
												Projects
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
											<div class="uppercase profile-stat-title">
												51
											</div>
											<div class="uppercase profile-stat-text">
												Tasks
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
											<div class="uppercase profile-stat-title">
												61
											</div>
											<div class="uppercase profile-stat-text">
												Uploads
											</div>
										</div>
									</div>
								<?php }?>
							<!-- END STAT -->
							<div>		
								<h4 class="profile-desc-title">Addess</h4>
								<span class="profile-desc-text"><?php echo $address ?></span>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-envelope"></i>
									<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-user"></i>
									<a href="avascript:void(0)"><?php echo $username ?></a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-building"></i>
									<a href="avascript:void(0)"><?php echo $companyname ?></a>
								</div>
							</div>
						</div>
					</div>

					<!-- END EXAMPLE TABLE PORTLET-->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="tabbable-line">
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab" aria-expanded="true">Personal Info</a>
											</li>
											<li class="">
												<a href="#tab_1_3" data-toggle="tab" aria-expanded="false">Change Password</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" id="update_personal_info" role="form" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<label class="control-label">Company Name</label>
														<input type="text" placeholder="<?php echo $companyname; ?>" name="companyname" class="form-control" required>
													</div>
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input type="text" placeholder="<?php echo $firstname; ?>" name="firstname" class="form-control" required>
													</div>
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input type="text" placeholder="<?php echo $lastname; ?>" name="lastname" class="form-control" required>
													</div>
													<div class="form-group">
														<label class="control-label">Username</label>
														<input type="text" placeholder="<?php echo $username; ?>" name="username" class="form-control" required>
													</div>
													
													<div class="form-group">
														<label class="control-label">Address</label>
														<textarea class="form-control" rows="3" placeholder="<?php echo $address; ?>" name="address" required></textarea>
													</div>

													<div class="margiv-top-10">
														<button type="submit" class="btn green">
														Save Changes </button>
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_3">
												<form id="update_password" role="form" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" name="oldpass" id="oldpass" class="form-control" required>
													</div>
													<!-- <div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" name="newpass" id="newpass" class="form-control">
													</div> -->
													  <!-- Password input-->
													  <div class="form-group">
															<label class="control-label" for="passwordinput">New Password <span id="popover-password-top" class="hide pull-right block-help"><i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Enter a strong password</span></label>
															<div class="">
																<input  name="newpass" id="newpass" type="password" placeholder="" class="form-control input-md" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true">
																<div id="popover-password">
																	<p>Password Strength: <span id="result"> </span></p>
																	<div class="progress">
																		<div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
																		</div>
																	</div>
																	<ul class="list-unstyled">
																		<li class=""><span class="low-upper-case"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
																		<li class=""><span class="one-number"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
																		<li class=""><span class="one-special-char"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
																		<li class=""><span class="eight-character"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
																	</ul>
																</div>
															</div>
														</div>
														<!-- Password input-->
													<div class="form-group">
													<label class="control-label" for="passwordinput">Re-type New Password <span id="popover-cpassword" class="hide pull-right block-help"><i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Password don't match</span></label>
														<div class="">
															<input type="password" name="passconf" id="passconf"  class="form-control input-md" required>
														</div>
													</div>

													<!-- <div class="form-group">
														<label class="control-label" for="passwordinput">Re-type New Password <span id="popover-cpassword" class="hide pull-right block-help"><i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Password don't match</span></label>
														<div class="">
															<input id="confirm-password" name="confirm-password" type="password" placeholder="" class="form-control input-md">
														</div>
													</div> -->
													<div class="margin-top-10">
														<button id="change_pass" type="submit" class="btn green" disabled="disabled">
														Change Password </button>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- modal for view file -->
					<div id="profile_image_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header" style="text-align: center;">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="pdf-description" style="font-weight: 600;" class="modal-title">Update Profile Picture</h4>
									</div>
									<div class="modal-body">
										<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
										<form class="form-horizontal " id="change_profile_form" role="form" method="post" enctype="multipart/form-data">
											<div class="change-prof-container">
												
													<?php 
														if(!empty($profile_path)){
															echo '<img class="image_preview" alt="your image"  src="'.base_url().$profile_path.'"/>';
														}
														else{
															echo '<img class="image_preview" alt="your image"  src="'.base_url().'/assets/images/profile-white.svg"/>';
														} 
													?>
													<div class="button-wrapper">
														<span class="label">
															Upload File
														</span>
														
														<input type='file' name="file" id="image_file" placeholder="Upload File" onchange="readURL(this);"  required/>
														
													</div>
													
												
											</div>

											<div class="form-actions">
												<div class="row">
													<div class="col-md-12" style="text-align: center;">
														<button type="submit"  class="btn btn-success">SAVE</button>
														<a  type="button" data-dismiss="modal" class="btn default">Cancel</a>
													</div>
												</div>
											</div>
										</form>
										
										</div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
									</div>
								</div>
							</div>
						</div>
						<!-- modal end -->

				</div>
			</div>
			<!-- END PAGE CONTENT-->
			
		</div>
	</div>
	<!-- END CONTENT -->

 
	<?php 
		if($session_user_type == 'BIDDER'){
			$this->load->view('BIDDER/layouts/quick_sidebar');
			$this->load->view('BIDDER/layouts/footer');
		}
		else{
			$this->load->view('BAC/layouts/quick_sidebar');
			$this->load->view('BAC/layouts/footer');
		}
		
	?>


<script>
	// show modal and assign value to inputs
	$('.profile .img-container').click(function(){
		$('#profile_image_modal').modal('toggle');
	});

	$('#update_personal_info').submit(function(event){
        event.preventDefault();

		$.ajax({
			url:  '<?php echo base_url('ProfileController/update_personal_info')?>',
			type: "POST",
			data:new FormData(this),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
			success: function(response){
				swal("Updated!", "Has been Updated!", "success");
				setTimeout(function(){ 
					location.reload();
				 }, 800);
				
			}
		});
	});
	
	$('#update_password').submit(function(event){
        event.preventDefault();

		$.ajax({
			url:  '<?php echo base_url('ProfileController/changePassword')?>',
			type: "POST",
			data:new FormData(this),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
			success: function(response){
				var json = $.parseJSON(response);
				if (json.status == "success") {
					swal("Successfully", "Password Changed", "success");

					setTimeout(function(){ 
						window.location.replace('<?php echo site_url('loginregister/logout');?>');
					}, 800);
					
				} 
				else if(json.status == "fail"){
					swal('Fail',json.message,'error');
				}
				
			}
		});
	});
	

	$('#change_profile_form').submit(function(event){
        event.preventDefault();

		$.ajax({
			url:  '<?php echo base_url('ProfileController/insert_profile')?>',
			type: "POST",
			data:new FormData(this),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
			success: function(response){
				$('#profile_image_modal').modal('hide');
				swal("Updated!", "Profile has been Updated!", "success");
				setTimeout(function(){ 
					location.reload();
				 }, 800);
			}
		});
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('.image_preview')
					.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}



	// validation -----------------------------------
	$(document).ready(function() {

        $('#newpass').keyup(function() {
            var newpass = $('#newpass').val();
            if (checkStrength(newpass) == false) {
                $('#change_pass').attr('disabled', true);
            }
        });
        $('#passconf').blur(function() {
            if ($('#newpass').val() !== $('#passconf').val()) {
                $('#popover-cpassword').removeClass('hide');
                $('#change_pass').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
				$('#change_pass').attr('disabled', false);
            }
        });

        $('#change_pass').hover(function() {
            if ($('#change_pass').prop('disabled')) {
                $('#change_pass').popover({
                    html: true,
                    trigger: 'hover',
                    placement: 'below',
                    offset: 20,
                    content: function() {
                        return $('#change_pass-popover').html();
                    }
                });
            }
        });


        function checkStrength(newpass) {
            var strength = 0;


            //If password contains both lower and uppercase characters, increase strength value.
            if (newpass.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                $('.low-upper-case').addClass('text-success');
                $('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');


            } else {
                $('.low-upper-case').removeClass('text-success');
                $('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has numbers and characters, increase strength value.
            if (newpass.match(/([a-zA-Z])/) && newpass.match(/([0-9])/)) {
                strength += 1;
                $('.one-number').addClass('text-success');
                $('.one-number i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-number').removeClass('text-success');
                $('.one-number i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has one special character, increase strength value.
            if (newpass.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                $('.one-special-char').addClass('text-success');
                $('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');
				
				console.log(strength +' matches');
				

            } else {
                $('.one-special-char').removeClass('text-success');
                $('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            if (newpass.length > 7) {
                strength += 1;
                $('.eight-character').addClass('text-success');
                $('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');
				console.log(strength +' > 7');
				

            } else {
                $('.eight-character').removeClass('text-success');
                $('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }


			

            // If value is less than 2

            if (strength < 2) {
                $('#result').removeClass()
                $('#password-strength').addClass('progress-bar-danger');
				$('#password-strength').removeClass('progress-bar-warning');
                $('#result').addClass('text-danger').text('Very Week');
                $('#password-strength').css('width', '10%');
				$('#change_pass').attr('disabled', false);
				console.log(strength +' < 2');
            } else if (strength == 2 || strength == 3) {
                $('#result').addClass('good');
                $('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').addClass('progress-bar-warning');
                $('#result').addClass('text-warning').text('Week')
                $('#password-strength').css('width', '60%');
				console.log(strength +'week');
                return 'Week'
            } else if (strength == 4) {
                $('#result').removeClass()
                $('#result').addClass(' strong');
				$('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').removeClass('progress-bar-warning');
                $('#password-strength').addClass('progress-bar-success');
                $('#result').addClass('text-success').text('Strength');
                $('#password-strength').css('width', '100%');
				console.log(strength +' strong');

                return 'Strong'
            }

        }

    });


</script>