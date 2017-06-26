var hidden_input = document.querySelector('.add-tags input[name="tags"]');
var content_hidden = '';
var input = document.querySelector('.add-tags input[type="text"]');
var tags = document.querySelector('.add-tags .all-tags');

input.addEventListener('keyup', function(e) {

   if (e.key == ',' || e.keyCode == 13) {
       var span = document.createElement('SPAN');
       var content = input.value;

       if (content_hidden == '') {
           content_hidden = input.value + ' ';
       } else {
           content_hidden += input.value + ' ';
       }

       hidden_input.setAttribute('value', content_hidden);
       console.log(hidden_input.getAttribute('value'));
       span.classList.add('tag');
      //  content = content.substring(0, content.length - 1);
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
var doing_check = false;

checkbox_select.addEventListener('click', function() {
    section_view_article.classList.toggle('actions-on');

    if (section_view_article.classList.contains('actions-on')) {
      doing_check = true;
    } else {
      doing_check = false;
    }

    return doing_check;
});

var cats_select = document.querySelectorAll('#admin-filter-articles  select[name="filter-categories"] option');

var select_cat = document.querySelector('#admin-filter-articles select[name="filter-categories"]');

select_cat.addEventListener('change', function() {
  var admin_all_articles = document.querySelectorAll('#admin-view-articles article');
  var myCat = this.value;
  var xhr = new XMLHttpRequest();
  var parameters = 'filterby=' + myCat;

  xhr.open('POST', 'filters-categories-php.php', true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(parameters);

  xhr.onreadystatechange = function() {
      if ((xhr.status === 200 || xhr.status === 0) && xhr.readyState === 4) {

          var lol = JSON.parse(xhr.responseText);

          console.log(lol);

          // for (var i = 0; i < lol.length; i++) {
          //     var div = document.createElement('DIV');
          //     div.className = 'article ' + myCat;
          //     div.innerHTML = lol[i].name;
          //     result.append(div);
          // }
      }
  };

});

// for (var i = 0; cats_select.length; i++) {
//   cats_select[i].addEventListener('click', function() {
//     console.log('salut' +  i);
//   });
// }

var admin_uncheck = document.querySelector('#admin-all-articles .uncheck');

admin_uncheck.addEventListener('click', function() {
  if (doing_check == true) {
    for (var i = 0; article_checkboxs.length; i++) {
      article_checkboxs[i].checked = false;
    }
  }
});
