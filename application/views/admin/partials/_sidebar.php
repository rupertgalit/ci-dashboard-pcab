<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
    </li>
    <li class="nav-item nav-category">
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/transaction-table'); ?>">
        <span class="menu-title">Dashboard</span>
        <i class="icon-grid menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Forms</span>
        <i class="icon-layers menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('/acknowledgement-receipt'); ?>">Ack. Receipt</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('/daily-collection'); ?>">Daily Collection</a></li>
        </ul>
      </div>
    </li>
   
      
    
  </ul>
</nav>