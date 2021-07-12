function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("parkingList");
    li = ul.getElementsByTagName('a');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 2; i < li.length; i++) {
        a = li[i].getElementsByTagName("li")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}