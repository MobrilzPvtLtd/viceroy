<script>
    var isAuthenticated = @json(Auth::check());

    function addToCartOrRemove(propertyId, remove) {
        if (!isAuthenticated) {
            window.location.href = '{{ route('login') }}';
            return;
        }
        $.ajax({
            url: '/cart/add',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: propertyId,
                remove: remove,
            },
            success: function(sessionData) {
                if (sessionData.Status === 1) {
                    console.log(sessionData.disabled);
                    $('#cartCount').text(sessionData.CartCount);
                    $('#cartItems').html(sessionData.CartHTML);
                    $('#addtocart-'+sessionData.disabled).prop('disabled', true);
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
                    // $('.sidecart__footer').show();
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
