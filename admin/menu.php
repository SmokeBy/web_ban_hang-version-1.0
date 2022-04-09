
<div class ="navbar bg-dark">
    <ul class ="nav navbar-nav">
        <li class ="nav-item">
            <a href="../manufacturers" style="text-decoration: none">
                Quản lý nhà sản xuất
            </a>
        </li>
        <li class ="nav-item">
            <a href="../products" style="text-decoration: none">
                Quản lý sản phẩm
            </a>
        </li>
    </ul>
</div>



<?php 
    if(isset($_GET['error'])){
?>
    
    <span style='color:red'>
        <?php echo $_GET['error'] ?>
    </span>

    <?php 
    } 
?> 

<?php 
    if(isset($_GET['success'])){
?>
    
    <span style='color:green'>
        <?php echo $_GET['success'] ?>
    </span>

    <?php 
    } 
?>  