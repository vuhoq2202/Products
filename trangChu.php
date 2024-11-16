<?php
    include_once("config/dbconfig.php");
    include_once("includes/header.php");
?>
<body>
        <div class="container-header">
            <h4 class="product-title">DANH SÁCH SẢN PHẨM</h4>
            <a href="themsanpham.php" class="btn btn-primary float-end">Thêm sản phẩm</a>
        </div>
        <div class="container">
            <div class="row">
                    <?php
                        $product = "SELECT * FROM products";
                        $products_run = mysqli_query($conn, $product);

                        if(mysqli_num_rows($products_run) > 0){
                            foreach($products_run as $product){
                    ?>
                <div class="col">
                
                    <img src="./image/<?=$product['image']?>" alt="Image">
                    <div class="col-content">
                        <h3><?=$product['name']?></h3>
                        <div class="discout">
                                <span class="discout-price"><?=$product['old_price']?>&nbsp; VNĐ</span>
                                <span class="f-size-12"><?=$product['sale_price']?>&nbsp; %</span>
                        </div>
                            <p class="re-price"><?=$product['new_price']?>&nbsp; VNĐ</p>
                            <form action="code.php" method="POST">
                                <a href="suasanpham.php?id=<?=$product['id']?>" class="btn btn-primary">Sửa</a>
                                <button type="submit" name="delete_product" value="<?=$product['id']?>" class="btn btn-danger">Xóa</button>
                            </form>
                    </div>
                </div>
                            <?php
                        }
                    }
                    ?>
            </div>

            
<?php
    include_once("includes/footer.php");
?>