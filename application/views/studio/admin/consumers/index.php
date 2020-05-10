<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Consumers</h1>
                        <hr class="mb-4">
                        <div class="card">
                                  <div class="card-body">
                        <table id="datatableDefault" class="table text-nowrap">
                          <thead>
                          <tr>
                            <th>Id</th> 
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Registered At</th>
                          </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th> 
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Registered At</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($consumers as $consumer) { ?>
                          <tr>
                            <th><?php echo $consumer['id']; ?></th>
                            <th><?php echo $consumer['email']; ?></th>
                            <th><?php echo $consumer['firstname']; ?></th>
                            <th><?php echo $consumer['lastname']; ?></th>
                            <th><?php echo $consumer['phonenumber']; ?></th>
                            <th><?php echo $consumer['created_at']; ?></th>
                          </tr>
                        <?php } ?>
                      </tbody>
                          </table>     
                        </div>
                        </div>                                                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>