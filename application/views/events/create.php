<?php
    $eventAttr = array('name' => 'eventName', 'class' => 'form-control');
    $typeAttr = array('name' => 'pointType', 'class' => 'form-control');
    $typeAttr = array('name' => 'pointsPeriod', 'class' => 'form-control');

    $submitAttr = array('class' => 'btn btn-primary btn-success');
?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <?php if (validation_errors()): ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
        <?php elseif ($valid): ?>
        <div class="alert alert-success">
            Your event was created successfully!
        </div>
        <?php endif; ?>

        <?php echo form_open('events/create', array('role' => 'form', 'class' => 'form-horizontal')); ?> 

          <div class="form-group">
            <label for="pointsPeriod" class="col-sm-2 control-label">Points period</label>
            <div class="col-sm-10">
            <?php echo form_dropdown('pointsPeriod', $pps); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="eventName" class="col-sm-2 control-label">Event name</label>
            <div class="col-sm-10">
            <?php echo form_input($eventAttr); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="pointType" class="col-sm-2 control-label">Point type</label>
            <div class="col-sm-10">
            <?php echo form_dropdown('pointType', array(EVENT => 'Event', MEETING => 'Meeting', FUNDRAISING => 'Fundraising', SOCIAL => 'Social')); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="eventDate" class="col-sm-2 control-label">Event date</label>
            <div class="col-sm-10">
            <?php echo form_date('eventDate'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="eventTime" class="col-sm-2 control-label">Event time</label>
            <div class="col-sm-10">
            <?php echo form_time('eventTime'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="eventDesc" class="col-sm-2 control-label">Event description</label>
            <div class="col-sm-10">
            <?php echo form_textarea('eventDesc'); ?>
            </div>
          </div>

          <?php echo form_submit($submitAttr, 'Create event'); ?>

        </form>
    </div>

