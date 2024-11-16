<?php
    session_start();
    include("config/dbconfig.php");


    if(isset($_POST["delete_product"])){
        $product_id = $_POST["delete_product"];

        $check_img_query = "SELECT * FROM products WHERE id='$product_id' LIMIT 1 ";
        $img_res = mysqli_query($conn, $check_img_query);
        $res_data = mysqli_fetch_array($img_res);
        $image = $res_data['image'];

        $query = "DELETE FROM products WHERE id='$product_id' LIMIT 1";
        $query_run = mysqli_query($conn, $query);

        if($query_run){

            if(file_exists('./image/'.$image)){
                unlink("./image/".$image);
            }

            $_SESSION['message'] = 'Product Deleted Successfully';
            header('Location: trangChu.php');
            exit(0);
        }else{
            $_SESSION['message'] = 'Something Went Wrong!';
            header('Location: trangChu.php');
            exit(0);
        }
    }



    if(isset($_POST["update_product"])){
        $product_id = $_POST["product_id"];
        $name = $_POST["name"];
        $old_price = $_POST["old_price"];
        $new_price = $_POST["new_price"];
        $sale_price = $_POST["sale_price"];

        $old_filename = $_POST["old_image"];
        $image = $_FILES["image"]["name"];

        $update_filename = "";
        if($image != NULL){
            // rename this image
            $image_extension = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time().".".$image_extension;

            $update_filename = $filename;
        }else{
            $update_filename = $old_filename;
        }

        $query = "UPDATE products SET name='$name',old_price='$old_price',new_price='$new_price',sale_price='$sale_price',image='$update_filename'
                    WHERE id='$product_id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            if($image != NULL){
                if(file_exists('./image/'.$old_filename)){
                    unlink("./image/".$old_filename);
                }
                move_uploaded_file($_FILES['image']['tmp_name'],'./image/'.$update_filename);
            }


            $_SESSION['message'] = 'Product Updated Successfully';
            header('Location: suasanpham.php?id='.$product_id);
            exit(0);
        }else{
            $_SESSION['message'] = 'Something Went Wrong!';
            header('Location: suasanpham.php?id='.$product_id);
            exit(0);
        }
    }
    

    if(isset($_POST["add_product"])){
        $name = $_POST["name"];
        $old_price = $_POST["old_price"];
        $new_price = $_POST["new_price"];
        $sale_price = $_POST["sale_price"];


        $image = $_FILES["image"]["name"];
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().".".$image_extension;

        $query = "INSERT INTO products(name,old_price,new_price,sale_price,image) VALUES ('$name','$old_price','$new_price','$sale_price','$filename')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            move_uploaded_file($_FILES["image"]["tmp_name"],'./image/'.$filename);
            $_SESSION['message'] = 'Sản Phẩm Đã Thêm Thành Công';
            header('Location: themsanpham.php');
            exit(0);
        }else{
            $_SESSION['message'] = 'Lỗi khi thêm sản phẩm!';
            header('Location: themsanpham.php');
            exit(0);
        }

    }
?>