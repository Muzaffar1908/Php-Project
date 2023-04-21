<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Report</h4>
                        <a href="view-report.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
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

                                <div class="col-md-6 mb-3">
                                    <label for="enter_date">Enter Date</label>
                                    <input type="date" name="enter_date"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="out_date">Out Date</label>
                                    <input type="date" name="out_date"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity"  class="form-control" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_report" class="btn btn-success float-end">Save</button>
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