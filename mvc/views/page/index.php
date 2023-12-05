<style>
    .hero-image {
        background-image: url("assets/images/hero.jpg");
        height: 400px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .hero-box {
        text-align: center;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        width: 55%;
        min-height: 235px;
        padding: 15px;
        border-radius: 15px;
        border: 3px solid rgba(255, 255, 255, 0.7);
    }

    .sell-text {
        margin-top: 1rem;
        padding: 8px;
        border: 1px solid rgba(255, 255, 255, 0.9);
        border-radius: 10px;
    }

    .sell-text:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }

    .link {
        font-size: 1.5rem;
    }

    .link:hover {
        color: #ff0000;
        border-bottom: 1px solid #ff0000;
    }
</style>

<div class="container">
    <!-- Using this for debug only -->
    <!-- <?php
    if (isset($_SESSION['user']['username'])) {
        echo "Seller id: " . $_SESSION['user']['id'];
    } else {
        echo "Seller id: guest";
    }
    ?> -->
    <div class="row">
        <div class="col-md-12">
            <div class="hero-image"></div>

            <div class="w-60 mx-auto hero-box d-flex flex-column align-items-center">
                <h1 style="font-size: 2.5rem; margin-bottom: 12px;">Hello,
                    <strong><?php echo isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : 'guest' ?></strong>
                </h1>
                <button class="btn btn-primary">
                    <a class="text-light" href="<?php echo WEB_ROOT ?>/index.php?controller=product">Shop now</a>
                </button>

                <a class="text-light" href=<?php echo isset($_SESSION['user']['username']) ? "index.php?controller=product&action=create" : "index.php?controller=user&action=login" ?>>
                    <p class="sell-text">Do you want to post anything for sale? Click here!</p>
                </a>
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="text-center mt-4">
                <a href="<?php echo WEB_ROOT ?>/index.php?controller=page&action=about" class="link">
                    About us
                </a>
            </div>

            <div class="text-center mt-4">
                <a href="<?php echo WEB_ROOT ?>/index.php?controller=page&action=profile" class="link">
                    Go to your profile
                </a>
            </div>
        </div>
    </div>
</div>