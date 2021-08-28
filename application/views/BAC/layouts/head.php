<?php
    if($this->session->userdata('user_id') == '') { 
        redirect('/login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Dashboard | Bidding Information Management System</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>


<link href="<?php echo base_url()."assets/"; ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- data tables -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()."assets/";?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()."assets/";?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()."assets/";?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()."assets/";?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()."assets/";?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/select2/select2.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css">

<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url()."assets/"; ?>global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo base_url()."assets/"; ?>admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()."assets/"; ?>global/css/plugins.css" rel="stylesheet" type="text/css">

<!-- custom global css -->
<link href="<?php echo base_url()."assets/"; ?>/custom/my-global-custom-css.css" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->

<!-- <link rel="shortcut icon" href="favicon.ico"/> -->
<link rel="shortcut icon" href="#"/>

<!-- datetimepicker -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url()."assets/";?>global/plugins/icheck/skins/all.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/clockface/css/clockface.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/bootstrap-colorpicker/css/colorpicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/";?>global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- delete alert cdn -->
<link href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css" rel="stylesheet" type="text/css"/>

<!-- END PAGE LEVEL STYLES -->  
</head>
<!-- END HEAD -->
    