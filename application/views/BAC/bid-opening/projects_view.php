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
				<div class="page-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
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
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="remove" data-original-title="" title="">
								</a>
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
														<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" style="width: 287px;">#</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email" style="width: 472px;">Description</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" style="width: 177px;">Project Type</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" style="width: 177px;">Bid Submission Deadline</th>
														<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" style="width: 258px;">Bid Opening Date</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Approve Budget Cost</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Status</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">View/Open</th>
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

															if($sched[0] == date('m/d/Y'))
																{?>
																<td class="sorting_1"><?php echo $start++?></td>
																<td><?php echo $projects->projects_description?></td>
																<td><?php echo $projects->projects_type?></td>
																<td><?php echo $projects->submission_deadline?></td>
																<td><?php echo $projects->opening_date?></td>
																<td><?php echo $projects->approve_budget_cost?></td>
																<td><?php echo $projects->projects_status?></td>
																<td>
																<?php
																		if($sched[2] <= date('HH:mm'))
																		{?>
																			<a href="<?php echo base_url("bidopening/bid_openers") ?>/<?php echo $projects->projects_id ?>">open</a>
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
															<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" style="width: 287px;">#</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email" style="width: 472px;">Description</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" style="width: 177px;">Category</th>
															<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" style="width: 258px;">Bid Opening Date</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Approve Budget Cost</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Status</th>
															<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">View/Open</th>
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
																	var dateToday = ' <?php echo date('m/d/Y')?>';
																	console.log(sched);
																	console.log(dateToday);
																</script>

																<?php
																if($sched[0] < date('m/d/Y'))
																	{?>
																	<td class="sorting_1"><?php echo $start++ ?></td>
																	<td><?php echo $projects->projects_description ?></td>
																	<td><?php echo $projects->projects_type ?></td>
																	<td><?php echo $projects->opening_date ?></td>
																	<td><?php echo $projects->approve_budget_cost;?></td>
																	<td><?php echo $projects->projects_status?></td>
																	<td>
																		<a href="<?php echo base_url("bidopening/bid_openers") ?>/<?php echo $projects->projects_id ?>">open</a>
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