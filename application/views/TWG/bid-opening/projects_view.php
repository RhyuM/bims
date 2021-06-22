   <?php 
	$this->load->view('BAC/layouts/head');
	$this->load->view('BAC/layouts/header');
	// $this->load->view('BAC/layouts/sidebar');
   ?>
   
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
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
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
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
				<li class="start dashboard">
					<a href="http://localhost/bims/page/staff.html">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="announcement">
					<a href="javascript:;">
					<i class="fas fa fa-bullhorn"></i>
					<span class="title">Announcement</span>
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
						<li class="certified_bidder">
							<a href="http://localhost/bims/usermanagement/certified-bidder.html">
							List Of Certified Bidder</a>
						</li>
						<li class="new_bidder_entry">
							<a href="http://localhost/bims/usermanagement/new-entry.html">
							List Of New Bidder Entry</a>
						</li>
					</ul>
				</li>

				<li class="active open">
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Bid Opening</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="active">
							<a href="http://localhost/bims/bidopening.html">
							Projects</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-bar-chart"></i>
					<span class="title">Bid Evaluation</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Technical Evaluation</a>
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
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Projects Management
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
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
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" style="width: 177px;">Category</th>
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
																<td><?php echo $projects->opening_date?></td>
																<td><?php echo $projects->approve_budget_cost?></td>
																<td><?php echo $projects->projects_status?></td>
																<td>
																<?php
																		if($sched[2] <= date('HH:mm'))
																		{?>
																			<a href="<?php echo base_url("BidOpeningController/bid_openers") ?>/<?php echo $projects->projects_id ?>">open</a>
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
										<div class="row">
											<div class="col-md-5 col-sm-5">
												<div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 15 of 25 records</div>
											</div>
												<div class="col-md-7 col-sm-7">
													<div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
														<ul class="pagination" style="visibility: visible;">
															<li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li>
															<li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
															<li class="active"><a href="#">1</a></li><li><a href="#">2</a></li>
															<li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
															<li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
														</ul>
													</div>
												</div>
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
																		<a href="<?php echo base_url("BidOpeningController/bid_openers") ?>/<?php echo $projects->projects_id ?>">open</a>
																	</td>
																<?php }?>
																</tr>
														<?php
															}
															?>
													</tbody>
												</table>
											</div>
											<div class="row">
												<div class="col-md-5 col-sm-5">
													<div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 15 of 25 records</div>
												</div>
													<div class="col-md-7 col-sm-7">
														<div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
															<ul class="pagination" style="visibility: visible;">
																<li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li>
																<li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
																<li class="active"><a href="#">1</a></li><li><a href="#">2</a></li>
																<li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
																<li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
															</ul>
														</div>
													</div>
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