<div style="border: 1px solid #ccc; margin-top: 1rem; padding: 1.5rem; border-radius: 8px;" class="container align-middle">
    <h1 class="text-primary text-center">Login into <span style="color: #FF5B00">
            <?php echo APP_NAME ?>
        </span>
    </h1>

    <form method="post" action="index.php?controller=user&action=login">
        <div class="mb-3">
            <label for="email" class="form-label">Your email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <?php
        if (isset($errors)) {
            echo '<div class="alert alert-danger">' . $errors['validation'] . '</div>';
        }
        ?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="mt-3">Don't have any account?
        <a href="<?php echo WEB_ROOT ?>/index.php?controller=user&action=register">Register</a>
    </div>

    <div class="my-3"><a href="index.php?controller=user&action=forgotPassword">Forgot your password?</a></div>
    <div><a href="<?php echo WEB_ROOT ?>">Back to home page</a></div>
</div>