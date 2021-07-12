


var links = document.getElementById('links');
var ham   = document.getElementById('ham');

(function init() {
  links.style.display = "none";
  ham.style.left = '36px';
  links.style.zIndex = '2';
  ham.style.zIndex = '3';

  
  
})()

ham.addEventListener('click',function () {
  if(links.style.display == "none") 
  {
      links.style.display = "block";
      ham.style.backgroundImage = "url('images/open-ham-icon.png')";
      if(window.innerWidth <= 700)
        ham.style.left = '195px';
      else 
        ham.style.left = '135px'
  }
  else
  {   
    ham.style.backgroundImage = "url('images/ham-icon.png')";
    links.style.display = "none";
    ham.style.left = '36px';
  }
})