<script>
    var isAuthenticated = @json(Auth::check());

    function addToCartOrRemove(propertyId, remove) {
        if (!isAuthenticated) {
            window.location.href = '{{ route('login') }}';
            return;
        }
        $.ajax({
            url: '{{ route('cart.add') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: propertyId,
                remove: remove,
            },
            success: function(responseData) {
                if (responseData.Status === 1) {
                    // console.log(responseData.enabled);
                    $('#cartCount').text(responseData.CartCount);
                    $('#cartItems').html(responseData.CartHTML);

                    if (responseData.enabled) {
                        $('#addtocart-'+responseData.enabled).prop('disabled', false);
                    }else{
                        $('#addtocart-'+responseData.disabled).prop('disabled', true);
                    }
                } else {
                    console.log(responseData.Message);
                }
            },
            error: function(xhr, status, error) {
                console.log('An error occurred: ' + error);
            }
        });
    };

    $(document).ready(function() {
        $.ajax({
            url: '/cart/view',
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(responseData) {
                if (responseData) {
                    $('#cartCount').text(responseData.CartCount);
                    $('#cartItems').html(responseData.CartHTML);
                    responseData.disabled.forEach(function(itemId) {
                        $('#addtocart-' + itemId).prop('disabled', true);
                    });
                    if (responseData.Message) {
                        console.log(responseData.Message);
                    }
                } else {
                    console.log(responseData.Message);
                }
            },
            error: function(xhr, status, error) {
                console.log('An error occurred: ' + error);
            }
        });
    });
</script>
