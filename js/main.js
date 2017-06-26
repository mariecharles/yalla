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

//menu-burger

var menu_burger = document.querySelector('.menu-burger');
var inner_header = document.querySelector('#inner-header');

menu_burger.addEventListener('click', function() {
    inner_header.classList.toggle('hidde');
    body.classList.toggle('window-active');
});


//formulaire contact
var contact = document.querySelector('header .contact-page');
var contenu_contact = document.querySelector('#contact');
var contact_cross = document.querySelector('.cross');
var contact_container = document.querySelector('#contact .container');

contact.addEventListener('click', function() {
    contenu_contact.classList.add('active');
    body.classList.toggle('window-active');
})

contact_cross.addEventListener('click', function() {
    contenu_contact.classList.remove('active');
    body.classList.toggle('window-active');
})

// window.addEventListener('click', function(e) {
//     if (contact_container.contains(e.target)) {
//     console.log('SALUT');
// } else {
//         contenu_contact.classList.remove('active');
//     }
// });
