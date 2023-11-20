<style>
    label {
        margin-bottom: 3px;
    }

    p.text-danger {
        margin: 3px 0;
    }
</style>

<div class="container">
    <h2 class="text-center mt-3">Post a product</h2>

    <form action="index.php?controller=product&action=store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST['name'] ?? '' ?>">

            <?php if (isset($errors['name'])): ?>
                <p class="text-danger">
                    <?php echo $errors['name'] ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"
                rows="4"><?php echo $_POST['description'] ?? '' ?></textarea>

            <?php if (isset($errors['description'])): ?>
                <p class="text-danger mt-1">
                    <?php echo $errors['description'] ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price"
                value="<?php echo $_POST['price'] ?? null ?>">

            <?php if (isset($errors['price'])): ?>
                <p class="text-danger mt-1">
                    <?php echo $errors['price'] ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="price">Category:</label>
            <select class="form-select" name="category">
                <option value="none" <?php $_POST['category'] == "none" ? 'selected' : ''; ?>>None
                </option>
                <option value="electronics" <?php echo isset($_POST['category']) && $_POST['category'] == "electronics" ? 'selected' : ''; ?>>Consumer Electronics</option>
                <option value="clothes" <?php echo isset($_POST['category']) && $_POST['category'] == "clothes" ? 'selected' : ''; ?>>
                    Clothes</option>
                <option value="shoes" <?php echo isset($_POST['category']) && $_POST['category'] == "shoes" ? 'selected' : ''; ?>>
                    Shoes</option>
                <option value="books" <?php echo isset($_POST['category']) && $_POST['category'] == "books" ? 'selected' : ''; ?>>
                    Books</option>
            </select>

            <?php if (isset($errors['category'])): ?>
                <p class="text-danger mt-1">
                    <?php echo $errors['category'] ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image"
                value="<?php echo $_POST['image'] ?? null ?>">

            <?php if (isset($errors['image'])): ?>
                <p class="text-danger mt-1">
                    <?php echo $errors['image'] ?>
                </p>
            <?php endif; ?>

            <?php if (isset($errors['extensions'])): ?>
                <p class="text-danger mt-1">
                    <?php echo $errors['extensions'] ?>
                </p>
            <?php endif; ?>
        </div>

        <button type="submit" class="mt-2 btn btn-primary">Submit</button>
    </form>
</div>