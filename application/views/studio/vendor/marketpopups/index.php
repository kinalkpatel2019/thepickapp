<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="card mb-3">
                                        <div class="card-body">
                        <h1 class="page-header">My Market Messages</h1>
                        <ht class="mb-4">
                        
                        <table id="datatableDefault" class="table text-nowrap" data-order='[0, "desc"]'>
                          <thead>
                          <tr> 
                            <th>Market</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Market</th>
                            <th>Edit</th>
                            </tr>
                        </tfoot>
                        <tbofy>
                            <?php foreach($markets as $market) { ?>
                                <tr>
                                    <td><?php echo $market['title']; ?></td>
                                    <td><a href="<?php echo site_url('vendor/marketpopups/edit/'.$market['id']); ?>">Edit</a></td>
                                </tr>
                            <?php } ?>
                        </tbofy>
                          </table>                                                               
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>