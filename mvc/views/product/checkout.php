<div style="border: 1px solid #ccc; margin-top: 1rem; padding: 1.5rem; border-radius: 8px;"
    class="container align-middle">
    <h1 class="text-primary text-center">Checkout on <span style="color: #FF5B00">
            <?php echo APP_NAME ?>
        </span>
    </h1>

    <form action="process_payment.php" method="POST">
        <div class="mb-3">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name"><br><br>
        </div>
        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
        </div>
        <div class="mb-3">
            <label for="credit_card">Thẻ tín dụng:</label>
            <input type="text" id="credit_card" name="credit_card"><br><br>
        </div>
        <div class="mb-3">
            <label for="expiry_date">Ngày hết hạn:</label>
            <input type="text" id="expiry_date" name="expiry_date"><br><br>
        </div>
        <div class="mb-3">
            <input type="submit" value="Thanh toán">
        </div>
    </form>

    <?php if (!empty($errors)): ?>
        <div class="mt-4 alert alert-danger">
            <?php echo implode(', ', $errors); ?>
        </div>
    <?php endif; ?>
    <div class="mt-3">Already have an account? <a
            href="<?php echo WEB_ROOT; ?>/index.php?controller=user&action=login">Login</a></div>
    <div class="mt-3"><a href="<?php echo WEB_ROOT ?>">Back to home page</a></div>
</div>