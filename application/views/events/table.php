        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              Order by <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Date</a></li>
              <li><a href="#">Event name</a></li>
              <li><a href="#">Creator</a></li>
            </ul>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Creator</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($events) > 0): ?>
                <?php foreach ($events as $e): ?>
                <tr>
                  <td><?=$e['date']; ?></td>
                  <td><?=$e['name']; ?></td>
                  <td><?=$e['creator']; ?></td>
                  <td><button type="button" class="btn btn-success">
  <span class="glyphicon glyphicon-ok"></span> I was there!
</button></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td class="text-center" colspan=4>Nuthin'</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <p><?=$links?></p>
        </div>

