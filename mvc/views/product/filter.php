<style>
    .products-container {
        width: 100%;
    }

    .product-cell {
        background-color: #cccccc;
        height: 200px;
        outline: 1px solid black;
    }

    li {
        list-style-type: none;
        border: 1px solid black;
        margin-right: 10px;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="search mt-3">
        <form class="d-flex" method="get" action="<?php echo WEB_ROOT ?>/index.php">
            <input type="hidden" name="controller" value="product">
            <input type="hidden" name="action" value="filter">
            <input class="form-control me-2" type="search" placeholder="Search for something you want"
                aria-label="Search" name="search">
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>
</div>


<section class="products-container mt-4">
    <div class="container">
        <!-- Row for categories -->
        <div class="row w-100">
            <ul class="d-flex">
                <li><a href="<?php echo WEB_ROOT ?>/index.php?controller=product" class="btn">All</a></li>
                <li><a class="btn" href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=1">Consumer Electronics</a>
                </li>
                <li><a class="btn" href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=2">Clothes</a></li>
                <li><a class="btn" href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=3">Shoes</a></li>
                <li><a class="btn" href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=filter&c_id=4">Books</a></li>
            </ul>
        </div>

        <!-- Row for product -->
        <div class="row w-100">
            <?php
            if ($products == null) {
                echo "<h3 class='mt-3'>There is no product in this category</h3>";
            } else
            foreach ($products as $item): ?>
                <div class='col-sm-3 text-center'>
                    <a href='index.php?controller=product&action=show&id=<?php echo $item->id ?>'>
                        <div class='card bg-light mb-2'>
                            <div class='card-body'>
                                <img class='img-fluid' src='https://picsum.photos/200' alt='random image'>
                            </div>
                        </div>
                        <h5>
                            <?php echo $item->name ?>
                        </h5>
                        <p>Price:
                            <?php echo $item->price ?>
                        </p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
