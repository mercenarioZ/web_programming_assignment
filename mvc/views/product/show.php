
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
</style>

<?php 
if (!isset($product->image)) {
    $product->image = 'assets/uploads/default.jpg';
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <img class="img-fluid img-thumbnail" src="<?php echo $product->image ?>" alt="no-img">
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
                <a href="<?php echo WEB_ROOT ?>/index.php?controller=cart&action=add&id=<?php echo $product->id ?>" class="btn btn-primary">Add to cart</a>
            </p>
        </div>
    </div>
</div>