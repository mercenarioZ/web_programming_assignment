<DOCTYPE html>
    <html>

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

        <title>PHP MVC Main Layout</title>

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

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
        </style>

    </head>

    <body>
        <nav id="header">
            <div class="d-flex justify-content-between me-2">
                <div class="ms-3 fw-bold fs-2">

                    <a href="<?php echo $web_root ?>/index.php"><i class="fa-shop fa-solid"></i> Shopeww</a>
                </div>
                <div id="auth" class="me-3 fs-4">
                    <a href="#">Register</a>
                    <a class="ms-3" href="<?php echo $web_root ?>/index.php?controller=user">Login</a>
                  
<!--                     <a href="index.php"><i class="fa-shop fa-solid"></i> Shopeww</a>
                </div>
                <div id="auth" class="me-3 fs-4">
                    <a href="index.php?controller=user&action=register">Register</a>
                    <a class="ms-3" href="index.php?controller=user&action=login">Login</a> -->

                </div>
            </div>
        </nav>
        <div id="content">
            <?= @$content ?>
        </div>
        <div class="d-flex justify-content-end pe-3" id="footer">
            <p class="me-2 fs-6">Copyright &copy; 2023, All Rights reserved</p>
        </div>
    </body>

    </html>