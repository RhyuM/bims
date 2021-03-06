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
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- <form class="sidebar-search " action="extra_search" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form> -->
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
					
				</li>
				<li class="nav user_acc">
					<a href="<?php echo base_url()?>profile">
					<i class="icon-prof">
						<?php $profile_image = $this->session->userdata("profile_image");
						if(!empty($profile_image)){
							echo '<img alt="" width="40" height="40" class="img-circle" src="'.base_url().$this->session->userdata("profile_image").'"/>';
						}
						else{
							echo '<img alt="" width="40" height="40" class="img-circle" src="'.base_url().'/assets/images/profile-white.svg"/>';
						} ?>
					</i>
					<span class="title name"><?php echo  $this->session->userdata("username");?></span>
					</a>
				</li>	

				<li class="nav start dashboard">
					<a href="<?php echo base_url()?>page/staff">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<?php 
					$session_user_type = $this->session->userdata("type");
					if($session_user_type == 'ADMIN'){?>
						<li class="nav">
							<a href="<?php echo base_url()?>activity-logs">
							<i class="fa fa-history"></i>
							<span class="title">Activity Logs</span>
							</a>
						</li>
				<?php } ?>
				
				<!-- <li class="nav announcement">
					<a href="javascript:;">
					<i class="fas fa fa-bullhorn"></i>
					<span class="title">Announcement</span>
					</a>
				</li> -->
				<li class="nav user_management">
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">User Management</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<?php 
							 $session_user_type = $this->session->userdata("type");
							 if($session_user_type == 'ADMIN'){?>
								<li class="create_user">
									<a href="<?php echo base_url()?>usermanagement/accounts">
									Accounts</a>
								</li>
						<?php } ?>
						
						<li class="certified_bidder">
							<a href="<?php echo base_url()?>usermanagement/certified-bidder">
							List Of Certified Bidder</a>
						</li>
						<li class="new_bidder_entry">
							<a href="<?php echo base_url()?>usermanagement/new-entry">
							List Of New Bidder Entry</a>
						</li>
					</ul>
				</li>
				<?php if($session_user_type != 'ADMIN'){?>
					<li class="nav project_management">
						<a href="javascript:;">
						<i class="icon-diamond"></i>
						<span class="title">Project Management</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li class="list_of_project">
								<a href="<?php echo base_url()?>projectmanagement">
								List Of Projects</a>
							</li>
							<!-- <li class="bids_submitted">	
								<a href="#">
								Bids Submitted</a>
							</li> -->
						</ul>
					</li>
				
					<li class="nav">
						<a href="javascript:;">
						<i class="icon-briefcase"></i>
						<span class="title">Bid Opening</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo base_url()?>bidopening">
								Projects</a>
							</li>
						</ul>
					</li>
				<?php }?>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->