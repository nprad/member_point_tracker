    <div class="container" style="padding-top: 65px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php if ($this->session->userdata('permissionLevel') > 0): ?>
            <li class="<?php echo $action == 4? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'events/create'); ?>"><span class="glyphicon glyphicon-plus"></span> Create event</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <?php endif; ?>
            <li class="<?php echo $action == 0? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'events/event'); ?>"><span class="glyphicon glyphicon-certificate"></span> Event</a></li>
            <li class="<?php echo $action == 1? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'events/fundraising'); ?>"><span class="glyphicon glyphicon-usd"></span> Fundraising</a></li>
            <li class="<?php echo $action == 2? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'events/meeting'); ?>"><span class="glyphicon glyphicon-briefcase"></span> Meeting</a></li>
            <li class="<?php echo $action == 3? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'events/social'); ?>"><span class="glyphicon glyphicon-glass"></span> Social</a></li>
          </ul>
        </div>
      </div>
    </div>
