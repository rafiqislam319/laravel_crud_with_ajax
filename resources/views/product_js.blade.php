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

    });
</script>