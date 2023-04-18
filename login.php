<?php $title = 'Login Page' ?>

<?php
session_start();

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message']))
    {
        $_SESSION['message'] = "You are alerdy logged In";
    }
    header("Location: index.php");
    exit(0);
}

include('includes/header.php');?>

<div class="container login-form">
    
    <form action="logincode.php" method="post">
        <div class="imgcontainer">
            <img src="image/avatar.png" alt="Avatar" class="avatar">
        </div>

        <?php include('message.php') ?>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" placeholder="Enter Email"  required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter Password"  required>

            <button type="submit" name="login_btn">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Page -> <a href="register.php">Register</a></span>
        </div>
    </form>
</div>




<?php include('includes/footer.php') ?>

