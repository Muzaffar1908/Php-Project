<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Report</h4>
                        <a href="view-report.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">

                        <?php 
                          if(isset($_GET['id']))
                          {
                            $product_id = $_GET['id'];
                            $product_query = "SELECT * FROM reports WHERE id = '$product_id' LIMIT 1";
                            $product_query_res = mysqli_query($conn, $product_query);

                            if(mysqli_num_rows($product_query_res) > 0)
                            {
                                $row = mysqli_fetch_array($product_query_res);
                                ?>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div>
                                                <input type="hidden" name="report_id" value = "<?= $row['id'] ?>"  class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="product_id">Product List</label>
                                                <?php
                                                $product = "SELECT * FROM products WHERE status = '0'";
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

                                            <div class="col-md-6 mb-3">
                                                <label for="enter_date">Enter Date</label>
                                                <input type="date" name="enter_date" value="<?= $row['enter_date'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="out_date">Out Date</label>
                                                <input type="date" name="out_date" value="<?= $row['out_date'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" value="<?= $row['quantity'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_report" class="btn btn-success float-end">Update</button>
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