<style>
.unit-container{display:none;}
</style>
<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header"><?php echo $product['title'];?> Inventories</h1>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addInventoryModal"><i class="fas fa-plus-square"></i>&nbsp;Add Inventory</button>
                        <hr class="mb-4">
                            <div id="datatable" class="mb-5">
                                
                                <div class="card">
                                  <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                          <th>Unit</th>
                                          <th>Price</th>
                                          <th>Available Qty</th>
                                          <th>Actions</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Unit</th>
                                          <th>Price</th>
                                          <th>Available Qty</th>
                                          <th>Actions</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>
                                        <?php foreach($inventories as $inventory) { ?>
                                          <tr>
                                            <th><?php echo $inventory['unit']; ?></th>
                                            <th><?php echo $inventory['price']; ?></th>
                                            <th><?php echo $inventory['availableqty']; ?></th>
                                            <th><a href="#" class="editInvantory" data-invenoryid="<?php echo $inventory['id']; ?>" data-price="<?php echo $inventory['price']; ?>" data-availableqty="<?php echo $inventory['availableqty']; ?>" data-toggle="modal" data-target="#EditInventoryModal">Edit</a> | <a href="<?php echo site_url('vendor/products/deleteInventory/'.$inventory['id'].'/'.$product_id); ?>">Delete</a></th>
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

<div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" aria-labelledby="addInventoryModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="frminventory" id="frminventory" action="<?php echo site_url('vendor/products/addInventory'); ?>">
      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>"/>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-form-label">Select Pack Size:</label>
                <select name="packsize" id="packsize" class="form-control">
                    <option value="">-Select Pack Size-</option>
                    <?php foreach($packsizes as $packsize) { ?>
                        <option value="<?php echo $packsize['id']; ?>" data-iscontainer="<?php echo $packsize['iscontainer']; ?>"><?php echo $packsize['title']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group unit-container">
                <label class="col-form-label">Quantity:</label>
                <input type="text" name="quantity" id="quantity" class="form-control">
            </div>
            <div class="form-group unit-container">
                <label class="col-form-label">Units:</label>
                <select name="unit" id="unit" class="form-control">
                    <option value="">-Select Pack Size-</option>
                    <?php foreach($units as $unit) { ?>
                        <option value="<?php echo $unit['id']; ?>"><?php echo $unit['title']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label">Available Quantities:</label>
                <input type="text" name="availableqty" id="availableqty" class="form-control">
            </div>
            <div class="form-group">
                <label class="col-form-label">Price:</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Inventories</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="EditInventoryModal" tabindex="-1" role="dialog" aria-labelledby="EditInventoryModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="frminventoryedit" id="frminventoryedit" action="<?php echo site_url('vendor/products/updateInventory'); ?>">
      <input type="hidden" name="id" id="editid" value=""/>
      <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-form-label">Available Quantities:</label>
                <input type="text" name="availableqty" id="editavailableqty" class="form-control">
            </div>
            <div class="form-group">
                <label class="col-form-label">Price:</label>
                <input type="text" name="price" id="editprice" class="form-control">
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Inventories</button>
        </div>
      </form>
    </div>
  </div>
</div>