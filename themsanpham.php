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
                    <h4>Thêm Mới Sản Phẩm
                        <a href="trangChu.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Hình sản phẩm</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Giá cũ</label>
                                <input type="text" name="old_price" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Giá mới</label>
                                <input type="text" name="new_price" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Phần trăm giảm giá</label>
                                <input type="text" name="sale_price" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_product" class="btn btn-primary">Thêm mới</button>
                                <button type="" name="" class="btn btn-danger">Hủy</button>
                            </div>

                        </div>
                    </form>
                
                </div>  
            </div>
        </div>
    </div>
<?php
    include("includes/footer.php");
?>
