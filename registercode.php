<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['register_btn']))
{
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if($password == $confirm_password)
    {
        // Check Email
        $checkemail = "SELECT email FROM users WHERE email = '$email'";
        $checkemail_run = mysqli_query($conn, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            // Alerdy Email Exists
            $_SESSION['message'] = 'Alerdy Email Exists';
            header("Location: register.php");
            exit(0);
        }
        else
        {
            $user_query = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
            $user_query_run = mysqli_query($conn, $user_query);

            if($user_query_run)
            {
                $_SESSION['message'] = 'Register Successfully';
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = 'Something Went Wrong!';
                header("Location: register.php");
                exit(0);
            }
        }
    }
    else
    {
        $_SESSION['message'] = 'Password and Confirm Password does not Match';
        header("Location: register.php");
        exit(0);   
    }

}
else
{
    header("Location: register.php");
    exit(0);
}

?>