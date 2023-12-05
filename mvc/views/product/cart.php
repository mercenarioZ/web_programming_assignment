<style>
    .products-container {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    thead {
        font-weight: bold;
    }
</style>

<section class="products-container mt-4">
    <div class="container h-100">
        <!-- Note -->
        <div class="alert alert-warning text-center fs-5 d-flex aligns-item-center justify-content-center gap-3">
            <span>This page only displays products in your cart</span>
            <a href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=checkout"
                class="btn btn-warning">Checkout</a>
        </div>

        <!-- Products -->
        <div class='row w-100'>
            <table class="rounded-xl">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($products == null) {
                        echo "<h3 class='mt-3'>Empty</h3>";
                    } else {

                        foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <?php echo $product->name; ?>
                                </td>
                                <td>
                                    <?php echo $product->description; ?>
                                </td>
                                <td>
                                    <?php echo $product->price; ?>
                                </td>
                                <td>
                                    <?php if ($_SESSION['user']['id'] != $product->seller) {
                                        // echo implode(" ", $_SESSION['user']['productsInCart']);
                                        $url = WEB_ROOT . '/index.php?controller=user&action=removeItem&id=' . $product->id;
                                        echo '<a href="' . $url . '" class="btn btn-danger">' . 'Remove' . '</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>