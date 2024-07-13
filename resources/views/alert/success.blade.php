<div class="container">
    @if(session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Thông báo</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-danger">Lỗi</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                successToast.show();
            @endif

            @if(session('error'))
                var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                errorToast.show();
            @endif
        });
    </script>
    <!-- Nội dung khác của trang danh sách -->
</div>
