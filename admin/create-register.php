<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create (Admin or User)</h4>
                        <a href="view-register.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email"  class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="role_as">Role as</label>
                                    <select name="role_as" required class="form-control">
                                        <option selected>-- Select Role --</option>
                                        <option value="1"  > Admin </option>
                                        <option value="0"  > User </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" width="70px"  height="70px">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_user" class="btn btn-success float-end">Save (Admin or User)</button>
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