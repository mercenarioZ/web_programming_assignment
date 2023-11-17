
<style>
    .card {
        width: 450px;
        height: 450px;
        padding: 10px;
        background-color: #cccccc;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
</style>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <img class="img-fluid" src="https://picsum.photos/200" alt="random image">
            </div>
        </div>
        <div class="col-sm-6">
            <h2>
                <?php echo $product->name ?>
            </h2>
            <p>
                Price:
                <?php echo $product->price ?>
            </p>
            <p>
                Description:
                <?php echo $product->description ?>
            </p>
            <p>
                <a href="<?php echo WEB_ROOT ?>/index.php?controller=cart&action=add&id=<?php echo $product->id ?>" class="btn btn-primary">Add to cart</a>
            </p>
        </div>
    </div>
</div>