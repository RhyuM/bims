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
				<li class="nav user_acc">
					<a href="#">
					<i class="icon-prof">
						<?php $profile_image = $this->session->userdata("profile_image");
						if(!empty($profile_image)){
							echo '<img alt="" class="img-circle" src="'.base_url().$this->session->userdata("profile_image").'"/>';
						}
						else{
							echo '<img alt="" class="img-circle" src="'.base_url().'/assets/images/profile-white.svg"/>';
						} ?>
					</i>
					<span class="title name">Howdy, <?php echo  $this->session->userdata("username");?></span>
					</a>
				</li>	
				<li class="nav start dashboard">
					<a href="<?php echo base_url()?>page/staff">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="nav">
					<a href="#">
					<i class="fa fa-history"></i>
					<span class="title">Activity Logs</span>
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
					<i class="icon-home"></i>
					<span class="title">User Management</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="certified_bidder">
							<a href="<?php echo base_url()?>usermanagement/certified-bidder.html">
							List Of Certified Bidder</a>
						</li>
						<li class="new_bidder_entry">
							<a href="<?php echo base_url()?>usermanagement/new-entry.html">
							List Of New Bidder Entry</a>
						</li>
					</ul>
				</li>
				<li class="project_management">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Project Management</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="list_of_project">
							<a href="<?php echo base_url()?>projectmanagement.html">
							List Of projects</a>
						</li>
						<li class="bids_submitted">
							<a href="#">
							Bids Submitted</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Bid Opening</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo base_url()?>bidopening.html">
							projects</a>
						</li>
					</ul>
				</li>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	
	