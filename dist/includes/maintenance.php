<?php
    $lang=='fr'?$title='BoardGameCompendium - En maintenance':$title='BoardGameCompendium - Under maintenance';
    $lang=='fr'?$announcement1='En cours de maintenance, nous devrions être de retour dans quelques minutes !':$announcement1='Under maintenance, should be back in a few minutes!';
    $lang=='fr'?$announcement2='En cas d\'indisponibilité prolongée, plus d\'information sur<a href="'.$discordLink.'" target="_blank"> notre Discord</a>':$announcement2='If it takes too long, you can get more infos on<a href="'.$discordLink.'" target="_blank"> our Discord</a>';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='Cache-control' content='public'>
        <meta name='robots' content='noindex'/>
        <title>
            <?php echo $title ?>
        </title>
        <link rel='icon' href='/assets/icons/favicon.png'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Righteous|Oswald:wght@300|family=Roboto+Condensed:wght@300&display=swap' />
        <link rel='stylesheet' href='/css/index.css'>
        <link rel='stylesheet' href='/css/main.css'>
    </head>
    <body lang="<?php echo $lang ?>">
        <div class='main-div container-fluid'>
            <div class='col-12' style='text-align:center;'>
                <img class='logo' src='/assets/banners/banner-logo.webp' alt='logo BoardGameCompendium'>
                <p id='intro'>
                    <?php echo $announcement1 ?>
                </p>
                <p id='intro'>
                    <?php echo $announcement2 ?>
                </p>
            </div>
        </div>
    </body>
</html>