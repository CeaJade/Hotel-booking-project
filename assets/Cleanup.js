$(function(){
    $('.cleanup').click(function(){
        reservation = $(this).attr("reservation")
        $.ajax({
            url: '/cleanup/room/'+reservation,
            success: function(response) {
                $('.room'+reservation).remove();
            }
        });
    });
});