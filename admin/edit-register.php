<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users Update</h4>
                        <a href="view-register.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <?php
                          $user_id = $_GET['id'];
                          $users = "SELECT * FROM users WHERE id='$user_id'";
                          $users_run = mysqli_query($conn, $users);

                          if(mysqli_num_rows($users_run) > 0)
                          {
                            foreach($users_run as $user)
                            {
                                ?>
                                    <form action="code.php" method="POST">
                                        <div class="row">
                                            <div class="">
                                                <input type="hidden" name="user_id" value="<?= $user['id']?>" class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="fname" value="<?= $user['fname']?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="lname">Last Name</label>
                                                <input type="text" name="lname" value="<?= $user['lname']?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email Address</label>
                                                <input type="text" name="email" value="<?= $user['email']?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="role_as">Role as</label>
                                                <select name="role_as" required class="form-control">
                                                    <option selected>-- Select Role --</option>
                                                    <option value="1" <?= $user['role_as'] == '1' ? 'selected' : '' ?> > Admin </option>
                                                    <option value="0" <?= $user['role_as'] == '0' ? 'selected' : '' ?> > User </option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status</label>
                                                <input type="checkbox" name="status" width="70px" <?= $user['status'] == '1' ? 'checked' : '' ?> height="70px">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_user" class="btn btn-success float-end">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                            }
                          }
                          else
                          {
                            ?>
                                <h1>No Record Found</h1>
                            <?php 
                          }
                       ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php include('includes/footer.php') ?>