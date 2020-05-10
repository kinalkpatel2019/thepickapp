<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Admin Users</h1>
                            <a href="<?php echo site_url('admin/users/add'); ?>" class="btn btn-info"><i class="fas fa-plus-square"></i>&nbsp;Add Admin User</a>
                        <hr class="mb-4">
                            <div id="datatable" class="mb-5">
                                
                                <div class="card">
                                  <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                          <th>Id</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Email</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Id</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Email</th>
                                          <th>Action</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>
                                        <?php foreach($adminusers as $user) { ?>
                                          <tr>
                                            <th><?php echo $user['id']; ?></th>
                                            <th><?php echo $user['firstname']; ?></th>
                                            <th><?php echo $user['lastname']; ?></th>
                                            <th><?php echo $user['email']; ?></th>
                                            <th>
                                                <a href="<?php echo site_url('admin/users/edit/'.$user['id']); ?>">Edit</a>
                                            </th>
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
</diiv>