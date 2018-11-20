    </main>
    <footer id="footer">
      Copyright 2018
    </footer>

  </body>

  <script type="text/javascript" src="<?php echo JS_PATH . 'dft_nav.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo JS_PATH . 'dft_img_preload.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo JS_PATH . 'dft_explorer_alert.js'; ?>"></script>
  <?php
    foreach( $pg_js as $js_link )
    {
      echo $js_link . '
';
    }
  ?>

</html>