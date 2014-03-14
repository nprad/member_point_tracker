    <div class="container" style="padding-top: 65px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php echo $action == -1 ? 'active' : '';?>"><a href="<?php echo base_url('index.php/events'); ?>"><span class="glyphicon glyphicon-info-sign"> Announcements</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo $action == 0? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/events/event'); ?>"><span class="glyphicon glyphicon-certificate"></span> Event</a></li>
            <li class="<?php echo $action == 1? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/events/fundraising'); ?>"><span class="glyphicon glyphicon-usd"></span> Fundraising</a></li>
            <li class="<?php echo $action == 2? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/events/meeting'); ?>"><span class="glyphicon glyphicon-briefcase"></span> Meeting</a></li>
            <li class="<?php echo $action == 3? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/events/social'); ?>"><span class="glyphicon glyphicon-glass"></span> Social</a></li>
          </ul>
        </div>
      </div>
    </div>
