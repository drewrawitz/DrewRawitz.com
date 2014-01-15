<?php
  header('Content-type: application/json');

  // loop through our recent images folder
  foreach(glob("../../assets/images/instagram/*.*") as $folder) :
    $folder = basename($folder);
    $recent_folder_array[] = $folder; 
  endforeach;

  shuffle($recent_folder_array);
  $recent_folder_array = array_slice($recent_folder_array,0,6);
  
  echo json_encode($recent_folder_array);
?>