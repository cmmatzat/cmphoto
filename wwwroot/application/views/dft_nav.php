    <!-- Navigation Bar -->
    <!-- Contains list of links, sticks to top of page -->

    <nav id="navbar">

      <div class="nav-header">
        <a id="nav-control" class="nav-icon" href="javascript:void(0);" onclick="toggleNav()">
          <i class="fa fa-bars" id="nav-control-icon"></i>
        </a>
        <h1 id="nav-title">Corey Matzat Photography</h1>
        <a id="nav-logo" href="/index">
          <img src="<?php echo LOGO_PATH . 'logo_white.png'; ?>"/>
        </a>
      </div>

      <a class="nav-link" href="/index">
        Home
      </a>

      <a class="nav-link" href="/about">
        About
      </a>

      <div class="nav-menu">
        <div class="nav-menu-header">
          <a class="nav-link" href="/portfolio">
            Portfolio
          </a>
          <a href="javascript:void(0);" class="nav-menu-control" onclick="toggleNavMenu(this)">
            <i class="fas fa-chevron-down nav-menu-control-icon"></i>
          </a>
        </div>
        <div class="nav-menu-links">
          <a class="nav-menu-link" href="/portfolio/sports">
            Sports
          </a>
          <a class="nav-menu-link" href="/portfolio/portraits">
            Portraits
          </a>
          <a class="nav-menu-link" href="/portfolio/nature">
            Nature
          </a>
        </div>
      </div>

      <a class="nav-link" href="/contact">
        Contact
      </a>

      <a class="nav-link" href="/blog">
        Blog
      </a>

    </nav>

