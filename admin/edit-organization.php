<?php include('authentication.php') ?>
<?php include('includes/header.php') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 bt-order">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Organization Update</h4>
                        <a href="view-organization.php" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <?php
                          $organization_id = $_GET['id'];
                          $organizations = "SELECT * FROM organizations WHERE id='$organization_id'";
                          $organizations_run = mysqli_query($conn, $organizations);

                          if(mysqli_num_rows($organizations_run) > 0)
                          {
                            foreach($organizations_run as $organization)
                            {
                                ?>
                                    <form action="code.php" method="POST">
                                        <div class="row">
                                            <div class="">
                                                <input type="hidden" name="organization_id" value="<?= $organization['id']?>" class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?= $organization['name']?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status</label>
                                                <input type="checkbox" name="status" width="70px" <?= $organization['status'] == '1' ? 'checked' : '' ?> height="70px">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_organization" class="btn btn-success float-end">Update</button>
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