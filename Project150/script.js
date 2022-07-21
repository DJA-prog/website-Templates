
$(document).ready(function(){
  var video = $('#videoID');
  $(".btnPlay").click(function() {
      if(video[0].paused) {
          video[0].play();
      }
      else {
          video[0].pause();
      }
      return false;
  });
  //get HTML5 video time duration
  video.on('loadedmetadata', function() {
      $('.duration').text(video[0].duration);
  });

  //update HTML5 video current play time
  video.on('timeupdate', function() {
      $('.current').text(video[0].currentTime);
  });
});
