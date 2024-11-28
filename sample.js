a=0
document.querySelector('button').addEventListener('click',()=>{
    let xhr=new XMLHttpRequest();
    a+=1;
    var b=document.getElementById('rp')
    xhr.open('GET','sample.json',true);

    xhr.onreadystatechange=function(){

       
        if(xhr.readyState===4 & xhr.status===200){
           console.log(JSON.parse(xhr.responseText));
          
           b.innerHTML=a
        }
    }

    xhr.send();






})