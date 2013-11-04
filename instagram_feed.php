<?php
  
  // function to save the external images so we have a copy
  function save_image($inPath,$outPath) {
      $in  =  fopen($inPath, "rb");
      $out =  fopen($outPath, "wb");
      while ($chunk = fread($in,8192)) {
        fwrite($out, $chunk, 8192);
      }
      fclose($in);
      fclose($out);
  }

  // define instagram settings
  define("INSTAGRAM_ID", "37768681");
  define("ACCESS_TOKEN", "37768681.04d79f8.6f019b7ab5da41afaad35c7a6889e397");
  define("PHOTO_COUNT", 6);
  define("RECENT_IMAGE_PATH", "assets/images/instagram/recent");
  define("ARCHIVE_IMAGE_PATH", "assets/images/instagram/archive");

  // create our empty arrays
  $feed_recent_array = array();
  $feed_archive_array = array();
  $recent_folder_array = array();

  // grab the instagram feed
  $feed_url = "https://api.instagram.com/v1/users/".INSTAGRAM_ID."/media/recent/?count=".PHOTO_COUNT."&access_token=".ACCESS_TOKEN."";
  $data = json_decode(file_get_contents($feed_url, true));

  // loop through the feed and put the items in an array
  foreach($data->data as $item) :
    $feed_recent_array[] = basename($item->images->standard_resolution->url);
  endforeach;

  // loop through our array
  foreach($feed_recent_array as $item) :
    // if there's a new image, let's save it to the recent folder
    if(!file_exists(RECENT_IMAGE_PATH."/".$item."")) {
      save_image($item,"".RECENT_IMAGE_PATH."/".$item."");
    }
  endforeach;

  // loop through our recent images folder
  foreach(glob(RECENT_IMAGE_PATH."/*.*") as $folder) :
    $folder = basename($folder);
    $recent_folder_array[] = $folder; 
  endforeach;

  $feed_archive_array = array_diff($recent_folder_array, $feed_recent_array);

  // move the items from our archive array into the archive folder
  foreach($feed_archive_array as $archive) :
    rename(RECENT_IMAGE_PATH."/".$archive, ARCHIVE_IMAGE_PATH."/".$archive);
  endforeach;
?>