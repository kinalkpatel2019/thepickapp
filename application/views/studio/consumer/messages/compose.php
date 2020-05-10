<!-- BEGIN #content -->
<div id="content" class="app-content p-0">
			<!-- BEGIN mailbox -->
			<div class="mailbox">
				<!-- BEGIN mailbox-toolbar -->
				<div class="mailbox-toolbar">
					<div class="mailbox-toolbar-item"><span class="mailbox-toolbar-text">New Message</span></div>
					<div class="mailbox-toolbar-item"><a href="javascript::void(0)" onclick="email_form.submit();" class="mailbox-toolbar-link active">Send</a></div>
				</div>
				<!-- END mailbox-toolbar -->
				<!-- BEGIN mailbox-body -->
				<div class="mailbox-body">
					<div class="mailbox-content">
						<!-- BEGIN scrollbar -->
						<div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
							<div class="mailbox-form">
								<form action="<?php echo site_url('admin/messages/send'); ?>" method="POST" name="email_form" id="email_form" enctype="multipart/form-data">
									<div class="mailbox-form-header">
										<div class="form-group row mb-n2">
											<label class="col-form-label width-100 pl-2 pr-2 fw-500 text-right">Subject:</label>
											<div class="col">
												<input type="text" name="subject" class="form-control" placeholder="Email subject" />
											</div>
										</div>
									</div>
									<textarea name="text" name="content" class="summernote form-control" title="Contents"></textarea>
								</form>
							</div>
						</div>
						<!-- END scrollbar -->
					</div>
				</div>
				<!-- END mailbox-body -->
			</div>
			<!-- END mailbox -->
		</div>
		<!-- END #content -->