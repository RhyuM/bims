   <?php 
	$this->load->view('BAC/layouts/head');
	$this->load->view('BAC/layouts/header');
	$this->load->view('BAC/layouts/sidebar');
   ?>
   

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Projects Management
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
								<i class="fa fa-globe"></i>Projects
							</div>
						</div>
						
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab" aria-expanded="true">
									Scheduled Projects </a>
								</li>
								<li class="">
									<a href="#tab_1_2" data-toggle="tab" aria-expanded="false">
									Pending Projects </a>
								</li>
							</ul>
							
							<div class="tab-content">
								<!-- tab 1 -->
								
								<div class="tab-pane fade active in" id="tab_1_1">
									<h4 style="margin-top: 20px; margin-bottom: 20px; font-weight: 600;">Projects to be open today <?php echo date("F d, Y") ?></h4>
									<div class="portlet-body">
										<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
											<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
												<thead>
													<tr role="row">
														<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending">#</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Description</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Project Type</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Bid Submission Deadline</th>
														<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Bid Opening Date</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Approve Budget Cost</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Status</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">View/Open</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$start = 1;
														foreach ($projects_data as $projects)
														{
															?>
															<tr class="gradeX odd" role="row">
															<?php 
															$data = $projects->opening_date;

															$sched = explode(" ", $data);

															date_default_timezone_set('Asia/Manila');

															if($sched[0] == date('Y/m/d'))
																{?>
																<td class="sorting_1"><?php echo $start++?></td>
																<td><?php echo $projects->projects_description?></td>
																<td><?php echo $projects->projects_type?></td>
																<td><?php echo $projects->submission_deadline?></td>
																<td><?php echo $projects->opening_date?></td>
																<td><?php echo number_format($projects->approve_budget_cost)?></td>
																<td><?php echo $projects->projects_status?></td>
																<td>
																<?php
																		if($sched[2] <= date('HH:mm'))
																		{?>
																			<a class="open_bid" data-project_id="<?php echo $projects->projects_id ?>" href="<?php echo base_url("bidopening/bid_openers") ?>/<?php echo $projects->projects_id ?>">open</a>
																		<?php }?>
																</td>
															<?php }?>
															</tr>
													<?php
														}
														?>
												</tbody>
											</table>
										</div>
										
										</div>
									</div>
								</div>
								<!-- tab 2 -->
								<div class="tab-pane fade" id="tab_1_2">
									<h4 style="margin-top: 20px; margin-bottom: 20px; font-weight: 600;">Projects that are not opened on the specific date.</h4>
									<div class="portlet-body">
											<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
												<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
													<thead>
														<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending">#</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Description</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Category</th>
															<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Bid Opening Date</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Approve Budget Cost</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" >Status</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">View/Open</th>
														</tr>
													</thead>
													<tbody>
														<?php
															foreach ($projects_data as $projects)
															{
																?>
																<tr class="gradeX odd" role="row">
																<?php 
																$data = $projects->opening_date;

																$sched = explode(" ", $data);
																date_default_timezone_set('Asia/Manila');
																?>
																
																<script>
																	var sched = '<?php echo $sched[2]?>';
																	var dateToday = ' <?php echo date('Y/m/d')?>';
																	console.log(sched);
																	console.log(dateToday);
																</script>

																<?php
																if($sched[0] < date('Y/m/d'))
																	{?>
																	<td class="sorting_1"><?php echo $start++ ?></td>
																	<td><?php echo $projects->projects_description ?></td>
																	<td><?php echo $projects->projects_type ?></td>
																	<td><?php echo $projects->opening_date ?></td>
																	<td><?php echo number_format($projects->approve_budget_cost)?></td>
																	<td><?php echo $projects->projects_status?></td>
																	<td>
																		<a class="open_bid" data-project_id="<?php echo $projects->projects_id ?>" href="<?php echo base_url("bidopening/bid_openers") ?>/<?php echo $projects->projects_id ?>">open</a>
																	</td>
																<?php }?>
																</tr>
														<?php
															}
															?>
													</tbody>
												</table>
											</div>
											
											</div>
									</div>
								</div>
							</div>
						</div>
					<!-- END EXAMPLE TABLE PORTLET-->
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

		<script>
			jQuery(".open_bid").click(function(e){
				var p_id = jQuery(this).data('project_id');
				var link = jQuery(this).attr("href");
				e.preventDefault();
				jQuery.ajax({
					type : 'post',
					url:  '<?php echo base_url('BidOpeningController/check_if_project_has_bid')?>',
					data : { 
							projects_id: p_id
							},
					async : true,
					success : function(response){	
						if(response == 0){
							e.preventDefault();
							console.log(response);
							swal("Project Doesn't Have a Bid Yet ");
						}else{
							console.log(response+" n");
							location.href = link;
						}
						
					}
				});
			});
		</script>