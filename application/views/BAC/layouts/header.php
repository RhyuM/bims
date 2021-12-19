
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="#">
			<!-- <img src="<?php echo base_url()."assets/"; ?>admin/layout/img/logo.png" alt="logo" class="logo-default"/> -->
			<h6 style="color:white;"></h6>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
				

			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		
		<!-- <div class="center">
			<h5 style="font-weight: 600; color: white;">SERVER TIME</h5>
			<div class="clock_container">
				<div class="clock">
				<div class="hour clock_line"></div>
				<div class="mintue clock_line"></div>
				<div class="second clock_line"></div>
				<div class="clock_dot"></div>
				</div>
			</div>
			<div class="date"></div>
		</div> -->

		<div class="clock">
			<h4 class="servertime">SERVER TIME</h4>
			<div id="Date"></div>
			<ul class="timer-ul">
				<li id="hours"></li>
				<li id="point">:</li>
				<li id="min"></li>
				<li id="point">:</li>
				<li id="sec"></li>
			</ul>
		</div>

		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php 
						$profile_image = $this->session->userdata("profile_image");
						if(!empty($profile_image)){
							echo '<img alt=""  width="40" height="40" class="img-circle" src="'.base_url().$this->session->userdata("profile_image").'"/>';
						}
						else{
							echo '<img alt=""  width="40" height="40" class="img-circle" src="'.base_url().'/assets/images/profile-white.svg"/>';
						} ?>
					
					<span class="username username-hide-on-mobile">
					<?php echo $this->session->userdata('fname'); $serial = $this->session->userdata('serial');?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo base_url()?>profile">
							<i class="icon-user"></i> My Profile </a>
						</li>
					
						<li>
							<a href="<?php echo site_url('loginregister/logout');?>">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!-- <li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="<?php echo site_url('loginregister/logout');?>" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li> -->
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->