<?php $title = 'Register Page' ?>

<?php
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are alerdy logged In";
    header("Location: index.php");
    exit(0);
}

include('includes/header.php') ?>

<div class="container register-form">
    
    <form action="registercode.php" method="post">
        <div class="imgcontainer">
            <img src="image/avatar.png" alt="Avatar" class="avatar">
        </div>

        <?php include('message.php'); ?>

        <div class="container">
            <label for="fname"><b>First Name</b></label>
            <input type="text" name="fname" placeholder="Enter First Name" required>

            <label for="lname"><b>Last Name</b></label>
            <input type="text" name="lname" placeholder="Enter Last Name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" name="email" placeholder="Enter Email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <label for="cpsw"><b>Password Confirmed</b></label>
            <input type="password" name="cpassword" placeholder="Enter Password Confirmed" required>

            <button type="submit" name="register_btn">Register Now</button>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Page -> <a href="login.php">Login</a></span>
        </div>
    </form>
</div>




<?php include('includes/footer.php') ?>


