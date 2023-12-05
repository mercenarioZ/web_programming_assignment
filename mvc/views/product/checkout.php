<div style="border: 1px solid #ccc; margin-top: 1rem; padding: 1.5rem; border-radius: 8px;"
    class="container align-middle">
    <h1 class="text-primary text-center">Checkout on <span style="color: #FF5B00">
            <?php echo APP_NAME ?>
        </span>
    </h1>

    <form>
        <div class="mb-1">
            <label for="name">Full name:</label>
            <input class="form-control" type="text" id="name" name="name"><br>
        </div>
        <div class="mb-1">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email"><br>
        </div>
        <div class="mb-1">
            <label for="credit_card">Credit card:</label>
            <input class="form-control" type="text" id="credit_card" name="credit_card"><br>
        </div>
        <div class="mb-1">
            <label for="expiry_date">Expiry date:</label>
            <input class="form-control" type="text" id="expiry_date" name="expiry_date"><br>
        </div>
        <div class="mb-1">
            <input disabled class="btn btn-primary" type="submit" value="Checkout">
        </div>
    </form>

    <?php if (!empty($errors)): ?>
        <div class="mt-3 alert alert-danger">
            <?php echo implode(', ', $errors); ?>
        </div>
    <?php endif; ?>
    <div class="mt-3"><a href="<?php echo WEB_ROOT ?>">Back to home page</a></div>
</div>