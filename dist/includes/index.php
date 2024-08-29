<div class="main-div container-fluid">
    <div class="col-12" style="text-align:center;">        
        <img class="logo" src="/assets/banners/banner-logo.webp" alt="logo BoardGameCompendium">
        <p id="intro">
            <?php echo $indexIntroText[$lang]; ?>
        </p>
    </div>
</div>

<div class="container">
    <div id="games_carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <?php
                for($i=0; $i<count($gamesInfos);$i++)
                {
                    echo '<button type="button" data-bs-target="#games_carousel" data-bs-slide-to="'.$i.'" '; echo ($i==0) ? 'class="active" aria-current="true"' : ''; echo ' aria-label="Slide '.($i+1).'"></button>';
                }

            echo '</div>
            <div class="carousel-inner">';

            $i=0;

            foreach ($gamesInfos as $game_infos)
            {
                echo '<div class="carousel-item '; echo ($i==0) ? 'active' : ''; echo '">
                <a href="./missions.php?game='.$game_infos['id'].'"><img src="/assets/banners/'.$game_infos['id']; echo ($game_infos['banner_lang_difference']) ? '-'.$lang : '' ; echo '.webp" class="carousel-img d-block w-100" alt="'.$game_infos['name_'.$lang].' - '.$game_infos['description_'.$lang].'">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-caption-title">
                        '.$game_infos['name_'.$lang].'
                        </div>
                        <div class="carousel-caption-text">
                        '.$game_infos['description_'.$lang].'
                        </div>
                    </div></a>
                </div>';
                $i++;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#games_carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#games_carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>