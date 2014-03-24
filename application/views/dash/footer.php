   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/flipclock.min.js'); ?>"></script>

  <script type="text/javascript">
            var clock;

            $(document).ready(function() {

                // Grab the current date
                var currentDate = new Date();
                var ppEnd = <?php echo $ppEnd; ?>;

                // Set some date in the past. In this case, it's always been since Jan 1
                var futureDate  = new Date(ppEnd);

                // Calculate the difference in seconds between the future and current date
                var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

                diff = (diff > 0) ? diff : 0;

                // Instantiate a coutdown FlipClock
                clock = $('.clock').FlipClock(diff, {
                    clockFace: 'DailyCounter',
                    countdown: 'true',
                });
            });
  </script>
</body>
</html>
