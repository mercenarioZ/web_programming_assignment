<!-- <?php session_start(); ?> -->

<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />



        <title>Sheepo</title>

        <style>
            #header,
            #footer {
                background-color: whitesmoke;
                width: 100%;
                height: 60px;
                line-height: 60px;
            }

            #footer {
                position: fixed;
                bottom: 0;
                text-align: center;
                font-size: 1.5rem;
            }

            #header {
                text-align: center;
                font-size: 1.5rem;
            }

            a {
                text-decoration: none;
                color: black;
            }

            div#auth>a:hover {
                color: #ff0000;
            }

            .auth-btn, .seller-btn {
                font-size: 1.15rem;
            }

            #content {
                min-height: calc(100vh - 140px);
                margin-bottom: 1rem;
            }
        </style>

    </head>

    <body>
        <nav id="header">
            <div class="d-flex justify-content-between me-2">
                <div class="ms-3 fw-bold fs-2">
                    <a href="<?php echo WEB_ROOT ?>/index.php">
                        <img style="height: 50px; width: auto; margin-bottom: .5rem" src="assets/images/logo.svg" />
                        <span style="color: #FF5B00">
                            <?php echo APP_NAME ?>
                        </span>
                    </a>
                </div>

                <div id="auth" class="me-3 fs-4">
                    <?php if (isset($_SESSION['user'])): ?>
                        <a class="seller-btn me-3" href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=list">Seller page</a>

                        <!-- Cart icon -->
                        <span class="me-3" style="position: relative">
                            <a href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=checkout">🛒</a>
                            <span style="display: flex; align-items: center; font-size: .8rem; font-weight: bold; position: absolute; bottom: -3; right: -5; background: rgba(255, 91, 0, 0.75); width: auto; height: 1rem; border-radius: 50%; color: #fff; padding: 6px 4px;">45</span>
                        </span>
                        
                        <a class="auth-btn" href="<?php echo WEB_ROOT ?>/index.php?controller=user&action=logout">Logout</a>
                    <?php else: ?>
                        <a class="auth-btn"
                            href="<?php echo WEB_ROOT ?>/index.php?controller=user&action=register">Register</a>
                        <a class="auth-btn ms-3"
                            href="<?php echo WEB_ROOT ?>/index.php?controller=user&action=login">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <div style="margin-bottom: 10rem;" id="content">
            <?= $content ?>
        </div>

        <div class="d-flex justify-content-end pe-3" id="footer">
            <p class="me-2 fs-6">Copyright &copy; 2023, All Rights reserved</p>
        </div>
    </body>

    </html>