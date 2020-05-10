<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Business Types</h1>
                            <a href="<?php echo site_url('admin/businesstypes/add'); ?>" class="btn btn-info"><i class="fas fa-plus-square"></i>&nbsp;Add Business Type</a>
                        <hr class="mb-4">
                            <div id="datatable" class="mb-5">
                                
                                <div class="card">
                                  <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Created At</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Created At</th>
                                          <th>Action</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>
                                        <?php foreach($businesstypes as $businesstype) { ?>
                                          <tr>
                                            <th><?php echo $businesstype['id']; ?></th>
                                            <th><?php echo $businesstype['title']; ?></th>
                                            <th><?php echo $businesstype['created_at']; ?></th>
                                            <th>
                                                <a href="<?php echo site_url('admin/businesstypes/edit/'.$businesstype['id']); ?>">Edit</a>
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