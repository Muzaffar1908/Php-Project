<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Organization</h4>
                        <a href="view-organization.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
                               
                                <div class="col-md-12 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" width="70px"  height="70px">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_organization" class="btn btn-success float-end">Save</button>
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