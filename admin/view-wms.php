<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">WMS</h4>
                        <a href="create-wms.php" class="btn btn-success">Create WMS</a>
                    </div>
                    <div class="card-body">

                      <?php include('message.php') ?>

                        <div class="table-responsive">
                            <table class="table primary-table-bordered">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Organization</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Inventory</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT w.*, o.name AS oname, c.name AS cname, p.name AS pname FROM wms w, organizations o, categories c, products p WHERE w.organization_id = o.id AND w.category_id = c.id AND w.product_id = p.id";
                                        $query_run = mysqli_query($conn, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                                <tr>
                                                    <td><?= $row['id']?></td>
                                                    <td><?= $row['oname']?></td>
                                                    <td><?= $row['cname']?></td>
                                                    <td><?= $row['pname']?></td>
                                                    <td><?= $row['quantity']?></td>
                                                    <td><?= $row['inventory']?></td>
                                                    <td><?= $row['status'] == '1' ? 'hidden' : 'visible' ?></td>
                                                    <td><a href="edit-wms.php?id=<?= $row['id'];?>" class="btn btn-success">Edit</a></td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" class="btn btn-danger" name="wms_delete" value="<?= $row['id'] ?>">Delete</button>
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