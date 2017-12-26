
function switchActivity(id) {
  var ids = ['computers', 'robotics', 'outdoors'];
  
  for(var i = 0; i < ids.length; i ++) {
    var x = document.getElementById(ids[i]);
    if(x.style.display === 'block') {
      x.style.display = 'none';
    }
  }
  document.getElementById(id).style.display = 'block';
}
