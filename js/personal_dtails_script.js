
 
$(".clientPic").click(function() {
    $("#personal_details").show(200);
    $("#willFade").fadeTo("fast",0.33);

    $("#backButton").click(function() {
        $("#personal_details").hide(200);
        $("#willFade").fadeTo("fast",100);
    })
});



$(".report").click(function(){
    $("#reportQuestion").show(200);
    $("#willFade").fadeTo("fast",0.33);

    $("#sendReportButton").click(function() {
        $("#reportQuestion").hide(200);
        $("#reportSent").show(200);
    })

    $("#dontSendReportButton").click(function() {
        $("#reportQuestion").hide(200);
        $("#willFade").fadeTo("fast",100);
    })
});