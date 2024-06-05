const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const conajax = document.querySelector('.conajax');

// event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function () {
  // console.log('ok');
  // ajax
  // xmlhttprequest
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
      // console.log(xhr.responseText);
        conajax.innerHTML = xhr.responseText;
    }
  };

  xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
  xhr.send();
  
});
