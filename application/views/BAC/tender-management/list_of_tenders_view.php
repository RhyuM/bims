 <?php 
	$this->load->view('BAC/layouts/head');
	$this->load->view('BAC/layouts/header');
	// $this->load->view('BAC/layouts/sidebar');
 ?>
 
 <style>
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
 		form#create_new_tender{
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
					<a href="http://localhost/BIMS/page/staff.html">
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
					<i class="icon-rocket"></i>
					<span class="title">User Management</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="certified_bidder">
							<a href="http://localhost/BIMS/usermanagement/certified-bidder.html">
							List Of Certified Bidder</a>
						</li>
						<li class="new_bidder_entry">
							<a href="http://localhost/BIMS/usermanagement/new-entry.html">
							List Of New Bidder Entry</a>
						</li>
					</ul>
				</li>
				<li class="active open tender_management">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Tender Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="active list_of_tender">
							<a href="http://localhost/BIMS/tendermanagement.html">
							List Of Tenders</a>
						</li>
						<li class="bids_submitted">
							<a href="#">
							Bids Submitted</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Bid Opening</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="http://localhost/BIMS/bidopening.html">
							Tenders</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
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
			Tender Management
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
								<i class="fa fa-globe"></i>List Of Tenders
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
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<!-- <button id="sample_editable_1_new" class="btn green">Add New Tender <i class="fa fa-plus"></i></button> -->
                                            <a href="javascript:void(0);"  id="create_new_tender_button" class="btn green">Create New Tender <i class="fa fa-plus"></i></a>
                                        </div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" style="width: 287px;">#</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email" style="width: 472px;">Description</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" style="width: 177px;">Project Type</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" style="width: 258px;">Bid Opening Date</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Approved Budget Cost</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Status</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 267px;">Action</th>
										</tr>
									</thead>
									<tbody class="table_data" >
									
									</tbody>
								</table>

							</div><div class="row"><div class="col-md-5 col-sm-5"><div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 15 of 25 records</div></div><div class="col-md-7 col-sm-7"><div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate"><ul class="pagination" style="visibility: visible;"><li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li><li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li><li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li></ul></div></div></div></div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

			<!-- modal for create new tender -->
			<div id="create_new_tender" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">CREATE NEW TENDER</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								<form class="form-horizontal contact-form" id="create_new_tender" role="form" method="post">
									<div class="form-body">
										<div class="input-block">
											<label for="">Projects Description</label>
											<input type="text" class="form-control" name="projects_description" id="projects_description" autocomplete="off" required>
										</div>
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Projects Type</label>
											<select class="form-control" name="projects_type" id="projects_type" placeholder="Enter project type" required>
												<option></option>
												<option>Civil Works</option>
												<option>Infrastructure</option>
												<option>Goods</option>
												<option>Service</option>
											</select>
										</div>
									</div>
									
									<div class="input-block">
										<label for="" style="top: -6px; font-size: 16px;">Opening Date</label>
											<input type="text" class="form-control" name="opening_date" id="opening_date" autocomplete="off" value="">
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Approve Budget Cost</label>
											<input type="text" class="form-control"  data-type="currency" name="approve_budget_cost" id="approve_budget_cost"  autocomplete="off" required>
										</div>
									</div>
									<!-- hidden for user -->
									<div class="form-body">
										<div class="input-block">
											<label for="">Status</label>
											<input type="text" class="form-control" name="projects_status" id="projects_status" value="new" readonly>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-12" style="text-align: center;">
												<!-- <input type="hidden" name="projects_id" value="<?php echo $projects_id; ?>" /> -->
												<button type="submit"  class="btn green">Submit</button>
												<a  type="button" data-dismiss="modal" class="btn default">Cancel</a>
											</div>
										</div>
									</div>
								</form>
							</div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
						</div>
						<!-- <div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn default">Close</button>
							<button type="button" class="btn green">Save changes</button>
						</div> -->
					</div>
				</div>
			</div>
			<!-- modal end -->

			<!-- modal for update tender -->
			<div id="update_tender_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">Update</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								
								<form class="form-horizontal contact-form" id="update_tender" role="form" method="post">
									<div class="form-body">
										<div class="input-block">
											<label for="">Projects Description</label>
											<input type="text" class="form-control" name="p_description" id="p_description"  autocomplete="off" required>
										</div>
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Projects Type</label>
											<select class="form-control" name="p_type" id="p_type" placeholder="Enter project type" required>
												<option></option>
												<option>Civil Works</option>
												<option>Infrastructure</option>
												<option>Goods</option>
												<option>Service</option>
											</select>
										</div>
									</div>
									
									<div class="input-block">
										<label for="" style="top: -6px; font-size: 16px;">Opening Date</label>
											<input type="text" class="form-control" name="o_date" id="o_date" autocomplete="off" value="">
									</div>
									<div class="form-body">
										<div class="input-block">
											<label for="">Approve Budget Cost</label>
											<input type="text" class="form-control" data-type="currency" name="abc" id="abc"  autocomplete="off" required>
										</div>
									</div>
									<!-- hidden for user -->
									<div class="form-body">
										<div class="input-block">
											<label for="">Status</label>
											<input type="text" class="form-control" name="p_status" id="p_status" placeholder="Enter project status" value="new" readonly>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-12" style="text-align: center;">
												<input type="hidden" name="projects_id" id="projects_id" class="form-control">
												<button type="submit"  class="btn green">Submit</button>
												<a  type="button" data-dismiss="modal" class="btn default">Cancel</a>
											</div>
										</div>
									</div>
								</form>

							</div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
						</div>
						<!-- <div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn default">Close</button>
							<button type="button" class="btn green">Save changes</button>
						</div> -->
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
<script type="text/javascript">
	$(function() {
		$('input[name="opening_date"],input[name="o_date"]').daterangepicker({
			"autoApply": true,
			"singleDatePicker": true,
			"opens": "center",
			"timePicker": true,
			"timePicker24Hour": true,
			autoUpdateInput: true,
			locale: {
				// format: 'MM/DD/YYYY - hh:mm A'
				format: 'MM/DD/YYYY - HH:mm'
			}
		});
	});
