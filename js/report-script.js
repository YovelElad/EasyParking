var checkBoxes  = document.querySelectorAll('input[type=checkbox]');
var labels      = document.getElementsByTagName("label");
var radio       = document.querySelectorAll('input[name="report-status"]');
var addComent   = document.getElementsByTagName("h6")[0];
var textArea    = document.querySelector('textarea');

(function() {

    disableAll();
    radio[0].addEventListener('click',disableAll);
    radio[1].addEventListener('click',activeAll);
})();

function disableAll() {
    for(i =0; i < checkBoxes.length;i++)
    {
        checkBoxes[i].disabled = true;
        checkBoxes[i].checked = false;
    }
    for(i =2; i < labels.length;i++)
    {
        labels[i].style.color = "#D3D3D3";
    }
    addComent.style.color = "#D3D3D3";
    textArea.disabled = true;
    textArea.style.color = "#D3D3D3";
}


function activeAll() {
    for(i =0; i < checkBoxes.length;i++)
    {
        checkBoxes[i].disabled = false;
    }
    for(i =2; i < labels.length;i++)
    {
        labels[i].style.color = "#000000";
    }
    addComent.style.color = "#000000";
    textArea.disabled = false;
    textArea.style.color = "#000000";
}

