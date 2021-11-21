
<?php 

   $isLogin = $this->session->userdata("logged_in");
   $userType = $this->session->userdata("type");
   $username = $this->session->userdata("username");

?> 

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>0912-3456-789</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- not sticky header logo -->
          <a class="navbar-brand logo-not-sticky" href="<?php echo base_url()?>"><img src="<?php echo base_url()."assets/"; ?>logo/bims-logo.svg" style="width: 120px;"></a>
         
          <!-- sticky header logo -->
          <a class="navbar-brand logo-sticky" href="<?php echo base_url()?>"><img src="<?php echo base_url()."assets/"; ?>logo/bims-logo-dark.svg" style="width: 120px;"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>">Home
                  
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>contact">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>invitation-to-bid">Invitation To Bid</a>
              </li>
              <li class="nav-item">
                <?php
                     if(!$isLogin){
                        echo '<a class="nav-link" href="'.base_url().'login-register">Login/Register</a>';
                     }
                     else{
                        // if($userType === 'admin')
                        // {
                        //     // redirect('page/admin');
                        //     echo '<a class="nav-link" href="'.base_url().'page/admin">'.$username.'</a>';
                        // }

                        if($userType === 'BAC' || $userType === 'TWG' || $userType === 'HEAD-BAC'  || $userType === 'HEAD-TWG'  || $userType === 'ADMIN')
                        {
                            // redirect('page/staff');
                            echo '<a class="nav-link" href="'.base_url().'page/staff">'.$username.'</a>';
                        }

                        // access login for bidder
                        elseif($userType === 'BIDDER')
                        {
                            // redirect('page/bidder');
                            echo '<a class="nav-link" href="'.base_url().'page/bidder">'.$username.'</a>';
                        }
                        
                     }
                ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>