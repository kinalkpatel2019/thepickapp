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
					<div class="mailbox-content d-none d-lg-block">
						<div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
							<div class="mailbox-empty-message">
								<div class="mailbox-empty-message-img"><img src="<?php echo base_url(); ?>assets/studio/img/page/email.svg" /></div>
								<div class="mailbox-empty-message-title">No message selected</div>
							</div>
						</div>
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