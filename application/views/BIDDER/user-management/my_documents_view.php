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
	.img_button {
		background: #af9500;
		color: #fff!important;
	}
	/* .table-scrollable {
		overflow-y: scroll;
		max-height: 534px!important;
	} */
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
							<a href="/bims/bidderbidmanagement/my_active_bids">
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
										<h2 style="font-weight: 600;">Technical Documents</h2>
									</div>
									<div class="col-md-6">
										
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col-md-12">
										<div class="table-scrollable">
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
													<tr class="documents_1">
														<td class="sorting_1">1</td>
														<td>DTI</td>
														<td>
															<?php 
																if(!empty($docs1)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs1.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs1)) {
																	echo '<a class="btn replace_btn" data-d_id="DTI">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="DTI">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_2">
														<td class="sorting_1">2</td>
														<td>Valid and current Mayor’s permit/municipal license</td>
														<td class>
															<?php 
																if(!empty($docs2)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs2.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs2)) {
																	echo '<a class="btn replace_btn" data-d_id="Valid and current Mayor’s permit/municipal license">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Valid and current Mayor’s permit/municipal license">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_3">
														<td class="sorting_1">3</td>
														<td>Tax Clearance</td>
														<td>
															<?php 
																if(!empty($docs3)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs3.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}															
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs3)) {
																	echo '<a class="btn replace_btn" data-d_id="Tax Clearance">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Tax Clearance">upload</a>'; 
																}
															?>
														</td>
													</tr>


													<tr class="documents_4">
														<td class="sorting_1">4</td>
														<td>Statement Completed Government and Private Construction Contract</td>
														<td>
															<?php 
																if(!empty($docs4)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs4.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs4)) {
																	echo '<a class="btn replace_btn" data-d_id="Statement Completed Government and Private Construction Contract">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Statement Completed Government and Private Construction Contract">upload</a>'; 
																}
															?>
														</td>
													</tr>


													<tr class="documents_5">
														<td class="sorting_1">5</td>
														<td>Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started</td>
														<td>
															<?php 
																if(!empty($docs5)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs5.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs5)) {
																	echo '<a class="btn replace_btn" data-d_id="Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started">upload</a>'; 
																}
															?>
														</td>		
													</tr>

													<tr class="documents_6">
														<td class="sorting_1">6</td>
														<td>Valid PCAB license</td>
														<td>
															<?php 
																if(!empty($docs6)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs6.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs6)) {
																	echo '<a class="btn replace_btn" data-d_id="Valid PCAB license">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Valid PCAB license">upload</a>'; 
																}
															?>
														</td>	
													</tr>


													<tr class="documents_7">
														<td class="sorting_1">7</td>
														<td>Audited financial statements and current assets and liabilities</td>
														<td>
															<?php 
																if(!empty($docs7)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs7.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs7)) {
																	echo '<a class="btn replace_btn" data-d_id="Audited financial statements and current assets and liabilities">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Audited financial statements and current assets and liabilities">upload</a>'; 
																}
															?>
														</td>	
													</tr>


													<tr class="documents_8">
														<td class="sorting_1">8</td>
														<td>Net Financial Contracting Capacity (NFCC)</td>
														<td>
															<?php 
																if(!empty($docs8)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs8.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs8)) {
																	echo '<a class="btn replace_btn" data-d_id="Net Financial Contracting Capacity (NFCC)">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Net Financial Contracting Capacity (NFCC)">upload</a>'; 
																}
															?>
														</td>	
													</tr>


													<tr class="documents_9">
														<td class="sorting_1">9</td>
														<td>Bid Security/Bid Securing Declaration</td>
														<td>
															<?php 
																if(!empty($docs9)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs9.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs9)) {
																	echo '<a class="btn replace_btn" data-d_id="Bid Security/Bid Securing Declaration">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Bid Security/Bid Securing Declaration">upload</a>'; 
																}
															?>
														</td>
													</tr>


													<tr class="documents_10">
														<td class="sorting_1">10</td>
														<td>Contractor’s Organizational Chart for the contract</td>
														<td>
															<?php 
																if(!empty($docs10)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs10.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs10)) {
																	echo '<a class="btn replace_btn" data-d_id="Contractor’s Organizational Chart for the contract">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Contractor’s Organizational Chart for the contract">upload</a>'; 
																}
															?>
														</td>
													</tr>
													<tr class="documents_11">
														<td class="sorting_1">11</td>
														<td>List of Qualification of Key Personnel Proposed to be Assigned to the Contract</td>
														<td>
															<?php 
																if(!empty($docs11)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs11.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs11)) {
																	echo '<a class="btn replace_btn" data-d_id="List of Qualification of Key Personnel Proposed to be Assigned to the Contract">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="List of Qualification of Key Personnel Proposed to be Assigned to the Contract">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_12">
														<td class="sorting_1">12</td>
														<td>List of Equipment, Owned or Leased and/or under purchased agreements</td>
														<td>
															<?php 
																if(!empty($docs12)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs12.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs12)) {
																	echo '<a class="btn replace_btn" data-d_id="List of Equipment, Owned or Leased and/or under purchased agreements">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="List of Equipment, Owned or Leased and/or under purchased agreements">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_13">
														<td class="sorting_1">13</td>
														<td>Omnibus Sworn Statement</td>
														<td>
															<?php 
																if(!empty($docs13)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs13.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs13)) {
																	echo '<a class="btn replace_btn" data-d_id="Omnibus Sworn Statement">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Omnibus Sworn Statement">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_14">
														<td class="sorting_1">14</td>
														<td>Affidavit of Site Inspection</td>
														<td>
															<?php 
																if(!empty($docs14)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs14.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs14)) {
																	echo '<a class="btn replace_btn" data-d_id="Affidavit of Site Inspection">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Affidavit of Site Inspection">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_15">
														<td class="sorting_1">15</td>
														<td>PhilGEPS Registration Certificate</td>
														<td>
															<?php 
																if(!empty($docs15)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs15.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs15)) {
																	echo '<a class="btn replace_btn" data-d_id="PhilGEPS Registration Certificate">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="PhilGEPS Registration Certificate">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_16">
														<td class="sorting_1">16</td>
														<td>Safety and Health Program</td>
														<td>
															<?php 
																if(!empty($docs16)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs16.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs16)) {
																	echo '<a class="btn replace_btn" data-d_id="Safety and Health Program">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Safety and Health Program">upload</a>'; 
																}
															?>
														</td>
													</tr>
													
													<tr class="documents_17">
														<td class="sorting_1">17</td>
														<td>Income Tax Return (ITR)</td>
														<td>
															<?php 
																if(!empty($docs17)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs17.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs17)) {
																	echo '<a class="btn replace_btn" data-d_id="Income Tax Return (ITR)">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Income Tax Return (ITR)">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_18">
														<td class="sorting_1">18</td>
														<td>Construction Method</td>
														<td>
															<?php 
																if(!empty($docs18)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs18.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs18)) {
																	echo '<a class="btn replace_btn" data-d_id="Construction Method">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Construction Method">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_19">
														<td class="sorting_1">19</td>
														<td>Equipment Utilization Schedule</td>
														<td>
															<?php 
																if(!empty($docs19)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs19.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs19)) {
																	echo '<a class="btn replace_btn" data-d_id="Equipment Utilization Schedule">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Equipment Utilization Schedule">upload</a>'; 
																}
															?>
														</td>
													</tr>

													<tr class="documents_20">
														<td class="sorting_1">20</td>
														<td>Manpower Utilization Schedule</td>
														<td>
															<?php 
																if(!empty($docs20)) {
																	echo '<a class="btn img_button"href='.base_url()."".$docs20.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a>';
																}
																
															?>
														</td>
														<td>
															<?php 
																if(!empty($docs20)) {
																	echo '<a class="btn replace_btn" data-d_id="Manpower Utilization Schedule">replace</a>';
																}
																else{ 
																	echo '<a class="btn upload_btn" data-d_id="Manpower Utilization Schedule">upload</a>'; 
																}
															?>
														</td>
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

			<!-- modal for upload documents -->
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
											<label style="font-weight: 600;">Description</label>
											<p class="description_text"></p>
											<input type="hidden" name="techdesc" class="hide_dec"/>
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
			<!-- modal end -->

			<!-- modal for replace documents -->
			<div id="replace_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 style="font-weight: 600;" class="modal-title">Upload Technical Documents</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								
								<form class="form-horizontal contact-form" id="replace_docs">
									<div class="form-body" style="margin-bottom: 20px;">
										<div class="input-block">
											<label style="font-weight: 600;">Description</label>
											<p class="description_text"></p>
											<input type="hidden" name="techdesc" class="hide_dec"/>
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

			// show modal and assign value to inputs
			$('.table_data').on('click','.upload_btn',function(){
				$('#upload_modal').modal('toggle');
				$(".description_text").text($(this).data('d_id'));
				$(".hide_dec").val($(this).data('d_id'));
			});

			// show modal and assign value to inputs
			$('.table_data').on('click','.replace_btn',function(){
				$('#replace_modal').modal('toggle');
				$(".description_text").text($(this).data('d_id'));
				$(".hide_dec").val($(this).data('d_id'));
			});

			$('#upload_docs').on('submit',function(e){
				e.preventDefault();

				$.ajax({
					url: "<?php echo base_url(); ?>BidderUserManagementController/inserttechdocs",
					type: "POST",
					data:new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					success: function(response){
							// alert($('input[type=file]').val());
							$('#upload_modal').modal('toggle');
							swal("Added!", "File has been Added!", "success");
							console.log(response);
							
							if(response == "DTI")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_1_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_1').html(data);
									}
								});
							}

							if(response == "Valid and current Mayor’s permit/municipal license")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_2_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_2').html(data);
									}
								});
							}
							if(response == "Tax Clearance")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_3_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_3').html(data);
									}
								});
							}
							if(response == "Statement Completed Government and Private Construction Contract")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_4_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_4').html(data);
									}
								});
							}
							if(response == "Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_5_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_5').html(data);
									}
								});
							}

							if(response == "Valid PCAB license")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_6_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_6').html(data);
									}
								});
							}

							if(response == "Audited financial statements and current assets and liabilities")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_7_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_7').html(data);
									}
								});
							}
							if(response == "Net Financial Contracting Capacity (NFCC)")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_8_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_8').html(data);
									}
								});
							}

							if(response == "Bid Security/Bid Securing Declaration")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_9_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_9').html(data);
									}
								});
							}

							if(response == "Contractor’s Organizational Chart for the contract")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_10_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_10').html(data);
									}
								});
							}

							if(response == "List of Qualification of Key Personnel Proposed to be Assigned to the Contract")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_11_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_11').html(data);
									}
								});
							}

							if(response == "List of Equipment, Owned or Leased and/or under purchased agreements")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_12_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_12').html(data);
									}
								});
							}

							if(response == "Omnibus Sworn Statement")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_13_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_13').html(data);
									}
								});
							}

							if(response == "Affidavit of Site Inspection")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_14_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_14').html(data);
									}
								});
							}

							if(response == "PhilGEPS Registration Certificate")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_15_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_15').html(data);
									}
								});
							}

							if(response == "Safety and Health Program")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_16_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_16').html(data);
									}
								});
							}

							if(response == "Income Tax Return (ITR)")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_17_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_17').html(data);
									}
								});
							}

							if(response == "Construction Method")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_18_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_18').html(data);
									}
								});
							}

							if(response == "Equipment Utilization Schedule")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_19_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_19').html(data);
									}
								});
							}

							if(response == "Manpower Utilization Schedule")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_20_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_20').html(data);
									}
								});
							}
					}
				});
			});
			$('#replace_docs').on('submit',function(e){
				e.preventDefault();

				$.ajax({
					url: "<?php echo base_url(); ?>BidderUserManagementController/updatetechdocs",
					type: "POST",
					data:new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					success: function(response){
							// alert($('input[type=file]').val());
							$('#replace_modal').modal('toggle');
							swal("Added!", "File has been Added!", "success");
							console.log(response);
							
							if(response == "DTI")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_1_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_1').html(data);
									}
								});
							}

							if(response == "Valid and current Mayor’s permit/municipal license")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_2_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_2').html(data);
									}
								});
							}
							if(response == "Tax Clearance")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_3_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_3').html(data);
									}
								});
							}
							if(response == "Statement Completed Government and Private Construction Contract")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_4_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_4').html(data);
									}
								});
							}
							if(response == "Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_5_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_5').html(data);
									}
								});
							}

							if(response == "Valid PCAB license")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_6_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_6').html(data);
									}
								});
							}

							if(response == "Audited financial statements and current assets and liabilities")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_7_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_7').html(data);
									}
								});
							}
							if(response == "Net Financial Contracting Capacity (NFCC)")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_8_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_8').html(data);
									}
								});
							}

							if(response == "Bid Security/Bid Securing Declaration")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_9_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_9').html(data);
									}
								});
							}

							if(response == "Contractor’s Organizational Chart for the contract")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_10_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_10').html(data);
									}
								});
							}

							if(response == "List of Qualification of Key Personnel Proposed to be Assigned to the Contract")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_11_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_11').html(data);
									}
								});
							}

							if(response == "List of Equipment, Owned or Leased and/or under purchased agreements")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_12_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_12').html(data);
									}
								});
							}

							if(response == "Omnibus Sworn Statement")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_13_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_13').html(data);
									}
								});
							}

							if(response == "Affidavit of Site Inspection")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_14_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_14').html(data);
									}
								});
							}

							if(response == "PhilGEPS Registration Certificate")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_15_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_15').html(data);
									}
								});
							}

							if(response == "Safety and Health Program")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_16_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_16').html(data);
									}
								});
							}

							if(response == "Income Tax Return (ITR)")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_17_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_17').html(data);
									}
								});
							}

							if(response == "Construction Method")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_18_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_18').html(data);
									}
								});
							}

							if(response == "Equipment Utilization Schedule")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_19_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_19').html(data);
									}
								});
							}

							if(response == "Manpower Utilization Schedule")
							{
								$.ajax({
									type  : 'get',
									url   : '<?php echo base_url('BidderUserManagementController/technical_documents_20_show')?>',
									async : true,
									success : function(data){
										
										$('.documents_20').html(data);
									}
								});
							}
					}
				});
			});
		});
	</script>