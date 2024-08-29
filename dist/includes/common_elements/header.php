<?php
    // METATAGS
    if(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){
        $metatags=$missionsMetatags;
    }else{
        $metatags=$indexMetatags;
    }

    // ADDITIONAL CSS
    if(strcasecmp(basename($_SERVER['PHP_SELF']), 'resources.php')==0){
        $additionalCss='resources.css';
    }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'rss.php')==0){
        $additionalCss='rss.css';
    }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'pdf_generator.php')==0){
        $additionalCss='pdf_generator.css';
    }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){
        $additionalCss='missions.css';
    }else{
        $additionalCss='index.css';
    }

    // ADDITIONAL HEADER
    if(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){
        $additionalHeader=<<<HTML
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
        HTML;
    }else{
        $additionalHeader='';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-control" content="public">
        <meta name="robots" content="index, follow"/>
        <link rel="alternate" type="application/rss+xml" title="BoardGameCompendium" href="https://boardgamecompendium.com/feed/general-<?php echo $lang ?>.rss">
        <?php echo $metatags ?>
        <link rel="icon" href="/assets/icons/favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" href="//fonts.googleapis.com/css?family=Righteous|Oswald:wght@300|family=Roboto+Condensed:wght@300&display=swap" as="style">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous|Oswald:wght@300|family=Roboto+Condensed:wght@300&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <?php echo $additionalHeader ?>
        <link rel="stylesheet" href="/css/colors.css?v<?php echo $version; ?>">
        <link rel="stylesheet" href="/css/main.css?v<?php echo $version; ?>">
        <link rel="stylesheet" href="/css/navbar.css?v<?php echo $version; ?>">
        <link rel="stylesheet" href="/css/modals.css?v<?php echo $version; ?>">
        <link rel="stylesheet" href="/css/<?php echo $additionalCss ?>?v<?php echo $version; ?>">