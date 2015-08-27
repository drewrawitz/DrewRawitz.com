<?php
  require_once('Instagram.php');

  # Declare the InstagramFeed Class
  $instagram = new InstagramFeed(array(
    'accessToken' => '37768681.04d79f8.6f019b7ab5da41afaad35c7a6889e397'
  ));

  # Download the Photos
  $instagram->downloadPhotos(array(
    'count' => 20
  ));
?>
