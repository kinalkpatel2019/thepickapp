<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Markets</h1>
                        <?php if($this->admin['accounttype']==1) { ?>
                          <a href="<?php echo site_url('admin/markets/add'); ?>" class="btn btn-info"><i class="fas fa-plus-square"></i>&nbsp;Add Market</a>
                        <?php } ?>
                        <hr class="mb-4">
                        <div class="card">
                                  <div class="card-body">
                        <table id="datatableDefault" class="table text-nowrap">
                          <thead>
                          <tr>
                            <th>Id</th> 
                            <th>Title</th>
                            <th>Location</th>
                            <th>Fee(%)</th>
                            <th>Created At</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th> 
                            <th>Title</th>
                            <th>Location</th>
                            <th>Fee(%)</th>
                            <th>Created At</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($markets as $market) { ?>
                          <tr>
                            <td><?php echo $market['id']; ?></td>
                            <td><?php echo $market['title']; ?></td>
                            <td><?php echo $market['location']; ?></td>
                            <td><?php echo $market['fee']; ?></td>
                            <td><?php echo $market['created_at']; ?></td>
                            <td><a href="<?php echo site_url('admin/markets/edit/'.$market['id']); ?>">Edit
                            <?php if($this->admin['accounttype']==2) { ?>
                              | <a href="<?php echo site_url('admin/markets/vendors/'.$market['id']); ?>"> Vendor List</a>
                              | <a href="<?php echo site_url('admin/markets/arrange/'.$market['id']); ?>"> Arrage Vendors</a>
                            <?php } ?>
                            </td>
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