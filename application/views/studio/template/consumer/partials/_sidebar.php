<!-- BEGIN #sidebar -->
<sidebar id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item">
						<a href="<?php echo site_url('consumer/vendors'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-shopping-bag"></i></span>
							<span class="menu-text">Shop</span>
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
								<a href="<?php echo site_url('consumer/messages'); ?>" class="menu-link">
									<span class="menu-text">Inbox</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">Components</div>
					<?php 
					$directvendorid=$this->session->userdata('vendorshop');
					if(empty($directvendorid)){ ?>
						<div class="menu-item">
							<a href="<?php echo site_url('consumer/markets'); ?>" class="menu-link">
								<span class="menu-icon"><i class="fa fa-qrcode"></i></span>
								<span class="menu-text">Markets</span>
							</a>
						</div>
						<div class="menu-item">
							<a href="<?php echo site_url('consumer/vendors'); ?>" class="menu-link">
								<span class="menu-icon"><i class="fa fa-users"></i></span>
								<span class="menu-text">Vendors</span>
							</a>
						</div>
					<?php } ?>
					<div class="menu-item">
						<a href="<?php echo site_url('consumer/orders'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-clone"></i></span>
							<span class="menu-text">Orders</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="<?php echo site_url('consumer/cart'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cart-plus"></i></span>
							<span class="menu-text">Cart</span>
						</a>
					</div>
					
					<div class="menu-divider"></div>
					<div class="menu-header">Users</div>
					<div class="menu-item">
						<a href="<?php echo site_url('consumer/profile'); ?>" class="menu-link">
							<span class="menu-icon"><i class="fa fa-user-circle"></i></span>
							<span class="menu-text">Profile</span>
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
		