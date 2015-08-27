<?php
  require_once('Instagram.php');

  # Declare the InstagramFeed Class
  $instagram = new InstagramFeed(array(
    'accessToken' => '{{instagramAccessToken}}'
  ));

  # Download the Photos
  $instagram->downloadPhotos(array(
    'count' => 20
  ));
?>
