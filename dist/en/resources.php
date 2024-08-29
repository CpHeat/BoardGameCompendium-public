<?php
  $lang='en';

  include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
  include($_SERVER['DOCUMENT_ROOT'].'/config/text.php');
  include($_SERVER['DOCUMENT_ROOT'].'/config/error_handling.php');

  if($maintenance && !($_SERVER['REMOTE_ADDR']=='82.64.10.182' || $_SERVER['REMOTE_ADDR']=='127.0.0.1')){
    include($_SERVER['DOCUMENT_ROOT'].'/includes/maintenance.php');
  }
  else{
    include($_SERVER['DOCUMENT_ROOT'].'/includes/functions/variables.php');

    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/header.php');
    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/scripts_header.php');
    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/styles.php');

    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/navbar.php');
    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/navbar_modals.php');

    include($_SERVER['DOCUMENT_ROOT'].'/includes/resources.php');
    
    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/footer.php');
    include($_SERVER['DOCUMENT_ROOT'].'/includes/common_elements/scripts_footer.php');
  }
?>