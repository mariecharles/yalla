var hidden_input = document.querySelector('.add-tags input[name="tags"]');
var content_hidden = '';
var input = document.querySelector('.add-tags input[type="text"]');
var tags = document.querySelector('.add-tags .all-tags');

input.addEventListener('keyup', function(e) {

   if (e.key == ',') {
       var span = document.createElement('SPAN');
       var content = input.value;

       if (content_hidden == '') {
           content_hidden = input.value + ' ';
       } else {
           content_hidden += input.value + ' ';
       }

       hidden_input.setAttribute('value', content_hidden);
       span.classList.add('tag');
       content = content.substring(0, content.length - 1);
       span.innerHTML = content;
       tags.appendChild(span);
       input.value = '';
   }
});

var section_add_article = document.querySelector('#admin-add-article');
var title_add_article = document.querySelector('#admin-add-article h2');
var content_add_article = document.querySelector('#admin-add-article .wrapper');


title_add_article.addEventListener('click', function() {
  section_add_article.classList.toggle('opened');
  content_add_article.classList.toggle('show');
});

var section_view_article = document.querySelector('#admin-view-articles');
var checkbox_select = document.querySelector('#admin-all-articles .selected input[type="checkbox"]');
var article_checkboxs = document.querySelectorAll('#admin-all-articles article input[type="checkbox"]');
var count_checkboxs = 0;

checkbox_select.addEventListener('click', function() {
    section_view_article.classList.toggle('actions-on');
});

// for (var i = 0; i < article_checkboxs.length; i++) {
//
// }
