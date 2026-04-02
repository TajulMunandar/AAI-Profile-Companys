@if (session()->has('success'))
    <div class="toast toast-onload align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="2000">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-check-circle fs-6"></i>
            <div>
                <h5 class="text-white fs-3 mb-1">Success</h5>
                <h6 class="text-white fs-2 mb-0">{{ session()->get('success') }}</h6>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="toast toast-onload align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="2000">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-circle fs-6"></i>
            <div>
                <h5 class="text-white fs-3 mb-1">Error</h5>
                <h6 class="text-white fs-2 mb-0">{{ session()->get('error') }}</h6>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="toast toast-onload align-items-center text-bg-warning border-0" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="5000">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-triangle fs-6"></i>
            <div>
                <h5 class="text-white fs-3 mb-1">Attention</h5>
                <h6 class="text-white fs-2 mb-0">
                    @foreach ($errors->all() as $error)
                        {{ $error }}@if (!$loop->last)
                            <br>
                        @endif
                    @endforeach
                </h6>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif

<script src="{{ asset('assets/js/plugins/toastr-init.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap toasts
        var toastElList = [].slice.call(document.querySelectorAll('.toast-onload'));
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl).show();
        });
    });
</script>
