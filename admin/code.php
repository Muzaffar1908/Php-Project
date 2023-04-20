<?php include('authentication.php');

if(isset($_POST['product_delete']))
{
    $product_id = $_POST['product_delete'];

    $check_img_query = "SELECT * FROM products WHERE id = '$category_id' LIMIT 1";
    $img_res = mysqli_query($conn, $check_img_query);
    $res_data = mysqli_fetch_array( $img_res);
    $image = $res_data['image'];

    $query = "DELETE FROM products WHERE id = '$product_id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        if(file_exists('../upload/product_image/'. $image))
        {
            unlink("../upload/product_image/". $image);
        }

        $_SESSION['message'] = 'Product Deleted Successfully';
        header('Location: view-product.php?id='.$product_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-product.php?id='.$product_id);
        exit(0);
    }

}

if(isset($_POST['update_product']))
{
    $product_id = $_POST['product_id'];

    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if($image != NULL)
    {
        // Rename this Image
        $image_extension =  pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_extension; 

        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_filename;   
    }


    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE products SET category_id = '$category_id', name = '$name', slug = '$slug', description = '$description', original_price = '$original_price',
     selling_price = '$selling_price', meta_title = '$meta_title', meta_description = '$meta_description', meta_keyword = '$meta_keyword',
      image = '$update_filename', status = '$status' WHERE id = '$category_id'";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        if($image != NULL)
        {
            if(file_exists('../upload/product_image/'. $old_filename))
            {
               unlink("../upload/product_image/". $old_filename);
            }

           move_uploaded_file($_FILES['image']['tmp_name'], '../upload/product_image/'.$update_filename);
        }

        $_SESSION['message'] = 'Product Updated Successfully';
        header('Location: view-product.php?id='.$product_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-product.php?id='.$product_id);
        exit(0);
    }     
}


if(isset($_POST['add_product']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    // Rename this Image
    $image_extension =  pathinfo($image, PATHINFO_EXTENSION);
    $filename = time(). '.' .$image_extension; 

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO products(category_id, name, slug, description, original_price, selling_price, image, meta_title, meta_description, meta_keyword, status)
            VALUES ('$category_id', '$name', '$slug', '$description', '$original_price', '$selling_price', '$filename', '$meta_title', '$meta_description', '$meta_keyword', '$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../upload/product_image/'.$filename);
        $_SESSION['message'] = 'Product Created Successfully';
        header('Location: view-product.php ');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-product.php');
        exit(0);
    }                      
}

if(isset($_POST['category_delete']))
{
    $category_id = $_POST['category_delete'];

    // 2 = delete
    $query = "UPDATE categories SET status = '2' WHERE id = '$category_id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = 'Category Deleted Successfully';
        header('Location: view-category.php ');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-category.php');
        exit(0);
    }
}

if(isset($_POST['category_update']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $navbar_status = $_POST['navbar_status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE categories SET  name='$name', slug ='$slug', description='$description', meta_title='$meta_title', 
    meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status', status='$status' WHERE id='$category_id'";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = 'Category Updated Successfully';
        header('Location: view-category.php?id='.$category_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-category.php.php?id='.$category_id);
        exit(0);
    }
}


if(isset($_POST['add_category']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $navbar_status = $_POST['navbar_status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO categories(name, slug, description, meta_title, meta_description, meta_keyword, navbar_status, status)
     VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keyword', '$navbar_status', '$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = 'Category Cateated Successfully';
        header('Location: view-category.php ');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-category.php.php');
        exit(0);
    }


}



if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id = '$user_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = '(Admin or User) Deleted Successfully';
        header('Location: view-register.php ');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['add_user']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO users(fname, lname, email, password, role_as, status) VALUES ('$fname', '$lname', '$email', '$password', '$role_as', '$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = '(Admin or User) Created Successfully';
        header('Location: view-register.php ');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', role_as = '$role_as', status = '$status' WHERE id = '$user_id'";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Update Successfully";
        header("Location: view-register.php");
        exit(0);
    }


}

?>