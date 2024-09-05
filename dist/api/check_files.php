<?php
    include("../../config/config.php");

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
    	$bdd = new PDO("mysql:host=".$GLOBALS['db_host'].";dbname=".$GLOBALS['db'].";charset=utf8", $GLOBALS['db_user'], $GLOBALS['db_pass']);
    }
    catch(Exception $e)
    {
            die("Erreur : ".$e->getMessage());
    }
    
    $games = array (        
        array ("zombicide", "zombicide"),
        array ("black-plague", "black_plague"),
        array ("invader", "invader"),
        array ("zombicide-2", "zombicide_2"),
        array ("night-living-dead", "night_living_dead"),
        array ("undaunted", "undaunted"),
        array ("undead-or-alive", "undead_or_alive"),
        array ("crossover", "crossover")
    );
    
    foreach ($games as $game)
    {
        $reponse = $bdd->query("SELECT mission_id, nb_pages, description_fr, description_en FROM ".$game[1]."_missions ORDER BY mission_id ASC");
        $missions=$reponse->fetchAll(\PDO::FETCH_ASSOC);
        $reponse->closeCursor();

        foreach ($missions as $mission)
        {
            for ($i=1; $i <= $mission["nb_pages"];  $i++)
            {
                if($mission["description_fr"] != null)
                {
                    if($mission["nb_pages"]==1)
                    {
                        if (!file_exists("../missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-fr.webp")) {
                            echo "/missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-fr.webp\r\n";
                        }
                    }
                    else
                    {
                        for ($i=1; $i<=$mission["nb_pages"]; $i++)
                        {
                            if (!file_exists("../missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-fr-".$i.".webp")) {
                                echo "/missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-fr-".$i.".webp\r\n";
                            }
                        }
                    }

                    if (!file_exists("../missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-fr-thumb.webp")) {
                        echo "/missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-fr-thumb.webp\r\n";
                    }

                    if (!file_exists("../missions/".$game[0]."/pdf/".str_replace('/', '-', $mission["mission_id"])."-fr.pdf")) {
                        echo "/missions/".$game[0]."/pdf/".str_replace('/', '-', $mission["mission_id"])."-fr.pdf\r\n";
                    }
                }

                if($mission["description_en"] != null)
                {
                    if($mission["nb_pages"]==1)
                    {
                        if (!file_exists("../missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-en.webp")) {
                            echo "/missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-en.webp\r\n";
                        }
                    }
                    else
                    {
                        for ($i=1; $i<=$mission["nb_pages"]; $i++)
                        {
                            if (!file_exists("../missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-en-".$i.".webp")) {
                                echo "/missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-en-".$i.".webp\r\n";
                            }
                        }
                    }

                    if (!file_exists("../missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-en-thumb.webp")) {
                        echo "/missions/".$game[0]."/".str_replace('/', '-', $mission["mission_id"])."-en-thumb.webp\r\n";
                    }

                    if (!file_exists("../missions/".$game[0]."/pdf/".str_replace('/', '-', $mission["mission_id"])."-en.pdf")) {
                        echo "/missions/".$game[0]."/pdf/".str_replace('/', '-', $mission["mission_id"])."-en.pdf\r\n";
                    }
                }
            }
        }
    }    
    echo "\r\nFINISHED";
?>