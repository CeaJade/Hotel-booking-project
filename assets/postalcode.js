$(function(){
    $('.postalcode').change(function(){
        $.ajax({
            url: '/postal/city/'+$(this).val(),
            success: function(response) {
                $('.city').val(response);
            }
        });
    });
});