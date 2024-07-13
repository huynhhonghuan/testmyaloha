<!-- confirm-modal.blade.php -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <form id="deleteForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));

        // Xử lý sự kiện khi click nút Xóa
        var deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var form = button.closest('form');
                var deleteUrl = form.getAttribute('action');
                var deleteForm = document.getElementById('deleteForm');
                deleteForm.setAttribute('action', deleteUrl);

                confirmDeleteModal.show();
            });
        });
    });
</script>
