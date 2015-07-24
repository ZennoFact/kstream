var comment;
$(function(){
  $('.btn')[0].addEventListener( "mousedown", onDown, false );
  comment = $('.comment');
});

var words = [];

function onDown() {
  var cmnt = comment.val();
  if ( cmnt !== "") {
    words.push(comment.val());
  }
}
