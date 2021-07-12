$("#not-available-parking").click(function() {
    $("#systemMessege").show(200);
    $("#willFade").fadeTo("fast",0.33);

    $("#cancelButton").click(function() {
        $("#systemMessege").hide(200);
        $("#willFade").fadeTo("fast",100);
    })
})