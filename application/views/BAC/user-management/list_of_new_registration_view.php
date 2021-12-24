 <?php 
	$this->load->view('BAC/layouts/head');
	$this->load->view('BAC/layouts/header');
	$this->load->view('BAC/layouts/sidebar');
 ?>
 
 <style>
		@media (min-width: 768px)
		{
			/* .modal-dialog {
				width: 700px;
			} */
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
 		form#create_new_project{
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
								<i class="fa fa-globe"></i>List Of New Registration
							</div>
						
						</div>
						<div class="portlet-body">

							<!-- <div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div> -->
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" style="width: 287px;">#</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email" >Name</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" >Company Name</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >Address</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >Account Status</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >Date & Time Of Application</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" >PhilGEPS Registration Certificate</th>
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
			<!-- END PAGE CONTENT-->

			<!----------- modal------------>
			<div id="view_file" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">PhilGEPS Registration Certificate</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">

								<div class="spinner-box ">
									<div class="configure-border-1">  
										<div class="configure-core"></div>
									</div>  
									<div class="configure-border-2">
										<div class="configure-core"></div>
									</div> 
								</div>
								<div id="display_file"> 
									
									</div>
								<input type="hidden" class="certificate-input"/>
								<form class="form-horizontal contact-form" id="approve_certificate_form" role="form" method="post">
									<div class="form-actions">
										<div class="row">
											<div class="col-md-12" style="text-align: center;">
												<input type="hidden" name="user_id" id="user_id" class="form-control">
												<button type="submit" id="approve-certificate-button" class="btn green">Approve Certificate</button>
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
			<!-- modal end ---------------------------------------------------->
			
		</div>
	</div>
	<!-- END CONTENT -->

 
	<?php 
		$this->load->view('BAC/layouts/quick_sidebar');
		$this->load->view('BAC/layouts/footer');
	?>


<script>
	// view certificate modal
	// $('.table_data').on('click','.img_button',function(){

	// 	$('#view_file').modal('toggle');

	// 	$('.certificate-input').val($(this).data('imgpath'))

	// 	$('#user_id').val($(this).data('user_id'))

	// 	var path = $('.certificate-input').val() + "";
	// 	console.log(path);

	// 	$('.certificate-image').attr('src',"<?php echo base_url() ?>" + path)

		
	// });  

	// show modal and assign value to inputs
	$('.table_data').on('click','.img_button',function(){
		$('.spinner-box').fadeIn();
		$('#view_file').modal('toggle');
		
		var imageSource = $(this).attr('data-link');
		$('#user_id').val($(this).data('user_id'))
		var file_div="<object class='pdfembed1' data='"+imageSource+"' type='application/pdf' width='100%' height='800'><embed class='pdfembed2' src='"+imageSource+"' type='application/pdf' /></object>";
		var file_image ="<img class='img_file' src='"+imageSource+"' width='100%' height='800'>";
		if (imageSource.indexOf(".pdf") >= 0){
			jQuery('#display_file ').html(file_div);
		}
		else{
			jQuery('#display_file ').html(file_image);
		}

		$('.spinner-box').fadeOut(3000);
	});

	jQuery(document).ready(function() {
		// get data from project table
		$.ajax({
			type  : 'get',
			url   : '<?php echo site_url('UserManagementController/ajax_table_show_new_bidder_entry')?>',
			async : true,
			success : function(data){
				
				$('.table_data').html(data);
			}
		});

		// approve certificate function
		$('#approve_certificate_form').on('click', '#approve-certificate-button',function(e){
            e.preventDefault();
			console.log();
			var u_id = $('#user_id').val();
			// alert(u_id);
			console.log(u_id +" this is id");

			var ajaxurl = "<?php echo base_url(); ?>UserManagementController/approve_certificate";

			var data = { 
						user_id: u_id
					};
					
			jQuery.post(ajaxurl, data, function(response) {
				$.ajax({
					type  : 'get',
					url   : '<?php echo site_url('UserManagementController/ajax_table_show_new_bidder_entry')?>',
					async : true,
					success : function(data){
						$('.table_data').html(data);
						swal("Confirm!", "User has been confirm!", "success");
					}
				});
				$('#view_file').modal('hide');													
			}).fail(function(xhr, status, error) {
					console.log(status);
					console.log(error);
			});

		});

	});
</script>