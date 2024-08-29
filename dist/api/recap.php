<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <?php
                include("../config/config.php");

                /**
                * Affichage des erreurs
                */
                if ($debug)
                {
                ini_set("display_errors","on");
                error_reporting(E_ALL);
                }

                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=".$GLOBALS['db'].";charset=utf8", $GLOBALS['db_user'], $GLOBALS['db_pass']);
                }
                catch(Exception $e)
                {
                    die("Erreur : ".$e->getMessage());
                }
                
                $games = array (        
                    array ("zombicide", "zombicide", "Zombicide 1st Edition"),
                    array ("black-plague", "black_plague", "Zombicide: Black Plague"),
                    array ("invader", "invader", "Zombicide: Invader"),
                    array ("zombicide-2", "zombicide_2", "Zombicide 2nd Edition"),
                    array ("night-living-dead", "night_living_dead", "Night of the Living Dead"),
                    array ("undead-or-alive", "undead_or_alive", "Zombicide: Undead or Alive"),
                    array ("undaunted", "undaunted", "Undaunted"),        
                    array ("crossover", "crossover", "Crossover")
                );

                echo '<center>AVAILABLE MISSIONS LIST</center><br/>
                
                <div class="accordion" id="games_accordion">';

                foreach ($games as $game)
                {
                    $missions_list = getMissionList($game[1], $bdd);

                    echo '<div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$game[1].'" aria-expanded="false" aria-controls="'.$game[1].'">
                                '.strtoupper($game[2]).'
                            </button>
                        </h2>';                    

                        if (!empty($missions_list['bilangual'])) {
                            echo '<div id="'.$game[1].'" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="accordion" id="'.$game[1].'_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$game[1].'-bilingual" aria-expanded="false" aria-controls="'.$game[1].'-bilingual">
                                                    Bilingual missions
                                                </button>
                                            </h2>
                                            <div id="'.$game[1].'-bilingual" class="accordion-collapse collapse">
                                                <div class="accordion-body">';
                                                foreach ($missions_list['bilangual'] as $mission)
                                                {
                                                    echo $mission . "<br/>";
                                                }
                                                echo '</div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>';
                        }

                        if (!empty($missions_list['english'])) {
                            echo '<div id="'.$game[1].'" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="accordion" id="'.$game[1].'_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$game[1].'-english" aria-expanded="false" aria-controls="'.$game[1].'-english">
                                                    English-only missions
                                                </button>
                                            </h2>
                                            <div id="'.$game[1].'-english" class="accordion-collapse collapse">
                                                <div class="accordion-body">';
                                                foreach ($missions_list['english'] as $mission)
                                                {
                                                    echo $mission . "<br/>";
                                                }
                                                echo '</div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>';
                        }

                        if (!empty($missions_list['french'])) {
                            echo '<div id="'.$game[1].'" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="accordion" id="'.$game[1].'_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$game[1].'-french" aria-expanded="false" aria-controls="'.$game[1].'-french">
                                                    French-only missions
                                                </button>
                                            </h2>
                                            <div id="'.$game[1].'-french" class="accordion-collapse collapse">
                                                <div class="accordion-body">';
                                                foreach ($missions_list['french'] as $mission)
                                                {
                                                    echo $mission . "<br/>";
                                                }
                                                echo '</div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>';
                        }
                    
                    echo '</div>';                    
                }
                
            ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>


<?php
    function getMissionList(string $game, $bdd):array {

        $bilangual_missions = [];
        $english_missions = [];
        $french_missions = [];

        try
        {
            $reponse = $bdd->query("SELECT mission_id, title_fr, title_en FROM ".$game."_missions ORDER BY mission_id ASC");
            $missions=$reponse->fetchAll(\PDO::FETCH_ASSOC);
            $reponse->closeCursor();
        }
        catch(Exception $e)
        {
            die("Erreur : ".$e->getMessage());
        }
        
        foreach ($missions as $mission)
        {
            if($mission['title_fr']!='' && $mission['title_en']!=''){
                $bilangual_missions[] = $mission['mission_id']." - " . $mission['title_en']." / " . $mission['title_fr'] ;
            }
            else if($mission['title_fr']!='') {
                $french_missions[] = $mission['mission_id'] . " - " . $mission['title_fr'] ;
            }
            else {
                $english_missions[] = $mission['mission_id'] . " - " . $mission['title_en'] ;
            }
        }

        $missions_list = [
            "bilangual" => $bilangual_missions,
            "english" => $english_missions,
            "french" => $french_missions
        ];

        return $missions_list;
    }
?>