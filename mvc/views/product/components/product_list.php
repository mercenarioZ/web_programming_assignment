<style>
    .card-body img {
        width: 280px;
        height: 280px;
        object-fit: contain;
    }
</style>

<div class="row w-100">
    <?php if ($products == null) {
        echo "<h3 class='mt-3'>Empty</h3>";
    } else {
        foreach ($products as $item): ?>
            <div class='col-6 col-sm-4 col-md-3 text-center'>
                <a href='index.php?controller=product&action=show&id=<?php echo $item->id ?>'>
                    <div class='card bg-light mb-2'>
                        <div class='card-body'>
                            <?php if (!isset($item->image)) {
                                $item->image = 'assets/uploads/default.jpg';
                            } ?>
                            <img class='img-fluid img-thumbnail' src='<?php echo $item->image ?>' alt='thumbnail'>
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