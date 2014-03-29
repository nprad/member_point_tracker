<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title><?php echo APP_NAME ?></title>

    <link href="<?php echo base_url('assets/img/favicon.ico'); ?>" rel="icon" type="image/x-icon">

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(INDEX); ?>"><?php echo APP_NAME ?></a>
        </div>

        <div class="navbar-collapse navbar-right collapse">
              <ul class="nav navbar-nav">
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php if ($this->session->userdata('loggedIn')) { ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('name'); ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(INDEX . 'dash')?>">Dashboard</a></li>
                    <li><a href="<?php echo base_url(INDEX . 'events'); ?>">Events</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(INDEX . 'logout');?>">Log out</a></li>
                  </ul>
                </li>
                <?php } else { ?>
                <li><a href="<?php echo base_url(INDEX . 'login'); ?>">Log in</a></li>
                <?php } ?>
              </ul>
            </div>


      </div>
    </div>

