<?php
  // require our functions file before we begin
  require("functions.php");

  // define instagram settings
  define("INSTAGRAM_ID", "37768681");
  define("ACCESS_TOKEN", "37768681.04d79f8.6f019b7ab5da41afaad35c7a6889e397");
  define("PHOTO_COUNT", 50);
  define("IMAGE_PATH", "../../assets/images/instagram");

  // create our empty arrays
  $feed_recent_array = array();
  $recent_folder_array = array();

  // grab the instagram feed
  $feed_url = "https://api.instagram.com/v1/users/".INSTAGRAM_ID."/media/recent/?count=".PHOTO_COUNT."&access_token=".ACCESS_TOKEN."";
  $data = json_decode(file_get_contents($feed_url, true));

  // loop through the feed and put the items in an array
  foreach($data->data as $item) :
    $feed_recent_array['full'][] = $item->images->standard_resolution->url;
    $feed_recent_array['base'][] = basename($item->images->standard_resolution->url);
  endforeach;

  // loop through our array
  foreach($feed_recent_array['full'] as $item) :

    // if there's a new image, let's save it to the recent folder
    if(!glob(IMAGE_PATH."/*".basename($item))) {
      $file_name = basename($item);

      save_image($item,IMAGE_PATH."/".$file_name);
      createThumbnail($file_name, IMAGE_PATH."/", IMAGE_PATH."/thumbs/");
    }
  endforeach;
?>