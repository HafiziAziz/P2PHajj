function CheckColors(val){
  var element=document.getElementById('hidden_field');
    if( val=='admin' ) {
     element.style.display='none';
    } else  {
     element.style.display='block';
    }

  var element=document.getElementById('hidden_field_2');
    if( val=='admin' ) {
     element.style.display='none';
    } else  {
     element.style.display='block';
    }
}