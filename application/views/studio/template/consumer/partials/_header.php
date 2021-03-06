
	
		<!-- BEGIN #header -->
		<header id="header" class="app-header">
			<!-- BEGIN mobile-toggler -->
			<div class="mobile-toggler">
				<button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- END mobile-toggler -->
			
			<!-- BEGIN brand -->
			<div class="brand">
				<div class="desktop-toggler">
					<button type="button" class="menu-toggler" data-toggle="sidebar-minify">
						<span class="bar"></span>
						<span class="bar"></span>
					</button>
				</div>
				
				<a href="#" class="brand-logo">
					<img src="<?php echo base_url(); ?>/assets/studio/img/logo.png"  />
				</a>
			</div>
			<!-- END brand -->
			
			<!-- BEGIN menu -->
			<div class="menu">
				<form class="menu-search" method="POST" id="menu-search" name="header_search_form" action="<?php echo site_url('consumer/searchs'); ?>">
					<div class="menu-search-icon"><a href="#" onclick="document.getElementById('menu-search').submit()"><i class="fa fa-search"></i></a></div>
					<div class="menu-search-input">
						<input type="text" class="form-control" name="search" value="<?php if(!empty($_POST['search'])) echo $_POST['search']; ?>" placeholder="Search menu..." />
					</div>
				</form>
				<div class="menu-item dropdown">
					<a href="#" data-toggle="dropdown" data-display="static" class="menu-link">
						<div class="menu-icon"><i class="fa fa-shopping-bag nav-icon"></i></div>
						<?php $items=$this->my_cart->contents(); if(count($items) > 0) { ?>
							<div class="menu-label"><?php echo count($items); ?></div>
						<?php } ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-notification">
						<h6 class="dropdown-header text-gray-900 mb-1">Cart</h6>
						<?php foreach($items as $item) { ?>
						<a href="<?php echo site_url('consumer/cart'); ?>" class="dropdown-notification-item" >
							<div class="dropdown-notification-icon">
								<i class="fa fa-receipt fa-lg fa-fw text-success"></i>
							</div>
							<div class="dropdown-notification-info">
								<div class="title"><?php echo $item['qty']; ?>&nbsp;&nbsp;$<?php echo $item['price']; ?></div>
								<div class="time"><?php echo $item['name']; ?>&nbsp;&nbsp;<?php echo $item['unit']; ?></div>
							</div>
							<div class="dropdown-notification-arrow">
								<i class="fa fa-chevron-right"></i>
							</div>
						</a>
						<?php } ?>
					</div>
				</div>
				<div class="menu-item dropdown">
					<a href="#" data-toggle="dropdown" data-display="static" class="menu-link">
						<div class="menu-img online">
						<?php
								if(!empty($consumer['image']) && file_exists('./uploads/users/thumb/'.$consumer['image']))
									$profile_image_link=base_url()."uploads/users/thumb/".$consumer['image'];
								else
									$profile_image_link=base_url()."uploads/users/consumer.jpg";
							?>
							<img src="<?php echo $profile_image_link; ?>" alt="" class="mw-100 mh-100 rounded-circle" />
						</div>
						<div class="menu-text"><?php echo $consumer['firstname'];?>&nbsp;<?php echo $consumer['lastname']; ?></div>
					</a>
					<div class="dropdown-menu dropdown-menu-right mr-lg-3">
						<a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('consumer/profile'); ?>">Edit Profile <i class="fa fa-user-circle fa-fw ml-auto text-gray-400 f-s-16"></i></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('users/logout'); ?>">Log Out <i class="fa fa-toggle-off fa-fw ml-auto text-gray-400 f-s-16"></i></a>
					</div>
				</div>
			</div>
			<!-- END menu -->
		</header>
		<!-- END #header -->