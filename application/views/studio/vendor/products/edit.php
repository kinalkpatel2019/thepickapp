<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Edit Product</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmproduct" action="<?php echo site_url('vendor/products/updateProduct'); ?>" id="frmproduct" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                                                <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <label>Category</label>
                                                            <select name="category_id" id="category_id" class="selectpicker form-control" data-style="btn-default">
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
                                                    <div class="col-sm-6">
                                                        <label>Select Market To Sell</label>
                                                        <select name="markets[]" id="markets" class="form-control selectpicker" multiple="multiple" data-style="btn-default">
                                                            <?php $selected=explode(',',$product['markets']); ?>
                                                            <?php foreach($markets as $market){ ?>
                                                                    <option value="<?php echo $market['id']; ?>" <?php echo (in_array($market['id'],$selected)) ? 'selected=""' : ''; ?>><?php echo $market['title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Is taxable?</label>
                                                        <select name="is_taxable" id="is_taxable" class="selectpicker form-control" data-style="btn-default">
                                                                <option value="0" <?php echo ($product['is_taxable']==0) ? "selected=''" : ""; ?>>No</option>
                                                                <option value="1" <?php echo ($product['is_taxable']==1) ? "selected=''" : ""; ?>>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Tax</label>
                                                        <input type="text" class="form-control" name="tax" id="tax" value="<?php echo $product['tax']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Allow Comment?</label>
                                                        <select name="is_comment" id="is_comment" class="selectpicker form-control" data-style="btn-default">
                                                                <option value="0" <?php echo ($product['is_comment']==0) ? "selected=''" : ""; ?>>No</option>
                                                                <option value="1" <?php echo ($product['is_comment']==1) ? "selected=''" : ""; ?>>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label for="image">Main Image</label>
                                                        <input type="file" name="mainimage" class="form-control" id="mainimage" placeholder="image">
                                                        <?php if(!empty($product['image'])) { ?>
                                                            <img class="img-responsive" width="150px" src="<?php echo base_url(); ?>uploads/products/<?php echo $product['image']; ?>"/>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                


                                                <div class="form-group">
                                                    <div class="col-sm-12">
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
                                                </div>
                                                    
                                                <div class="form-group row">
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary">Update Product</button>
													</div>
												</div>

                                                
                                            </form>
                                        </div>                                       
                                    </div>
                                </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>