

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

				<li class="nav user_acc">
					<a href="<?php echo base_url()?>profile">
					<i class="icon-prof">
						<?php $profile_image = $this->session->userdata("profile_image");
						if(!empty($profile_image)){
							echo '<img alt="" class="img-circle" src="'.base_url().$this->session->userdata("profile_image").'"/>';
						}
						else{
							echo '<img alt="" class="img-circle" src="'.base_url().'/assets/images/profile-white.svg"/>';
						} ?>
					</i>
					<span class="title name"><?php echo  $this->session->userdata("username");?></span>
					</a>
				</li>	
				<li class="nav dashboard">
					<a href="<?php echo base_url()?>page/bidder.html">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="nav user_management">
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
						<li class="">
							<a href="<?php echo base_url()?>usermanagement/my-documents">
							My Documents</a>
						</li>
					</ul>
				</li>
				<li class="nav">
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class=" title">Bid Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="#">
							Search Active Projects</a>
						</li>
						<li class="active">
							<a href="<?php echo base_url()?>bidderbidmanagement/list-of-projects">
							New Projects</a>
						</li>
						<li class="">
							<a href="<?php echo base_url()?>bidderbidmanagement/my_active_bids">
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
				<li class="nav">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Awarding</span>
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