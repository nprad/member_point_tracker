
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <div class="row placeholders">

            <div class="col-md-6">
              <div class="panel <?php echo $points[EVENT] < $pp['event'] ? 'panel-danger' : 'panel-success'; ?>">
                <div class="panel-heading">
                  <h4>Event</h4>
                </div>
                <font size="7" class=""><?=$points[EVENT]; ?>/<?=$pp['event']; ?></font>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel <?php echo $points[MEETING] < $pp['meeting'] ? 'panel-danger' : 'panel-success'; ?>">
                <div class="panel-heading">
                  <h4>Meeting</h4>
                </div>
                <font size="7" class=""><?=$points[MEETING]; ?>/<?=$pp['meeting']; ?></font>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel <?php echo $points[FUNDRAISING] < $pp['fun'] ? 'panel-danger' : 'panel-success'; ?>">
                <div class="panel-heading">
                  <h4>Fundraising</h4>
                </div>
                <font size="7" class=""><?=$points[FUNDRAISING]; ?>/<?=$pp['fun']; ?></font>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel <?php echo $points[SOCIAL] < $pp['social'] ? 'panel-danger' : 'panel-success'; ?>">
                <div class="panel-heading">
                  <h4>Social</h4>
                </div>
                <font size="7"><?=$points[SOCIAL]; ?>/<?=$pp['social']; ?></font>
              </div>
            </div>

          </div>
        </div>
