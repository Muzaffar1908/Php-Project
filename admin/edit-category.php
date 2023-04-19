<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Category</h4>
                        <a href="view-category.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $category_id = $_GET['id'];
                            $category_edit = "SELECT * FROM categories WHERE id = '$category_id' LIMIT 1";
                            $category_run = mysqli_query($conn, $category_edit);

                            if(mysqli_num_rows($category_run) > 0)
                            {
                                $row = mysqli_fetch_array($category_run);

                                ?> 
                                   <form action="code.php" method="POST">
                                        <div class="row">
                                            <div class="">
                                                <input type="hidden" name="category_id" value="<?= $row['id'] ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="slug">Slug (URL)</label>
                                                <input type="text" name="slug" value="<?= $row['slug'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="desc">Description</label>
                                                <textarea name="description" class="form-control" rows="4"><?= $row['description'] ?></textarea>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="meta_title">Meta Title</label>
                                                <input type="text" name="meta_title"  class="form-control" value="<?= $row['meta_title'] ?>" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="m_desc">Meta Description</label>
                                                <textarea name="meta_description" class="form-control" rows="4"><?= $row['meta_description'] ?></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="mn_desc">Meta Keyword</label>
                                                <textarea name="meta_keyword" class="form-control" rows="4"><?= $row['meta_keyword'] ?></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="status">Navbar Status</label>
                                                <input type="checkbox" name="navbar_status" width="70px" <?= $row['navbar_status'] == '1' ? 'checked' : '' ?> height="70px">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status</label>
                                                <input type="checkbox" name="status" width="70px"  <?= $row['status'] == '1' ? 'checked' : '' ?> height="70px" >
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="category_update" class="btn btn-success float-end">Update</button>
                                            </div>
                                        </div>
                                    </form>
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