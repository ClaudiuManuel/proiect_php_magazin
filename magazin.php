<?php
    require_once "ShoppingCart.php";
?>
<HTML>
    <HEAD>
        <TITLE>Creare cos cumparaturi </TITLE>
        <link href="style.css" type="text/css" rel="stylesheet" />
    </HEAD>
<BODY>
<div class="main">
<div class="header-buttons" style="text-align:center;">
    <div class="txt-heading-label" style="padding-left:0px;">Products</div>
    <div class="txt-heading-label">
        <a href="cos.php" style="font-size:18px;color:#000">Cart</a>
    </div>
    <div class="txt-heading-label">
        <a href="logout.php" style="font-size:18px;color:#000">Log out</a>
    </div>
</div>
<section class="tiles">
        <?php
            $shoppingCart = new ShoppingCart();
            $query = "SELECT * FROM tbl_product";
            $product_array = $shoppingCart->getAllProduct($query);
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
        ?>
        <div class="product-item">
            <form method="post" action="cos.php?action=add&code=<?php echo $product_array[$key]["code"];?>">
                <div class="product-image">
                    <img src="<?php echo $product_array[$key]["image"]; ?>" class="img-game">
                </div>
                <div>
                    <strong><?php echo $product_array[$key]["name"]; ?></strong>
                </div>
                <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                <div>
                    <input type="text" name="quantity" value="1" size="2" />
                    <input type="submit" value="Add to cart" class="btnAddAction" />
                </div>
            </form>
        </div>
        <?php
        }
    }
 ?>
 </section>
 </div>

</BODY>
</HTML>