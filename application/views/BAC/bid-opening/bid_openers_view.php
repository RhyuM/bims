<?php 
     $this->load->view('BAC/layouts/head');
	 $this->load->view('BAC/layouts/header');
	 $this->load->view('BAC/layouts/sidebar');
	 $session_projects_id = $this->session->userdata("projects_id");
	//  echo '<script> alert("'.$session_projects_id.'")</script>';
?>  
	   <style>
	   		.admins_row {
				padding: 30px 10px!important;
			}
	   		#decryptForm{
				display: flex; 
				flex-wrap: wrap;
				justify-content: center; 
				text-align: center;
			   }
			.profile{
				background-color: gray;
				border-radius: 100%;
				width: 100px;
				height: 100px;
				object-fit: cover;
				display: block;
				margin: auto;
				top: 15px;
				z-index: 5;
			} 	
			.circle {
				width: 20px;
				height: 20px;	
				border-radius: 50%;
				margin: auto;
				margin-top: 10px;
			}
			.decript_lock{
				background: #f00;
			}
			.decript_unlock{
				background-color: green;
			}
			.userbox{
				margin: 10px;
				flex: 1 1 0px;
				box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
				padding: 20px;
				max-width: 280px;
				/* max-width: min-content; */
			}
			.circle2 {
				background: green;
				width: 20px;
				height: 20px;	
				border-radius: 50%;
				margin: auto;
				margin-top: 10px;
			}
			div.bid-opener-row1,
			div.bid-opener-row2{
				width: 100%;
				box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
				padding: 10px;
			}
			input.decrypt-button {
				background-color: #1bbc9b;
				color: white;
				padding: 10px 20px;
				border: none;
			}
			input.decrypt-button:hover {
				box-shadow:  0px 4px 6px 0px rgb(0 0 0 / 20%);
			}
			
			input.decrypt-button:focus {
				outline-width: 0;
			}
			.portlet.box.green-meadow:hover {
				box-shadow:  0px 10px 20px 0px rgb(0 0 0 / 50%);
			}
			.admins_row{
				margin-top: 20px;
			}

			.row.admins_row{
				margin-left: 0px;
				margin-right: 0px;
			}
			.u_name > h4{
				font-size: 14px;
    			font-weight: 600!important;
			}
			.box-col{
				margin: 20px 0;
			}
			.continue {
				background: #af9500;
				color: #fff!important;
			}
			.portlet-title {
				background-color: #003924!important;
			}
			.alert.alert-block.fade.in {
				background: #af9500;
				color: #fff;
				letter-spacing: 3px;
			}
			.info_text{
				font-weight: 600;
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
                <div class="col-md-12">
					<div class="portlet box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cogs"></i>Project details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Projects Description</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Project Type</th>
													<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Bid Submission Deadline</th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Bid Opening Date &amp; Time</th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Approve Budget Cost</th>

                                                </tr>
                                            </thead>
                                            <tbody class="projects_data">
                                                <!-- <tr>
                                                    <td><?php echo $projects_description; ?></td>
                                                    <td><?php echo $projects_type; ?></td>
													<td><?php echo $submission_deadline; ?></td>
                                                    <td><?php echo $opening_date; ?></td>
                                                    <td>₱ <?php echo $approve_budget_cost ?></td>
                                                </tr>  -->
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
					
					<div class="portlet box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cogs"></i>Bidders
                                </div>
                            </div>
                            <div class="portlet-body">
								<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
									<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending">#</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Company Name</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Date & Time Submitted</th>
											</tr>
										</thead>
										<tbody class="bidders_data">
										
										</tbody>
									</table>

								</div>
							</div>
					</div>

                    <div class="alert alert-block fade in">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="info_text" style="margin-bottom: 0px; font-size: 14px;"><i class="fa fa-exclamation-triangle"></i> Bid and Awards Committe(BAC) and Technical Working Group(TWG) head should decript the key to proceed</h4>  
                    </div>
                    <div class="portlet box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Bid Openers
                            </div>
                        </div>
						
						<div class="portlet-body row admins_row">
							<div class="openers_data">

							</div>
						</div>
                    </div>
					<!-- END ALERTS PORTLET-->
				</div>
					</div>
				</div>
		<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

<?php
	$this->load->view('BAC/layouts/quick_sidebar');
	$this->load->view('BAC/layouts/footer');
?>												


<script  type="text/javascript">
	jQuery(window).load(function() {

		var maxHeight = 0;
		jQuery('div.bid-opener-box-body').each(function(){
			var thisH = $(this).innerHeight();
			if (thisH > maxHeight) { 
				maxHeight = thisH; 
			}
		});
		jQuery('div.bid-opener-box-body').height(maxHeight);
	});
</script>
<script>
		jQuery(document).ready(function() {
		// get data ajax

		//get project details
		jQuery.ajax({
			type  : 'get',
			url   : '<?php echo site_url('BidOpeningController/show_project_details')?>',
			async : true,
			success : function(data){
					$('.projects_data').html(data);
				
			}
		});


		//show bidder
		setInterval(function(){ 
			
			$( document ).ready(function() {
				$.ajax({
					type  : 'get',
					url   : '<?php echo base_url('BidOpeningController/bidder_show')?>/<?php echo $session_projects_id ?>',
					async : true,
					success : function(data){
							$('.bidders_data').html(data);
						
					}
				});
			});
		}, 100);
		
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $session_projects_id ?>',
			async : true,
			success : function(data){
				console.log("ok");
				$('.openers_data').html(data);
				jQuery('#decryptForm').on('submit',function(e){
					e.preventDefault();

					var p_opener_id = $('#project_openers_id').val();
					var opener_id = $('#opener_id').val();
					var project_id = $('#project_id').val();

					var ajaxurl = "<?php echo site_url();?>BidOpeningController/decrypt_project";

					var data = { 
								project_openers_id: p_opener_id,
								decrypt_status: 1,
								users_user_id: opener_id,
								projects_projects_id: project_id
							};

					jQuery.post(ajaxurl, data, function(response) {

						jQuery('.decrypt .refresh_icon').addClass("fa fa-spinner fa-spin");
						
						$.ajax({
							type  : 'get',
							url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $session_projects_id ?>',
							async : true,
							success : function(data){
								setTimeout(function(){
									jQuery('.decrypt .refresh_icon').removeClass("fa fa-spinner fa-spin");
									swal("Unlock!", "Project has been Unlock!", "success");
									$('.openers_data').html(data);
								}, 3000);	
								
							}
						});
					}).fail(function(xhr, status, error) {
							console.log(status);
							console.log(error);
					});
				});
			}
		});

		setInterval(function(){ 
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $session_projects_id ?>',
				async : true,
				success : function(data){
					setTimeout(function(){
						$('.openers_data').html(data);
					}, 3000);	
					
				}
			});
		}, 5000);
		console.log("ok2");
	});

	

	// loading button
	jQuery('.buttonload').click(function(){
		jQuery('.buttonload .refresh_icon').addClass("fa fa-refresh fa-spin")

		setTimeout(function(){
			jQuery('.buttonload .refresh_icon').removeClass("fa fa-refresh fa-spin")
		}, 1000);
	});
</script>
		