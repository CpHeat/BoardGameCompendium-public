<div class="container d-flex justify-content-center">
      <div class="col-8" id="form">
        <h1 class="mt-3"><?php echo $pdfGeneratorTitleText[$lang] ?></h1>
        <div class="btn-group mb-2 justify-content-start" role="group" aria-label="Basic radio toggle button group">
        <span class="input-group-text"><?php echo $inputLangText[$lang] ?></span>

          <input type="radio" class="btn-check" name="undaunted-lang" id="undaunted-lang-en" value="en" autocomplete="off" <?php echo ($lang=="en") ? "checked" : "" ?>>
          <label class="btn en btn-outline-light shadow-none" for="undaunted-lang-en"><?php echo $inputEnglishText[$lang] ?></label>

          <input type="radio" class="btn-check" name="undaunted-lang" id="undaunted-lang-fr" value="fr" autocomplete="off" <?php echo ($lang=="fr") ? "checked" : "" ?> >
          <label class="btn fr btn-outline-light shadow-none" for="undaunted-lang-fr"><?php echo $inputFrenchText[$lang] ?></label>

          <input type="radio" class="btn-check" name="undaunted-lang" id="undaunted-lang-es" value="es" autocomplete="off" <?php echo ($lang=="es") ? "checked" : "" ?> >
          <label class="btn es btn-outline-light shadow-none" for="undaunted-lang-es"><?php echo $inputSpanishText[$lang] ?></label>
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputTitleText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="title" id="undaunted-input-title">
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputAuthorText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="author" id="undaunted-input-author">
        </div>

        <div class="input-group mb-2">

          <input type="checkbox" class="btn-check" id="undaunted-input-translation" autocomplete="off">
          <label class="btn btn-validate shadow-none" id="btn-translation" for="undaunted-input-translation" onclick="checkTranslation()"><?php echo $inputTranslationText[$lang] ?></label>

          <span class="input-group-text disabled" id="translator" disabled><?php echo $inputTranslatorText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="translator" id="undaunted-input-translator" disabled>
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputSettingText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="setting" id="undaunted-input-setting">
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputLocationDateText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="location-date" id="undaunted-input-location-date">
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputStoryText[$lang] ?></span>
          <textarea class="form-control" aria-label="story" id="undaunted-input-story" style="resize:none"></textarea>
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputUsObjectiveText[$lang] ?></span>
          <div contenteditable="true" class="form-control textarea" aria-label="rules" id="undaunted-input-us-objective"></div>          
          <input type="checkbox" class="btn-check" id="undaunted-us-objective-bold" autocomplete="off">
          <label class="btn btn-form shadow-none" id="btn-bold" for="undaunted-us-objective-bold"  onclick="toggleBold('undaunted-input-us-objective');"><b><?php echo $boldText[$lang] ?></b></label>
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputGeObjectiveText[$lang] ?></span>
          <div contenteditable="true" class="form-control textarea" aria-label="rules" id="undaunted-input-ge-objective"></div>
          <input type="checkbox" class="btn-check" id="undaunted-ge-objective-bold" autocomplete="off">
          <label class="btn btn-form shadow-none form-last" id="btn-bold" for="undaunted-ge-objective-bold"  onclick="toggleBold('undaunted-input-ge-objective');"><b><?php echo $boldText[$lang] ?></b></label>          
        </div>

        <div class="input-group mb-2">
        <span class="input-group-text"><?php echo $inputRulesNameText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="rules-name" id="undaunted-input-rules-name">
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputRulesText[$lang] ?></span>
          <div contenteditable="true" class="form-control textarea" aria-label="rules" id="undaunted-input-rules"></div>
          <input type="checkbox" class="btn-check" id="undaunted-rules-bold" autocomplete="off">
          <label class="btn btn-form shadow-none" id="btn-bold" for="undaunted-rules-bold"  onclick="toggleBold('undaunted-input-rules');"><b><?php echo $boldText[$lang] ?></b></label>
        </div>

        <div class="input-group mb-2">
        <span class="input-group-text"><?php echo $inputAdditionalRulesNameText[$lang] ?></span>
          <input type="text" class="form-control" aria-label="additional-rules-name" id="undaunted-input-additional-rules-name">
        </div>

        <div class="input-group mb-2">
          <span class="input-group-text"><?php echo $inputAdditionalRulesText[$lang] ?></span>
          <div contenteditable="true" class="form-control textarea" aria-label="additional-rules" id="undaunted-input-additional-rules"></div>
          <input type="checkbox" class="btn-check" id="undaunted-additional-rules-bold" autocomplete="off">
          <label class="btn btn-form shadow-none" id="btn-bold" for="undaunted-additional-rules-bold"  onclick="toggleBold('undaunted-input-additional-rules');"><b><?php echo $boldText[$lang] ?></b></label>
        </div>
        

        <div class="btn-group mt-2 mb-2 justify-content-start" role="group" aria-label="Basic radio toggle button group">
        <span class="input-group-text"><?php echo $initiativeText[$lang] ?></span>

          <input type="radio" class="btn-check" name="undaunted-initiative" id="undaunted-initiative-us" value="us" autocomplete="off" checked>
          <label class="btn btn-outline-light btn-us shadow-none" for="undaunted-initiative-us"><?php echo $usInitiativeText[$lang] ?></label>

          <input type="radio" class="btn-check" name="undaunted-initiative" id="undaunted-initiative-ge" value="ge" autocomplete="off">
          <label class="btn btn-outline-light btn-ge shadow-none" for="undaunted-initiative-ge"><?php echo $geInitiativeText[$lang] ?></label>
        </div>






      
















        

        <div class="row">
          <div class="col-6" id="us-army">
            <h1><?php echo $usArmyText[$lang] ?></h1>
            <?php
              foreach($pdfGeneratorFormInfos[$lang]["undaunted"]["us_cards"] as $card_id=>$card){
                if($card['number']==1){ ?>
                  <div class="row">
                    <div class="col-12">
                      <h3><?php echo $card['name'] ?></h3>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-12">
                      <div class="row d-flex justify-content-center mb-2 g-0">
                        <div class="col-1 icons deck-selector-h first">
                          <label>
                            <input type="radio" class="army-selection" id="<?php echo $card_id ?>-deck" name="<?php echo $card_id ?>" value="deck" checked>
                            <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['alt'] ?>">
                          </label>
                        </div>
                        <div class="col-1 icons deck-selector-h middle">
                          <label>
                            <input type="radio" class="army-selection" id="<?php echo $card_id ?>-supply" name="<?php echo $card_id ?>" value="supply">
                            <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['alt'] ?>">
                          </label>
                        </div>
                        <div class="col-1 icons deck-selector-h last">
                          <label>
                            <input type="radio" class="army-selection" id="<?php echo $card_id ?>-box" name="<?php echo $card_id ?>" value="box">
                            <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['alt'] ?>">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }
                else{ ?>
                  <div class="row">
                    <div class="col-12">
                      <h3><?php echo $card['name'] ?></h3>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-12">
                      <?php
                        for($i=1;$i<=$card['number'];$i++){

                          if($i==1){ ?>                          
                            <div class="row d-flex justify-content-center icons g-0">
                          <?php } ?>

                          <div class="col-1 icons deck-selector-h">
                            <div class="row d-flex justify-content-center g-0 deck-selector-v">
                              <div class="col-auto">
                                <label>
                                  <input type="radio" class="army-selection" id="<?php echo $card_id.'-'.$i ?>-deck" name="<?php echo $card_id.'-'.$i ?>" value="deck" checked>
                                  <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['alt'] ?>">
                                </label>
                              </div>
                            </div>
                            <div class="row icons d-flex justify-content-center g-0 deck-selector-v">
                              <div class="col-auto">
                                <label>
                                  <input type="radio" class="army-selection" id="<?php echo $card_id.'-'.$i ?>-supply" name="<?php echo $card_id.'-'.$i ?>" value="supply">
                                  <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['alt'] ?>">
                                </label>
                              </div>
                            </div>
                            <div class="row icons d-flex justify-content-center g-0 deck-selector-v">
                              <div class="col-auto">
                                <label>
                                  <input type="radio" class="army-selection" id="<?php echo $card_id.'-'.$i ?>-box" name="<?php echo $card_id.'-'.$i ?>" value="box">
                                  <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['alt'] ?>">
                                </label>
                              </div>
                            </div>                        
                          </div>

                          <?php if($i==$card['number']){ 
                            echo '</div>';
                          }
                        }
                    ?>
                    </div>
                  </div>
                <?php }
              }
            ?>
          </div>

          <div class="col-6" id="ge-army">
            <h1><?php echo $geArmyText[$lang] ?></h1>
            <?php
              foreach($pdfGeneratorFormInfos[$lang]["undaunted"]["ge_cards"] as $card_id=>$card){
                if($card['number']==1){ ?>
                  <div class="row">
                    <div class="col-12">
                      <h3><?php echo $card['name'] ?></h3>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-12">
                      <div class="row d-flex justify-content-center icons mb-2 g-0">
                        <div class="col-1 icons deck-selector-h first">
                          <label>
                            <input type="radio" class="army-selection" id="<?php echo $card_id ?>-deck" name="<?php echo $card_id ?>" value="deck" checked>
                            <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['alt'] ?>">
                          </label>
                        </div>
                        <div class="col-1 icons deck-selector-h middle">
                          <label>
                            <input type="radio" class="army-selection" id="<?php echo $card_id ?>-supply" name="<?php echo $card_id ?>" value="supply">
                            <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['alt'] ?>">
                          </label>
                        </div>
                        <div class="col-1 icons deck-selector-h last">
                          <label>
                            <input type="radio" class="army-selection" id="<?php echo $card_id ?>-box" name="<?php echo $card_id ?>" value="box">
                            <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['alt'] ?>">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }
                else{ ?>
                  <div class="row">
                    <div class="col-12">
                      <h3><?php echo $card['name'] ?></h3>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-12">
                      <?php
                        for($i=1;$i<=$card['number'];$i++){

                          if($i==1){ ?>                          
                            <div class="row d-flex justify-content-center icons g-0">
                          <?php } ?>

                          <div class="col-1 icons deck-selector-h">
                            <div class="row icons  d-flex justify-content-center g-0 deck-selector-v">
                              <div class="col-auto">
                                <label>
                                  <input type="radio" class="army-selection" id="<?php echo $card_id.'-'.$i ?>-deck" name="<?php echo $card_id.'-'.$i ?>" value="deck" checked>
                                  <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['deck']['alt'] ?>">
                                </label>
                              </div>
                            </div>
                            <div class="row icons d-flex justify-content-center g-0 deck-selector-v">
                              <div class="col-auto">
                                <label>
                                  <input type="radio" class="army-selection" id="<?php echo $card_id.'-'.$i ?>-supply" name="<?php echo $card_id.'-'.$i ?>" value="supply">
                                  <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['supply']['alt'] ?>">
                                </label>
                              </div>
                            </div>
                            <div class="row icons d-flex justify-content-center g-0 deck-selector-v">
                              <div class="col-auto">
                                <label>
                                  <input type="radio" class="army-selection" id="<?php echo $card_id.'-'.$i ?>-box" name="<?php echo $card_id.'-'.$i ?>" value="box">
                                  <img src="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['icon'] ?>" class="icon" alt="<?php echo $pdfGeneratorFormInfos[$lang]["undaunted"]['box']['alt'] ?>">
                                </label>
                              </div>
                            </div>                        
                          </div>

                          <?php if($i==$card['number']){ 
                            echo '</div>';
                          }
                        }
                    ?>
                    </div>
                </div>
              <?php }
            }
          ?>
        </div>
      </div>



  <!-- Tiles input for large screens-->          
  <div class="row d-flex justify-content-center mt-2">
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-1" onclick="switchTile(1)">1A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-2" onclick="switchTile(2)">2A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-3" onclick="switchTile(3)">3A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-4" onclick="switchTile(4)">4A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-5" onclick="switchTile(5)">5A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-6" onclick="switchTile(6)">6A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-7" onclick="switchTile(7)">7A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-8" onclick="switchTile(8)">8A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-9" onclick="switchTile(9)">9A</label>
    </div>
  </div>
  <div class="row d-flex justify-content-center">
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-10" onclick="switchTile(10)">10A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-11" onclick="switchTile(11)">11A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-12" onclick="switchTile(12)">12A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-13" onclick="switchTile(13)">13A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-14" onclick="switchTile(14)">14A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-15" onclick="switchTile(15)">15A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-16" onclick="switchTile(16)">16A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-17" onclick="switchTile(17)">17A</label>
    </div>
    <div class="col-1 mb-2 d-none d-lg-block tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-tile-18" onclick="switchTile(18)">18A</label>
    </div>
  </div>


  <!-- Tiles input for smaller screens-->
  <div class="row d-flex justify-content-center mt-2 mb-2">
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-1" onclick="switchTile(1)">1A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-2" onclick="switchTile(2)">2A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-3" onclick="switchTile(3)">3A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-4" onclick="switchTile(4)">4A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-5" onclick="switchTile(5)">5A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-6" onclick="switchTile(6)">6A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-7" onclick="switchTile(7)">7A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-8" onclick="switchTile(8)">8A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-9" onclick="switchTile(9)">9A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-10" onclick="switchTile(10)">10A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-11" onclick="switchTile(11)">11A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-12" onclick="switchTile(12)">12A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-13" onclick="switchTile(13)">13A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-14" onclick="switchTile(14)">14A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-15" onclick="switchTile(15)">15A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-16" onclick="switchTile(16)">16A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-17" onclick="switchTile(17)">17A</label>
    </div>
    <div class="col-2 mb-2 d-lg-none tile">
      <label class="btn undaunted-input-tile shadow-none recto" id="undaunted-input-sm-tile-18" onclick="switchTile(18)">18A</label>
    </div>
  </div>





  <div class="mt-4 mb-2" style="color: var(--orange-title-color);"><h1><?php echo $inputMapText[$lang] ?></h1></div>
  <div class="container d-flex justify-content-start align-items-center mb-2" id="undaunted-drop-zone">
    <img src="../assets/icons/plus.png" id="undaunted-add-map">
    <div class="ms-2" id="undaunted-filename"><?php echo $inputInsertMapText[$lang] ?></div>
    <input type="file" id="undaunted-map-input" accept=".png, .jpg">
  </div>
  <div><h4><?php echo $inputMapAdviceText[$lang] ?></h4></div>
</div>
          </div>
<div class="col-12 d-flex justify-content-center">
  <div class="row">
    <div class="col-auto">
      <button class="btn btn-submit shadow-none mt-3 mb-3" id="undaunted-input-preview" type="button" onclick="previewPDF('undaunted')">
        <?php echo $previewPdfText[$lang] ?>
      </button>
    </div>
    <div class="col-auto">
      <button class="btn btn-submit shadow-none mt-3 mb-3" id="undaunted-input-create" type="button" onclick="createPDF('undaunted')">
        <?php echo $generatePdfText[$lang] ?>    
      </button>
    </div>
  </div>
</div>



          <div class="container-fluid d-flex justify-content-center">
            <div class="col-6">
              <div class="row d-flex justify-content-center">
                <div class="col-5 g-0 mt-2 mb-2 ms-2 me-2 <?php echo $lang ?>" id="undaunted-preview-page-1"></div>
                <div class="col-5 g-0 mt-2 mb-2 ms-2 me-2 setting-rules-all-cards-us-<?php echo $lang ?>" id="undaunted-preview-page-2"></div>
                <div class="col-5 g-0 mt-2 mb-2 ms-2 me-2" id="undaunted-preview-page-3"></div>
                <div class="col-5 g-0 mt-2 mb-2 ms-2 me-2" id="undaunted-preview-page-4"></div>
              </div>
            </div>
          </div>
  
      <div id="pdf">
        <div id="undaunted-page-1" class="<?php echo $lang ?>">
            <div id="undaunted-author"></div>
            <div id="undaunted-credits"></div>
            <div id="undaunted-bgc-credits"></div>
        </div>

        <div id="undaunted-page-2" class="setting-rules-all-cards-us-<?php echo $lang ?>">
          <div id="undaunted-title"></div>
          <div id="undaunted-setting"></div>
          <div id="undaunted-location-date"></div>
          <div id="undaunted-story"></div>
          <div id="undaunted-story-no-setting"></div>                
          <div id="undaunted-us-objective"></div>
          <div id="undaunted-ge-objective"></div>
          <div id="undaunted_sergeant_us"></div>
          <div id="undaunted_guide_us"></div>
          <div id="undaunted_leader_a_us"></div>
          <div id="undaunted_leader_b_us"></div>
          <div id="undaunted_leader_c_us"></div>
          <div id="undaunted_rifleman_a_us"></div>
          <div id="undaunted_rifleman_b_us"></div>
          <div id="undaunted_rifleman_c_us"></div>
          <div id="undaunted_scout_a_us"></div>
          <div id="undaunted_scout_b_us"></div>
          <div id="undaunted_scout_c_us"></div>
          <div id="undaunted_gunner_a_us"></div>
          <div id="undaunted_gunner_b_us"></div>
          <div id="undaunted_gunner_c_us"></div>
          <div id="undaunted_mortar_us"></div>
          <div id="undaunted_sniper_us"></div>
          <div id="undaunted_fog_us"></div>
          <div id="undaunted_sergeant_ge"></div>
          <div id="undaunted_guide_ge"></div>
          <div id="undaunted_leader_a_ge"></div>
          <div id="undaunted_leader_b_ge"></div>
          <div id="undaunted_leader_c_ge"></div>
          <div id="undaunted_rifleman_a_ge"></div>
          <div id="undaunted_rifleman_b_ge"></div>
          <div id="undaunted_rifleman_c_ge"></div>
          <div id="undaunted_scout_a_ge"></div>
          <div id="undaunted_scout_b_ge"></div>
          <div id="undaunted_scout_c_ge"></div>
          <div id="undaunted_gunner_a_ge"></div>
          <div id="undaunted_gunner_b_ge"></div>
          <div id="undaunted_gunner_c_ge"></div>
          <div id="undaunted_mortar_ge"></div>
          <div id="undaunted_sniper_ge"></div>
          <div id="undaunted_fog_ge"></div>
          <div id="undaunted-rules-no-title"></div>
          <div id="undaunted-rules-title"></div>
          <div id="undaunted-rules"></div>
        </div>

        <div id="undaunted-page-3">
          <div id="undaunted-map-title"></div>
          <div id="undaunted-map"></div>
          <div id="undaunted-tiles-title"></div>
          <div id="undaunted-tile-1"></div>
          <div id="undaunted-tile-2"></div>
          <div id="undaunted-tile-3"></div>
          <div id="undaunted-tile-4"></div>
          <div id="undaunted-tile-5"></div>
          <div id="undaunted-tile-6"></div>
          <div id="undaunted-tile-7"></div>
          <div id="undaunted-tile-8"></div>
          <div id="undaunted-tile-9"></div>
          <div id="undaunted-tile-10"></div>
          <div id="undaunted-tile-11"></div>
          <div id="undaunted-tile-12"></div>
          <div id="undaunted-tile-13"></div>
          <div id="undaunted-tile-14"></div>
          <div id="undaunted-tile-15"></div>
          <div id="undaunted-tile-16"></div>
          <div id="undaunted-tile-17"></div>
          <div id="undaunted-tile-18"></div>
        </div>

        <div id="undaunted-page-4">
          <div id="undaunted-additional-rules-title"></div>
          <div id="undaunted-additional-rules"></div>
          <div id="undaunted-additional-rules-no-title"></div>
        </div>

        <div id="undaunted-page-5">
        </div>
      </div>