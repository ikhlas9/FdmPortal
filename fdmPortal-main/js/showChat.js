$(document).ready(function(){
    setInterval(function(){
        let incomingid = $("#incoming").val();
        $.ajax({
            type: "post",
            url: "php/getChat.php",
            data: {incomingid: incomingid},
            success: function(response){
                $("#mainSection").html(response);
                scrollToBottom(); // Add this line here
            }
        });
    }, 500);
});
