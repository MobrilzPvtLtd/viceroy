@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to remove the alert after a set duration
        function autoDismissAlert(alertElement, duration) {
            setTimeout(function() {
                if (alertElement) {
                    alertElement.classList.remove('show');
                    alertElement.addEventListener('transitionend', () => alertElement.remove());
                }
            }, duration);
        }

        // Select all alert elements
        const alerts = document.querySelectorAll('.alert-dismissible');

        // Set auto-dismiss for each alert
        alerts.forEach(alert => {
            autoDismissAlert(alert, 5000); // 5000 milliseconds = 5 seconds
        });
    });
</script>

