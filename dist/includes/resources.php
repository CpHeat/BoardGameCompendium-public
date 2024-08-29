<div class="main-div container">
    <img class="category d-flex justify-content-center" src="/assets/banners/resources_<?php echo $lang ?>.webp">
    <div class="description">              
        <?php echo $resourcesIntroText[$lang] ?>
        <hr>
        <h4>TILESETS</h4>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-12 kit-links">
                <h4 class="game-title">Zombicide</h4>
                <a href="https://www.zombicide.com/dl/mapeditor/A1_Mod-Zombicide.zip"><?php echo $tilesets[$lang]['zombicide'] ?></a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/A2_Mod_PO.zip" target="_blank"><?php echo $tilesets[$lang]['outbreak'] ?></a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/A3_Mod_RM.zip" target="_blank"><?php echo $tilesets[$lang]['morgue'] ?></a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/A4_Mod_TCM.zip" target="_blank">Toxic City Mall</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/A5_Mod_AN.zip" target="_blank">Angry Neighbors</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/Z1_Characters.zip" target="_blank"><?php echo $tilesets[$lang]['silhouette'] ?></a>
            </div>
            <div class="col-lg-3 col-12 kit-links">
            <h4 class="game-title">Zombicide 2nd Edition</h4>
                <a href="https://www.zombicide.com/dl/mapeditor/G-Zombicide-A5-2E.zip" target="_blank"><?php echo $tilesets[$lang]['zombicide2'] ?></a> </br>
                <a href="https://www.zombicide.com/dl/mapeditor/G-Zombicide-A6-ZC.zip" target="_blank">Washington ZC</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/G-Zombicide-A7-FH.zip" target="_blank">Fort Hendrix</a>
            </div>
            <div class="col-lg-3 col-12 kit-links">
                <h4 class="game-title">Zombicide Fantasy</h4>
                <a href="https://www.zombicide.com/dl/mapeditor/B1_Fant_BP.zip" target="_blank"><?php echo $tilesets[$lang]['plague'] ?></a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/B2_Fant_GH.zip" target="_blank">Green Horde</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/B3_Fant_WB.zip" target="_blank">Wulfsburg</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/B4_Fant_FF.zip" target="_blank">Friends and Foes</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/B5_Fant_NRFTW.zip" target="_blank">No Rest for the Wicked</a>                    
            </div>
            <div class="col-lg-3 col-12 kit-links">
                <h4 class="game-title">Zombicide Sci-Fi</h4>
                <a href="https://www.zombicide.com/dl/mapeditor/C1_Sci_Invader.zip" target="_blank"><?php echo $tilesets[$lang]['invader'] ?></a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/C2_Sci_Dark%20Side.zip" target="_blank">Dark Side</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/C3_Sci_Black%20Ops.zip" target="_blank">Black Ops</a></br>
                <a href="https://www.zombicide.com/dl/mapeditor/C4_Sci_Operation%20Persephone.zip" target="_blank"><?php echo $tilesets[$lang]['persephone'] ?></a>
            </div>            
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-12 kit-links">
                <h4 class="game-title">Zombicide: Night of the Living Dead</h4>
                <a href="https://www.zombicide.com/dl/mapeditor/E1_Mov_Night_Of_The_Living_Dead.zip" target="_blank"><?php echo $tilesets[$lang]['living-dead'] ?></a>
            </div>
        </div>
        <hr>
        <h4><?php echo $rulebookText[$lang] ?></h4>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-12 kit-links">
                <h4 class="game-title">Marvel zombies</h4>
                <a href="../../rulebooks/Marvel_Zombies_<?php echo $lang ?>.pdf" download="Marvel Zombies (<?php echo $lang ?>)"><?php echo $tilesets[$lang]['marvel'] ?></a></br>
                <a href="../../rulebooks/Heroes_Resistance_<?php echo $lang ?>.pdf" download="Heroes' Resistance (<?php echo $lang ?>)"><?php echo $tilesets[$lang]['heroes'] ?></a></br>
                <a href="../../rulebooks/X-Men_Resistance_<?php echo $lang ?>.pdf" download="X-Men Resistance (<?php echo $lang ?>)"><?php echo $tilesets[$lang]['x-men'] ?></a></br>
            </div>
        </div>
        <hr>
        <?php echo $resourcesEndText[$lang] ?>
    </div>
</div>