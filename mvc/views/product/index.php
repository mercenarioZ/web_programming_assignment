<style>
    .products-container {
        width: 100%;
        /* overflow-x: hidden; */
    }

    .for-md-scr li {
        list-style-type: none;
        border: 1px solid black;
        margin-right: 10px;
        border-radius: 5px;
    }

    .card-body img {
        width: 250px;
        height: 250px;
        object-fit: contain;
    }

    .card-body {
        padding: .5rem;
    }

    .container {}
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
    <div class="container h-100">
        <div class="row w-100">
            <ul class="d-md-flex d-none for-md-scr">
                <li><a href="<?php echo WEB_ROOT ?>/index.php?controller=product" class="btn">All</a></li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=electronic">Consumer
                        Electronics</a></li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=clothes">Clothes</a>
                </li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=shoes">Shoes</a>
                </li>
                <li><a class="btn"
                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=books">Books</a>
                </li>
            </ul>

            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle mb-2" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>

                <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item"
                            href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=electronics">Consumer
                            Electronics</a></li>
                    <li><a class="dropdown-item"
                            href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=clothes">Clothes</a>
                    </li>
                    <li><a class="dropdown-item"
                            href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=shoes">Shoes</a>
                    </li>
                    <li><a class="dropdown-item"
                            href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=index&c_id=books">Books</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="row w-100">
            <?php if ($products == null) {
                echo "<h3 class='mt-3'>Empty</h3>";
            } else {
                foreach ($products as $item): ?>
                    <div class='col-sm-6 col-md-4 col-lg-3 col-xs-12 text-center'>
                        <a href='index.php?controller=product&action=show&id=<?php echo $item->id ?>'>
                            <div class='card bg-light mb-2'>
                                <div class='card-body'>
                                    <?php
                                    $image = $item->image;
                                    if (empty($image)) {
                                        $image = 'assets/uploads/default.jpg';
                                    } else {
                                        (!file_exists($image) && !filter_var($image, FILTER_VALIDATE_URL)) ? $image = 'assets/uploads/default.jpg' : $image;
                                    }
                                    ?>
                                    <img class='img-fluid img-thumbnail' src='<?php echo $image ?>' alt='thumbnail'>
                                </div>
                            </div>

                            <h5>
                                <?php echo $item->name; ?>
                            </h5>

                            <p>Price:
                                <strong>
                                    <?php echo $item->price; ?>
                                </strong>
                            </p>
                        </a>
                    </div>
                <?php endforeach;
            } ?>
        </div>
    </div>
</section>