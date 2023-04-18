<?php $title = 'Home Page' ?>

<?php
session_start();
include('includes/header.php') ?>

<div class="container">
    <h2 class="text-center"></h2>
        Hello World ! <?php include('message.php'); ?>
    </h2>
</div>


<?php include('includes/footer.php') ?>