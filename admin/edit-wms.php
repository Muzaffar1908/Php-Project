<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update WMS</h4>
                        <a href="view-wms.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">

                        <?php 
                          if(isset($_GET['id']))
                          {
                            $wms_id = $_GET['id'];
                            $wms_query = "SELECT * FROM wms WHERE id = '$wms_id' LIMIT 1";
                            $wms_query_res = mysqli_query($conn, $wms_query);

                            if(mysqli_num_rows($wms_query_res) > 0)
                            {
                                $row = mysqli_fetch_array($wms_query_res);
                                ?>
                                    <form action="code.php" method="POST">
                                        <div class="row">
                                            <div>
                                                <input type="hidden" name="wms_id" value = "<?= $row['id'] ?>"  class="form-control" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="organization_id">Organization List</label>
                                                <?php
                                                $organization = "SELECT * FROM organizations WHERE status = '0'";
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
                                                                <option value = "<?= $organizationItem['id']?>" <?= $organizationItem['id'] == $row['organization_id'] ? 'selected' : '' ?>>
                                                                  <?= $organizationItem['name']?>
                                                                </option>
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
                                                <input type="date" name="date" value="<?= $row['date'] ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" value="<?= $row['quantity'] ?>" class="form-control" required>
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
                                                                <option value = "<?= $categoryItem['id']?>" <?= $categoryItem['id'] == $row['category_id'] ? 'selected' : '' ?>>
                                                                  <?= $categoryItem['name']?>
                                                                </option>
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
                                                                <option value = "<?= $productItem['id']?>" <?= $productItem['id'] == $row['product_id'] ? 'selected' : '' ?>>
                                                                  <?= $productItem['name']?>
                                                                </option>
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
                                                <input type="number" name="inventory" value="<?= $row['inventory']?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status</label>
                                                <input type="checkbox" name="status" width="70px"  height="70px" <?= $row['status'] == '1' ? 'checked' : ''; ?>>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_wms" class="btn btn-success float-end">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                            }
                            else
                            {
                                ?>
                                  <h4>No Record Found</h4>
                                <?php
                            }
                          }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php include('includes/footer.php') ?>