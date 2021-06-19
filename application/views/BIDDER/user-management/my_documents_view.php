<?php 
	$this->load->view('BIDDER/layouts/head');
	$this->load->view('BIDDER/layouts/header');
	// $this->load->view('BAC/layouts/sidebar');
 ?>
 
 <style>
	.portlet-title {
		background-color: #003924!important;
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
				<li class="active open user_management">
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
						<li class="active">
							<a href="/bims/usermanagement/my-documents">
							My Documents</a>
						</li>
					</ul>
				</li>
				<li class="">
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
						<li class="">
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
			User Management
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
								<i class="fa fa-globe"></i>My Documents
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

							<div class="row">
									<div class="col-md-12">
										<h4>Technical Documents</h4>

										<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
											<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
												<thead>
													<tr role="row">
														<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" >#</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email" >Description</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" >Document File</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" >Action</th>
													</tr>
												</thead>
												<tbody class="table_data" >
												<tr>
													<td class="sorting_1">1</td>
													<td class="Tech_description">DTI</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="DTI">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">2</td>
													<td class="Tech_description">Valid and current Mayor’s permit/municipal license</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Valid and current Mayor’s permit/municipal license">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">3</td>
													<td class="Tech_description">Tax Clearance</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Tax Clearance">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">4</td>
													<td class="Tech_description">Statement Completed Government and Private Construction Contract</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Statement Completed Government and Private Construction Contract">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">5</td>
													<td class="Tech_description">Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">6</td>
													<td class="Tech_description">Valid PCAB license</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Valid PCAB license">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">7</td>
													<td class="Tech_description">Audited financial statements and current assets and liabilities</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Audited financial statements and current assets and liabilities">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">8</td>
													<td class="Tech_description">Net Financial Contracting Capacity (NFCC)</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Net Financial Contracting Capacity (NFCC)">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">9</td>
													<td class="Tech_description">Bid Security/Bid Securing Declaration</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Bid Security/Bid Securing Declaration">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">10</td>
													<td class="Tech_description">Contractor’s Organizational Chart for the contract</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Contractor’s Organizational Chart for the contract">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">11</td>
													<td class="Tech_description">List of Qualification of Key Personnel Proposed to be Assigned to the Contract</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="List of Qualification of Key Personnel Proposed to be Assigned to the Contract">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">12</td>
													<td class="Tech_description">List of Equipment, Owned or Leased and/or under purchased agreements</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="List of Equipment, Owned or Leased and/or under purchased agreements">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">13</td>
													<td class="Tech_description">Omnibus Sworn Statement</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Omnibus Sworn Statement">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">14</td>
													<td class="Tech_description">Affidavit of Site Inspection</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Affidavit of Site Inspection">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">15</td>
													<td class="Tech_description">PhilGEPS Registration Certificate</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="PhilGEPS Registration Certificate">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">16</td>
													<td class="Tech_description">Safety and Health Program</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Safety and Health Program">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">17</td>
													<td class="Tech_description">Income Tax Return (ITR)</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Income Tax Return (ITR)">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">18</td>
													<td class="Tech_description">Construction Method</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Construction Method">upload</a></td>
												</tr>
												<tr>
													<td class="sorting_1">19</td>
													<td class="Tech_description">Equipment Utilization Schedule</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Equipment Utilization Schedule">upload</a></td>
												</tr>
												
												<tr>
													<td class="sorting_1">20</td>
													<td class="Tech_description">Manpower Utilization Schedule</td>
													<td>empty!</td>
													<td><a class="upload_btn" data-d_id="Manpower Utilization Schedule">upload</a></td>
												</tr>

												</tbody>
											</table>

										</div>
									</div>
							</div>


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
							<h4 style="font-weight: 600;" class="modal-title">Upload Technical Documents</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								
								<form class="form-horizontal contact-form" id="upload_docs">
									<div class="form-body" style="margin-bottom: 20px;">
										<div class="input-block">
											<label for="">Description</label>
											<p class="description_text"></p>
											<input type="hidden" name="techdesc" class="hide_dec"/>
											<input type="file" class="form-control" name="file" required>
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
		$this->load->view('BIDDER/layouts/quick_sidebar');
		$this->load->view('BIDDER/layouts/footer');
	?>


<script>
        jQuery(document).ready(function() {


			$('#upload_docs').on('submit',function(e){
				e.preventDefault();

				$.ajax({
					url: "<?php echo base_url(); ?>BidderUserManagementController/inserttechdocs",
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

			})

			// $.ajax({
			// 	type  : 'get',
			// 	url   : '<?php echo base_url('BidderUserManagementController/ajax_table_documents_show')?>',
			// 	async : true,
			// 	success : function(data){
					
			// 		$('.table_data').html(data);
			// 	}
			// });


			// show modal and assign value to inputs
			$('.table_data').on('click','.upload_btn',function(){

				$('#upload_modal').modal('toggle');
				$(".description_text").text($(this).data('d_id'));
				$(".hide_dec").val($(this).data('d_id'));
			});
		});
	</script>