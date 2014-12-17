<?php
  // require our functions file before we begin
  require(dirname(__FILE__)."/functions.php");

  // define some settings
  define("BASE_DIR", realpath(dirname(__FILE__).'/../../../src'));
  define("INSTAGRAM_ID", "37768681");
  define("ACCESS_TOKEN", "37768681.04d79f8.6f019b7ab5da41afaad35c7a6889e397");
  define("PHOTO_COUNT", 200);
  define("IMAGE_PATH", BASE_DIR."/assets/images/instagram");

  // create our empty arrays
  $feed_recent_array = array();
  $json_feed_data = array();

  // grab the instagram feed
  $feed_url = "https://api.instagram.com/v1/users/".INSTAGRAM_ID."/media/recent/?count=".PHOTO_COUNT."&access_token=".ACCESS_TOKEN."";
  $data = json_decode(file_get_contents($feed_url, true));

  // loop through the feed and put the items in an array
  $i = 0;
  foreach($data->data as $item) :
    $i++;
    $feed_recent_array['full'][$i]['full_img'] = $item->images->standard_resolution->url;
    $feed_recent_array['full'][$i]['base_img'] = basename($item->images->standard_resolution->url);
    $feed_recent_array['full'][$i]['description'] = ($item->caption) ? $item->caption->text : "";
  endforeach;

  // loop through our array
  foreach($feed_recent_array['full'] as $item) :

    $json_feed_data[] = $item;

    // if there's a new image, let's save it to the recent folder
    if(!glob(IMAGE_PATH."/*".basename($item['full_img']))) {
      $file_name = basename($item['full_img']);

      save_image($item['full_img'],IMAGE_PATH."/".$file_name);
      createThumbnail($file_name, IMAGE_PATH."/", IMAGE_PATH."/thumbs/");
    }
  endforeach;

  file_put_contents(BASE_DIR."/instagram.json", json_encode($json_feed_data));
?>