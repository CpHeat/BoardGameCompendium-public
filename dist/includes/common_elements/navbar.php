<?php
    if (!isset($_GET['game']))
    {
        $_GET['game'] = '';
    }
?>

<nav id="navbar" class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color:#333333; border-bottom:1px solid white;min-height:8vh">
    <div class="container-fluid">            
        <a class="navbar-brand" href="./index.php">
            <img src="/assets/icons/logo.webp" alt="" width="50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color: rgba(255,255,255,0);padding: .1rem .1rem;font-size: 2rem;border:0">
            <span class="navbar-toggler-icon" width="50" height="50"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-0 mb-lg-0 fs-4">
                <li class="nav-item">
                    <a class="nav-link<?php echo str_contains($_SERVER['REQUEST_URI'], '/resources.php')?' active':'';  ?>" href="./resources.php"><?php echo $navbarResources[$lang] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php echo str_contains($_SERVER['REQUEST_URI'], '/pdf_generator.php')?' active':''; ?>" href="./pdf_generator.php"><?php echo $navbarPdfGenerator[$lang] ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle<?php echo str_contains($_SERVER['REQUEST_URI'], '/missions.php')?' active':''; ?>" href="javascript(void:0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $navbarMissions[$lang] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown" style="background-color:#333333; border: 0">
                        <?php foreach($gamesInfos as $game_info)
                        {
                            if($game_info['id']==$_GET['game']){
                                $active=' active';
                            }else{
                                $active='';
                            }

                            echo '<li>
                                <a class="dropdown-item'.$active.'" href="./missions.php?game='.$game_info['id'].'">'.$game_info['name_'.$lang].'</a>
                            </li>';
                        }

                        if($lang=='en'){
                            $currentLang='EN';
                            $otherLang='FR';
                            $langChangeUrl=str_replace("/en/", "/fr/", $_SERVER['REQUEST_URI']);
                        }else{
                            $currentLang='FR';
                            $otherLang='EN';
                            $langChangeUrl=str_replace("/fr/", "/en/", $_SERVER['REQUEST_URI']);
                        }
                         ?>

                    </ul>
                </li>
            </ul>                    
        </div>                
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <div class="d-lg-none" style="min-height:2vh"></div>
                <li class="nav-item justify-content-end me-auto">
                    <!--<a class="social-link logged-out" id="logged-out" data-bs-toggle="modal" data-bs-target="#emailSigninModal" href="#"><img class="align-middle me-2" src="/assets/icons/logged-out.png" alt="" height="35"></a>
                    <li class="nav-item dropdown social-link logged-in">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img class="align-middle" src="/assets/icons/logged-in.png" alt="" height="35"></a>
                        <ul class="dropdown-menu dropdown-menu-dark" id="lang-selection" aria-labelledby="dropdownMenuLink" style="background-color:#333333; border: 0">
                            <li>
                                <a class="dropdown-item" href="#">My account</a>
                            </li>
                            <li>
                                <a id="logout-button" class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>!-->
                    
                    <a class="social-link" href="<?php echo $discordLink ?>" target="_blank"><img class="align-middle me-2" src="/assets/icons/discord.png" alt="" height="35"></a>
                    <a class="social-link" href="https://twitter.com/BoardGame_Comp" target="_blank"><img class="align-middle me-2" src="/assets/icons/twitter.png" alt="" height="35"></a>
                    <a class="social-link" href="https://www.instagram.com/BoardGameCompendium" target="_blank"><img class="align-middle me-2" src="/assets/icons/instagram.png" alt="" height="35"></a>
                    <a class="social-link" href="https://www.facebook.com/BoardGameCompendium/" target="_blank"><img class="align-middle me-2" src="/assets/icons/facebook.png" alt="" height="35"></a>                    
                    <a class="social-link" href="rss.php"><img class="align-middle" src="/assets/icons/rss.png" alt="" height="35"></a>
                    <li class="nav-item dropdown">
                        <a class="nav-link align-middle me-2" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $currentLang ?></a>
                        <ul class="dropdown-menu dropdown-menu-dark" id="lang-selection" aria-labelledby="dropdownMenuLink" style="background-color:#333333; border: 0">
                            <li>
                                <a class="dropdown-item" href="<?php echo $langChangeUrl ?>"><?php echo $otherLang ?></a>
                            </li>
                        </ul>
                    </li>
                </li>
            </ul>
        </div>
    </div>
</nav>