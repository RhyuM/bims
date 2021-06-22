<?php 
     $this->load->view('BAC/layouts/head');
	 $this->load->view('BAC/layouts/header');
?>  
	   <style>
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
		</style>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
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
			Project Management
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
					
                    <div class="alert alert-block fade in">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="info_text" style="margin-bottom: 0px;"><i class="fa fa-exclamation-triangle"></i> All departments head should decrypt the key</h4>  
                    </div>
                    <div class="portlet box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Bid Openers
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title="">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                                </a>
                                <a href="javascript:;" class="reload" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
						
						<div class="portlet-body row admins_row">
						<!-- <div style="text-align: center; margin: 20px 0">
							<button class="buttonload btn btn-primary"><i class="refresh_icon"></i>refresh</button>
						</div> -->
							<div class="openers_data">
								<!-- ajax load here ----------------------------------------------------------------------->
							</div>
						</div>
                    </div>
					<!-- END ALERTS PORTLET-->
				</div>
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


<script  type="text/javascript">
	jQuery(window).load(function() {

		var maxHeight = 0;
		jQuery('div.bid-opener-box-body').each(function(){
			var thisH = $(this).innerHeight();
			if (thisH > maxHeight) { 
				maxHeight = thisH; 
			}
		});
		jQuery('div.bid-opener-box-body').height(maxHeight);
	});
</script>
<script>
		jQuery(window).load(function() {
		// get data ajax

		
		$.ajax({
			type  : 'get',
			url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $projects_id ?>',
			async : true,
			success : function(data){
				console.log("ok");
				$('.openers_data').html(data);
				jQuery('#decryptForm').on('submit',function(e){
					e.preventDefault();
					// var decryptData = $('#decrypt_user').val();
					var p_opener_id = $('#project_openers_id').val();
					var opener_id = $('#opener_id').val();
					var project_id = $('#project_id').val();

					// console.log(opener_id);
					// console.log(project_id);
					var ajaxurl = "<?php echo site_url();?>BidOpeningController/decrypt_project";

					var data = { 
								project_openers_id: p_opener_id,
								decrypt_status: 1,
								users_user_id: opener_id,
								projects_projects_id: project_id
							};

					jQuery.post(ajaxurl, data, function(response) {

						jQuery('.decrypt .refresh_icon').addClass("fa fa-spinner fa-spin");
						
						$.ajax({
							type  : 'get',
							url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $projects_id ?>',
							async : true,
							success : function(data){
								setTimeout(function(){
									jQuery('.decrypt .refresh_icon').removeClass("fa fa-spinner fa-spin");
									swal("Unlock!", "Project has been Unlock!", "success");
									$('.openers_data').html(data);
								}, 3000);	
								
							}
						});
					}).fail(function(xhr, status, error) {
							console.log(status);
							console.log(error);
					});
				});
			}
		});

		setInterval(function(){ 
			$.ajax({
				type  : 'get',
				url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $projects_id ?>',
				async : true,
				success : function(data){
					setTimeout(function(){
						// jQuery('.decrypt .refresh_icon').removeClass("fa fa-spinner fa-spin");
						// swal("Unlock!", "Project has been Unlock!", "success");
						$('.openers_data').html(data);
					}, 3000);	
					
				}
			});
		}, 5000);
		console.log("ok2");

			// //FORM 
			
		// refresh every 5 seconds
		// setInterval(function(){ 
		// 	$.ajax({
		// 		type  : 'get',
		// 		url   : '<?php echo base_url('BidOpeningController/bid_openers_ajax_show')?>/<?php echo $projects_id ?>',
		// 		async : true,
		// 		success : function(data){
		// 			console.log("refresh ajax data");
		// 			$('.openers_data').html(data);
		// 		}
		// 	});
		// }, 5000);
	});


	// loading button
	jQuery('.buttonload').click(function(){
		jQuery('.buttonload .refresh_icon').addClass("fa fa-refresh fa-spin")

		setTimeout(function(){
			jQuery('.buttonload .refresh_icon').removeClass("fa fa-refresh fa-spin")
		}, 1000);
	});
</script>
		