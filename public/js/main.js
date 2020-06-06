(function() {
  'use strict';

  var cmds = document.getElementsByClassName('del');
  var i;      //ループを回す為の変数

  for (i= 0; i < cmds.length; i++){
    cmds[i].addEventListener('click',function(e) {
      e.preventDefault();
      if (confirm('削除しますか?')){
        document.getElementById('form_' + this.dataset.id).submit();
      }
    });
  }
})();