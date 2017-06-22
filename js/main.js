var header = document.querySelector('header');
var body = document.querySelector('body');
var current_position = 0;
var last_position = 0;

window.addEventListener('scroll', function(e) {
    current_position = body.scrollTop;

    if (current_position < last_position || current_position == last_position) {
        header.className = '';
    } else {
        header.className = 'active';
    }

    last_position = body.scrollTop;
});
