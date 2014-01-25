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

  // function to improve strstr()
  function strstr_after($haystack, $needle, $case_insensitive = false) {
    $strpos = ($case_insensitive) ? 'stripos' : 'strpos';
    $pos = $strpos($haystack, $needle);
    if (is_int($pos)) {
        return substr($haystack, $pos + strlen($needle));
    }
    return $pos;
  }

  // function to save thumbnails from the new images we just saved
  function createThumbnail($filename, $pathToImages, $pathToThumbs) {
      $source_image = imagecreatefromjpeg($pathToImages . $filename);
      $source_imagex = imagesx($source_image);
      $source_imagey = imagesy($source_image);

      $dest_imagex = 60;
      $dest_imagey = 60;
      $dest_image = imagecreatetruecolor($dest_imagex, $dest_imagey);

      imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_imagex, $dest_imagey, $source_imagex, $source_imagey);

      header("Content-Type: image/jpeg");
      imagejpeg($dest_image,$pathToThumbs . $filename,80);
  }
?>