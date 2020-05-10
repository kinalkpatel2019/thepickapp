<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Categories</h1>
                            <a href="<?php echo site_url('admin/categories/add'); ?>" class="btn btn-info"><i class="fas fa-plus-square"></i>&nbsp;Add Category</a>
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
                                        <?php foreach($categories as $category) { ?>
                                          <tr>
                                            <th><?php echo $category['id']; ?></th>
                                            <th><?php echo $category['title']; ?></th>
                                            <th><?php echo $category['created_at']; ?></th>
                                            <th>
                                                <a href="<?php echo site_url('admin/category/edit/'.$category['id']); ?>">Edit</a>
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