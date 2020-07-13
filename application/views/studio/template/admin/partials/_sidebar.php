<!-- BEGIN #sidebar -->
<sidebar id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item active">
						<a href="<?php echo site_url('admin/dashboard'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-laptop"></i></span>
							<span class="menu-text">Dashboard</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/analytics'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-chart-pie"></i></span>
							<span class="menu-text">Analytics</span>
						</a>
					</div>
					<div class="menu-item has-sub">
						<a href="#" class="menu-link">
							<span class="menu-icon">
								<i class="fa fa-envelope"></i>
							</span>
							<span class="menu-text">Messages</span>
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="<?php echo site_url('admin/messages/sent'); ?>" class="menu-link">
									<span class="menu-text">Sent</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="<?php echo site_url('admin/messages/compose'); ?>" class="menu-link">
									<span class="menu-text">Compose</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">Components</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/users'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
							<span class="menu-text">Admin users</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/managers'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
							<span class="menu-text">Market Managers</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/vendors'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
							<span class="menu-text">Vendors</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/consumers'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
							<span class="menu-text">Consumers</span>
						</a>
					</div>
					
					<div class="menu-item">
						<a href="<?php echo site_url('admin/orders'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-clone"></i></span>
							<span class="menu-text">Orders</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/reports'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-file"></i></span>
							<span class="menu-text">Reports</span>
						</a>
					</div>					
					<div class="menu-divider"></div>
					<div class="menu-header">Manage</div>				
					<div class="menu-item">
						<a href="<?php echo site_url('admin/markets'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-home"></i></span>
							<span class="menu-text">Markets</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/businesstypes'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fas fa-car"></i></span>
							<span class="menu-text">Business Types</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/categories'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fas fa-archive"></i></span>
							<span class="menu-text">Categories</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/units'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fas fa-book"></i></span>
							<span class="menu-text">Units</span>
						</a>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">Admin</div>				
					<div class="menu-item">
						<a href="<?php echo site_url('admin/adminsettings'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cog"></i></span>
							<span class="menu-text">Settings</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('admin/users/logout'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-toggle-off"></i></span>
							<span class="menu-text">Logout</span>
						</a>
					</div>
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
			
			<!-- BEGIN mobile-sidebar-backdrop -->
			<button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
			<!-- END mobile-sidebar-backdrop -->
		</sidebar>
		<!-- END #sidebar -->
		