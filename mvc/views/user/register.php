<div class="container pt-5 align-middle">
    <h1 class="text-primary text-center">Create a <span style="color: #FF5B00">
            <?php echo APP_NAME ?>
        </span> account
    </h1>

    <form method="post" action="<?php echo WEB_ROOT ?>/index.php?controller=user&action=register">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="confirmInputPassword1" class="form-label">Confirm password</label>
            <input name="password_confirmation" type="password" class="form-control" id="confirmInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form>
    <div class="mt-3">Already have an account? <a
            href="<?php echo WEB_ROOT; ?>/index.php?controller=user&action=login">Login</a></div>
    <div class="mt-3"><a href="<?php echo WEB_ROOT ?>">Back to home page</a></div>
</div>