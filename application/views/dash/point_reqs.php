        <!--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Remaining points needed</h1>
          <div class="row placeholders">
            <div class="col-sm-6 placeholder text-center">
              <font size="7"><?=$points[EVENT]; ?>/<?=$pp['event']; ?></font>
              <h4>Event</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-sm-6 placeholder text-center">
              <font size="7"><?=$points[MEETING]; ?>/<?=$pp['fun']; ?></font>
              <h4>Fundraising</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-sm-6 placeholder text-center">
              <font size="7"><?=$points[FUNDRAISING]; ?>/<?=$pp['meeting']; ?></font>
              <h4>Meeting</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-sm-6 placeholder text-center">
              <font size="7"><?=$points[SOCIAL]; ?>/<?=$pp['social']; ?></font>
              <h4>Social</h4>
              <span class="text-muted">Something else</span>
            </div>
            </div>
          </div>
        </div> -->

 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">My points</h1>

          <div class="row placeholders">

            <div class="col-md-6">
              <div class="panel panel-default">
                <font size="7" class="<?php echo $points[EVENT] < $pp['event'] ? '' : 'green'; ?>"><?=$points[EVENT]; ?>/<?=$pp['event']; ?></font>
                <div class="panel-footer">
                  <h4>Event</h4>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel panel-default">
                <font size="7" class="<?php echo $points[MEETING] < $pp['meeting'] ? '' : 'green'; ?>"><?=$points[MEETING]; ?>/<?=$pp['meeting']; ?></font>
                <div class="panel-footer">
                  <h4>Meeting</h4>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel <?php echo $points[FUNDRAISING] < $pp['fun'] ? 'panel-default' : 'panel-success'; ?>">
                <font size="7" class=""><?=$points[FUNDRAISING]; ?>/<?=$pp['fun']; ?></font>
                <div class="panel-footer">
                  <h4>Fundraising</h4>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel <?php echo $points[SOCIAL] < $pp['social'] ? 'panel-default' : 'panel-success'; ?>">
                <font size="7"><?=$points[SOCIAL]; ?>/<?=$pp['social']; ?></font>
                <div class="panel-footer">
                  <h4>Social</h4>
                </div>
              </div>
            </div>

          </div>
        </div>
