<?php
    $formAttr = array('role' => 'form');
    $userAttr = array('name' => 'username', 'class' => 'form-control', 'placeholder' => 'Username');
    $passAttr = array('name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password');
    $submitAttr = array('class' => 'btn btn-lg btn-primary btn-block btn-success');
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 well">
            <legend>Please sign in</legend>
            <?php 
                $error = $this->session->flashdata('login_error');
                if (!empty($error)) {
            ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
            <?php
                }
            ?>
          <?php echo form_open('login', $formAttr); ?>
            <div class="form-group">
              <?php echo form_input($userAttr); ?>
            </div>
            <div class="form-group">
              <?php echo form_password($passAttr); ?>
            </div>
            <?php echo form_submit($submitAttr, 'Sign in'); ?>
          </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

