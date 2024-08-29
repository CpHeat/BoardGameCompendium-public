<body lang="<?php echo $lang ?>">
<?php
    if(strcasecmp(basename($_SERVER['PHP_SELF']), 'rss.php')==0){
        echo <<<HTML
            <style>
                .update-background-$lang{
                    opacity:1;
                }
                .update-time-$lang{
                    color:rgba(255, 255, 255, 1);
                }
                .update-$lang{
                    opacity:1;
                }
                .items-$lang{
                    opacity: 1;
                }
            </style>
        HTML;
    }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){
        echo <<<HTML
            <style>
                :root {
                --theme-color: {$game_infos['theme_color']};
                --title-color: {$game_infos['title_color']};
                --switch-color: {$game_infos['switch_color']};
                --form-border-color: {$game_infos['form_border_color']};
                --form-font-color: {$game_infos['form_font_color']};
                }

                .dropdown-item.active {
                background-color: {$game_infos['theme_color']}!important ;
                color: {$game_infos['form_font_color']}!important ;
                border:1px solid white;
                }

                .dropdown-item.active:hover {
                background-color: {$game_infos['theme_color']}!important ;
                opacity: 1;
                }

                .dropdown-item:active {
                background-color: #1e1e1e!important ;
                }

                .dropdown-item:hover {
                background-color: #1e1e1e!important ;
                opacity: 0.8;
                }
            </style>
        HTML;
    }
?>