<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="<?= base_url('assets/img/TEST_oshs.jpg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/img/TEST_oshs.jpg') ?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>
    <div class="form-wrapper">
        <div class="flip-card">
            <div class="inner">
                <div class="card-face front-side">
                    <form action="<?= site_url('auth/login') ?>" method="post">
                        <h3>Login</h3>
                        <div class="form-holder"><input type="email" name="email" placeholder="EMAIL" class="form-control" required=""></div>
                        <div class="form-holder"><input type="password" name="password" placeholder="PASSWORD" class="form-control" required=""></div>
                        <div class="error-wrapper">
                            <ul class="error-list">
                                <?php if (isset($validation)) : ?>
                                    <?php foreach ($validation->getErrors() as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if (isset($error)) : ?>
                                    <li><?= $error ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="form-submit center-container"><button type="submit">Login</button>
                            <p>Don't have an account? <a href="<?= site_url('auth/signup') ?>">Sign up</a></p>
                        </div>
                        <?php if (session()->has('success')) : ?>
                            <div class="font-side">
                                <h3><?= session('success') ?></h3>
                            </div>
                        <?php endif; ?>
                    </form>
                    <div class="image-holder"><img src="<?= base_url('assets/img/TEST_oshs.jpg') ?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>