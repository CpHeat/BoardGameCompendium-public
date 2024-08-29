<?php $currentYear=date('Y'); ?>
    
<footer class="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="footer-col">
                <h4><?php echo $footerLinks[$lang]['about'] ?></h4>
                <ul>
                    <li>
                        <a href="mailto:contact@boardgamecompendium.com"><?php echo $footerLinks[$lang]['contact'] ?></a>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4><?php echo $footerLinks[$lang]['support'] ?></h4>
                <ul>
                    <li><a href="https://tipeee.com/boardgamecompendium" target="_blank">Tipeee</a></li>
                    <li><a href="https://www.patreon.com/boardgamecompendium" target="_blank">Patreon</a></li>
                    <li><a href="<?php echo $footerLinks[$lang]['shop_link'] ?>" target="_blank"><?php echo $footerLinks[$lang]['shop'] ?></a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4><?php echo $footerLinks[$lang]['follow'] ?></h4>
                <div>
                    <a class="social-link" href="<?php echo $discordLink ?>" target="_blank"><img class="align-middle me-2" src="/assets/icons/discord.png" alt="" width="30" height="30"></a>
                    <a class="social-link" href="https://twitter.com/BoardGame_Comp" target="_blank"><img class="align-middle me-2" src="/assets/icons/twitter.png" alt="" width="30" height="30"></a>
                    <a class="social-link" href="https://www.instagram.com/BoardGameCompendium" target="_blank"><img class="align-middle me-2" src="/assets/icons/instagram.png" alt="" width="30" height="30"></a>
                    <a class="social-link" href="https://www.facebook.com/BoardGameCompendium/" target="_blank"><img class="align-middle me-2" src="/assets/icons/facebook.png" alt="" width="30" height="30"></a>
                    <a class="social-link" href="../<?php echo $lang ?>/rss.php"><img class="align-middle" src="/assets/icons/rss.png" alt="" width="30" height="30"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center p-3">
        © 2022-<?php echo $currentYear ?> Copyright<?php echo $lang=='fr'?' ':''; ?>: BoardGameCompendium.com
    </div>
</footer>