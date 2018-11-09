    <!-- Navigation Bar -->
    <!-- Contains list of links, sticks to top of page -->

    <nav id="navbar">
      <div class="nav-container">

        <a class="nav-icon" href="javascript:void(0);" onclick="toggleNav(this)">
          <div>
            <i class="fa fa-bars" id="nav-control"></i>
          </div>
        </a>

        <a class="nav-header" href="index">
          <div >
            <img src="<?php echo LOGO_PATH . 'logo_white.png'; ?>"/>
          </div>
        </a>

        <a class="nav-link" href="/index">
          <div>
            Home
          </div>
        </a>

        <a class="nav-link" href="/about">
          <div>
            About
          </div>
        </a>

        <div class="nav-menu" id="nav-menu-ptf">
          <a class="nav-link nav-menu-header" href="/portfolio">

            <div class="nav-menu-title">
              Portfolio
            </div>
            <a href="javascript:void(0);"  class="nav-menu-icon" onclick="toggleNavMenu(this)">
              <i class="fas fa-chevron-down" id="ptf-menu-control"></i>
            </a>

          </a>
          <div class="nav-menu-content">

            <a class="nav-menu-link" href="/portfolio/sports">
              <div>
                Sports
              </div>
            </a>
            <a class="nav-menu-link" href="/portfolio/portraits">
              <div>
                Portraits
              </div>
            </a>
            <a class="nav-menu-link" href="/portfolio/nature">
              <div>
                Nature
              </div>
            </a>

          </div>
        </div>

        <a class="nav-link" href="/contact">
          <div>
            Contact
          </div>
        </a>

        <a class="nav-link" href="/blog">
          <div>
            Blog
          </div>
        </a>

      </div>
    </nav>

