$("#typingArea").on("submit", function(e) {
    e.preventDefault();
    let formData = new FormData(e.target);
    formData.append("send", "send");
    if ($("#typingField").val()) {
        $.ajax({
            type: "POST",
            url: "php/messages.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Clear the typing field and scroll to the bottom of the chat
                $("#typingField").val("");
                $("#mainSection").scrollTop($("#mainSection")[0].scrollHeight);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error sending message:", textStatus, errorThrown);
            }
        });
    }
});
