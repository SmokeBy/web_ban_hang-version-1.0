<?php 
$id = $_GET['id'];
require_once 'admin/connect.php';
$sql = "select * from products
where 
id = '$id'";
$result = mysqli_query ($connect,$sql);
$each = mysqli_fetch_array ($result);
?>
<h1>
        <?php echo $each['name'] ?>
</h1>
<div class="align-items-center">
    
    <img src="admin/products/photos/<?php echo $each['photo'] ?>" height='300'>
    <h3>Giá: <?php echo $each['price'] ?>.000 vnd </h3>
    <br>
    <p><?php echo $each['description'] ?></p>
</div><br>
<a href="add_to_cart.php?id=<?php echo $each['id'] ?>" class="btn btn-success">Đặt hàng ngay</a>
<?php mysqli_close($connect); ?>
