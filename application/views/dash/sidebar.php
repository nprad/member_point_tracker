    <div class="container" style="padding-top: 65px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p class="nav-sidebar-text"><strong><?php echo $this->session->userdata('name'); ?></strong></p></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo $action == -1 ? 'active' : '';?>"><a href="<?php echo base_url('index.php/dash'); ?>"><span class="glyphicon glyphicon-info-sign"> Announcements</a></li>
            <li class="<?php echo $action == 0? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/dash/requirements'); ?>"><span class="glyphicon glyphicon-check"></span> Points requirements</a></li>
            <li class="<?php echo $action == 1? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/dash/point-requests'); ?>"><span class="glyphicon glyphicon-th-list"></span> Point requests</a></li>
            <li class="<?php echo $action == 2? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/dash/messages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
            <li class="<?php echo $action == 3? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/dash/settings'); ?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
          </ul>
        </div>
      </div>
    </div>
