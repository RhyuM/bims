<?php 
	$this->load->view('BIDDER/layouts/head');
	$this->load->view('BIDDER/layouts/header');
	$this->load->view('BIDDER/layouts/sidebar');
 ?>
 
 <style>
	.portlet-title {
		background-color: #003924!important;
	}
	a.btn.img_button {
		background: #af9500;
		color: #fff;
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
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" >Approved Budget Cost</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Invitation To Bid</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Status</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" >Action</th>
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
	});
</script>