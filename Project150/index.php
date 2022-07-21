<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../jquery/jquery.min.js" charset="utf-8"></script>
    <script src="./script.js" charset="utf-8"></script>
    <link rel="stylesheet" href="master.css">
    <title>Video</title>
  </head>
  <body>
    <div class="video">
      <div class="video_frame">
        <div class="video_frame_video">
          <video autoplay id="videoID">
            <source src="../samples/SampleVideo_1280x720_20mb.mp4" type="video/mp4" />
            <p>Your browser does not support the video tag.</p>
          </video>
          <div class="video_frame_video_control">
            <div class="control">
                <a href="#" class="btnPlay">Play/Pause</a>
            </div>
            <div class="progressTime">
                Current play time: <span class="current"></span>
                Video duration: <span class="duration"></span>
            </div>
            <label class="switch" title="AutoPlay">
              <input type="checkbox" checked>
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="video_frame_info">
          <div class="video_frame_info_title">
            <h2>[1 Hour] Merry Go Round of Death - Howl's Moving Castle OST (Dark Ghibli Piano)</h2>
          </div>
          <div class="video_frame_info_extra">
            <div>
              <p class="video_frame_info_extra_views">1,201,883 views</p>
              <p class="video_frame_info_extra_date">Mar 8, 2021</p>
            </div>
            <div class="video_frame_info_extra_buttons">
              <div class="like">
                <img src="./img/like.png" alt="">
                <p>73K</p>
              </div>
              <div class="dislike">
                <img src="./img/dislike.png" alt="">
                <p>DISLIKE</p>
              </div>
              <div class="save_to_playlist">
                <img src="./img/add-to-playlist.png" alt="">
                <p>SAVE</p>
              </div>
              <div class="more">
                <img src="./img/option.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="video_selection">
        <?php
        for ($i=0; $i < 20; $i++) {
          echo '<div class="video_selection_item">
            <div class="video_selection_item_thumb">
              <img src="" alt="">
              <h5>32:19</h5>
            </div>
            <div class="video_selection_item_info">
              <div class="video_selection_item_info_title" title="The Darkest Piano Covers of 2021: 30 Minutes of Dark and ">
                <h3>The Darkest Piano Covers of 2021: 30 Minutes of Dark and </h3>
              </div>
              <div class="video_selection_item_info_extra">
                <p>PianoDeuss</p>
                <p>1M views * 6 months ago</p>
              </div>
            </div>
          </div>';
        } ?>
      </div>
    </div>
  </body>
</html>
