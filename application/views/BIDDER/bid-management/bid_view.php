<?php 
	$this->load->view('BIDDER/layouts/head');
	$this->load->view('BIDDER/layouts/header');
	$this->load->view('BIDDER/layouts/sidebar');
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
	.table .btn {
		margin: 5px 5px!important;
	}
	button.confirm,
	.submit_button,
	a.btn.upload_btn,
	a.btn.submit_bid ,
	a.btn.img_button {
		background: #af9500;
		color: #fff!important;
	}
	a.btn.view_tech {
		background: #003924;
		color: white;
	}
	.action_row{
		margin-bottom: 10px;
	}
	input.bid_price_c {
		margin: 40px auto!important;
		width: 80%;
	}
	label{
		font-size: 16px;
	}
 </style>
 


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
						<a href="">Home</a>
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
											<td id="fbf_file"></td>
											<td style="vertical-align: middle;">
												<a class="btn upload_btn" data-financial_documents_id="<?php echo $financial_bid_form_id; ?>" data-d_id="Financial Bid Form">Add New File</a>
												<a class="btn upload_btn" data-d_id="Financial Bid Form">Edit</a>
											</td>
										</tr>
										<tr>
											<td class="financial_description">Bill Of Quantities</td>
											<td id="boq_file"></td>
											<td style="vertical-align: middle;">
											<a class="btn upload_btn" data-financial_documents_id="<?php echo $bill_of_quantities_id; ?>" data-d_id="Bill Of Quantities">Add New File</a>
												<a class="btn upload_btn" data-d_id="Bill Of Quantities">Edit</a>
											</td>
										</tr>
										<tr>
											<td class="financial_description">Detailed Estimates</td>
											<td id="de_file"></td>
											<td style="vertical-align: middle;">
												<a class="btn upload_btn" data-financial_documents_id="<?php echo $detailed_estimates_id; ?>" data-d_id="Detailed Estimates">Add New File</a>
												<a class="btn upload_btn" data-d_id="Detailed Estimates">Edit</a>
											</td>
										</tr>
										<tr>
											<td class="financial_description">Cash Flow By Quarter</td>
											<td id="cfbq_file"></td>
											<td style="vertical-align: middle;">
												<a class="btn upload_btn" data-financial_documents_id="<?php echo $cash_flow_by_quarter_id; ?>" data-d_id="Cash Flow By Quarter">Add New File</a>
												<a class="btn upload_btn" data-d_id="Cash Flow By Quarter">Edit</a>
											</td>
										</tr>

                                        
									</tbody>
                                    
								</table>

							</div>
                            <div class="continue" style="text-align: center; margin-top: 30px;  margin-bottom: 30px;">
								<a href="<?php echo base_url()?>usermanagement/my-documents" class="btn view_tech">VIEW TECHNICAL DOCUMENTS</a>
								<a class="btn submit_bid_btn">SUBMIT BID</a>
                            <div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

			<!-- modal for upload financial documents -->
			<div id="upload_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></a>
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
											<input type="hidden" class="financial_documents" name="financial_documents_id" />
                                            
											<input type="file" class="file_input form-control" name="file" required>
										</div>
									</div>
							
									<div class="form-actions">
										<div class="row action_row">
											<div class="col-md-12" style="text-align: center;">
												<button class="btn submit_button" type="submit">Submit</button>
												<a class="btn" type="button" data-dismiss="modal">Cancel</a>
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

			<!-- modal for submission of bid -->
			<div id="submit_bid_modal" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="text-align: center;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></a>
							<h4 style="font-weight: 600;" class="modal-title">SUBMIT MY BID</h4>
						</div>
						<div class="modal-body">
							<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								
								<form class="form-horizontal contact-form" id="submit_bids_form">
									<div class="form-body" style="margin-bottom: 20px;">
										<div class="input-block">
                                            <label style="font-weight: 600;">Approve Budget Cost</label>
											<p>₱ <?php echo $approve_budget_cost ?></p>
                                            <input type="hidden" name="projects_id" value="<?php echo $projects_id; ?>"/>
											
											<input type="text" class="bid_price_c form-control"  data-type="currency" name="bid_price" placeholder="Total Bid Price" required>
										</div>
									</div>
							
									<div class="form-actions">
										<div class="row action_row">
											<div class="col-md-12" style="text-align: center;">
												<button class="btn submit_button" type="submit">Submit</button>
												<a class="btn" type="button" data-dismiss="modal">Cancel</a>
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

			// show Financial Bid Form document file
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('BidderBidManagementController/financial_bid_form_file_show')?>/<?php echo $projects_id ?>',
				async : true,
				success : function(data){
					$('#fbf_file').html(data);
				}
			});

			// show Bill Of Quantities document file
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('BidderBidManagementController/bill_of_quantities_file_show')?>/<?php echo $projects_id ?>',
				async : true,
				success : function(data){
					$('#boq_file').append(data);
				}
			});

			// show Detailed Estimates document file
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('BidderBidManagementController/detailed_estimates_file_show')?>/<?php echo $projects_id ?>',
				async : true,
				success : function(data){
					$('#de_file').append(data);
				}
			});

			// show Cash Flow By Quarter document file
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('BidderBidManagementController/cash_flow_by_quarter_file_show')?>/<?php echo $projects_id ?>',
				async : true,
				success : function(data){
					$('#cfbq_file').append(data);
				}
			});

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
						// alert($('input[type=file]').val());
						$('#upload_modal').modal('toggle');
						swal("Added!", "File has been Added!", "success");

						// show Financial Bid Form document file
						$.ajax({
						type  : 'get',
						url   : '<?php echo base_url('BidderBidManagementController/financial_bid_form_file_show')?>/<?php echo $projects_id ?>',
						async : true,
							success : function(data){
								$('#fbf_file').html(data);
							}
						});

						// show Bill Of Quantities document file
						$.ajax({
						type  : 'get',
						url   : '<?php echo base_url('BidderBidManagementController/bill_of_quantities_file_show')?>/<?php echo $projects_id ?>',
						async : true,
							success : function(data){
								$('#boq_file').html(data);
							}
						});

						// show Detailed Estimates document file
						$.ajax({
						type  : 'get',
						url   : '<?php echo base_url('BidderBidManagementController/detailed_estimates_file_show')?>/<?php echo $projects_id ?>',
						async : true,
							success : function(data){
								$('#de_file').html(data);
							}
						});

						// show Cash Flow By Quarter document file
						$.ajax({
						type  : 'get',
						url   : '<?php echo base_url('BidderBidManagementController/cash_flow_by_quarter_file_show')?>/<?php echo $projects_id ?>',
						async : true,
							success : function(data){
								$('#cfbq_file').html(data);
							}
						});
					}
				});
			});

			$('#submit_bids_form').on('submit',function(e){
				e.preventDefault();

				$.ajax({
					url: "<?php echo base_url(); ?>BidderBidManagementController/submit_bid",
					type: "POST",
					// data: regdata,
					data:new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					success: function(response){
						var json = $.parseJSON(response);
						if (json.status == "success") {
							$('#submit_bid_modal').modal('toggle');
							swal("Successfully", "Bid has ben submitted", "success");

							setTimeout(function(){ 
								window.location.href = '<?php echo base_url(); ?>/bidderbidmanagement/my_active_bids';
							}, 1500);
							
						} 
						else if(json.status == "fail"){
							$('#submit_bid_modal').modal('toggle');
							swal(json.message);
						}
						

					}
					
				});
			});

			// show modal and assign value to inputs
			$('.table_data').on('click','.upload_btn',function(){
				$('#upload_modal').modal('toggle');
				$(".description_text").text($(this).data('d_id'));
				$(".financial_documents").val($(this).data('financial_documents_id'));
				$(".hide_dec").val($(this).data('d_id'));
			});

			// show modal and assign value to inputs
			$('.continue').on('click','.submit_bid_btn',function(){
				$('#submit_bid_modal').modal('toggle');
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