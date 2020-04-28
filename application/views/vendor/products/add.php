<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
</div>
<!-- Content Row -->
<div class="row">

    
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

            <form name="frmproduct" action="<?php echo site_url('vendor/products/insertproduct'); ?>" id="frmproduct" method="post" enctype="multipart/form-data"> 
               
            <div class="form-group">
                    <div class="col-sm-6">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach($categories as $category){ ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image">Main Image</label>
                    <input type="file" name="mainimage" class="form-control" id="mainimage" placeholder="image">
                </div>

                
                <div class="form-group">
                  <label for="status">Images</label>
                    <div class="repeat">
                        <table class="table table-striped table-bordered" width="100%">
                          <thead>
                            <tr>
                              <td width="10%" colspan="4"><span class="add btn btn-success">Add</span></td>
                            </tr>
                          </thead>
                          <tbody class="container ui-sortable">
                          <tr class="template row">
                            <td width="10%">
                              <span class="move btn btn-info">Move Row</span>
                              <span class="move-up btn btn-info">Move Up</span>
                              <input type="text" class="move-steps" value="1" />
                              <span class="move-down btn btn-info">Move Down</span>
                            </td>
                        
                            <td width="10%">Image</td>
                            
                            <td width="70%">
                              <input type="file" name="images[{{row-count-placeholder}}]" />
                            </td>
                            
                            <td width="10%"><span class="remove btn btn-danger">Remove</span></td>
                          </tr>
                          </tbody>
                        </table>
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Content Row -->
<script src="<?php echo base_url(); ?>assets/js/repeatable-fields.js"></script>
<script>
$(function() {
	$('.repeat').each(function() {
      $(this).repeatable_fields({
        wrapper: 'table',
        container: 'tbody',
      });
	});

});
</script>