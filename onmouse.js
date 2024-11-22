

var a=document.getElementById('display')
    
function pp(event){

    var b=event.clientX;
    var c=event.clientY;
    a.innerHTML=('x='+b + ' '+'y='+c)
  

   
}

function ps(){
    a.innerHTML=''
}

