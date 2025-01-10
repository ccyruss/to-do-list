<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.update-status').on('change', function () {
            const postId = $(this).data('id'); 
            const status = $(this).is(':checked') ? 0 : 1; 

            $.ajax({
                url: `/posts/${postId}/status`, 
                type: 'PATCH',
                data: {
                    status: status,
                    _token: $('meta[name="csrf-token"]').attr('content') 
                },
                success: function (response) {
                    if (response.success) {
                        console.log(response.message);
                    } else {
                        alert('Status güncellenemedi.');
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText); 
                    alert('Bir hata oluştu.');
                }
            });
        });
    });
</script>