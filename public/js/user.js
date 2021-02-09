$(document).ready(function(){
    $(document).on('submit', 'form#user_add_form', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: function(result) {
                if (result.success == true) {
                    toastr.success(result.msg);
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });
});