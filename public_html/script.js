const on= document.getElementById("on");
const off= document.getElementById("off");
const effect=document.getElementById("effect");
on.addEventListener("click", on_fct); 
off.addEventListener("click", off_fct); 
function on_fct() {  
    $.ajax({
        url : 'control.php', // La ressource ciblée
        type : 'POST' ,// Le type de la requête HTTP.
        data :  {ON : 'on'} ,
        success: function(data) {
            console.log(data);
        },
     });
}
function off_fct() {
    $.ajax({
        url : 'control.php', // La ressource ciblée
        type : 'POST' ,// Le type de la requête HTTP.
        data :  {OFF : 'off'} ,
        success: function(data) {
            console.log(data);
      }
     });
}
