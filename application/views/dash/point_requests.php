        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Current point requests</h1>

        <h2 class="sub-header">Pending</h2>
        <div class="table-responsive">
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

        <h2 class="sub-header green">Approved</h2>
        <div class="table-responsive">
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


        <h2 class="sub-header red">Not approved</h2>
        <div class="table-responsive">
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

