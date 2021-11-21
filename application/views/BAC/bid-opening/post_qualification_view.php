<?php 
     $this->load->view('BAC/layouts/head');
	 $this->load->view('BAC/layouts/header');
	 $this->load->view('BAC/layouts/sidebar');

	 $session_projects_id = $this->session->userdata("projects_id");
	 $session_bidder_id = $this->session->userdata("session_bidder_id");
	$session_bids_id = $this->session->userdata("session_bids_id");

		echo '<script> console.log("'.$session_bids_id.'")</script>';
	 echo '<script> console.log("'.$session_bidder_id.'")</script>';
	 echo '<script> console.log("'.$session_bidder_id.'")</script>';
?>  
<style>
	.modal-dialog {
		width: 60%;
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

	a.btn.findings_button {
		background: #af9500;
		color: #fff;
	}
	.input-block {
		text-align: center;
	}
	.file_input {
		width: 50%;
		margin: auto;
	}
	.description_title {
		font-size: 20px;
		font-weight: 700;
	}
	.modal-body {
		position: relative;
		padding: 40px 15px;
	}
	td.passed {
		color: #005841;
		font-weight: 600;
	}
	td.failed {
		color: #f3565d;
		font-weight: 600;
	}
</style>



	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Post Qualification
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
										<i class="fa fa-globe"></i>POST QUALIFICATION
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
											<form id="technical_checklist_form" method="post">
												<div class="table-scrollable">
													
													
													<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
														<thead>
															<tr role="row">
																<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Description</th>
																<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending">Findings</th>
															</tr>
														</thead>
														<tbody class="table_data" >
															<tr class="documents_1">
																<td class="description_name">DTI Business Name Registration of SEC</td>
																<?php 
																	if(strlen($docs1)) {
																		$findings = $docs1;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_2">
																<td class="description_name">Business Permit</td>
																<?php 
																	if(strlen($docs2)) {
																		$findings = $docs2;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_3">
																<td class="description_name">Tax Identification</td>
																<?php 
																	if(strlen($docs3)) {
																		$findings = $docs3;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_4">
																<td class="description_name">Statement of Non-Blacklisted</td>
																<?php 
																	if(strlen($docs4)) {
																		$findings = $docs4;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_5">
																<td class="description_name">Certification of No-Relationship</td>
																<?php 
																	if(strlen($docs5)) {
																		$findings = $docs5;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_6">
																<td class="description_name">Valid joint venture agreement</td>
																<?php 
																	if(strlen($docs6)) {
																		$findings = $docs6;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_7">
																<td class="description_name">Authorizing BAC to verify statements</td>
																<?php 
																	if(strlen($docs7)) {
																		$findings = $docs7;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_8">
																<td class="description_name">On-going and awarded contracts</td>
																<?php 
																	if(strlen($docs8)) {
																		$findings = $docs8;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_9">
																<td class="description_name">Completed similar contracts</td>
																<?php 
																	if(strlen($docs9)) {
																		$findings = $docs9;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>


															<tr class="documents_10">
																<td class="description_name">Copies of end-user’s acceptance letters for completed contracts</td>
																<?php 
																	if(strlen($docs10)) {
																		$findings = $docs10;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>
															<tr class="documents_11">
																<td class="description_name">Specification of whether or not the prospective bidder is a manufacturer, supplier or distributor</td>
																<?php 
																	if(strlen($docs11)) {
																		$findings = $docs11;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_12">
																<td class="description_name">Audited Financial statements</td>
																<?php 
																	if(strlen($docs12)) {
																		$findings = $docs12;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_13">
																<td class="description_name">NFCC or credit line or cash deposit certificate</td>
																<?php 
																	if(strlen($docs13)) {
																		$findings = $docs13;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_14">
																<td class="description_name">Bid security</td>
																<?php 
																	if(strlen($docs14)) {
																		$findings = $docs14;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_15">
																<td class="description_name">Authority of signatory</td>
																<?php 
																	if(strlen($docs15)) {
																		$findings = $docs15;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_16">
																<td class="description_name">Production/Delivery Schedule</td>
																<?php 
																	if(strlen($docs16)) {
																		$findings = $docs16;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>
															
															<tr class="documents_17">
																<td class="description_name">Manpower Requirements</td>
																<?php 
																	if(strlen($docs17)) {
																		$findings = $docs17;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_18">
																<td class="description_name">After-sales service/parts, if applicable</td>
																<?php 
																	if(strlen($docs18)) {
																		$findings = $docs18;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_19">
																<td class="description_name">Technical Specifications</td>
																<?php 
																	if(strlen($docs19)) {
																		$findings = $docs19;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>

															<tr class="documents_21">
																<td class="description_name">Commitment to extend a credit line or cash deposit equivalent to 10% of the ABC</td>
																<?php 
																	if(strlen($docs20)) {
																		$findings = $docs20;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>
															<tr class="documents_22">
																<td class="description_name">Certification of compliance with labor laws</td>
																<?php 
																	if(strlen($docs21)) {
																		$findings = $docs21;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>
															<tr class="documents_23">
																<td class="description_name">Bid Prices in Bill of Quantities</td>
																<?php 
																	if(strlen($docs22)) {
																		$findings = $docs22;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>
															<tr class="documents_23">
																<td class="description_name">Recurring and Maintenance Costs</td>
																<?php 
																	if(strlen($docs23)) {
																		$findings = $docs23;
																		if($findings == 1){
																			echo '<td class="passed">Passed</td>';
																		}
																		else{
																			echo '<td class="failed">Failed</td>';
																		}
																	}
																	else{ 
																		echo '<td><a class="btn findings_button" href="javascript:void(0)" data-description="">ADD FINDINGS</a></td>'; 
																	}
																?>
															</tr>
														</tbody>
													</table>
													
												</div>
												<div class="button-div">
													<button class="btn primary-button submit-button" type="submit">SUBMIT TO BAC</button>
												</div>
											</form>
										</div>
								</div>
							</div>
							<!-- END ALERTS PORTLET-->
						</div>
					</div>

					<!-- modal for insert findings -->
					<div id="findings_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="text-align: center;">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 style="font-weight: 600;" class="modal-title">Add Findings</h4>
								</div>
								<div class="modal-body">
									<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
										
										<form class="form-horizontal contact-form" id="upload_docs">
											<div class="form-body" style="margin-bottom: 20px;">
												<div class="input-block">
													<label class="description_title">Description</label>
													<p class="description_text"></p>
													<input type="hidden" class="description_input" name="description">
													<p class="description_title">Parties Consulted</p>

													<input type="text" class="file_input form-control" name="parties_consulted" required>

													
													<div style="margin-top: 30px;">
														<p class="description_title" >Findings</p>

														<div class="check-button">
															<input id="radio" class="radio-custom" name="radio" data-d_id="" type="radio" value="1" required="">
															<label for="radio" class="radio-custom-label">PASS</label>
														</div>
														<div class="check-button">
															<input id="radio1" class="radio-custom" name="radio" data-d_id="" type="radio" value="0">
															<label for="radio1" class="radio-custom-label">FAIL</label>
														</div>
														<input name="id1" data-d_id="481" type="hidden" value="481">
													</div>
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

					<!-- modal for create new project -->
					<!-- <div id="view_file" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="text-align: center;">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="pdf-description" style="font-weight: 600;" class="modal-title"></h4>
								</div>
								<div class="modal-body">
									<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">

										<object class="pdfembed1" data="" type="application/pdf" width="100%" height="800">
											<embed class="pdfembed2" src="" type="application/pdf" />
										</object>

										
									</div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- modal end -->
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

	// show modal and assign value to inputs
	$('.table_data').on('click','.findings_button',function(){
		$('#findings_modal').modal('toggle');
		var description = $(this).parent().parent().find('.description_name').text();
				
		$(".description_text").text(description);
		$(".description_input").val(description);
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

	
	$('#upload_docs').submit(function(event){
        event.preventDefault();
		
		jQuery.ajax({
			type : 'post',
			url:  '<?php echo base_url('BidOpeningController/insert_post_qualification_findings')?>',
			data : $('#upload_docs').serialize(),
			async : true,
			success : function(response){	
				location.reload();
			}
		});
	});

	$('#technical_checklist_form').submit(function(event){
        event.preventDefault();
	
		jQuery.ajax({
				type : 'post',
				url:  '<?php echo base_url('BidOpeningController/submit_post_qualification_findings')?>',
				async : true,
				success : function(response){	
					// console.log(response);
					var json = $.parseJSON(response);
					if (json.status == "success") {
						swal("Successfully", "Post qualification has ben submitted", "success");

						setTimeout(function(){ 
							window.location.href = '<?php echo base_url("bidopening/bids_opened"); ?>/<?php echo $session_projects_id; ?>';
						}, 1500);
					} 
					else if(json.status == "fail"){

						setTimeout(function(){ 
							window.location.href = '<?php echo base_url("bidopening/bids_opened"); ?>/<?php echo $session_projects_id; ?>';
						}, 1500);
					}
					else if(json.status == "fail2"){
						swal("Unsuccessful", json.message, "faild");
					}
				}
			});
		});


	// $('#technical_checklist_form').submit(function(event){
    //     event.preventDefault();
		
	// 	jQuery.ajax({
	// 		type : 'post',
	// 		url:  '<?php echo base_url('BidOpeningController/insert_post_qualification_findings')?>',
	// 		data : $('#technical_checklist_form').serialize(),
	// 		async : true,
	// 		success : function(response){	
	// 			// console.log(response);
	// 			var json = $.parseJSON(response);
	// 			if (json.status == "success") {
	// 				swal("Successfully", "Technical checklist has ben submitted", "success");

	// 				setTimeout(function(){ 
	// 					// window.location.href = '<?php echo base_url("bidopening/financial_evaluation"); ?>/<?php echo $session_bids_id; ?>';
	// 					window.location.href = '<?php echo base_url("bidopening/bids_opened"); ?>/<?php echo $session_projects_id; ?>';
	// 				}, 1500);
	// 			} 
	// 			else if(json.status == "fail"){

	// 				setTimeout(function(){ 
	// 					window.location.href = '<?php echo base_url("bidopening/bids_opened"); ?>/<?php echo $session_projects_id; ?>';
	// 				}, 1500);
	// 			}
	// 		}
	// 	});
	// });
	
</script>
