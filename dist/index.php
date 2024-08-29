<?php
  if (!empty( $_SERVER['HTTP_ACCEPT_LANGUAGE'])){
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

    if ($browser_lang=='fr'){
      $index = 'fr/index.php';
    }
    else {
      $index = 'en/index.php';
    }
  }
  else{
    $index = 'en/index.php';
  }

  header("Location: $index",TRUE,301);
?>
