<!-- BEGIN #sidebar -->
<sidebar id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item active">
						<a href="<?php echo site_url('vendor/dashboard'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-laptop"></i></span>
							<span class="menu-text">Dashboard</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/analytics'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-chart-pie"></i></span>
							<span class="menu-text">Analytics</span>
						</a>
					</div>
					<!--div class="menu-item has-sub">
						<a href="#" class="menu-link">
							<span class="menu-icon">
								<i class="fa fa-envelope"></i>
								<span class="menu-icon-label">6</span>
							</span>
							<span class="menu-text">Email</span>
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="email_inbox.html" class="menu-link">
									<span class="menu-text">Inbox</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="email_compose.html" class="menu-link">
									<span class="menu-text">Compose</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="email_detail.html" class="menu-link">
									<span class="menu-text">Detail</span>
								</a>
							</div>
						</div>
					</div-->
					<div class="menu-divider"></div>
					<div class="menu-header">Components</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/products'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
							<span class="menu-text">Products</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/orders'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-clone"></i></span>
							<span class="menu-text">Orders</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/marketpopups'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-clone"></i></span>
							<span class="menu-text">Market Messages</span>
						</a>
					</div>
					<!--div class="menu-item">
						<a href="<?php //echo site_url('vendor/coupons'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
							<span class="menu-text">Products</span>
						</a>
					</div-->					
					<div class="menu-divider"></div>
					<div class="menu-header">Users</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/profile'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-user-circle"></i></span>
							<span class="menu-text">Profile</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/profile/settings'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cog"></i></span>
							<span class="menu-text">Settings</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('vendor/profile/stripe'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cog"></i></span>
							<span class="menu-text">Get Paid</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('users/logout'); ?>" class="menu-link">
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
		