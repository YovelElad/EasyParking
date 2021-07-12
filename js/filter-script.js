

$("#openSort").click(function(){
    $(".sort").toggle();
    $("#sortNav").show(200);
})

$("#closeSort").click(function(){
    $(".sort").toggle();
    $("#sortNav").hide(200);
})


$("#not_available_parking_option").click(function () {
    $(".parkingListSection").toggle();
    $("#check2").css('bottom', 40);
    $("#sortNav").hide(200);
})

$("#available_parking_option").click(function () {
    $(".parkingListSection").toggle();
    $("#check2").css('bottom', 62);
    $("#sortNav").hide(200);
})



$("#openFiltering").click(function(){
    $(".filtering").toggle();
    $("#filterNav").show(200);
})

$("#closeFiltering").click(function(){
    $(".filtering").toggle();
    $("#filterNav").hide(200);
})


