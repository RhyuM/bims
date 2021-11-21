<?php 
	$this->load->view('BIDDER/layouts/head');
	$this->load->view('BIDDER/layouts/header');
	$this->load->view('BIDDER/layouts/sidebar');
 ?>
 
 <style>
	.portlet-title {
		background-color: #003924!important;
	}
	a.btn.bid_button {
		background: #af9500;
		color: #fff;
	}
	.result {
		background: #005841!important;
		color: #fff!important;
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
								<i class="fa fa-globe"></i>List Of Projects
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
							<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending">#</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Description</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points" >Project Type</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >Bid Opening Date</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending" >Bid Submission Deadline</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" >Approved Budget Cost</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Status</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" >Action</th>
										</tr>
									</thead>
									<tbody class="table_data" >
									
									</tbody>
								</table>

							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- modal for view file -->
			<div id="view_file" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none; padding-right: 17px;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="text-align: center;">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="pdf-description" style="font-weight: 600;" class="modal-title"></h4>
							</div>
							<div class="modal-body">
								<div class="slimScrollDiv" style="position: relative;  width: auto; height: auto"><div class="scroller" style="height: auto;  width: auto; padding-right: 0px;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
								<div class="spinner-box ">
									<div class="configure-border-1">  
										<div class="configure-core"></div>
									</div>  
									<div class="configure-border-2">
										<div class="configure-core"></div>
									</div> 
								</div>
								<div id="display_file"> 
								
								</div>
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

		// get data from project table
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidderBidManagementController/ajax_table_projects_show')?>',
			async : true,
			success : function(data){
				
				$('.table_data').html(data);
			}
		});

		// show modal and assign value to inputs
		$('.table_data').on('click','.img_button',function(){
			$('.spinner-box').fadeIn();
			$('#view_file').modal('toggle');
			
			var imageSource = $(this).attr('data-link');
			var description = $(this).attr('data-description');
			// var description = $(this).parent().parent().find('.description_name').text();
			
			$(".pdf-description").text(description);
			var file_div="<object class='pdfembed1' data='"+imageSource+"' type='application/pdf' width='100%' height='800'><embed class='pdfembed2' src='"+imageSource+"' type='application/pdf' /></object>";
			var file_image ="<img class='img_file' src='"+imageSource+"' width='100%' height='800'>";
			if (imageSource.indexOf(".pdf") >= 0){
				jQuery('#display_file ').html(file_div);
			}
			else{
				jQuery('#display_file ').html(file_image);
			}

			$('.spinner-box').fadeOut(3000);
		});
	});
</script>