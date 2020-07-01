<!-- BEGIN #content -->
<div id="content" class="app-content">
			<h1 class="page-header mb-3">
				
				Hi, <?php echo $vendor['firstname']." ".$vendor['lastname']; ?> <small>here's what's happening with your store today.</small>
			</h1>
			
			<!-- BEGIN row -->
			<div class="row">
				<!-- BEGIN col-6 -->
				<div class="col-xl-6">
					<!-- BEGIN card -->
					<div class="card text-white-transparent-7 mb-3 overflow-hidden">
						<!-- BEGIN card-img-overlay -->
						<div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>
						<!-- END card-img-overlay -->
						
						<!-- BEGIN card-img-overlay -->
						<div class="card-img-overlay d-none d-md-block bg-blue rounded" style="background-image: url(<?php echo base_url(); ?>assets/studio/img/bg/wave-bg.png); background-position: right bottom; background-repeat: no-repeat; background-size: 100%;"></div>
						<!-- END card-img-overlay -->
						
						<!-- BEGIN card-img-overlay -->
						<div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
							<div class="row">
								<div class="col-md-8 col-xl-6"></div>
								<div class="col-md-4 col-xl-6 mb-n2">
									<img src="<?php echo base_url(); ?>assets/studio/img/page/dashboard.svg" class="d-block ml-n3 mb-5" style="max-height: 310px" />
								</div>
							</div>
						</div>
						<!-- END card-img-overlay -->
						
						<!-- BEGIN card-body -->
						<div class="card-body position-relative">
							<!-- BEGIN row -->
							<div class="row">
								<!-- BEGIN col-8 -->
								<div class="col-md-8">
									<!-- stat-top -->
									<div class="d-flex">
										<div class="mr-auto">
											<h5 class="text-white-transparent-8 mb-3">Weekly Earning</h5>
											<h3 class="text-white mt-n1 mb-1">$<?php echo $earning['weekly']; ?></h3>
											<p class="mb-1 text-white-transparent-6 text-truncate">
												<i class="fa fa-caret-<?php echo $earning['updownflag']; ?>"></i> <b><?php echo $earning['weeklypercentage']; ?>%</b> <?php echo $earning['updownflag']; ?> compare to last week
											</p>
										</div>
									</div>
									
									<hr class="hr-transparent bg-white-transparent-2 mt-3 mb-3" />
									
									<!-- stat-bottom Market Wise we will show here -->
									<div class="row">
										<div class="col-6 col-lg-5">
											<div class="mt-1">
												<i class="fa fa-fw fa-shopping-bag fs-28px text-black-transparent-5"></i>
											</div>
											<div class="mt-1">
												<div>Market 1</div>
												<div class="font-weight-600 text-white">$11</div>
											</div>
										</div>
										<div class="col-6 col-lg-5">
											<div class="mt-1">
												<i class="fa fa-fw fa-shopping-bag fs-28px text-black-transparent-5"></i>
											</div>
											<div class="mt-1">
												<div>Market 2</div>
												<div class="font-weight-600 text-white">$8</div>
											</div>
										</div>
									</div>
									
									<hr class="hr-transparent bg-white-transparent-2 mt-3 mb-3" />
									
								</div>
								<!-- END col-8 -->
								
								<!-- BEGIN col-4 -->
								<div class="col-md-4 d-none d-md-block" style="min-height: 380px;"></div>
								<!-- END col-4 -->
							</div>
							<!-- END row -->
						</div>
						<!-- END card-body -->
					</div>
					<!-- END card -->
				</div>
				<!-- END col-6 -->
				
				<!-- BEGIN col-6 -->
				<div class="col-xl-6">
					<!-- BEGIN row -->
					<div class="row">
						<!-- BEGIN col-6 -->
						<div class="col-sm-6">
							<!-- BEGIN card -->
							<div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange" style="min-height: 202px;">
								<!-- BEGIN card-img-overlay -->
								<div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
									<img src="assets/img/icon/order.svg" class="ml-auto d-block mb-n3" style="max-height: 105px" />
								</div>
								<!-- END card-img-overlay -->
								
								<!-- BEGIN card-body -->
								<div class="card-body position-relative">
									<h5 class="text-white-transparent-8 mb-3 fs-16px">New Orders</h5>
									<h3 class="text-white mt-n1"><?php echo $orders['weekly']; ?></h3>
									<div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
										<div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
									</div>
									<div class="text-white-transparent-8 mb-4"> <?php echo $orders['lastweek']; ?><br /> last week orders</div>
								</div>
								<!-- BEGIN card-body -->
							</div>
							<!-- END card -->
							
						</div>
						<!-- END col-6 -->
						
					</div>
					<!-- END row -->
				</div>
				<!-- END col-6 -->
			</div>
			<!-- END row -->
			
		</div>
		<!-- END #content -->