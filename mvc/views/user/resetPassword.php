<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-3">Reset your password</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">Your new password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">Confirm password</label>
                            <input type="passwordConfirm" class="form-control" id="passwordConfirm"
                                name="passwordConfirm" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>

                    <div><a href="<?php echo WEB_ROOT ?>">Back to home page</a></div>
                </div>
            </div>
        </div>
    </div>
</div>