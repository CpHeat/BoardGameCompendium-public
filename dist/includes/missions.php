<?php 
    echo createSearchEngine();
        #Missions
      ?>

      <div class="container mission-count-div d-flex">
        <div class="col-3">
        </div>
        <div class="col-6">
          <span id="mission-count"><?php echo $noMissionText[$lang]; ?></span>
        </div>
        <div class="col-3 d-flex justify-content-end">
        <a href="javascript:void(0)"><span class="material-icons selected-view" id="listview-selector">
            view_list
          </span></a>
          <a href="javascript:void(0)"><span class="material-icons unselected-view" id="gridview-selector">
            view_module
          </span></a>
        </div>
      </div>
      <div class="container collapse" id="missions-grid">
        <div class="row">             
          <?php
            #CREATION DES VARIABLES D'INFOS
            $i = 0;
            foreach ($missions as $mission) {
              $mission[$lang.'_excl'] ? $exclusive_language=true : $exclusive_language=false;
              
              // Retirer le nom de l'auteur de l'id affiché en cas de mission fanmade
              if(!$mission['official'] && $mission['author']){
                $formattedAuthor=str_replace(' & ', '-', $mission['author']);
                $formattedAuthor=str_replace(' ', '-', $formattedAuthor);
                $modifiedId=str_replace(strtolower($formattedAuthor).'-', '', $mission['mission_id']);
              }else{
                $modifiedId=$mission['mission_id'];
              }
              
              if($mission['campaign'] && str_starts_with($modifiedId, 'CP-')){
                $modifiedId=str_replace('CP-', '', $modifiedId);
              }

              // Enlever le premier 0 de l'ID
              $shown_id=firstZeroExtract($modifiedId);

              $basepdflink = $missionsFile.$game_infos['id']."/pdf/".strtolower(str_replace('/', '-', $mission['mission_id']));
              $baselink = $missionsFile.$game_infos['id']."/".strtolower(str_replace('/', '-', $mission['mission_id']));
              $certified=$mission['official'];

              if($show_length)
              {
                if ($mission['length'] != "special") {
                  $mission_length = $mission['length']." minutes";
                }
                else {
                  ($lang == 'fr') ? $mission_length = "Spécial" : $mission_length = "Special";
                }
              }

              if($showPlayersNb)
              {
                if ($mission['players_nb'] != "special")
                {
                  if (($mission['players_nb'] == 1)) {
                    $mission_players_nb = $mission['players_nb']." ".$game_infos['player_badge_'.$lang];
                  }
                  else {
                    $mission_players_nb = $mission['players_nb']." ".$game_infos['player_badge_'.$lang]."s";
                  }
                }
                else
                {
                  ($lang == 'fr') ? $mission_players_nb = "Spécial" : $mission_players_nb = "Special";
                }
              }

              $lang=='fr' ? $other_lang = 'en' : $other_lang = 'fr';

              if($mission["description_$lang"] != null) {
                $thumb = $baselink."-$lang-thumb";
                $pdflink = $basepdflink."-$lang.pdf";
                $finalPdfLink = $basepdflink."-$lang-final.pdf";
                $mission['nb_pages'] > 1 ? $gallery_link = $baselink."-$lang-1.webp" : $gallery_link = $baselink."-$lang.webp";
                $title = ucwords($mission["title_$lang"]);
                $description = $mission["description_$lang"];
                $mission_lang = $lang;
              }else{
                $thumb = $baselink."-$other_lang-thumb";
                $pdflink = $basepdflink."-$other_lang.pdf";
                $finalPdflink = $basepdflink."-$other_lang-final.pdf";
                $mission['nb_pages'] > 1 ? $gallery_link = $baselink."-$other_lang-1.webp" : $gallery_link = $baselink."-$other_lang.webp";
                $title = ucwords($mission["title_$other_lang"]);
                $description = $mission["description_$other_lang"];
                $mission_lang = $other_lang;
              }
            echo createMissionCard($mission);

            $i++;
          }
        ?>
        </div>
      </div>

      <div class="container-lg-fluid container" id="missions-list">

        <?php
          $i = 0;
          foreach ($missions as $mission) {
            $mission[$lang.'_excl'] ? $exclusive_language=true : $exclusive_language=false;

            // Retirer le nom de l'auteur de l'id affiché en cas de mission fanmade
            if(!$mission['official'] && $mission['author']){
              $formattedAuthor=str_replace(' & ', '-', $mission['author']);
              $formattedAuthor=str_replace(' ', '-', $formattedAuthor);
              $modifiedId=str_replace(strtolower($formattedAuthor).'-', '', $mission['mission_id']);
            }else{
              $modifiedId=$mission['mission_id'];
            }
            
            if($mission['campaign'] && str_starts_with($modifiedId, 'CP-')){
              $modifiedId=str_replace('CP-', '', $modifiedId);
            }

            // Enlever le premier 0 de l'ID
            $shown_id=firstZeroExtract($modifiedId);

            $basepdflink = $missionsFile.$game_infos['id']."/pdf/".strtolower(str_replace('/', '-', $mission['mission_id']));
            $baselink = $missionsFile.$game_infos['id']."/".strtolower(str_replace('/', '-', $mission['mission_id']));
            $certified=$mission['official'];

            if($show_length)
            {
              if ($mission['length'] != "special") {
                $mission_length = $mission['length']." minutes";
              }
              else {
                ($lang == 'fr') ? $mission_length = "Spécial" : $mission_length = "Special";
              }
            }

            if($showPlayersNb)
            {
              if ($mission['players_nb'] != "special")
              {
                if (($mission['players_nb'] == 1)) {
                  $mission_players_nb = $mission['players_nb']." ".$game_infos['player_badge_'.$lang];
                }
                else {
                  $mission_players_nb = $mission['players_nb']." ".$game_infos['player_badge_'.$lang]."s";
                }
              }
              else
              {
                ($lang == 'fr') ? $mission_players_nb = "Spécial" : $mission_players_nb = "Special";
              }
            }

            $lang=='fr' ? $other_lang = 'en' : $other_lang = 'fr';

            if($mission["description_$lang"] != null) {
              $thumb = $baselink."-$lang-thumb";
              $pdflink = $basepdflink."-$lang.pdf";
              if($mission['nb_pages'] > 1){
                $gallery_list_thumb = "$baselink-$lang-".$gamesData[$_GET['game']]['thumb_page'].".webp";
              }else{
                $gallery_list_thumb = "$baselink-$lang.webp";
              }
              $mission['nb_pages'] > 1 ? $gallery_link = $baselink."-$lang-1.webp" : $gallery_link = $baselink."-$lang.webp";
              $title = ucwords($mission["title_$lang"]);
              $description = $mission["description_$lang"];
              $mission_lang = $lang;
            }else{
              $thumb = $baselink."-$other_lang-thumb";
              $pdflink = $basepdflink."-$other_lang.pdf";
              if($mission['nb_pages'] > 1){
                $gallery_list_thumb = "$baselink-$other_lang-".$gamesData[$_GET['game']]['thumb_page'].".webp";
              }else{
                $gallery_list_thumb = "$baselink-$other_lang.webp";
              }
              $mission['nb_pages'] > 1 ? $gallery_link = $baselink."-$other_lang-1.webp" : $gallery_link = $baselink."-$other_lang.webp";
              $title = ucwords($mission["title_$other_lang"]);
              $description = $mission["description_$other_lang"];
              $mission_lang = $other_lang;
            }

            echo createMissionList($mission);          
           } ?>
        </div>
      </div>