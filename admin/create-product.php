<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Product</h4>
                        <a href="view-product.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
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
                                    <label for="name">Name</label>
                                    <input type="text" name="name"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="slug">Slug (URL)</label>
                                    <input type="text" name="slug"  class="form-control" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="desc">Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="o_price">Original Price</label>
                                    <input type="number" name="original_price"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="s_price">Selling Price</label>
                                    <input type="number" name="selling_price"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="m_desc">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="mn_desc">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4" ></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" width="70px"  height="70px">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_product" class="btn btn-success float-end">Save</button>
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