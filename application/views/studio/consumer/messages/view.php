<!-- BEGIN #content -->
<div id="content" class="app-content p-0">
			<!-- BEGIN mailbox -->
			<div class="mailbox">
				<!-- BEGIN mailbox-toolbar -->
				<div class="mailbox-toolbar">
					<div class="mailbox-toolbar-item"><span class="mailbox-toolbar-text">Mailboxes</span></div>
					<div class="mailbox-toolbar-item"><a href="#" class="mailbox-toolbar-link active">Inbox</a></div>
				</div>
				<!-- END mailbox-toolbar -->
				<!-- BEGIN mailbox-body -->
				<div class="mailbox-body">
					<!-- BEGIN mailbox-sidebar -->
					<div class="mailbox-sidebar">
						<div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
							<div class="mailbox-list">
                                <?php foreach($messages as $message){ ?>
								<div class="mailbox-list-item">
									<div class="mailbox-message">
										<a href="<?php echo site_url('consumer/messages/view/'.$message['id']); ?>" class="mailbox-list-item-link">
											<div class="mailbox-sender">
												<span class="mailbox-sender-name"><?php echo $message['firstname']; ?>&nbsp;<?php echo $message['lastname']; ?></span>
												<span class="mailbox-time"><?php echo timeago($message['created_at']); ?></span>
											</div>
											<div class="mailbox-title"><?php echo $message['subject']; ?></div>
											<div class="mailbox-desc">
												<?php echo substr(strip_tags($message['content']),0,30)." ..."; ?>  
											</div>
										</a>
									</div>
                                </div>
                                <?php } ?>
							</div>
						</div>
					</div>
					<!-- END mailbox-sidebar -->
				<!-- BEGIN mailbox-content -->
                <div class="mailbox-content">
						<!-- BEGIN scrollbar -->
						<div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
							<!-- BEGIN mailbox-detail -->
							<div class="mailbox-detail">
								<!-- BEGIN mail-detail-header -->
								<div class="mailbox-detail-header">
									<div class="d-flex">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets/studio/img/user/user-1.jpg" width="40px" class="rounded-circle" alt="" />
										</a>
										<div class="flex-fill ml-3">
											<div class="d-flex align-items-center">
												<div class="flex-fill">
													<div class="font-weight-600"><?php echo $detail['firstname']; ?> <?php echo $detail['lastname']; ?> &lt;<?php echo $detail['email']; ?>&gt;</div>
                                                </div>
                                                
												<div class="fs-12px text-muted text-right"><?php echo date("M d, Y", strtotime($detail['created_at'])); ?> <br />at <?php echo date("g.i a", strtotime($detail['created_at'])); ?></div>
											</div>
										</div>
									</div>
								</div>
								<!-- END mailbox-detail-header -->
								<!-- BEGIN mailbox-detail-content -->
								<div class="mailbox-detail-content">
									<h4 class="mb-3"><?php echo $detail['subject']; ?></h4>
									<!-- BEGIN mailbox-detail-attachment -->
									<!-- END mailbox-detail-attachment -->
									<!-- BEGIN mailbox-detail-body -->
									<div class="mailbox-detail-body">
                                        <?php echo $detail['content']; ?>
									</div>
									<!-- END mailbox-detail-body -->
								</div>
								<!-- END mailbox-detail-content -->
							</div>
							<!-- END mailbox-detail -->
						</div>
						<!-- END scrollbar -->
					</div>
					<!-- END mailbox-content -->
				</div>
				<!-- END mailbox-body -->
			</div>
			<!-- END mailbox -->
		</div>
        <!-- END #content -->
<?php
function timeago($date) {
    $timestamp = strtotime($date);	
    
    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
         $diff     = time()- $timestamp;
         for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
         $diff = $diff / $length[$i];
         }

         $diff = round($diff);
         return $diff . " " . $strTime[$i] . "(s) ago ";
    }
 }
 ?>