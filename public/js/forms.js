$(function() {
    $("#cancel-button").hide();
    $("#cancel-button").removeClass("invisible");
    $("#confirm-button").hide();
    $("#confirm-button").removeClass("invisible");

    $("#delete-account").submit(function(e){
        e.preventDefault();
        $("#delete-account-button").fadeOut(400, function(){
            $("#cancel-button").fadeIn();
            $("#confirm-button").fadeIn();
        });

        var url = $(this).attr('action');
        $("#cancel-button").click(function(e){
            e.preventDefault();
            $("#confirm-button").fadeOut();
            $("#cancel-button").fadeOut(function(){
                $("#delete-account-button").fadeIn();
            });

        });
        $("#confirm-button").click(function(){
            $.post(url, $("#delete-account").serialize(), function( data ) {
                if (data.result == 'success') {
                    window.location.replace(data.redirectURL);
                }
            }, 'json');
        });
    });
});