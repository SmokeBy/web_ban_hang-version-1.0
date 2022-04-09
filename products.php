<?php 
require_once 'admin/connect.php';
$sql = "select * from products";
$result = mysqli_query ($connect,$sql);
?>
<div class="container">
    <div class="row">
        <?php foreach ($result as $each): ?>
            <div class="card card_menu" style="width: 25%;">
                <img src="admin/products/photos/<?php echo $each['photo'] ?>" class="card-img-top img">
                <div class="card-body">
                    <div class="card-title">
                        <h5><?php echo $each['name'] ?></h5>
                    </div>
                    <p class="card-text"><?php echo $each['price'] ?>.000 vnd</p>
                    <a href="product.php?id=<?php echo $each['id'] ?>" class="btn btn-info">
                        Xem chi tiết >>>
                    </a><br>
                    <!-- kiểm tra nếu session id không trống thì kích hoạt tính năng add giỏ hàng -->
                    <?php if(!empty($_SESSION['id'])) { ?>
                        <a href="add_to_cart.php?id=<?php echo $each['id'] ?>" class="btn btn-primary">
                            Thêm vào giỏ của bạn
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php mysqli_close($connect) ?>