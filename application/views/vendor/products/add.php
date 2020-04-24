<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
</div>
<!-- Content Row -->
<div class="row">

    
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

            <form name="frmproduct" action="<?php echo site_url('vendor/products/insertproduct'); ?>" id="frmproduct" method="post"> 
               
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