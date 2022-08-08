<header>
    <nav>
        <ul>
            <li><a id="supplier" href="view-supplier.php?active='supplier'">Supplier</a></li>
            <li><a id="customer" href="view-customer.php?active='customer'">Customer</a></li>
            <li><a id="product" href="view-product.php?active='product'">Products</a></li>
            <li><a id="gr" href="gr-transaction.php?active='gr' ">Goods Receive</a></li>
            <li><a id="purch" href="purch-transaction.php?active='purch' ">Purchasing</a></li>
        </ul>
    </nav>
</header>

<script>
setActive(<?php echo $_GET['active'] ?>)
</script>