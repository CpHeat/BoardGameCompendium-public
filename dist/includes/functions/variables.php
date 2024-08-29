<?php
    if(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){
        #region Variables du jeu
        if(isset($_GET['game']) && array_key_exists($_GET['game'], $gamesInfos))
        {
        $game_infos = $gamesInfos[$_GET['game']];
        }
        else
        {
        header("Location: ./index.php",TRUE,301);
        }
        $gameId = $game_infos['id'];

        ob_start();  
        include("../tasks/get_data.php"); 
        $json = ob_get_contents();
        ob_end_clean();

        $data_array = json_decode($json, true);

        $choseBoxes=$data_array['settings']['chose_boxes'];
        $choseDifficulty=$data_array['settings']['chose_difficulty'];
        $show_difficulty=$data_array['settings']['show_difficulty'];
        $choseLength=$data_array['settings']['chose_length'];
        $show_length=$data_array['settings']['show_length'];
        $chosePlayersNb=$data_array['settings']['chose_players_nb'];
        $showPlayersNb=$data_array['settings']['show_players_nb'];
        $choseOfficial=$data_array['settings']['chose_official'];
        $chose_campaign=$data_array['settings']['chose_campaign'];
        $frOnly=$data_array['settings']['fr_only'];
        $enOnly=$data_array['settings']['en_only'];
        $boxes = $data_array['boxes'];
        $boxesId = array_column($boxes, 'box_id');
        $finalPages=$data_array['settings']['final_pages'];

        $hideSliders=false;
        $hideFilters=false;

        if($show_difficulty)
        {
        $difficulties = $data_array['difficulties'];
        }
        else{
        $difficulties = [];
        }


        if(!$choseDifficulty && !$choseLength && !$chosePlayersNb){
        $hideSliders=true;
        }

        if(!$choseBoxes && !$choseOfficial && !$chose_campaign && (($lang=='fr' && !$enOnly) || ($lang=='en' && !$frOnly))){
        $hideFilters=true;
        }
    #endregion Variables du jeu

    #region Variables de missions
        // Stocker la liste des missions
        $missions = $data_array['missions'];
        // Traiter la liste des missions et stocker la maximale de durée de mission dans misionsMaxLength
        $missionsMaxLength = 0;
        $missionsMaxPlayersNb = 0;

        foreach($missions as $mission){
        if($show_length)
        {
            $missionMaxLength=$mission['length'];

            if(str_contains($mission['length'], '-')){
            $missionLengths = explode('-', $mission['length']);
            $missionMaxLength=$missionLengths[1];
            }
            if($missionMaxLength!='special' && $missionMaxLength>$missionsMaxLength)
            {
            $missionsMaxLength = $missionMaxLength;
            }
        }
        
        if($showPlayersNb){
            $missionMaxPlayersNb=$mission['players_nb'];

            if(str_contains($mission['players_nb'], '-')){
            $missionPlayersNb = explode('-', $mission['players_nb']);
            $missionMaxPlayersNb=$missionPlayersNb[1];
            }
            if($missionMaxPlayersNb!='special' && $missionMaxPlayersNb>$missionsMaxPlayersNb)
            {
            $missionsMaxPlayersNb = $missionMaxPlayersNb;
            }
        }
        }

        // Si missionsMaxLength n'est pas multiple de 30 on l'arrondi au multiple de 30 supérieur
        if(($missionsMaxLength % 30)!=0){
        $missionsMaxLength = (intdiv($missionsMaxLength,30)+1)*30;
        }
    }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'index.php')==0){
        $gameId = "recent-missions";
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'].'/tasks/get_data.php');
        $json = ob_get_contents();
        ob_end_clean();
    }else{
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'].'/tasks/get_data.php');
        $json = ob_get_contents();
        ob_end_clean();
    }

    
    #endregion Variables de missions
    #endregion Variables

    
?>