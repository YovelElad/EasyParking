function nextPage() {
    admin();
    checkValid();
    var elem = document.getElementById("next");
    elem.addEventListener('click',turnPage);
}

function checkValid() {
    var inputS  = document.getElementsByTagName('input');
    var names   = ["הנתונים הבאים לא נכונים :"];
    var submit  = document.getElementById('submit');
    submit.addEventListener('click',function() {
        for(i =0; i < inputS.length;i++)
        {
            if(!inputS[i].checkValidity()) {
               names.push(inputS[i].name);
            }
        }
        if(names.length > 1) {
            alert(names);
            names = ["הנתונים הבאים לא נכונים :"];
        }
    })
}

function turnPage() {
    var reg1 = document.getElementById("register1");
    var reg2 = document.getElementById("register2");
    reg1.style.display = "none";
    reg2.style.display = "block";
    document.getElementById("prev").addEventListener('click', turnBackPage);
}

function turnBackPage () {
    var reg1 = document.getElementById("register1");
    var reg2 = document.getElementById("register2");
    reg1.style.display = "block";
    reg2.style.display = "none";

    if(adminInputElem.checked == true){
        document.getElementById("p").innerHTML = "hiiiiiii";
    
    }

}


function admin() {
    var adminId         = document.getElementById("code");
    var adminCheckBox   = document.getElementsByClassName("form-check-input")[1];
    adminCheckBox.addEventListener("click",function() {
        if(adminCheckBox.checked)
            adminId.disabled = false;
        else
            adminId.disabled = true;
    })


}
