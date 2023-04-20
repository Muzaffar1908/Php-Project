<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Product</h4>
                        <a href="view-product.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">

                        <?php 
                          if(isset($_GET['id']))
                          {
                            $category_id = $_GET['id'];
                            $category_query = "SELECT * FROM products WHERE id = '$category_id' LIMIT 1";
                            $category_query_res = mysqli_query($conn, $category_query);

                            if(mysqli_num_rows($category_query_res) > 0)
                            {
                                $row = mysqli_fetch_array($category_query_res);
                                ?>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div>
                                                <input type="hidden" name="product_id" value = "<?= $row['id'] ?>"  class="form-control" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="category_id">Category List</label>
                                                <?php
                                                $category = "SELECT * FROM categories WHERE status = '0'";
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
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value = "<?= $row['name'] ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="slug">Slug (URL)</label>
                                                <input type="text" name="slug" value = "<?= $row['slug'] ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="desc">Description</label>
                                                <textarea name="description" class="form-control" rows="4"><?= $row['description'] ?></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="o_price">Original Price</label>
                                                <input type="number" name="original_price" value = "<?= $row['original_price'] ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="s_price">Selling Price</label>
                                                <input type="number" name="selling_price" value = "<?= $row['selling_price'] ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="image">Image</label>
                                                <input type="hidden" name="old_image"  value="<?= $row['image'] ?>" >
                                                <input type="file" name="image"  class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="meta_title">Meta Title</label>
                                                <input type="text" name="meta_title" value = "<?= $row['meta_title'] ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="m_desc">Meta Description</label>
                                                <textarea name="meta_description" class="form-control" rows="4"><?= $row['meta_description'] ?></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="mn_desc">Meta Keyword</label>
                                                <textarea name="meta_keyword" class="form-control" rows="4" ><?= $row['meta_keyword'] ?></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status</label>
                                                <input type="checkbox" name="status" width="70px"  height="70px" <?= $row['status'] == '1' ? 'checked' : ''; ?>>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_product" class="btn btn-success float-end">Update</button>
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