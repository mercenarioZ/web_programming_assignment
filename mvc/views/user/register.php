<div class="container pt-5 align-middle">
    <h1 class="text-primary text-center">Register into Shopeww</h1>

    <form>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="usernameHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="confirmInputPassword1" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="confirmInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form>
    <div class="mt-3">Already have an account? <a
            href="<?php echo WEB_ROOT; ?>/index.php?controller=user&action=login">Login</a></div>
    <div class="mt-3"><a href="<?php echo WEB_ROOT ?>">Back to home</a></div>
</div>