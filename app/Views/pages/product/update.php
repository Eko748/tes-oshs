<div class="modal fade" id="editProductModal<?= $product['id'] ?>" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('product/update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="product_name" value="<?= $product['product_name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Category</label>
                        <select class="form-select" id="editCategory" name="category" required>
                            <option value="kg" <?= ($product['category'] == 'kg') ? 'selected' : '' ?>>kg</option>
                            <option value="gram" <?= ($product['category'] == 'gram') ? 'selected' : '' ?>>gram</option>
                            <option value="pcs" <?= ($product['category'] == 'pcs') ? 'selected' : '' ?>>pcs</option>
                            <option value="sachet" <?= ($product['category'] == 'sachet') ? 'selected' : '' ?>>sachet</option>
                            <option value="lusin" <?= ($product['category'] == 'lusin') ? 'selected' : '' ?>>lusin</option>
                            <option value="box" <?= ($product['category'] == 'box') ? 'selected' : '' ?>>box</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="editStock" name="stock" value="<?= $product['stock'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="editPrice" name="price" value="<?= $product['price'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
