<?php
    if(strcasecmp(basename($_SERVER['PHP_SELF']), 'rss.php')==0){
        $additionalScript=<<<HTML
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const generalLangEn = document.querySelector('#general-lang-en');
                    const generalItemsEn = document.querySelector('#general-items-en');
                    const generalUpdateEn = document.querySelector('#general-update-en');
                    const generalUpdateTimeEn = document.querySelector('#general-update-time-en');
                    const generalUpdateBackgroundEn = document.querySelector('#general-update-background-en');

                    const generalLangFr = document.querySelector('#general-lang-fr');
                    const generalItemsFr = document.querySelector('#general-items-fr');
                    const generalUpdateFr = document.querySelector('#general-update-fr');
                    const generalUpdateTimeFr = document.querySelector('#general-update-time-fr');
                    const generalUpdateBackgroundFr = document.querySelector('#general-update-background-fr');
                    
                    generalLangEn.addEventListener('mouseover', function() {
                        generalItemsFr.style.opacity = '0';
                        generalItemsEn.style.opacity = '1';
                        generalUpdateFr.style.opacity = '0';
                        generalUpdateEn.style.opacity = '1';
                        generalUpdateBackgroundFr.style.opacity = '0';
                        generalUpdateBackgroundEn.style.opacity = '1';
                        generalUpdateTimeFr.style.color = 'rgba(255, 255, 255, 0)';
                        generalUpdateTimeEn.style.color = 'rgba(255, 255, 255, 1)';
                    });

                    generalLangFr.addEventListener('mouseover', function() {
                        generalItemsEn.style.opacity = '0';
                        generalItemsFr.style.opacity = '1';
                        generalUpdateEn.style.opacity = '0';
                        generalUpdateFr.style.opacity = '1';
                        generalUpdateBackgroundEn.style.opacity = '0';
                        generalUpdateBackgroundFr.style.opacity = '1';
                        generalUpdateTimeEn.style.color = 'rgba(255, 255, 255, 0)';
                        generalUpdateTimeFr.style.color = 'rgba(255, 255, 255, 1)';
                    });
        HTML;
        
        foreach($gamesInfos as $gameInfos){
            $gameIdentifier=str_replace('-','',$gameInfos['id']);

            $additionalScript.=<<<HTML
                const {$gameIdentifier}LangEn = document.querySelector('#{$gameInfos['id']}-lang-en');
                const {$gameIdentifier}ItemsEn = document.querySelector('#{$gameInfos['id']}-items-en');
                const {$gameIdentifier}UpdateEn = document.querySelector('#{$gameInfos['id']}-update-en');
                const {$gameIdentifier}UpdateTimeEn = document.querySelector('#{$gameInfos['id']}-update-time-en');
                const {$gameIdentifier}UpdateBackgroundEn = document.querySelector('#{$gameInfos['id']}-update-background-en');

                const {$gameIdentifier}LangFr = document.querySelector('#{$gameInfos['id']}-lang-fr');
                const {$gameIdentifier}ItemsFr = document.querySelector('#{$gameInfos['id']}-items-fr');                        
                const {$gameIdentifier}UpdateFr = document.querySelector('#{$gameInfos['id']}-update-fr');
                const {$gameIdentifier}UpdateTimeFr = document.querySelector('#{$gameInfos['id']}-update-time-fr');
                const {$gameIdentifier}UpdateBackgroundFr = document.querySelector('#{$gameInfos['id']}-update-background-fr');
                
                {$gameIdentifier}LangEn.addEventListener('mouseover', function() {
                    {$gameIdentifier}ItemsFr.style.opacity = '0';
                    {$gameIdentifier}ItemsEn.style.opacity = '1';
                    {$gameIdentifier}UpdateFr.style.opacity = '0';
                    {$gameIdentifier}UpdateEn.style.opacity = '1';
                    {$gameIdentifier}UpdateBackgroundFr.style.opacity = '0';
                    {$gameIdentifier}UpdateBackgroundEn.style.opacity = '1';
                    {$gameIdentifier}UpdateTimeFr.style.color = 'rgba(255, 255, 255, 0)';
                    {$gameIdentifier}UpdateTimeEn.style.color = 'rgba(255, 255, 255, 1)';
                });

                {$gameIdentifier}LangFr.addEventListener('mouseover', function() {
                    {$gameIdentifier}ItemsEn.style.opacity = '0';
                    {$gameIdentifier}ItemsFr.style.opacity = '1';
                    {$gameIdentifier}UpdateEn.style.opacity = '0';
                    {$gameIdentifier}UpdateFr.style.opacity = '1';
                    {$gameIdentifier}UpdateBackgroundEn.style.opacity = '0';
                    {$gameIdentifier}UpdateBackgroundFr.style.opacity = '1';
                    {$gameIdentifier}UpdateTimeEn.style.color = 'rgba(255, 255, 255, 0)';
                    {$gameIdentifier}UpdateTimeFr.style.color = 'rgba(255, 255, 255, 1)';
                });
            HTML;
        }

        $additionalScript.='})';
    }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){












        $additionalScript='<script>var lang = "'.$lang.'";';
        
          if(!$choseDifficulty){
            $additionalScript.='var choseDifficulty = false;
            let difficulties = new Array();';
          }
          else{
            $additionalScript.='let difficulties = new Array(';
            foreach($difficulties as $i => $difficulty){
              if ($i>0 && $i<(count($difficulties)-1)) {
                if($lang=='fr'){
                    $additionalScript.=json_encode($difficulty['difficulty_fr']).',';
                }
                else{
                    $additionalScript.=json_encode($difficulty['difficulty_en']).',';
                }
              }
              else if($i>0) {
                if($lang=='fr'){
                    $additionalScript.=json_encode($difficulty['difficulty_fr']);
                }
                else{
                    $additionalScript.=json_encode($difficulty['difficulty_en']);
                }
              }              
            }
            $additionalScript.=');
            var choseDifficulty = true;';
          }
        
          if(!$choseBoxes){
            $additionalScript.='var choseBox = false;';
          }
          else{
            $additionalScript.='var choseBox = true;';
          }
          if(!$choseLength){
            $additionalScript.='var choseLength = false;';
          }
          else{
            $additionalScript.='var choseLength = true;';
          }
          if(!$chosePlayersNb){
            $additionalScript.='var chosePlayersNb = false;';
          }
          else{
            $additionalScript.='var chosePlayersNb = true;';
          }






    }else{
        $additionalScript='<script>';
    }
?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-78MSZRB0JX"></script>
    <?php echo $additionalScript ?>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-78MSZRB0JX');
    </script>
</head>