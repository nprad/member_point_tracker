        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="panel panel-default">
          <div class="panel-heading"><h3><strong>Pending requests</strong></h3></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Event</th>
                <th>Type</th>
                <th>Date submitted</th>
                <th>Date of decision</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($pending) > 0): ?>
              <?php foreach ($pending as $req): ?>
              <tr>
                <td><?=$req['event']; ?></td>
                <td><?=$req['type']; ?></td>
                <td><?=$req['dateSubmitted']; ?></td>
                <td><?=$req['dateOfDecision']; ?></td>
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

        <div class="panel panel-success">
          <div class="panel-heading"><h3><strong>Approved requests</strong></h3></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Event</th>
                <th>Type</th>
                <th>Date submitted</th>
                <th>Date of decision</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($approved) > 0): ?>
              <?php foreach ($approved as $req): ?>
              <tr>
                <td><?=$req['event']; ?></td>
                <td><?=$req['type']; ?></td>
                <td><?=$req['dateSubmitted']; ?></td>
                <td><?=$req['dateOfDecision']; ?></td>
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


        <div class="panel panel-danger">
          <div class="panel-heading"><h3><strong>Rejected requests</strong></h3></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Event</th>
                <th>Type</th>
                <th>Date submitted</th>
                <th>Date of decision</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($rejected) > 0): ?>
              <?php foreach ($rejected as $req): ?>
              <tr>
                <td><?=$req['event']; ?></td>
                <td><?=$req['type']; ?></td>
                <td><?=$req['dateSubmitted']; ?></td>
                <td><?=$req['dateOfDecision']; ?></td>
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
      </div>

