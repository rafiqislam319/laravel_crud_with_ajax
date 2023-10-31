<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {

        //add product
        $('#add_product_modal').click(function(e) {
            e.preventDefault();

            let name = $('#name').val()
            let price = $('#price').val()
            // console.log(name + price)

            $.ajax({
                url: "{{ route('add.product') }}",
                method: 'post',
                data: {
                    name: name,
                    price: price
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#productModal').modal('hide')
                        $('#add_product_modal')[0].reset()
                        $('#productTable').load(location.href + ' #productTable')
                    }
                }
            });
        });

        //edit product
        $(document).on('click', '.updateProductForm', function() {
            let id = $(this).data('id')
            let name = $(this).data('name')
            let price = $(this).data('price')

            $("#update_id").val(id)
            $("#update_name").val(name)
            $("#update_price").val(price)
        });


        //update product
        $('.update_product').click(function(e) {
            e.preventDefault();

            let update_id = $('#update_id').val()
            let update_name = $('#update_name').val()
            let update_price = $('#update_price').val()
            // console.log(name + price)

            $.ajax({
                url: "{{ route('update.product') }}",
                method: 'post',
                data: {
                    up_id: update_id,
                    up_name: update_name,
                    up_price: update_price
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#updateProductModal').modal('hide')
                        $('#add_product_modal')[0].reset()
                        $('#productTable').load(location.href + ' #productTable')
                    }
                }
            });
        });

    });
</script>