</script>

<script>
        jQuery(document).ready(function() {
            $('#create_new_tender_button').click(function(){
				$('#create_new_tender').modal("toggle");
			});
			// get data from project table
			$.ajax({
				type  : 'get',
				url   : '<?php echo site_url('TenderManagementController/ajax_table_projects_show')?>',
				async : true,
				success : function(data){
					
					$('.table_data').html(data);
				}
			});


            //Add new tender
            jQuery('#create_new_tender').submit('click',function(e){
                e.preventDefault();
                var p_description = $('#projects_description').val();
                var p_type = $('#projects_type').val();
                var o_date = $('#opening_date').val();
                var abc = $('#approve_budget_cost').val();
                var p_status = $('#projects_status').val();

                var ajaxurl = "<?php echo base_url(); ?>TenderManagementController/create";

                var data = { 
                             projects_description: p_description,
                             projects_type: p_type,
							 opening_date: o_date,
							 approve_budget_cost: abc,
							 projects_status: p_status
                        };

                jQuery.post(ajaxurl, data, function(response) {
                    $.ajax({
						type  : 'get',
						url   : '<?php echo site_url('TenderManagementController/ajax_table_projects_show')?>',
						async : true,
						success : function(data){
							
							$('.table_data').html(data);
							$('#create_new_tender').modal('hide');

							// reset to null value
							$('#projects_description').val("");
							$('#projects_type').val("");
							$('#opening_date').val();
							$('#approve_budget_cost').val("");
						}
		
					});
                                                            
                }).fail(function(xhr, status, error) {
                        console.log(status);
                        console.log(error);
                });
            });

        });
	</script>



	<!-- update project -->
	<script>

        jQuery(document).ready(function() {

			// show modal and assign value to inputs
			$('.table_data').on('click','.editRecord',function(){

				$('#update_tender_modal').modal('toggle');

				$("#projects_id").val($(this).data('projects_id'));
				$("#p_description").val($(this).data('projects_description'));
				$("#p_type").val($(this).data('projects_type'));
				$("#o_date").val($(this).data('opening_date'));
				$("#abc").val($(this).data('approve_budget_cost'));
				// just hide for now
				// $("#p_status").val($(this).data('projects_status'));
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
				
			});

            //update
            jQuery('#update_tender').submit('click',function(e){
				e.preventDefault();
				var p_id = $('#projects_id').val();
                var edit_p_description = $('#p_description').val();
                var edit_p_type = $('#p_type').val();
                var edit_o_date = $('#o_date').val();
                var edit_abc = $('#abc').val();
                var edit_p_status = $('#p_status').val();
				
                var ajaxurl = "<?php echo base_url(); ?>TenderManagementController/update";

                var data = { 
							projects_id: p_id,	
							projects_description: edit_p_description,
							projects_type: edit_p_type,
							opening_date: edit_o_date,
							approve_budget_cost: edit_abc,
							projects_status: edit_p_status
						};
						
                jQuery.post(ajaxurl, data, function(response) {
                    $.ajax({
						type  : 'post',
						url   : '<?php echo site_url('TenderManagementController/update')?>',
						async : true,
						success : function(data){
							
							$('.table_data').html(data);
							$.ajax({
								type  : 'post',
								url   : '<?php echo site_url('TenderManagementController/ajax_table_projects_show')?>',
								async : true,
								success : function(data){
									
									$('.table_data').html(data);
									swal("Updated!", "Project has been Updated!", "success");
								}
							});
							$('#update_tender_modal').modal('hide');
						}
		
					});
                                                            
                }).fail(function(xhr, status, error) {
                        console.log(status);
                        console.log(error);
                });
            });

        });
    </script>
		
	<!-- delete ajax -->
	<script> 
	 jQuery(document).ready(function() {
		$('.table_data').on('click','.deleteRecord',function(e){
			e.preventDefault();

			var p_id = $(this).data('projects_id');          

			console.log(p_id+" this is the id");

			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Yes, delete it!',
				closeOnConfirm: true,
				//closeOnCancel: false
			},
			function(){
				
				var ajaxurl = "<?php echo base_url(); ?>TenderManagementController/delete";
				var data = { 
							projects_id: p_id,	
						};
						
				jQuery.post(ajaxurl, data, function(response) {
					$.ajax({
						type  : 'post',
						url   : '<?php echo site_url('TenderManagementController/delete')?>',
						async : true,
						success : function(data){
							swal("Deleted!", "Project has been deleted!", "success");
							// get data from project table
							$.ajax({
								type  : 'get',
								url   : '<?php echo site_url('TenderManagementController/ajax_table_projects_show')?>',
								async : true,
								success : function(data){
									
									$('.table_data').html(data);
								}
							});
						}
						
					});
															
				}).fail(function(xhr, status, error) {
						swal("Unable to delete!");
						
						console.log(status);
						console.log(error);
				});
			});
		});
	});
	</script>

