<!-- Modal -->
<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="{{ route('add.product') }}" method="POST" id="update_product_modal">
        @csrf
        <input type="hidden" id="update_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Update Product info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name" class="mb-1">Name</label>
                        <input type="text" class="form-control" name="update_name" id="update_name" placeholder="product name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="mb-1">Price</label>
                        <input type="text" class="form-control" name="update_price" id="update_price" placeholder="product price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Update product</button>
                    <!-- <input type="submit" class="btn btn-primary save_product" value="Save Product"> -->
                </div>
            </div>
        </div>
    </form>
</div>