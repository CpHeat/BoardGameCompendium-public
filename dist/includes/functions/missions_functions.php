<?php
    // CRÉER LE MOTEUR DE RECHERCHE
    function createSearchEngine(){

        global $if, $game_infos, $lang, $choseBoxes, $choseDifficulty, $choseLength, $chosePlayersNb, $choseOfficial, $chose_campaign, $hideFilters, $hideSliders, $enOnly, $frOnly, $boxes, $difficulties, $missionsMaxLength, $missionsMaxPlayersNb;
        global $filtersText, $exclusiveBoxesText, $foreignLanguageText, $showOfficialText, $showFanmadeText, $showCampaignsText, $showMissionsText, $componentsText, $anyBoxText, $difficultyText, $lengthText;
        
        $searchEngineHtml = <<<HTML
            <div id="search-engine" class="container-fluid">
                <img id="banner" src="/assets/banners/{$game_infos['id']}{$if($game_infos['banner_lang_difference'], '-'.$lang, '')}.webp"/>
                <div class="row justify-content-center mb-3">
                    <div class="col-10 col-lg-3{$if(!$choseBoxes, ' collapse', '')}">
        HTML;
        // CHOIX DES BOÎTES
        if($choseBoxes)
        {
            $searchEngineHtml .= <<<HTML
                        <h3 class="search-title" id="boxes">{$componentsText[$lang]}</h3>
                        <ul class="search_array">
                            <a href="javascript:void(0)" id="any-box" class="box-choice">
                                <li class="search_field first selected">
            HTML;

            if (count($boxes) != 1)
            {
                $searchEngineHtml .= $anyBoxText[$lang];
            }
            else {
              $searchEngineHtml .= $boxes[0]['box_name_'.$lang];
            }

            // ON FERME LES BOÎTES ET ON OUVRE LES SLIDERS
            $searchEngineHtml .= <<<HTML
                                </li>
                            </a>
            HTML;
            
            if (count($boxes) != 1) {
                foreach ($boxes as $box) {
                    $htmlBoxId = str_replace(' ', '-', $box['box_id']);

                    $searchEngineHtml .= <<<HTML
                            <a href="javascript:void(0)" id="{$htmlBoxId}" class="box-choice">
                                <li class="search_field">
                                    {$box['box_name_'.$lang]}
                                </li>
                            </a>
                    HTML;
                }
            }
        } 
            $searchEngineHtml .= <<<HTML
                        </ul>
                    </div>
                    <div class="col-8 col-lg-2{$if($hideSliders, ' collapse', '')}">
                        <div class="row">
                            <div class="col-12">    
            HTML;
           

        // DIFFICULTÉ
        if($choseDifficulty && (count($difficulties) > 2))
        {
            $maxDifficulty = count($difficulties)-2;

            $searchEngineHtml .= <<<HTML
                                <div class="row text-center">
                                    <h3 class="search-title">{$difficultyText[$lang]}</h3>
                                </div>
                                <div class="slider justify-content-center">
                                    <div class="progress" id="difficulty-slider-progress"></div>
                                </div>
                                <div class="range-input" id="difficulty-range-input">
                                    <input type="range" id="difficulty-range-min" min="0" max="{$maxDifficulty}" value="0" step="1">
                                    <input type="range" id="difficulty-range-max" min="0" max="{$maxDifficulty}" value="{$maxDifficulty}" step="1">
                                </div>
                                <div class="row">
                                    <div class="hint">
                                        <span class="search-hint" id="difficulty-hint">&nbsp;</span>
                                    </div>
                                </div>
            HTML;
        }
        // DURÉE
        if($choseLength)
        {
            $searchEngineHtml .= <<<HTML
                                <div class="row text-center">
                                    <h3 class="search-title">{$lengthText[$lang]}</h3>
                                </div>
                                <div class="slider">
                                    <div class="progress" id="length-slider-progress"></div>
                                </div>
                                <div class="range-input" id="length-range-input">
                                    <input type="range" id="length-range-min" min="0" max="{$missionsMaxLength}" value="0" step="30">
                                    <input type="range" id="length-range-max" min="0" max="{$missionsMaxLength}" value="{$missionsMaxLength}" step="30">
                                </div>
                                <div class="row">
                                    <div class="hint">
                                        <span class="search-hint" id="length-hint">&nbsp;</span>
                                    </div>
                                </div>
            HTML;
        }
        // JOUEURS
        if($chosePlayersNb)
        {
            $searchEngineHtml .= <<<HTML
                                <div class="row text-center">
                                    <h3 class="search-title">{$game_infos['players_'.$lang]}</h3>
                                </div>
                                <div class="slider">
                                    <div class="progress" id="players-nb-slider-progress"></div>
                                </div>
                                <div class="range-input" id="players-nb-range-input">
                                    <input type="range" id="players-nb-range-min" min="1" max="{$missionsMaxPlayersNb}" value="1" step="1">
                                    <input type="range" id="players-nb-range-max" min="1" max="{$missionsMaxPlayersNb}" value="{$missionsMaxPlayersNb}" step="1">
                                </div>
                                <div class="row">
                                    <div class="hint">
                                        <span class="search-hint" id="players-nb-hint">&nbsp;</span>
                                    </div>
                                </div>
            HTML;
        }
        // ON FERME LES SLIDERS ET ON OUVRE LES FILTRES
        $searchEngineHtml .= <<<HTML
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-lg-3{$if($hideFilters, ' collapse', '')}">
                        <div class="row">
                            <h3 class="search-title filters">{$filtersText[$lang]}</h3>
                        </div>
        HTML;        
        // SEULEMENT LES BOÎTES SÉLECTIONNÉES
        $searchEngineHtml .= <<<HTML
                        <div class="row {$if($choseBoxes, '', 'collapse')}">
                            <div class="form-switch">
                                <input class="form-check-input" id="exclusive-boxes-check" type="checkbox" name="exclusive-boxes-check">
                                <label class="form-check-label text-truncate filter-check" style="max-width:90%" for="exclusive-boxes-check">{$exclusiveBoxesText[$lang]}</label>
                            </div>
                        </div>
        HTML;
        // AFFICHER LES AUTRES LANGUES
        $searchEngineHtml .= <<<HTML
                        <div class="row {$if(($lang=='fr' && $enOnly) || ($lang=='en' && $frOnly), '', 'collapse')}">
                            <div class="form-switch">
                                <input class="form-check-input {$lang}" id="foreign-language-check" type="checkbox" name="foreign-language-check">
                                <label class="form-check-label filter-check text-truncate" for="foreign-language-check">{$foreignLanguageText[$lang]}</label>
                            </div>
                        </div>
        HTML;
        // AFFICHER LES CONTENUS OFFICIELS
        $searchEngineHtml .= <<<HTML
                        <div class="row {$if($choseOfficial, '', 'collapse')}">
                            <div class="form-switch">
                                <input class="form-check-input {$lang}" id="show-official-check" type="checkbox" name="show-official-check" checked>
                                <label class="form-check-label filter-check text-truncate" for="show-official-check">{$showOfficialText[$lang]}</label>
                            </div>
                        </div>
        HTML;
        // AFFICHER LES CONTENUS FANMADE
        $searchEngineHtml .= <<<HTML
                        <div class="row {$if($choseOfficial, '', 'collapse')}">              
                            <div class="form-switch">
                                <input class="form-check-input {$lang}" id="show-fanmade-check" type="checkbox" name="show-fanmade-check" checked>
                                <label class="form-check-label filter-check text-truncate" for="show-fanmade-check">{$showFanmadeText[$lang]}</label>
                            </div>
                        </div>
        HTML;
        // AFFICHER LES CAMPAGNES
        $searchEngineHtml .= <<<HTML
                        <div class="row {$if($chose_campaign, '', 'collapse')}">                         
                            <div class="form-switch">
                                <input class="form-check-input {$lang}" id="show-campaigns-check" type="checkbox" name="show-campaigns-check" checked>
                                <label class="form-check-label filter-check text-truncate" for="show-campaigns-check">{$showCampaignsText[$lang]}</label>
                            </div>
                        </div>
        HTML;
        // AFFICHER LES MISSIONS
        $searchEngineHtml .= <<<HTML
                        <div class="row {$if($chose_campaign, '', 'collapse')}">              
                            <div class="form-switch">
                                <input class="form-check-input {$lang}" id="show-missions-check" type="checkbox" name="show-missions-check" checked>
                                <label class="form-check-label filter-check text-truncate" for="show-missions-check">{$showMissionsText[$lang]}</label>
                            </div>
                        </div>
        HTML;
        // FERMER LE MOTEUR DE RECHERCHE
        $searchEngineHtml .= <<<HTML
                    </div>
                </div>
            </div>
        HTML;

        return $searchEngineHtml;
    }

    // Creation de la div mission (format carte)
    function createMissionCard($mission){
        global $if, $certified, $chosePlayersNb, $choseLength, $choseDifficulty, $choseBoxes, $showPlayersNb, $show_length, $show_difficulty, $shown_id, $title, $description, $exclusive_language, $thumb,      
        $lang, $missionsText, $finalPages, $exclusiveText, $other_lang, $officialText, $mission_players_nb, $mission_length, $mission_lang, $difficulties, $componentsText, $boxes, $gallery_link, $pdflink, $finalPdfLink, $gallery_list_thumb, $baselink, $createdText, $campaignText, $boxesId;
        
        $certified ? $official='official' : $official='';
        $mission['campaign'] ? $campaign=' campaign' : $campaign='';
        $chosePlayersNb ? $playersNb=$mission['players_nb'] : $playersNb='';
        $choseLength ? $length=$mission['length'] : $length='' ;
        $choseDifficulty ? $difficultyId=$mission['difficulty_id'] : $difficultyId='' ;
        $missionShownId=str_replace('/', '-', $shown_id);
        $upperlang=strtoupper($mission_lang);
        $formattedTitle=ucwords($title);
        $dlFormattedTitle=str_replace('/', '-', $formattedTitle);
        $lowerMissionId=strtolower($mission['mission_id']);

        $showPlayersNb ? $playersBadge='<span class="mission-info badge bg-dark">'.$mission_players_nb.'</span>' : $playersBadge='';
        $show_length ? $lengthBadge='<span class="mission-info badge bg-dark ms-1">'.$mission_length.'</span>' : $lengthBadge='';
        $certified ? $certifiedBadge='<span class="mission-info badge bg-danger">'.$officialText[$lang].'</span>' : $certifiedBadge='<span class="mission-info badge badge-success">Fanmade</span>';
        $exclusive_language ? $exclusiveBadge='<span class="mission-info badge bg-info ms-1">'.$exclusiveText[$lang].'</span>' : $exclusiveBadge='';
        $certified ? $author_certification = "official" : $author_certification = "fanmade";

        // Lien vers la galerie cachée
        $revealLink='';

        if($finalPages){
            if($mission['final_pages']){
                if($mission["description_$lang"] != null) {
                    $mission['final_pages'] > 1 ? $finalGalleryLink=$baselink."-$lang-final-1.webp" : $finalGalleryLink=$baselink."-$lang-final.webp";
                }else{
                    $mission['final_pages'] > 1 ? $finalGalleryLink=$baselink."-$other_lang-final-1.webp" : $finalGalleryLink=$baselink."-$other_lang-final.webp";
                }                

                $revealLink=<<<HTML
                    <a href='$finalGalleryLink' data-fancybox-trigger='gallery-$lowerMissionId-final' data-caption='$missionShownId - $formattedTitle (Final)' data-download-src='$finalPdfLink' data-download-filename='$missionShownId - $dlFormattedTitle (Final) ($upperlang)' data-thumb='$finalGalleryLink' class='mission-link'>
                        {$missionsText['reveal'][$lang]}
                    </a>
                HTML;
            }
        }

        // Création de la div
        $missionDiv=<<<HTML
        <div class="mission col-12 col-lg-3 collapse $official$campaign req-boxes {$mission['req_boxes']} opt-boxes {$mission['opt_boxes']} players $playersNb length $length difficulty $difficultyId lang $mission_lang end| show">
        HTML;

        // Miniature & Titre
        $missionDiv.=<<<HTML
            <a href="$gallery_link" data-fancybox="gallery-$lowerMissionId" data-caption="$missionShownId - $formattedTitle$revealLink" data-download-src="$pdflink" data-download-filename="$missionShownId - $dlFormattedTitle ($upperlang)" data-thumb="$gallery_link" class="mission-link">
              <img class="lazy mission-thumbnail rounded" data-src="$thumb.webp" alt="$missionShownId - $formattedTitle - thumbnail">
              <h3 class="mission-title">$missionShownId - $formattedTitle</h3>
            </a>
        HTML;

        // Badges
        // Campagne
        if($mission['campaign']==1){
        $missionDiv.=<<<HTML
            <div class="mission-infos">
                <span class="campaign-badge badge bg-warning">{$campaignText[$lang]}</span>
            </div>
        HTML;
        }
        $missionDiv.=<<<HTML
            <div id="grid-$lowerMissionId" class="mission-infos">
                <div class="mission-badges">
        HTML;

        // Difficulté            
        if($show_difficulty)
        {
        $missionDiv.=<<<HTML
                    <span class="mission-info badge bg-dark me-1">
        HTML;

            if($mission['difficulty_id']=="special")
            {
        $missionDiv.=<<<HTML
                        {$if(($lang=='fr'), 'Spécial', 'Special')}
        HTML;
            }
            else foreach ($difficulties as $difficulty) {
                if ($difficulty['difficulty_id']==$mission['difficulty_id']) {
        $missionDiv.=<<<HTML
                        {$difficulty['difficulty_'.$lang]}
        HTML;
                }
            }
        $missionDiv.=<<<HTML
                    </span>
        HTML;
        }

        $missionDiv.=<<<HTML
                    $playersBadge
                    $lengthBadge
                    </div>
                </div>
                <div class="mission-infos">
                    <div class="mission-badges">
                        $certifiedBadge
                        $exclusiveBadge
                    </div>
                </div>
        HTML;

        // Boîtes
        if($choseBoxes) {
        $missionDiv.=<<<HTML
                <h4 class="required-boxes">$componentsText[$lang]: <b>
        HTML;

            $req_boxes = explode(" ", $mission['req_boxes']);
            $j = 0;

            foreach ($req_boxes as $req_box)
            {
              $key = array_search($req_box, array_column($boxes, 'box_id'));
        $missionDiv.=<<<HTML
                    {$boxes[$key]['box_name_'.$lang]}
        HTML;

                if ($j < count($req_boxes)-1)
                {
                    $missionDiv.=', ';
                }
                $j++;
            }

            if ($mission['opt_boxes'])
            {
              $opt_boxes = explode(" ", $mission['opt_boxes']);
              $j = 0;

              foreach ($opt_boxes as $opt_box)
              {                                       
                $boxKey = array_search($opt_box, $boxesId);
               
                if($j==0)
                {                    
                    ($lang == 'fr') ? $optionalBoxes="</b> (Optionnel : <b>".$boxes[$boxKey]['box_name_fr'] : $optionalBoxes="</b> (Optional: <b>".$boxes[$boxKey]['box_name_en'];
                    $missionDiv.=$optionalBoxes;
                }

                if ($j < count($opt_boxes)-1)
                {
                    $missionDiv.=', ';
                }
                else {
                    $missionDiv.='</b>)';
                }

                $j++;
              }
            }

            $missionDiv.='</b></h4>';
        }

        // Description
        $missionDiv.=<<<HTML
                    <p class="mission-description">$description</p>
        HTML;

        // Badge de créateur
        if($mission['author']){
        $missionDiv.=<<<HTML
                    <span class='mission-info author $author_certification badge bg-dark'>$createdText[$lang]{$mission['author']}</span>
        HTML;
        }
        $missionDiv.=<<<HTML
                </div>
        HTML;
          
        // Additional pages
        if($mission['nb_pages'] > 1)
        {
            for($i=2; $i<=$mission['nb_pages']; $i++)
            {
        $missionDiv.=<<<HTML
                <img data-fancybox="gallery-$lowerMissionId" data-caption="$missionShownId - $formattedTitle" class="d-none lazy" data-src="$baselink-$mission_lang-$i.webp" alt="$missionShownId - $formattedTitle - page $i"  data-download-src="$pdflink" data-download-filename="$missionShownId - $dlFormattedTitle ($upperlang)">
        HTML;
            }
        }

        // Hidden final pages
        if($finalPages){
            if($mission['final_pages']>1){
                for($i=1; $i<=$mission['final_pages']; $i++)
                {
            $missionDiv.=<<<HTML
                    <img data-fancybox="gallery-$lowerMissionId-final" data-caption="$missionShownId - $formattedTitle (Final)" class="d-none lazy" data-src="$baselink-$mission_lang-final-$i.webp" alt="$missionShownId - $formattedTitle (Final) - page $i"  data-download-src="$finalPdfLink" data-download-filename="$missionShownId - $dlFormattedTitle (Final) ($upperlang)">
            HTML;
                }
            }else{
                $missionDiv.=<<<HTML
                    <img data-fancybox="gallery-$lowerMissionId-final" data-caption="$missionShownId - $formattedTitle (Final)" class="d-none lazy" data-src="$baselink-$mission_lang-final.webp" alt="$missionShownId - $formattedTitle (Final)"  data-download-src="$finalPdfLink" data-download-filename="$missionShownId - $dlFormattedTitle (Final) ($upperlang)">
            HTML;
            }
        }

        return $missionDiv;
    }

    // Creation de la div mission (format liste)
    function createMissionList($mission){
        global $if, $finalPages, $certified, $chosePlayersNb, $choseLength, $choseDifficulty, $choseBoxes, $showPlayersNb, $show_length, $show_difficulty, $shown_id, $title, $description, $exclusive_language,       
        $lang, $other_lang, $missionsText, $finalPdfLink, $exclusiveText, $officialText, $mission_players_nb, $mission_length, $mission_lang, $difficulties, $componentsText, $boxes, $gallery_link, $pdflink, $gallery_list_thumb, $baselink, $createdText, $campaignText, $boxesId;
      
        // Composant commun
        $missionId=str_replace('/', '-', $mission['mission_id']);
        $formattedTitle=ucwords($title);
        $dlFormattedTitle=str_replace('/', '-', $formattedTitle);
        $lowerMissionId=strtolower($missionId);

        // Composants du header
        $certified ? $official='official' : $official='';
        $mission['campaign'] ? $campaign=' campaign' : $campaign='';
        $chosePlayersNb ? $playersNb=$mission['players_nb'] : $playersNb='';
        $choseLength ? $length=$mission['length'] : $length='';
        $choseDifficulty ? $difficultyId=$mission['difficulty_id'] : $difficultyId='';

        // Composants des badges
        $mission['campaign'] ? $campaignBadge='bg-campaign">'.$campaignText[$lang].'</span><span class="badge ' : $campaignBadge='';
        $certified ? $certifiedBadge='bg-danger">'.$officialText[$lang].'</span><span class="badge ' : $certifiedBadge=' bg-fanmade">Fanmade</span><span class="badge ';
        $exclusive_language ? $languageBadge='bg-exclusive">'.$exclusiveText[$lang].'</span><span class="badge ' : $languageBadge='';
        $showPlayersNb ? $playersBadge='bg-dark">'.$mission_players_nb.'</span><span class="badge ' : $playersBadge='';
        $show_length ? $lengthBadge='bg-dark">'.$mission_length.'</span><span class="badge ' : $lengthBadge='';
        if($show_difficulty)
        {
            $difficultyBadges='bg-dark">';

            if($mission['difficulty_id']=="special")
            {
                ($lang == 'fr') ? $difficultyBadges.='Spécial' : $difficultyBadges.='Special';
            }
            else foreach ($difficulties as $difficulty) {
                if ($difficulty['difficulty_id']==$mission['difficulty_id']) {
                    $difficultyBadges.=$difficulty['difficulty_'.$lang];
                }
            }
            $difficultyBadges.='</span><span class="badge ';
        }else{
            $difficultyBadges='';
        }

        // Composants du contenu de la mission
        $missionShownId=str_replace('/', '-', $shown_id);
        $missionUpperLang=strtoupper($mission_lang);

        // Lien vers la galerie cachée
        $revealLink='';

        if($finalPages){
            if($mission['final_pages']){
                if($mission["description_$lang"] != null) {
                    $mission['final_pages'] > 1 ? $finalGalleryLink=$baselink."-$lang-final-1.webp" : $finalGalleryLink=$baselink."-$lang-final.webp";
                }else{
                    $mission['final_pages'] > 1 ? $finalGalleryLink=$baselink."-$other_lang-final-1.webp" : $finalGalleryLink=$baselink."-$other_lang-final.webp";
                }                

                $revealLink=<<<HTML
                    <a href='$finalGalleryLink' data-fancybox-trigger='gallery-$lowerMissionId-final' data-caption='$missionShownId - $formattedTitle (Final)' data-download-src='$finalPdfLink' data-download-filename='$missionShownId - $dlFormattedTitle (Final) ($missionUpperLang)' data-thumb='$finalGalleryLink' class='mission-link'>
                        {$missionsText['reveal'][$lang]}
                    </a>
                HTML;
            }
        }

        // Composants de la description
        $certified ? $author_certification="official" : $author_certification="fanmade" ;
        ($mission['author']) ? $missionAuthor="<span class='author $author_certification badge-first badge bg-dark'>".$createdText[$lang].$mission['author']."</span>" : $missionAuthor="";
        
      

        // HTML des badges du header
        $headerBadges=<<<HTML
        <div class="col-12 badges">
            <span class="badge-first badge $campaignBadge$certifiedBadge$languageBadge$difficultyBadges$playersBadge$lengthBadge"></span>
        </div>
        HTML;        

        // Boîtes de la mission
        if($choseBoxes){
            $missionBoxes=<<<HTML
                <h4 class="required-boxes text-start">$componentsText[$lang]: <b>
            HTML;

            $req_boxes = explode(" ", $mission['req_boxes']);
            $j = 0;
    
            foreach ($req_boxes as $req_box)
            {
                $key = array_search($req_box, array_column($boxes, 'box_id'));

                $missionBoxes.=<<<HTML
                {$boxes[$key]['box_name_'.$lang]}
                HTML;

                if ($j < count($req_boxes)-1)
                {
                    $missionBoxes.=<<<HTML
                    , 
                    HTML;
                }
                $j++;
            }

            if ($mission['opt_boxes'])
            {
              $opt_boxes = explode(" ", $mission['opt_boxes']);
              $j = 0;
              
              foreach ($opt_boxes as $opt_box)
              {                        
                $boxKey = array_search($opt_box, $boxesId);

                if($j==0)
                {
                    ($lang=='fr') ? $optionalBoxes='</b> (Optionnel : <b>'.$boxes[$boxKey]["box_name_fr"] : $optionalBoxes='</b> (Optional: <b>'.$boxes[$boxKey]["box_name_en"];

                    $missionBoxes.=<<<HTML
                    $optionalBoxes
                    HTML;
                }

                if ($j < count($opt_boxes)-1)
                {
                    $missionBoxes.=<<<HTML
                    , 
                    HTML;
                }
                else {
                    $missionBoxes.=<<<HTML
                    </b>)
                    HTML;
                }

                $j++;
              }
            }
            $missionBoxes.=<<<HTML
            </b></h4>
            HTML;
        }else{
            $missionBoxes='';
        }

        // Badges de la mission
        $missionBadges=<<<HTML
        <div class="col-12 badges mt-1">
            <span class="badge-first badge $campaignBadge$certifiedBadge$languageBadge$difficultyBadges$playersBadge$lengthBadge"></span>                  
        </div>
        HTML;

        // Description de la mission
        $missionDescription=<<<HTML
            <p class="mission-description text-start">$description</p>                        
        HTML;

        // Contenu de la mission
        $missionContent=<<<HTML
        <div class="row collapse" style="margin-bottom:5px" id="list-$missionId">
            <div class="col-3 col-lg-6">
                <a href="$gallery_link" data-fancybox-trigger="gallery-$lowerMissionId" data-caption="$missionShownId - $formattedTitle$revealLink" data-download-src="$pdflink" data-download-filename="$missionShownId - $dlFormattedTitle ($missionUpperLang)" data-thumb="$gallery_link" class="mission-link">
                    <img class="lazy mission-thumbnail rounded" data-src="$gallery_list_thumb" alt="$missionShownId - $formattedTitle - thumbnail">
                </a>
            </div>
            <div class="col-9 col-lg-6">
                <a href="$gallery_link" data-fancybox-trigger="gallery-$lowerMissionId" data-caption="$missionShownId - $formattedTitle$revealLink" data-download-src="$pdflink" data-download-filename="$missionShownId - $dlFormattedTitle ($missionUpperLang)" data-thumb="$gallery_link" class="mission-link">
                    <h3 class="mission-title text-start">$missionShownId - $formattedTitle</h3>
                </a>
                $missionBoxes
                $missionBadges
                $missionDescription
                $missionAuthor
            </div>
        </div>
        HTML;

        // HTML du header
        $missionDiv=<<<HTML
        <div class="mission mission-list collapse $official$campaign req-boxes {$mission['req_boxes']} opt-boxes {$mission['opt_boxes']} players $playersNb length $length difficulty $difficultyId lang $mission_lang end| show" id="id-$missionId">
            <a data-bs-toggle="collapse" href="#list-$missionId" role="button" aria-expanded="false" aria-controls="list-$missionId">
            <div class="row mission-item">
                <div class="col-12 d-inline-block text-truncate">
                <h3 class="mission-item-title d-inline-block text-truncate">$missionShownId - $formattedTitle</h3>
                </div>
                    $headerBadges
                </div>
            </a>
            $missionContent
        </div>
        HTML;

        return $missionDiv;
    }
?> 