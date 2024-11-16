<?php
    include("config/dbconfig.php");
    include("includes/header.php");
?>
<link rel="stylesheet" href="css/custom.css">
<div class="container-fluid px-4">
    
    <div class="row mt-4">

        <div class="col-md-6 offset-md-3">

        <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Cập Nhật Sản Phẩm
                        <a href="trangChu.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php
                        if(isset($_GET['id'])) {
                            $product_id = $_GET['id'];
                            $product_query = "SELECT * FROM products WHERE id='$product_id' LIMIT 1";
                            $product_query_res = mysqli_query($conn, $product_query);

                            if(mysqli_num_rows($product_query_res) > 0) {
                                $product_row = mysqli_fetch_array($product_query_res);
                                ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="product_id" value="<?=$product_row['id']?>">
                    
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" name="name" value="<?=$product_row['name']?>" required class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Hình sản phẩm</label>
                                            <input type="hidden" name="old_image" value="<?=$product_row['image'] ?>"/>
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Giá cũ</label>
                                            <input type="text" name="old_price" value="<?=$product_row['old_price']?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Giá mới</label>
                                            <input type="text" name="new_price" value="<?=$product_row['new_price']?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Phần trăm giảm giá</label>
                                            <input type="text" name="sale_price" value="<?=$product_row['sale_price']?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="update_product" class="btn btn-primary">Cập nhật</button>
                                            <button type="" name="" class="btn btn-danger">Hủy</button>
                                        </div>

                                    </div>
                                </form>
                </div>
                                
                                <?php
                            }else{
                                ?>
                                <h4>No Record Found</h4>
                                <?php
                            }
                        }
                    ?>
                  
            </div>
        </div>
    </div>
<?php
    include("includes/footer.php");
?>
