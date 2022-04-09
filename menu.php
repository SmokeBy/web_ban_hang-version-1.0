<nav class="navbar navbar-light bg-light justify-content-between">
<div>
    <a class="navbar-brand" href="index.php">Thanh An Shop</a>
    
    <ul class="navbar-nav mr-auto">
        <?php if(empty($_SESSION['id'])){ ?>
        <li>
            <a href="sign_in.php" class="link-primary">
                Đăng nhập
            </a>
        </li>
        <li>
            <a href="sign_up.php" class="link-success">
                Đăng ký
            </a>
        </li>
        <?php } else { ?>
            Chào <?php echo $_SESSION['name'] ?>,
            <a href="sign_out.php" class="link-danger">
                Đăng xuất
            </a><br>
            <div>
                <a href="view_cart.php" class="link-info">
                    Xem giỏ hàng
                </a>
            </div>
        <?php } ?>
    </ul>
</div>

<div>
<form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
</nav>