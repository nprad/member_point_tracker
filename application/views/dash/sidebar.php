    <div class="container" style="padding-top: 65px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php echo $action == -1 ? 'active' : '';?>"><a href="<?php echo base_url(INDEX . 'dash'); ?>"><span class="glyphicon glyphicon-info-sign"> Announcements</a></li>
            <li class="<?php echo $action == 1? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'dash/point-requests'); ?>"><span class="glyphicon glyphicon-th-list"></span> Point requests</a></li>
            <li class="<?php echo $action == 2? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'dash/messages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
            <li class="<?php echo $action == 3? 'active' : ''; ?>"><a href="<?php echo base_url(INDEX . 'dash/settings'); ?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
          </ul>
        </div>
      </div>
    </div>
