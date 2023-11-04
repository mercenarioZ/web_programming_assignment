<div class="container pt-5 align-middle">
    <h1 class="text-primary text-center">Login into Shopeww</h1>

    <form>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="email" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="mt-3">Don't have any account? <a
            href="<?php echo WEB_ROOT ?>/index.php?controller=user&action=register">Register</a></div>
    <div class="mt-3"><a href="<?php echo WEB_ROOT ?>">Back to home</a></div>
</div>