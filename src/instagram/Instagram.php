<?php

class InstagramFeed
{
  /**
   * The API base URL.
   */
  const API_URL = 'https://api.instagram.com/v1/';

  /**
   * The local JSON file to write to
   */
  const JSON_FILE = 'instagram.json';

  /**
   * The array that we will populate with our Instagram Data
   *
   * @var array
   */
  public $data_feed = array();

  /**
   * The path to the full size images
   *
   * @var string
   */
  public $full_path = 'images/full';

  /**
   * The path to the thumbnail images
   *
   * @var string
   */
  public $thumbnail_path = 'images/thumbs';

  /**
   * The Instagram User Access Token
   *
   * @var string
   */
  private $_accessToken;

  /**
   * Default constructor.
   */
  public function __construct($config)
  {
    if (is_array($config)) {
      $this->setAccessToken($config['accessToken']);
    } else {
      throw new Exception('Error: __construct() - Configuration data is missing.');
    }
  }

  /**
   * Get user recent media.
   *
   * @param int|string $id Instagram user ID
   * @param int $limit Limit of returned results
   *
   * @return mixed
   */
  public function getUserMedia($id = 'self', $limit = 10)
  {
      $params = array();
      $params['count'] = $limit;
      return $this->_makeCall('users/' . $id . '/media/recent/', $params);
  }

  public function downloadPhotos($params)
  {
    $recent_media = $this->getUserMedia('self', $params['count']);

    # Let's build our Array
    $this->buildArray($recent_media);

    # Let's download the images from that Array
    $this->saveImages();

    # Let's write to our local JSON file
    $this->writeJSON();
  }

  public function buildArray($data)
  {
    # Loop through the different rows
    foreach($data->data as $item) :

      $this->data_feed[] = array(
        'full_image' => $item->images->standard_resolution->url,
        'thumbnail_image' => $item->images->thumbnail->url,
        'base' => basename($item->images->standard_resolution->url),
        'description' => ($item->caption) ? $item->caption->text : ''
      );

    endforeach;

    # Loop through the current function again with the next batch of photos
    if(isset($data->pagination->next_url)) :
      $next_url = json_decode(file_get_contents($data->pagination->next_url, true));
      return $this->buildArray($next_url);
    endif;

    return $this->data_feed;
  }

  public function saveImages()
  {
    # Loop through our data feed
    foreach($this->data_feed as $item) :

      # If there's a new image, let's save it to our images folder
      if(!glob($this->full_path . '/*' . basename($item['full_image']))) :

        # Save Full Image
        $this->_saveImage($item['full_image'], $this->full_path . '/' . $item['base'] . '');

        # Save Thumbnail Image
        $this->_saveImage($item['thumbnail_image'], $this->thumbnail_path . '/' . $item['base'] . '');
      endif;

    endforeach;
  }

  protected function _saveImage($inPath, $outPath)
  {
    $in = fopen($inPath, "rb");
    $out = fopen($outPath, "wb");

    while ($chunk = fread($in, 8192)) {
      fwrite($out, $chunk, 8192);
    }

    fclose($in);
    fclose($out);
  }

  protected function writeJSON()
  {
    if($this->data_feed) :
      try {
        file_put_contents(self::JSON_FILE, json_encode($this->data_feed));
        echo "\nSaved contents to a local JSON file\n";
      }
      catch (Exception $e) {
        throw new Exception('Error: Could not write to JSON file.');
      }
    endif;
  }

  protected function _makeCall($string, $params)
  {
    $paramString = null;

    if (isset($params) && is_array($params)) :
      $paramString = '&' . http_build_query($params);
    endif;

    $apiCall = self::API_URL . $string . '?access_token=' . $this->getAccessToken() . $paramString;

    $jsonData = file_get_contents($apiCall, true);

    if (!$jsonData) :
      throw new Exception('Could not fetch feed URL. Double check your settings file and make sure your keys are correct.');
    endif;

    return json_decode($jsonData);
  }

  /**
   * Access Token Getter.
   *
   * @return string
   */
  public function getAccessToken()
  {
    return $this->_accessToken;
  }

  /**
   * API User Access Token Setter
   *
   * @param string $accessToken
   *
   * @return void
   */
  public function setAccessToken($accessToken)
  {
    $this->_accessToken = $accessToken;
  }
}

?>
