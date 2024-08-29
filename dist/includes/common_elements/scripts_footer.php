        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="../js/bundle.js"></script>

        <?php if(strcasecmp(basename($_SERVER['PHP_SELF']), 'pdf_generator.php')==0){ ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
            <script>
            <?php
                echo 'undaunted_map_title_en="'.$undauntedMapTitleText['en'].'";
                undaunted_map_title_fr="'.$undauntedMapTitleText['fr'].'";
                undaunted_map_title_es="'.$undauntedMapTitleText['es'].'";
                undaunted_tiles_title_en="'.$undauntedTilesTitleText['en'].'";
                undaunted_tiles_title_fr="'.$undauntedTilesTitleText['fr'].'";
                undaunted_tiles_title_es="'.$undauntedTilesTitleText['es'].'";
                undaunted_created_en="'.$undauntedCreatedText['en'].'";
                undaunted_created_fr="'.$undauntedCreatedText['fr'].'";
                undaunted_created_es="'.$undauntedCreatedText['es'].'";
                undaunted_layout_en="'.$undauntedLayoutText['en'].'";
                undaunted_layout_fr="'.$undauntedLayoutText['fr'].'";
                undaunted_layout_es="'.$undauntedLayoutText['es'].'";
                undaunted_translation_en="'.$undauntedTranslationText['en'].'";
                undaunted_translation_fr="'.$undauntedTranslationText['fr'].'";
                undaunted_translation_es="'.$undauntedTranslationText['es'].'";
                undaunted_layout_translation_en="'.$undauntedLayoutTranslationText['en'].'";
                undaunted_layout_translation_fr="'.$undauntedLayoutTranslationText['fr'].'";
                undaunted_layout_translation_es="'.$undauntedLayoutTranslationText['es'].'";
                undaunted_setting_unknown_en="'.$undauntedSettingUnkownText['en'].'";
                undaunted_setting_unknown_fr="'.$undauntedSettingUnkownText['fr'].'";
                undaunted_setting_unknown_es="'.$undauntedSettingUnkownText['es'].'";
                undaunted_location_unknown_en="'.$undauntedlocationUnknownText['en'].'";
                undaunted_location_unknown_fr="'.$undauntedlocationUnknownText['fr'].'";
                undaunted_location_unknown_es="'.$undauntedlocationUnknownText['es'].'";
                generate_pdf="'.$generatePdfText[$lang].'";
                generating_pdf="'.$generatingPdfText[$lang].'";';
            ?>

            function getCards(){
                <?php foreach($pdfGeneratorFormInfos[$lang]["undaunted"]["us_cards"] as $card_id=>$card){?>
                var elements = $('input[name^="<?php echo $card_id ?>"]:checked');

                var <?php echo $card_id ?> = elements.map(function() {
                return $(this).val();
                }).get();

                <?php }  foreach($pdfGeneratorFormInfos[$lang]["undaunted"]["ge_cards"] as $card_id=>$card){?>
                var elements = $('input[name^="<?php echo $card_id ?>"]:checked');

                var <?php echo $card_id ?> = elements.map(function() {
                return $(this).val();
                }).get();
                <?php } ?>

                var cards = [
                <?php foreach($pdfGeneratorFormInfos[$lang]["undaunted"]["us_cards"] as $card_id=>$card){
                    echo '["'.$card_id.'", '.$card_id.'],';
                } 
                foreach($pdfGeneratorFormInfos[$lang]["undaunted"]["ge_cards"] as $card_id=>$card){
                    echo '["'.$card_id.'", '.$card_id.'],';
                } ?>
                ];

                return cards;
            };
            </script>
            <script src="/js/pdf_generator.js?v<?php echo $version; ?>"></script>
        <?php }elseif(strcasecmp(basename($_SERVER['PHP_SELF']), 'missions.php')==0){ ?>
            <script src="/js/functions.js?v<?php echo $version; ?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
            <script src="/js/main.js?v<?php echo $version; ?>" type="module" defer></script>
             <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.5.0/dist/lazyload.min.js"></script>
        <?php } ?>
    </body>
</html>