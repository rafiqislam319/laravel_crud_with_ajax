<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="" method="POST" id="add_product_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">product info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name" class="mb-1">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="product name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="mb-1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="product price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_product">Save product</button>
                </div>
            </div>
        </div>
    </form>
</div>