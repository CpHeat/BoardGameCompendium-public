<?php
  $lang='fr';

  include('../config/config.php');
  include('../config/text.php');
  include('../config/error_handling.php');

  if($maintenance && !($_SERVER['REMOTE_ADDR']=='82.64.10.182' || $_SERVER['REMOTE_ADDR']=='127.0.0.1')){
    include('../includes/maintenance.php');
  }
  else{
    include('../includes/functions/variables.php');

    include('../includes/common_elements/header.php');
    include('../includes/common_elements/scripts_header.php');
    include('../includes/common_elements/styles.php');

    include('../includes/common_elements/navbar.php');
    include('../includes/common_elements/navbar_modals.php');

    include('../includes/index.php');

    include('../includes/common_elements/footer.php');
    include('../includes/common_elements/scripts_footer.php');
  }
?>