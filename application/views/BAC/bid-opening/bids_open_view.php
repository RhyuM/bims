<?php 
     $this->load->view('BAC/layouts/head');
	 $this->load->view('BAC/layouts/header');
	 $this->load->view('BAC/layouts/sidebar');
	 $session_projects_id = $this->session->userdata("projects_id");

?>  
	   <style>
		   .bids_row {
				display: flex;
				gap: 20px;
				flex-direction: initial;
			}

			div#qualified_bids,
			div#disqualified_bids {
				width: 50%;
			}
		   .button_green{
				background: #005841!important;
			}
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

							<div id="all_bids" class="portlet box">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-globe"></i>All Bids
									</div>
								</div>
								<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
											<thead>
												<tr role="row">
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Company Name</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Bid Price</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Date & Time Submitted</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Action</th>
												</tr>
											</thead>
											<tbody class="table_data" >
											
											</tbody>
										</table>
								</div>
							</div>
							<div class="bids_row">
								<div id="qualified_bids" class="portlet box">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-globe"></i>Qualified Bids
										</div>
									</div>
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
											<thead>
												<tr role="row">
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Company Name</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Rank</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Bid Price</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Action</th>
												</tr>
											</thead>
											<tbody class="qualified_bids" >
											
											</tbody>
										</table>
									</div>
								</div>
								<div id="disqualified_bids" class="portlet box">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-globe"></i>Disqualified Bids
										</div>
									</div>
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
											<thead>
												<tr role="row">
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Company Name</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Bid Price</th>
													<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Action</th>
												</tr>
											</thead>
											<tbody class="disqualified_bids" >
											
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="lcb_container">
							
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
$( document ).ready(function() {

	//get project details
	jQuery.ajax({
		type  : 'get',
		url   : '<?php echo site_url('BidOpeningController/show_project_details')?>',
		async : true,
		success : function(data){
				$('.projects_data').html(data);
			
		}
	});

    $.ajax({
		type  : 'get',
		url   : '<?php echo base_url('BidOpeningController/bids_show')?>/<?php echo $session_projects_id ?>',
		async : true,
		success : function(data){
			$('.table_data').html(data);
			setInterval(function(){
				$('.table_data').html(data);
			}, 1500);	
			
		}
	});
	setInterval(function(){
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/qualified_bids_show')?>/<?php echo $session_projects_id ?>',
			async : true,
			success : function(data){
				$('.qualified_bids').html(data);		
				
			}
		});
	}, 500);

	setInterval(function(){
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/disqualified_bids_show')?>/<?php echo $session_projects_id ?>',
			async : true,
			success : function(data){
				$('.disqualified_bids').html(data);
			}
		});
	}, 500);
	setInterval(function(){
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/lowest_calculated_bid')?>/<?php echo $session_projects_id ?>',
			async : true,
			success : function(data){
				$('#lcb_container').html(data);
			}
		});
	}, 500);

	setInterval(function(){
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/check_if_lowest_calculated_bid')?>',
			async : true,
			success : function(data){
				console.log('success '+ data)
			}
		});
	},1500);	
	
});

</script>
