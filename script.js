function psp(event){
   const row=event.target.closest('tr');
   if(row){
    row.remove();
   }

}