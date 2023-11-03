<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
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


        //delete product
        $('.deleteProduct').click(function(e) {
            e.preventDefault();

            let update_id = $(this).data('id')
            // alert(update_id)

            if (confirm('Are you sure to delete')) {
                $.ajax({
                    url: "{{ route('delete.product') }}",
                    method: 'post',
                    data: {
                        up_id: update_id
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#productTable').load(location.href + ' #productTable')

                            Command: toastr["success"]("product deleted successfully")

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });

            }
        });

    });
</script>