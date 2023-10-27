<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav mt-4 mb-0">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/dashboard'); ?>">
        <span class="menu-title text-capitalize">Dashboard</span>
        <i class="icon-screen-desktop menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/transaction-table'); ?>">
        <span class="menu-title text-capitalize">transactions</span>
        <i class="icon-grid  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title text-capitalize">Data Table</span>
        <i class="icon-layers menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('/acknowledgement-receipt'); ?>">Ack.
              Receipt</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('/deposite'); ?>">E-Collection &
              deposite</a></li>


        </ul>
      </div>
    </li>
  </ul>
  <div class="footer-powered-by text-center">
    Powered by: 
    <!-- <img width="20" height="20" src='<?php echo base_url("assets/images/ngsi-logo.png") ?>' alt="logo"
      class="logo-dark" /> -->
       <a href="https://netglobalsolutions.net/" target="_blank" class="pl-1">NetGlobal Solutions Inc.</a>
  </div>
</nav>