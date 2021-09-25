<?php 
     $this->load->view('BAC/layouts/head');
	 $this->load->view('BAC/layouts/header');
	 $this->load->view('BAC/layouts/sidebar');

	 $session_projects_id = $this->session->userdata("projects_id");
	 $session_bidder_id = $this->session->userdata("session_bidder_id");

	 
	 echo '<script> console.log("'.$session_projects_id.'")</script>';
	 echo '<script> console.log("bidder '.$session_bidder_id.'")</script>';
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
				letter-spacing: 4px;
			}
			.info_text{
				font-weight: 600;
			}

			.evaluate-button {
				background: #af9500;
				color: #fff!important;
			}

			/* radio button css */
			.check-button label:hover::before{
				background-color:  #005841;
			}
			
			.check-button{
				display: inline;
			}

			.radio-custom {
				opacity: 0;
				position: absolute;   
			}

			.radio-custom, .radio-custom-label {
				display: inline-block;
				vertical-align: middle;
				margin: 5px;
				cursor: pointer;
			}

			.radio-custom-label {
				position: relative;
			}

			.radio-custom + .radio-custom-label:before {
				content: '';
				background: #fff;
				border: 2px solid #ddd;
				display: inline-block;
				vertical-align: middle;
				width: 25px;
				height: 25px;
				padding: 2px;
				margin-right: 10px;
				text-align: center;
			}


			.radio-custom + .radio-custom-label:before {
				border-radius: 50%;
			}

			.radio-custom:checked + .radio-custom-label:before {
				content: "\f00c";
				font-family: 'FontAwesome';
				color: #af9500;
			}

			.radio-custom:focus + .radio-custom-label {
			outline: 1px solid #ddd;
			}
			.submit-button{
				text-align: right;
			}

			.button-div{
				text-align: right;
    			margin: auto 5%;
			}

			@media (min-width: 768px){
				.modal-dialog {
					width: 80%;
					margin: 30px auto;
				}
			}
		</style>



	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Financial Evaluation
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
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Bid Submission Deadline</th>
															<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Bid Opening Date &amp; Time</th>
															<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Approve Budget Cost</th>

														</tr>
													</thead>
													<tbody class="projects_data">

													</tbody>
													
												</table>
											</div>
										</div>
									</div>
							</div>

							<div class="portlet box">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-globe"></i>FINANCIAL DOCUMENTS
									</div>
									
								</div>
								<div class="portlet-body">
									<div class="table-toolbar">
										<div class="row">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												
											</div>
										</div>
									</div>
									
										<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="dataTables_length" id="sample_1_length">
														<label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div id="sample_1_filter" class="dataTables_filter">
														<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label>
													</div>
												</div>
											</div>
											<form id="financial_checklist_form" method="post">
												<div class="table-scrollable">
													
													
													<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
														<thead>
															<tr role="row">
																<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Description</th>
																<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Document File</th>
																<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending">Action/Findings</th>
															</tr>
														</thead>
														<tbody class="table_data" >
														
														</tbody>
														
													</table>
													
												</div>
												<div class="button-div">
													<button class="btn primary-button submit-button" type="submit">SUBMIT</button>
												</div>
											</form>
										</div>
								</div>
							</div>
							<!-- END ALERTS PORTLET-->
						</div>
					</div>
				</div>

				<!-- modal -->
			<div id="docs_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">FINANCIAL EVALUATION</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
							
							<!-- <object data='http://localhost/bims/assets/uploads/financial-docs/Compro-SA3-FinalProject3.pdf' type="application/pdf" width="100%" height="800"> -->
							
							<object data="http://localhost/bims/assets/uploads/financial-docs/Compro-SA3-FinalProject3.pdf" type="application/pdf" width="100%" height="800">
	
								<embed src="http://localhost/bims/assets/uploads/financial-docs/Compro-SA3-FinalProject3.pdf" type="application/pdf" />
							</object>

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


<script  type="text/javascript">
	
	$( document ).ready(function() {
		$('.table_data').on('click','.img_button',function(){
			$('#docs_modal').modal("toggle");
		});
	});


	$( window ).load(function() {
		jQuery.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/financial_checklist_show')?>/<?php echo $session_bidder_id ?>',
			async : true,
			success : function(data){
					$('.table_data').html(data);
			}
		});
	});

	
	//get project details
	jQuery.ajax({
		type  : 'get',
		url   : '<?php echo base_url('BidOpeningController/show_project_details')?>',
		async : true,
		success : function(data){
				$('.projects_data').html(data);
			
		}
	});

	

	$('#financial_checklist_form').submit(function(event){
        event.preventDefault();

		jQuery.ajax({
			type : 'post',
			url:  '<?php echo base_url('BidOpeningController/insert_financial_findings')?>',
			data : $('#financial_checklist_form').serialize(),
			async : true,
			success : function(response){	
				// console.log(response);
				var json = $.parseJSON(response);
				if (json.status == "success") {
					swal("Successfully", "Financial checklist has ben submitted", "success");
					window.location.href = '<?php echo base_url("bidopening/bids_opened"); ?>/<?php echo $session_projects_id; ?>';
				} 
				else if(json.status == "fail"){

					setTimeout(function(){ 
						window.location.href = '<?php echo base_url("bidopening/bids_opened"); ?>/<?php echo $session_projects_id; ?>';
					}, 1500);
				}
			}
		});
	});
</script>
