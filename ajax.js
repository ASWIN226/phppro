document.querySelector('button').addEventListener('click',()=>{
var a=document.getElementById('h');
let xhr=new XMLHttpRequest();
xhr.open('GET','ajax.txt',true);
xhr.onreadystatechange=function(){
    if(xhr.readyState===4 & xhr.status ===200){
        console.log(xhr.responseText);
        var b=
        a.append(xhr.responseText);
    }
}

xhr.send();


});