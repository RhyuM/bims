<?php 
	$this->load->view('BIDDER/layouts/head');
	$this->load->view('BIDDER/layouts/header');
	// $this->load->view('BAC/layouts/sidebar');
 ?>
 
 <style>
	.portlet-title {
		background-color: #003924!important;
	}
    .description_text{
		font-size: 14px;
	}
	.file_input{
		width: 50%;
		margin: auto;
	}
    .input-block{
		text-align: center;
	}
    .toLeft{
        float: left;
    }
    .toRight{
        float: right;
    }
    .projectShow{
        width: 50%;
        margin: auto;
    }
 </style>
 

 <div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->

			<ul class="page-sidebar-menu page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="dashboard">
					<a href="/bims/page/bidder.html">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="user_management">
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">User Management</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="#">
							My Account</a>
						</li>
						<li class="">
							<a href="/bims/usermanagement/my-documents">
							My Documents</a>
						</li>
					</ul>
				</li>
				<li class="active open">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class=" title">Bid Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="#">
							Search Active Projects</a>
						</li>
						<li class="active">
							<a href="/bims/bidderbidmanagement/list-of-projects">
							New Projects</a>
						</li>
						<li class="">
							<a href="#">
							My Active Bids</a>
						</li>
						<li class="">
							<a href="#">
							Bid Opening(Live)</a>
						</li>
						<li class="">
							<a href="#">
							My Bid History</a>
						</li>
						<li class="">
							<a href="#">
							My Withdrawn Bids</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Pos Award Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="#">
							Awards Declaration</a>
						</li>
					</ul>
				</li>

			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	
	

 <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Bid Management
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
            <div class="row">
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
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Bid Opening Date &amp; Time</th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Approve Budget Cost</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $projects_description; ?></td>
                                                    <td><?php echo $projects_type; ?></td>
                                                    <td><?php echo $opening_date; ?></td>
                                                    <td>₱ <?php echo $approve_budget_cost ?></td>
                                                </tr> 
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>

					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Financial Documents
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
						
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Description</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Document File</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Action</th>

										</tr>
									</thead>
									<tbody class="table_data" >
										<tr>
											<td class="financial_description">Financial Bid Form</td>
											<td class="financial_bid_file"><p>empty!</p></td>
											<td style="vertical-align: middle;">
												<button class="upload_btn" data-d_id="Financial Bid Form">Add New File</button>
												<button class="upload_btn" data-d_id="Financial Bid Form">Edit</button>
											</td>
										</tr>
										<tr>
											<td class="financial_description">Bill Of Quantities</td>
											<td>empty!</td>
											<td style="vertical-align: middle;">
												<button class="upload_btn" data-d_id="Bill Of Quantities">Add New File</button>
												<button class="upload_btn" data-d_id="Bill Of Quantities">Edit</button>
											</td>
										</tr>
										<tr>
											<td class="financial_description">Detailed Estimates</td>
											<td>empty!</td>
											<td style="vertical-align: middle;">
												<button class="upload_btn" data-d_id="Detailed Estimates">Add New File</button>
												<button class="upload_btn" data-d_id="Detailed Estimates">Edit</button>
											</td>
										</tr>
										<tr>
											<td class="financial_description">Cash Flow By Quarter</td>
											<td>empty!</td>
											<td style="vertical-align: middle;">
												<button class="upload_btn" data-d_id="Cash Flow By Quarter">Add New File</button>
												<button class="upload_btn" data-d_id="Cash Flow By Quarter">Edit</button>
											</td>
										</tr>

                                        
									</tbody>
                                    
								</table>

							</div>
                            <div class="continue" style="text-align: center; margin-top: 30px;  margin-bottom: 20px;">
                                <button>SUBMIT BID</button>
                            <div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

			<!-- modal for upload project -->
			<div id="upload_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">Upload Financial Documents</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								
								<form class="form-horizontal contact-form" id="upload_docs">
									<div class="form-body" style="margin-bottom: 20px;">
										<div class="input-block">
                                            <label style="font-weight: 600;">Description</label>
											<p class="description_text"></p>
											<input type="hidden" name="financialdesc" class="hide_dec"/>
                                            <input type="hidden" name="projects_id" value="<?php echo $projects_id; ?>"/>
                                            
											<input type="file" class="file_input form-control" name="file" required>
										</div>
									</div>
							
									<div class="form-actions">
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
			</div>
			<!-- modal end -->
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

 
	<?php 
		$this->load->view('BIDDER/layouts/quick_sidebar');
		$this->load->view('BIDDER/layouts/footer');
	?>


<script>
        jQuery(document).ready(function() {

			// get data from project table
			// $.ajax({
			// 	type  : 'get',
			// 	url   : '<?php echo base_url('BidderBidManagementController/ajax_table_projects_show')?>',
			// 	async : true,
			// 	success : function(data){
					
			// 		$('.table_data').html(data);
			// 	}
			// });

            $('#upload_docs').on('submit',function(e){
				e.preventDefault();

				$.ajax({
					url: "<?php echo base_url(); ?>BidderBidManagementController/insertFinancialDocs",
					type: "POST",
					// data: regdata,
					data:new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					success: function(response){
						alert($('input[type=file]').val());
						
					}
				});
			});

			// show modal and assign value to inputs
			$('.table_data').on('click','.upload_btn',function(){
				$('#upload_modal').modal('toggle');
				$(".description_text").text($(this).data('d_id'));
				$(".hide_dec").val($(this).data('d_id'));
			});
        });
	</script>