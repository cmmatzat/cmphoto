    </main>
    <footer id="footer">
      Copyright 2018
    </footer>

  </body>

  <script type="text/javascript" src="<?php echo JS_PATH . 'dft_nav.js'; ?>"></script>

  <?php
    foreach( $pg_js as $js_link )
    {
      echo $js_link . '
';
    }
  ?>

</html>