<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h1>Profile</h1>
            <p>Hi
                <?php echo isset($username) ? $username : '...'; ?>, this is your profile page.
            </p>
        </div>
    </div>

    <div class="row">
        <div class='d-flex gap-5'>
            <div class="">
                <img src="./assets/images/placeholder.jpg" alt="avatar">
            </div>

            <div>
                <form method="post" action="index.php?controller=page&action=profile">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username"
                        value="<?php echo $username ?>">

                    <br>

                    <label for="password">Password (typing your new password)</label>
                    <input class="form-control" type="password" id="password" name="password"
                        value="">

                    <br>

                    <button class="btn btn-primary mt-4" type="submit">Save changes</button>
                </form>

                <div class="mt-2">
                    <?php if (isset($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <p class="text-danger">
                                <?php echo $error ?>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php if (isset($message)): ?>
                    <p class="alert text-success">
                        <?php echo $message ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>