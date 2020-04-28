 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">The <sup>Pick App</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?php echo site_url('admin/dashboard'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-cog"></i>
    <span>Users</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingcollapseOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('admin/vendors'); ?>">Vendors</a>
      <a class="collapse-item" href="<?php echo site_url('admin/consumers'); ?>">Consumers</a>
      <a class="collapse-item" href="<?php echo site_url('admin/users'); ?>">Admin Users</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Navigate To</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('admin/markets'); ?>">Markets</a>
      <a class="collapse-item" href="<?php echo site_url('admin/categories'); ?>">Categories</a>
      <a class="collapse-item" href="<?php echo site_url('admin/units'); ?>">Units</a>
      <a class="collapse-item" href="<?php echo site_url('admin/businesstypes'); ?>">Business Types</a>
      <a class="collapse-item" href="<?php echo site_url('admin/products'); ?>">Products</a>
      <a class="collapse-item" href="<?php echo site_url('admin/orders'); ?>">Orders</a>
      <a class="collapse-item" href="<?php echo site_url('admin/coupons'); ?>">Coupons</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->