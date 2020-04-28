<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
</div>
<!-- Content Row -->
<div class="row">

    
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

            <form name="frmproduct" action="<?php echo site_url('vendor/products/updateProduct'); ?>" id="frmproduct" method="post" enctype="multipart/form-data"> 
               <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
            <div class="form-group">
                    <div class="col-sm-6">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach($categories as $category){ ?>
                                    <option value="<?php echo $category['id']; ?>" <?php echo ($product['category_id']==$category['id']) ? "selected=''" : ''; ?>><?php echo $category['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $product['title']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id="description"><?php echo $product['description']; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image">Main Image</label>
                    <input type="file" name="mainimage" class="form-control" id="mainimage" placeholder="mainimage">
                    <?php if(!empty($product['image'])) { ?>
                        <img class="img-responsive" width="150px" src="<?php echo base_url(); ?>uploads/products/<?php echo $product['image']; ?>"/>
                    <?php } ?>
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
                        
                            <td width="10%">Question</td>
                            
                            <td width="70%">
                              <input type="file" name="images[{{row-count-placeholder}}]" />
                              <input type="hidden" name="image_id[{{row-count-placeholder}}]" value="new"/>
                            </td>
                            
                            <td width="10%"><span class="remove btn btn-danger">Remove</span></td>
                          </tr>
                          <?php foreach($images as $key=>$val) {?>
                            <tr class="row">
                                <td width="10%">
                                  <span class="move btn btn-info">Move Row</span>
                                  <span class="move-up btn btn-info">Move Up</span>
                                  <input type="text" class="move-steps" value="1" />
                                  <span class="move-down btn btn-info">Move Down</span>
                                </td>
                            
                                <td width="10%">Question</td>
                                
                                <td width="70%">
                                  <input type="hidden" name="image_id[<?php echo $key; ?>]" value="<?php echo $val['id']; ?>"/>
                                  <?php if(!empty($val['image'])) { ?>
                                        <img class="img-responsive" width="150px" src="<?php echo base_url(); ?>uploads/products/images/<?php echo $val['image']; ?>"/>
                                    <?php } ?>
                                </td>
                                
                                <td width="10%"><span class="remove btn btn-danger">Remove</span></td>
                              </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Edit Product
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