<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Add Product</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmproduct" action="<?php echo site_url('vendor/products/insertproduct'); ?>" id="frmproduct" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <label>Category</label>
                                                            <select name="category_id" id="category_id" class="selectpicker form-control" data-style="btn-default">
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
                                                    <div class="col-sm-6">
                                                        <label>Select Market To Sell</label>
                                                        <select name="markets[]" id="markets" class="form-control selectpicker" multiple="multiple" data-style="btn-default">
                                                            
                                                            <?php foreach($markets as $market){ ?>
                                                                    <option value="<?php echo $market['id']; ?>"><?php echo $market['title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Is taxable?</label>
                                                        <select name="is_taxable" id="is_taxable" class="selectpicker form-control" data-style="btn-default">
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Tax</label>
                                                        <input type="text" class="form-control" name="tax" id="tax">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label for="image">Main Image</label>
                                                        <input type="file" name="mainimage" class="form-control" id="mainimage" placeholder="image">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Allow Comment?</label>
                                                        <select name="is_comment" id="is_comment" class="selectpicker form-control" data-style="btn-default">
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>
                                                        </select>
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
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group row">
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary">Add Product</button>
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