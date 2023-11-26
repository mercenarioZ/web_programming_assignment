<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Forgot Password</h3>
                    <form action="index.php?controller=user&action=resetPassword" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>

                    <?php if (isset($message)) {
                        echo "<p class='alert alert-success text-center mt-3'>$message</p>";
                    } ?>

                    <div><a href="<?php echo WEB_ROOT ?>">Back to home page</a></div>
                </div>
            </div>
        </div>
    </div>
</div>