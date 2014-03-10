    <div class="container" style="padding-top: 65px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p class="nav-sidebar-text"><strong>User Name</strong></p></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo $action == 0? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/requirements'); ?>"><span class="glyphicon glyphicon-check"></span> Points requirements</a></li>
            <li class="<?php echo $action == 1? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/point-requests'); ?>"><span class="glyphicon glyphicon-th-list"></span> Point requests</a></li>
            <li class="<?php echo $action == 2? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/messages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
            <li class="<?php echo $action == 3? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/requirements'); ?>">Export</a></li>
          </ul>
        </div>
      </div>
    </div>
