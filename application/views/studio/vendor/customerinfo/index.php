<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="card mb-3">
                                        <div class="card-body">
                        <h1 class="page-header">Customer Information</h1>
                        <ht class="mb-4">
                        
                        <table id="datatableDefault" class="table text-nowrap" data-order='[0, "desc"]'>
                          <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Zipcode</th>
							<th>Phonenumber</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Zipcode</th>
							<th>Phonenumber</th>
                            </tr>
                        </tfoot>
                        <tbofy>
                            <?php foreach($customers as $customer) { ?>
                                <tr>
                                    <!--td><?php echo $customer['id']; ?></td-->
									<td><?php echo $customer['firstname']; ?></td>
									<td><?php echo $customer['lastname']; ?></td>
									<td><?php echo $customer['email']; ?></td>
									<td><?php echo $customer['address1'].''.$customer['address2']; ?></td>
									<td><?php echo $customer['zipcode']; ?></td>
									<td><?php echo $customer['phonenumber']; ?></td>
                                   
                                </tr>
                            <?php } ?>
                        </tbofy>
                          </table>                                                               
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>