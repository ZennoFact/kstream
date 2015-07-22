<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>K STREAM!! | 配信者側</title>
    <script src="./js/library/jquery-2.1.3.min.js"></script>
    <script src="./js/setting.js"></script>
  </head>
  <body>
    <h1><?php echo getHostByName(php_uname('n')) ?></h1>
    <div id="video_box" width="100%" height="100%"></div>

    <script src="https://skyway.io/dist/0.3/peer.js"></script>
    <script>
    navigator.getUserMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia;
      var peer = new Peer("256", {key: API_KEY});
      navigator.getUserMedia({audio: true, video: true}, function (stream) {
        console.log(stream);
        peer.on("call", function(call) {
          call.answer(stream);
          call.on("stream", function(listen_stream) {
            $("#video_box").append(
              $("<video>").attr("autoplay", "autoplay")
              .attr("id", call.peer)
              .attr("src", URL.createObjectURL(listen_stream))
            );
          });

          call.on("close", function () {
            $("#" + call.peer).remove();
          });
        });
      }, function (errer) {});
    </script>
  </body>
</html>
