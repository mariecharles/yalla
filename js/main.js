var header = document.querySelector('header');
var body = document.querySelector('body');
var current_position = 0;
var last_position = 0;

var lol = document.querySelector('#intro');
console.log(lol.offsetHeight);

window.addEventListener('scroll', function(e) {
    current_position = body.scrollTop;

    if (current_position < (lol.offsetHeight - 200) || current_position == 0) {
      header.className = '';
    } else if (current_position < last_position || current_position == last_position) {
      header.className = 'not-top';
    } else if (current_position > lol.offsetHeight){
      header.className = 'active';
    }

    last_position = body.scrollTop;
});

//menu-burger

var menu_burger = document.querySelector('.menu-burger');
var inner_header = document.querySelector('#inner-header');

menu_burger.addEventListener('click', function() {
    inner_header.classList.toggle('hidde');
    body.classList.toggle('header-active');
});
