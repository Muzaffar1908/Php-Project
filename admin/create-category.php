<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Category</h4>
                        <a href="view-category.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
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

                                <div class="col-md-12 mb-3">
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
                                    <label for="status">Navbar Status</label>
                                    <input type="checkbox" name="navbar_status" width="70px"  height="70px">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" width="70px"  height="70px">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_category" class="btn btn-success float-end">Save</button>
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