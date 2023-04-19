<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <a href="create-register.php" class="btn btn-success">Create User</a>
                    </div>
                    <div class="card-body">

                      <?php include('message.php') ?>

                        <div class="table-responsive">
                            <table class="table primary-table-bordered">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM users";
                                        $query_run = mysqli_query($conn, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                                <tr>
                                                    <td><?= $row['id']?></td>
                                                    <td><?= $row['fname']?></td>
                                                    <td><?= $row['lname']?></td>
                                                    <td><?= $row['email']?></td>
                                                    <td>
                                                        <?php
                                                        if($row['role_as'] == '1')
                                                        {
                                                            echo 'Admin';
                                                        }
                                                        elseif($row['role_as'] == '0')
                                                        {
                                                            echo 'User';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><a href="edit-register.php?id=<?= $row['id']?>" class="btn btn-success">Edit</a></td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" class="btn btn-danger" name="user_delete" value="<?= $row['id'] ?>">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                        ?>
                                            <tr>
                                                <td colspan="6"><h1>No Record Found</h1></td>
                                            </tr>
                                        <?php 
                                        }
                                    ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php include('includes/footer.php') ?>