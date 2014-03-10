<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title><?php echo APP_NAME ?></title>

    <link href="<?php echo base_url('assets/img/favicon.ico') ?>" rel="icon" type="image/x-icon">

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(''); ?>"><?php echo APP_NAME ?></a>
        </div>
        <?php
            if (!$validSession) {
            $formAttr = array('class' => 'navbar-form navbar-right', 'role' => 'form');
            $userAttr = array('class' => 'form-control', 'name' => 'username', 'placeholder' => 'Username');
            $passAttr = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password');
            $submitAttr = array('class' => 'btn btn-success');
        ?>
        <div class="navbar-collapse collapse">
          <?php echo form_open('login', $formAttr); ?>
            <div class="form-group">
              <?php echo form_input($userAttr); ?>
            </div>
            <div class="form-group">
              <?php echo form_password($passAttr); ?>
            </div>
            <?php echo form_submit($submitAttr, 'Sign in'); ?>
          </form>
        </div><!--/.navbar-collapse -->
        <?php
            } else {
        ?>
        <div class="navbar-collapse collapse">
            <a title="Log out" href="<?php echo base_url('index.php/logout'); ?>"><span class="glyphicon glyphicon-log-out white navbar-right glyphicon-navbar"></span></a>
            <a href="<?php echo base_url(); ?>"><span title="Profile" class="glyphicon glyphicon-user white navbar-right glyphicon-navbar"></span></a>
            <a href="<?php echo base_url('index.php/events'); ?>"><span title="Events" class="glyphicon glyphicon-calendar white navbar-right glyphicon-navbar"></span></a>
        </div>
        <?php
            }
        ?>
      </div>
    </div>

