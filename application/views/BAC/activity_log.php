 <?php 
	$this->load->view('BAC/layouts/head');
	$this->load->view('BAC/layouts/header');
	$this->load->view('BAC/layouts/sidebar');
 ?>
 
 <style>

 </style>
	


 <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Activity Log
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
								<i class="fa fa-globe"></i>Activity Log
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
									</div>
									
								</div>
							</div>
							<div id="sample_1_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records</label></div></div><div class="col-md-6 col-sm-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">User</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Points">Activity Info</th>
											<th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Joined: activate to sort column ascending">Date</th>
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
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

 
	<?php 
		$this->load->view('BAC/layouts/quick_sidebar');
		$this->load->view('BAC/layouts/footer');
	?>


<script>
        jQuery(document).ready(function() {
           
			

			setInterval(function(){
				$.ajax({
					type  : 'get',
					url   : '<?php echo site_url('ActivityLogController/show_logs')?>',
					async : true,
					success : function(data){
						
						$('.table_data').html(data);
					}
				});
			},500);	
        });
</script>