<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reports</h4>
                        <a href="create-report.php" class="btn btn-success">Report Create</a>
                    </div>
                    <div class="card-body">
                      <?php include('message.php') ?>   
                        <div class="table-responsive">
                            <table class="table primary-table-bordered">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Entre Date</th>
                                        <th scope="col">Out Date</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT r.*, p.name AS pname FROM reports r, products p WHERE p.id = r.product_id";
                                        $query_run = mysqli_query($conn, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                                <tr>
                                                    <td><?= $row['id']?></td>
                                                    <td><?= $row['pname']?></td>
                                                    <td><?= $row['enter_date']?></td>
                                                    <td><?= $row['out_date']?></td>
                                                    <td><?= $row['quantity']?></td>
                                                    <td><a href="edit-report.php?id=<?= $row['id'];?>" class="btn btn-success">Edit</a></td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" class="btn btn-danger" name="report_delete" value="<?= $row['id'] ?>">Delete</button>
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