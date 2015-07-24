var comment;
$(function(){
  $('.btn')[0].addEventListener( "mousedown", onDown, false );
  comment = $('.comment');
});

function onDown() {
  var cmnt = comment.val();
  if ( cmnt !== "") {
    console.log(comment.val());
  }
}
