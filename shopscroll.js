function ScrollDiv(){
  setTimeout(function(){ 
    if(document.getElementById('cont').scrollLeft<(document.getElementById('cont').scrollWidth-document.getElementById('cont').offsetWidth)){-1
    document.getElementById('cont').scrollLeft=document.getElementById('cont').scrollLeft+1
         }
   else {document.getElementById('cont').scrollLeft=0;}
 }, 3000);
}

setInterval(ScrollDiv,30)