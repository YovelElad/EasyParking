function listColor() {

    var elem = document.getElementsByClassName('ListLi');
    for (var i = 0; i < elem.length; i++) {
        if (i % 2 == 0)
            elem[i].style.backgroundColor = "#f7f6f6";
        else
            elem[i].style.backgroundColor = "#ebebeb";

    }

}
