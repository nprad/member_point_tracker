<?php
    $formAttr = array('role' => 'form');
    $userAttr = array('name' => 'eventname', 'class' => 'form-control', 'placeholder' => 'Username');
    $passAttr = array('name' => '', 'class' => 'form-control', 'placeholder' => 'Password');
    $submitAttr = array('class' => 'btn btn-lg btn-primary btn-success');
?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php form_open('events/create', array('role' => 'form')); ?> 
        <?php echo form_submit($submitAttr, 'Create event'); ?>
        </form>
    </div>
