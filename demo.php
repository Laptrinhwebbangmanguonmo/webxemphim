<?php
$key = 'd3afe2fae1c26cae7634a2b5f3e3dfec'; // Enter your key on VideoAPI.io
$link = 'https://www.youtube.com/watch?v=HxmcA2YU050';
$api = 'https://videoapi.io/api/getlink?key='.$key.'&link='.$link.'&cache=false';
$sources = curl($api);
// function curl
function curl($url)
{
  $ch = @curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $head[] = "Accept-Language: en-us,en;q=0.5";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  $page = curl_exec($ch);
  curl_close($ch);
  return $page;
}
?>
<script type="text/javascript" src="https://videoapi.io/public/player/videojs/video.min.js"></script>
<script type="text/javascript" src="https://videoapi.io/public/player/videojs/plugins/videojs-resolution-switcher.js"></script>
<link href="https://videoapi.io/public/player/videojs/video-js.min.css" rel="stylesheet">
<link href="https://videoapi.io/public/player/videojs/plugins/videojs-resolution-switcher.css" rel="stylesheet">
<div id="videoapi-player" style="width: 640px;height: 360px">
  <video id="video" class="video-js vjs-default-skin"></video>
</div>
<script type="text/javascript">
player = videojs("video", {
    width: "640px",
    height: "360px",
    controls: true,
    plugins: {
      videoJsResolutionSwitcher: {
        default: 480,
        dynamicLabel: true
      }
    }
}, function(){
    player.videoJsResolutionSwitcher();
    player.updateSrc(<?php echo $sources; ?>)
});
</script>