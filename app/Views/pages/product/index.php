<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
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
                        <a class="nav-link" href="<?= site_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('product') ?>">Product</a>
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
                        <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 mt-3">
                        <h3 class="mb-4">Products Table</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 mt-3">
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addProductModal">Add New</button>
                    </div>
                </div>
            </div>
            <?php include('create.php'); ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $product) :
                                $number = 1;
                            ?>
                                <tr>
                                    <td><?= $number++ ?></td>
                                    <td><?= $product['product_name'] ?></td>
                                    <td>Rp.<?= $product['price'] ?></td>
                                    <td><?= $product['category'] ?></td>
                                    <td><?= $product['stock'] ?></td>
                                    <td><?= $product['created_at'] ?></td>
                                    <td><?= $product['updated_at'] ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning text-white mb-1 me-1" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $product['id'] ?>">Update</button>
                                        <button type="button" class="btn btn-danger mb-1 ms-1" onclick="confirmDelete(<?= $product['id'] ?>, '<?= $product['product_name'] ?>')">Delete</button>
                                    </td>
                                </tr>
                            <?php
                                include 'update.php';
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script>
        function confirmDelete(id, productName) {
            if (confirm("Are you sure you want to delete the product '" + productName + "'?")) {
                fetch("<?= site_url('product/delete/') ?>" + id, {
                        method: 'DELETE',
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Failed to delete product');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "<?= site_url('auth/logout') ?>";
            }
        }
    </script>
</body>

</html>