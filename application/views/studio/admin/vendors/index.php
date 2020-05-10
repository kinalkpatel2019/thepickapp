<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Vendors</h1>
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
                            <th>Business Name</th>
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
                            <th>Business Name</th>
                            <th>Phone Number</th>
                            <th>Registered At</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($vendors as $vendor) { ?>
                          <tr>
                            <td><?php echo $vendor['id']; ?></td>
                            <td><?php echo $vendor['email']; ?></td>
                            <td><?php echo $vendor['firstname']; ?></td>
                            <td><?php echo $vendor['lastname']; ?></td>
                            <td><?php echo $vendor['businessname']; ?></td>
                            <td><?php echo $vendor['phonenumber']; ?></td>
                            <td><?php echo $vendor['created_at']; ?></td>
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