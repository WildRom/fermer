document.addEventListener('mousemove', function(event) {
  event = event || window.event;
  if(mode === 1) {
    lejka_div.style.left = defPosition(event).x + 'px';
    lejka_div.style.top = defPosition(event).y + 'px';
  }
  if(mode === 2) {
    lopatka_div.style.left = defPosition(event).x + 'px';
    lopatka_div.style.top = defPosition(event).y + 'px';
  }
})

function mmove(event){
  event = event || window.event;
  if(mode === 1) {
    lejka_div.style.left = defPosition(event).x + 'px';
    lejka_div.style.top = defPosition(event).y + 'px';
  }
  if(mode === 2) {
    lopatka_div.style.left = defPosition(event).x + 'px';
    lopatka_div.style.top = defPosition(event).y + 'px';
  }
}s