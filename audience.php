<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>K STREAM!!</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/audience.css">
    <script src="./js/library/jquery-2.1.3.min.js"></script>
    <script src="./js/setting.js"></script>
    <script src="https://skyway.io/dist/0.3/peer.js"></script>
  </head>
  <body>
    <h1>現在，前納の動画を配信中</h1>
    <h2>学校の無線LANに繋いで「http://10.41.0.54/kstream/audience.php」にアクセス</h2>
    <article>
      <div class="box video">
        <div class="item">
          <video id="video_box" autoplay="autoplay">
        </div>
        <div class="item">
          <canvas id="canvas">
        </div>
      </div>
      <div class="box send">
        <input type="text" class="comment">
        <button class="btn" value="">Send</button>
      </div>
    </article>

    <script src="./js/system.js"></script>
    <script>
      navigator.getUserMedia = navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia;
      var peer = new Peer({key: API_KEY});
      peer.on("error", function(e) {
        console.log(e);
      });

      navigator.getUserMedia({audio: true, video: true}, function (stream) {
        console.log(peer);
        console.log(stream);
        var call = peer.call("256", stream);
        console.log(call);

        call.on("stream", function (talk_stream) {
          $("#video_box").attr("src", URL.createObjectURL(talk_stream));
        });
      }, function(error){});
    </script>
  </body>
</html>
