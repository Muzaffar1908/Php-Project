<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create WMS</h4>
                        <a href="view-wms.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="organization_id">Organization List</label>
                                    <?php
                                      $organization = "SELECT * FROM organizations WHERE status != '2'";
                                      $organization_run = mysqli_query($conn, $organization);

                                      if(mysqli_num_rows($organization_run) > 0)
                                      {
                                        ?>
                                            <select name="organization_id" required class="form-control">
                                                <option selected>-- Select Organization --</option>
                                                <?php 
                                                   foreach($organization_run as $organizationItem)
                                                   {
                                                     ?>
                                                       <option value = "<?= $organizationItem['id']?>"><?= $organizationItem['name']?></option>
                                                     <?php
                                                   }
                                                ?>
                                            </select> 
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                          <h5> No Organization Avaiable </h5>
                                        <?php
                                      }
                                    ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="date">Date</label>
                                    <input type="date" name="date"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="category_id">Category List</label>
                                    <?php
                                      $category = "SELECT * FROM categories WHERE status != '2'";
                                      $category_run = mysqli_query($conn, $category);

                                      if(mysqli_num_rows($category_run) > 0)
                                      {
                                        ?>
                                            <select name="category_id" required class="form-control">
                                                <option selected>-- Select Category --</option>
                                                <?php 
                                                   foreach($category_run as $categoryItem)
                                                   {
                                                     ?>
                                                       <option value = "<?= $categoryItem['id']?>"><?= $categoryItem['name']?></option>
                                                     <?php
                                                   }
                                                ?>
                                            </select> 
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                          <h5> No Category Avaiable </h5>
                                        <?php
                                      }
                                    ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="product_id">Product List</label>
                                    <?php
                                      $product = "SELECT * FROM products WHERE status != '2'";
                                      $product_run = mysqli_query($conn, $product);

                                      if(mysqli_num_rows($product_run) > 0)
                                      {
                                        ?>
                                            <select name="product_id" required class="form-control">
                                                <option selected>-- Select Product --</option>
                                                <?php 
                                                   foreach($product_run as $productItem)
                                                   {
                                                     ?>
                                                       <option value = "<?= $productItem['id']?>"><?= $productItem['name']?></option>
                                                     <?php
                                                   }
                                                ?>
                                            </select> 
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                          <h5> No Product Avaiable </h5>
                                        <?php
                                      }
                                    ?>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="inventory">Inventory</label>
                                    <input type="number" name="inventory"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" width="70px"  height="70px">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_wms" class="btn btn-success float-end">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php include('includes/footer.php') ?>