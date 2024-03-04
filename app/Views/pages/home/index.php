<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" href="<?= base_url('assets/img/TEST_oshs.jpg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/img/TEST_oshs.jpg') ?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('product') ?>">Product</a>
                    </li>
                </ul>
                <button onclick="confirmLogout()" class="btn btn-primary float-end">Logout</button>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body mb-3">
                <div class="col-md-12 text-center">
                    <h1 class="mb-4">Welcome, <?= $name ?>!</h1>
                    <a href="<?= site_url('product') ?>" class="btn btn-sm btn-primary">Go to Product Table</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "<?= site_url('auth/logout') ?>";
            }
        }
    </script>
</body>

</html>
