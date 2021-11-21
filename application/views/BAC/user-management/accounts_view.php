<?php 
	$this->load->view('BAC/layouts/head');
	$this->load->view('BAC/layouts/header');
	$this->load->view('BAC/layouts/sidebar');
 ?>
 
 <style>
	 	.green.btn {
			background-color: #0a503e;
			opacity: 0.8;
		}
		.green.btn:hover {
			background-color: #0a503e;
			opacity: 1;
		}
		@media (min-width: 768px)
		{
			.modal-dialog {
				width: 700px;
			}
			.modal-body {
				position: relative;
				padding: 40px;
			}
			.form-actions {
				margin-top: 40px;
			}
			.input-block {
				margin-bottom: 25px;
			}
		}
		.scroller {
			overflow: visible;
		}
 		form#create_new_user{
			 margin-top: 10px;
			 margin-bottom: 10px;
		 }
		.contact-form .input-block {
			background-color: rgba(255, 255, 255, 0.8);
			border: solid 1px #666;
			width: 100%;
			height: 40px;
			padding: 25px;
			position: relative;
			margin-bottom: 20px;
			-moz-transition: all 0.3s ease-out;
			-o-transition: all 0.3s ease-out;
			-webkit-transition: all 0.3s ease-out;
			transition: all 0.3s ease-out;
		}

		.contact-form .input-block.focus {
			background-color: #fff;
			border: solid 1px #666;
		}

		.contact-form .input-block.textarea {
			height: auto;
		}

		.contact-form .input-block.textarea .form-control {
			height: auto;
			resize: none;
		}

		.contact-form .input-block label {
			padding: 0 10px;
			background: #fff;	
			position: absolute;
			left: 8px;
			top: 20px;
			display: block;
			margin: 0;
			font-weight: 300;
			z-index: 1;
			color: black;
			font-size: 18px;
			line-height: 10px;
		}

		.contact-form .input-block .form-control {
			background-color: transparent;
			border: medium none;
			border-radius: 0;
			box-shadow: none;
			color: #666;
			font-size: 18px;
			height: 40px;
			padding: 0;
			position: relative;
			top: -20px;
			z-index: 2;
		}

		.contact-form .input-block .form-control:focus label {
			top: 0;
		}
		.contact-form .square-button:hover,
		.contact-form .square-button:focus {
			background-color: white;
		}
		.invitation{
			text-align: center;
		}
		.invitation > label{

			font-size: 18px!important;
   			margin-bottom: 15px;
		}
		.invitation input{
			width: 50%;
			margin: auto;
		}
		a#create_new_user_button {
			background-color: #af9500;
		}
 </style>
 

 <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Project Management
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
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>List Of Accounts
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<!-- <button id="sample_editable_1_new" class="btn green">Add New project <i class="fa fa-plus"></i></button> -->
										<?php if($this->session->userdata('type') == "ADMIN")
											{?>
												<a href="javascript:void(0);"  id="create_new_user_button" class="btn green">Add New User <i class="fa fa-plus"></i></a>
										<?php };?>
                                        </div>
									</div>
									<div class="col-md-6">
										
									</div>
								</div>
							</div>
							<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">First Name</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Last Name</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">User Type</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >User Name</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >Email</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Address</th>
										</tr>
									</thead>
									<tbody class="table_data" > 
									
									</tbody>
								</table>

							</div>
						
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

			<!-- modal for create new user -->
			<div id="create_new_user" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">CREATE NEW project</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								<form class="form-horizontal contact-form" id="create_new_user_form" role="form" method="post" enctype="multipart/form-data">
									
									<div class="form-body">
										<div class="input-block">
											<label for="">User Type</label>
											<select class="form-control" name="user_type" id="user_type" placeholder="Enter project type" required>
												<option></option>
												<option>BAC</option>
												<option>TWG</option>
												<option>HEAD-BAC</option>
												<option>HEAD-TWG</option>
											</select>
										</div>
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">First Name</label>
											<input type="text" class="form-control" name="firstname" id="firstname" autocomplete="off" required>
										</div>
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Last Name</label>
											<input type="text" class="form-control" name="lastname" id="lastname" autocomplete="off" required>
										</div>
									</div>
									
									<div class="form-body">
										<div class="input-block">
											<label for="">User Name</label>
											<input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
										</div>
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Email</label>
											<input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
										</div>
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Password</label>
											<input type="password" class="form-control" name="password" id="password" autocomplete="new-password" required>
										</div>
									</div>
									
									<div class="form-body">
										<div class="input-block">
											<label for="">Address</label>
											<input type="text" class="form-control" name="address" id="address" autocomplete="off" required>
										</div>
									</div>
									
									<div class="form-actions invitation">
										<div class="row">
											<div class="col-md-12" style="text-align: center;">
												<button type="submit"  class="btn green">Submit</button>
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

			
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

 
	<?php 
		$this->load->view('BAC/layouts/quick_sidebar');
		$this->load->view('BAC/layouts/footer');
	?>
	
<script>
	//material contact form animation
	$(".contact-form")
		.find(".form-control")
		.each(function () {
			var targetItem = $(this).parent();
			if ($(this).val()) {
				$(targetItem)
					.find("label")
					.css({
						top: "-6px"
						, fontSize: "16px"
						, color: "#666"
					});
			}
	});
	$(".contact-form")
		.find(".form-control")
		.focus(function () {
			$(this)
				.parent(".input-block")
				.addClass("focus");
			$(this)
				.parent()
				.find("label")
				.animate({
						top: "-6px"
						, fontSize: "16px"
						, color: "#666"
					}
					, 300
				);
		});
	$(".contact-form")
		.find(".form-control")
		.blur(function () {
			if ($(this).val().length == 0) {
				$(this)
					.parent(".input-block")
					.removeClass("focus");
				$(this)
					.parent()
					.find("label")
					.animate({
							top: "20px"
							, fontSize: "18px"
						}
						, 300
					);
			}
		});
		
		
</script>

<script>
        jQuery(document).ready(function() {
            $('#create_new_user_button').click(function(){
				$('#create_new_user').modal("toggle");
			});
			// get data from project table
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('userManagementController/show_users')?>',
				async : true,
				success : function(data){
					
					$('.table_data').html(data);
				}
			});


            //Add new project
            jQuery('#create_new_user_form').on('submit',function(e){
                e.preventDefault();

				$.ajax({
					url: "<?php echo base_url(); ?>userManagementController/create_user",
					type: "POST",
					// data: regdata,
					data:new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					success: function(response){
						$.ajax({
							type  : 'get',
							url   : '<?php echo site_url('userManagementController/show_users')?>',
							async : true,
							success : function(data){
								
								$('.table_data').html(data);
								$('#create_new_user').modal('hide');

								// reset to null value
								$('#firstname').val("");
								$('#lastname').val("");
								$('#email').val("");
								$('#user_type').val("");
								$('#username').val("");
								$('#address').val("");
								$('#password').val("");
							}
						});
					}
				});
			
            });

        });
	</script>
		