<!-- money format on typing -->
	<script>
	
	// Jquery Dependency

			$("input[data-type='currency']").on({
				keyup: function() {
				formatCurrency($(this));
				},
				blur: function() { 
				formatCurrency($(this), "blur");
				}
			});


			function formatNumber(n) {
			// format number 1000000 to 1,234,567
			return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			}


			function formatCurrency(input, blur) {
			// appends $ to value, validates decimal side
			// and puts cursor back in right position.
			
			// get input value
			var input_val = input.val();
			
			// don't validate empty input
			if (input_val === "") { return; }
			
			// original length
			var original_len = input_val.length;

			// initial caret position 
			var caret_pos = input.prop("selectionStart");
				
			// check for decimal
			if (input_val.indexOf(".") >= 0) {

				// get position of first decimal
				// this prevents multiple decimals from
				// being entered
				var decimal_pos = input_val.indexOf(".");

				// split number by decimal point
				var left_side = input_val.substring(0, decimal_pos);
				var right_side = input_val.substring(decimal_pos);

				// add commas to left side of number
				left_side = formatNumber(left_side);

				// validate right side
				right_side = formatNumber(right_side);
				
				// On blur make sure 2 numbers after decimal
				if (blur === "blur") {
				right_side += "00";
				}
				
				// Limit decimal to only 2 digits
				right_side = right_side.substring(0, 2);

				// join number by .
				input_val = left_side + "." + right_side;

			} else {
				// no decimal entered
				// add commas to number
				// remove all non-digits
				input_val = formatNumber(input_val);
				input_val =  input_val;
				
				// final formatting
				if (blur === "blur") {
				input_val += ".00";
				}
			}
			
			// send updated string to input
			input.val(input_val);

			// put caret back in the right position
			var updated_len = input_val.length;
			caret_pos = updated_len - original_len + caret_pos;
			input[0].setSelectionRange(caret_pos, caret_pos);
			}
	</script>