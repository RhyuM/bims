<?php 
    $this->load->view('BAC/layouts/head');
    $this->load->view('BAC/layouts/header');
	$this->load->view('BAC/layouts/sidebar');

	date_default_timezone_set('Asia/Manila');

	$date = new DateTime("now");

	$curr_date = $date->format('Y-m-d ');
	
	$this->db->select('*');
	$this->db->from('users'); 
	$this->db->where('DATE(created)',$curr_date);
	$query = $this->db->get();
	$count_reg = $query->num_rows();


	$this->db->select('*');
	$this->db->from('projects'); 
	$this->db->where('DATE(opening_date)',$curr_date);
	$query2 = $this->db->get();
	$count_proj_o = $query2->num_rows();

	$bg_link =   base_url().'assets/images/testbg2.jpg';
	echo $bg_link;
?>



<!-- BEGIN CONTENT -->
<div class="page-content-wrapper" >
		<div class="page-content" >
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Dashboard
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
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<div class="dashboard-stat green-light">
						<div class="visual">
							<i class="fa fa-briefcase fa-icon-medium"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $count_reg ?>
							</div>
							<div class="desc">
								 Registrations today
							</div>
						</div>
						<a class="more green-dark" href="<?php echo base_url()?>usermanagement/new-entry">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php echo $count_proj_o ?>
							</div>
							<div class="desc">
								 Projects to be open today
							</div>
						</div>
						<a class="more" href="<?php echo base_url()?>bidopening">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-group fa-icon-medium"></i>
						</div>
						<div class="details">
							<div class="number">
								 0
							</div>
							<div class="desc">
								 Projects
							</div>
						</div>
						<a class="more" href="javascript:;">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
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
		
		echo '<script> 
					jQuery( window ).load(function() {
						jQuery(".page-content").attr("background-image:","url("'.$bg_link.'")");
						 console.log("test");
					});  
			<script>';
    ?>