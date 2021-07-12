$(document).ready(function() {
    $.getJSON("user-location.json",function(data) {
        var sHTML = "<ul>";

        $.each(data,function(key,val) {
            sHTML += "<li><b>" + key +"</b>" + ":...." + val + "</li>";
        })
        sHTML += "</ul>";
        $('data').append(sHTML);
    });
});