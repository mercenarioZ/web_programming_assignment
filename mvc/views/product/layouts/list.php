<style>
    .products-container {
        width: 100%;
    }

    li {
        list-style-type: none;
        border: 1px solid black;
        margin-right: 10px;
        border-radius: 5px;
    }
</style>

<section class="container">
    <div class="search mt-3">
        <form class="d-flex" method="get" action="<?php echo WEB_ROOT ?>/index.php">
            <input type="hidden" name="controller" value="product">
            <input type="hidden" name="action" value="filter">
            <input class="form-control me-2" type="search" placeholder="Search for something you want"
                aria-label="Search" name="search">
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>
</section>

<section class="products-container mt-4">
    <div class="container">
        <div class="row w-100">
            <ul class="d-flex">
                <li><a href="<?php echo WEB_ROOT ?>/index.php?controller=product" class="btn">All</a></li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=electronics">Consumer
                        Electronics</a></li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=clothes">Clothes</a>
                </li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=shoes">Shoes</a>
                </li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=books">Books</a>
                </li>
            </ul>
        </div>

        <?= require $productList ?>

    </div>
</section>