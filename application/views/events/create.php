<?php
    $eventAttr = array('name' => 'eventName', 'class' => 'form-control');
    $dateAttr = array('name' => 'eventDate', 'class' => 'form-control', 'type' => 'date');
    $timeAttr = array('name' => 'eventTime', 'class' => 'form-control', 'type' => 'time');
    $typeAttr = array('name' => 'pointType', 'class' => 'form-control');
    $typeAttr = array('name' => 'pointsPeriod', 'class' => 'form-control');
    
    $submitAttr = array('class' => 'btn btn-primary btn-success');
?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php echo validation_errors(); ?>
        <?php form_open('events/create', array('role' => 'form', 'class' => 'form-horizontal')); ?> 
          <div class="form-group">
            <label for="eventName" class="col-sm-2 control-label">Event name</label>
            <div class="col-sm-10">
            <?php echo form_input($eventAttr); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="eventDate" class="col-sm-2 control-label">Event date</label>
            <div class="col-sm-10">
              <?php echo form_input($dateAttr); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="eventTime" class="col-sm-2 control-label">Event time</label>
            <div class="col-sm-10">
              <?php echo form_input($timeAttr); ?>
            </div>
          </div>
          <?php echo form_submit($submitAttr, 'Create event'); ?>
        </form>
    </div>

