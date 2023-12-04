<style>
    .card {
        width: 450px;
        height: 450px;
        padding: 10px;
        background-color: #cccccc;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .img-fluid {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    h4 {
        margin-top: .5rem;
    }

    .btn.btn-primary {
        margin-right: 10px;
    }
</style>

<?php
session_start();
$image = $product->image;
if (empty($image)) {
    $image = 'assets/uploads/default.jpg';
} else {
    (!file_exists($image) && !filter_var($image, FILTER_VALIDATE_URL)) ? $image = 'assets/uploads/default.jpg' : $image;
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <img class="img-fluid img-thumbnail" src="<?php echo $image ?>" alt="no-img">
            </div>
        </div>
        <div class="col-sm-6">
            <h2>
                <?php echo $product->name ?>
            </h2>

            <br>

            <h4>
                Price:
                <?php echo $product->price ?>
            </h4>

            <br>

            <p>
                Description:
                <?php echo $product->description ?>
            </p>

            <br>

            <p>
                <?php
                // echo $_SESSION['user']['id'];
                // echo $product->seller;
                if ($_SESSION['user']['id'] != $product->seller) {
                    if (in_array($product->id, $_SESSION['user']['productsInCart'])) {
                        $action = 'removeItem';
                        $text = 'Remove from cart';
                    } else {
                        $action = 'addItem';
                        $text = 'Add to cart';
                    }
                    $url = WEB_ROOT . '/index.php?controller=user&action=' . $action . '&id=' . $product->id;
                    echo '<a href="' . $url . '" class="btn btn-primary">' . $text . '</a>';
                } else if ($_SESSION['user']['id'] === $product->seller) {
                    $url = WEB_ROOT . '/index.php?controller=product&action=cancelSale&id=' . $product->id;
                    echo '<a href="' . $url . '" class="btn btn-primary">' . 'Ajust Price' . '</a>';
                    echo '<a href="' . $url . '" class="btn btn-primary">' . 'Cancel Sale' . '</a>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

</p>
</div>
</div>
</div>