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
						<a href="<?php echo site_url('admin/orders'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-clone"></i></span>
							<span class="menu-text">Orders</span>
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
					<div class="menu-divider"></div>
					<div class="menu-header">Manager</div>				
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
		