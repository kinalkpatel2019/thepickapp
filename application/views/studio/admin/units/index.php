<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Units</h1>
                            <a href="<?php echo site_url('admin/units/add'); ?>" class="btn btn-info"><i class="fas fa-plus-square"></i>&nbsp;Add Unit</a>
                        <hr class="mb-4">
                            <div id="datatable" class="mb-5">
                                
                                <div class="card">
                                  <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Code</th>
                                          <th>Container?</th>
                                          <th>Created At</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Code</th>
                                          <th>Container?</th>
                                          <th>Created At</th>
                                          <th>Action</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>
                                        <?php foreach($units as $unit) { ?>
                                          <tr>
                                            <td><?php echo $unit['id']; ?></td>
                                            <td><?php echo $unit['title']; ?></td>
                                            <td><?php echo $unit['code']; ?></td>
                                            <td><?php echo ($unit['iscontainer']) ? "Yes" : "No"; ?></td>
                                            <td><?php echo $unit['created_at']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/units/edit/'.$unit['id']); ?>">Edit</a>
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
</diiv>