<?php    
    $xml=array(
                    'en'=>simplexml_load_file('../feed/general-en.rss'),
                    'fr'=>simplexml_load_file('../feed/general-fr.rss')
                );

                if(strtotime($xml['en']->channel->pubDate)!=0){
                    if($lang=='en'){
                        $lastUpdate['en'] = date('m/d/Y', strtotime($xml['en']->channel->pubDate));
                    }else{
                        $lastUpdate['en'] = date('d/m/Y', strtotime($xml['en']->channel->pubDate));
                    }
                }else{
                    $lastUpdate['en']=$neverUpdatedText[$lang];
                }

                if(strtotime($xml['fr']->channel->pubDate)!=0){
                    if($lang=='en'){
                        $lastUpdate['fr'] = date('m/d/Y', strtotime($xml['fr']->channel->pubDate));
                    }else{
                        $lastUpdate['fr'] = date('d/m/Y', strtotime($xml['fr']->channel->pubDate));
                    }
                }else{
                    $lastUpdate['fr']=$neverUpdatedText[$lang];
                }

                $nbItems['en'] = count($xml['en']->channel->item);
                $nbItems['fr'] = count($xml['fr']->channel->item);

                echo <<<HTML
                <div class="main-div container">

                    <img class="big-category d-flex justify-content-center" src="../assets/banners/rss-$lang.webp">
                    <div class="description-xl">
                        $rssDescriptionText[$lang]
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 image-container">
                            <div class="image-container mt-4 mb-2">
                                <img src="../assets/rss/general.webp" class="img-fluid image rounded-3">
                                <div class="overlay rounded-3">
                                    <div class="d-flex flex-column justify-content-between align-items-center rss-infos">
                                        <div class="update-container">
                                            <div id="general-update-background-en" class="text-center rounded-top update-background-en">$rssUpdatedText[$lang]{$lastUpdate['en']}</div>
                                            <div id="general-update-background-fr" class="text-center rounded-top update-background-fr">$rssUpdatedText[$lang]{$lastUpdate['fr']}</div>
                                            <div id="general-update-en" class="text-center update-en">$rssUpdatedText[$lang]<span id="general-update-time-en" class="update-time-en">{$lastUpdate['en']}</span></div>
                                            <div id="general-update-fr" class="text-center update-fr">$rssUpdatedText[$lang]<span id="general-update-time-fr" class="update-time-fr">{$lastUpdate['fr']}</span></div>
                                        </div>                                        
                                        <div class="items-container">
                                            <div id="general-items-en" class="items-en">{$nbItems['en']}{$itemsText[$lang]}</div>
                                            <div id="general-items-fr" class="items-fr">{$nbItems['fr']}{$itemsText[$lang]}</div>
                                        </div>                                        
                                        <div class="d-flex rounded-bottom lang-choice">
                                            <div class="row">
                                                <a href="https://boardgamecompendium.com/feed/general-en.rss" target="_blank" id="general-lang-en" class="col-6 text-center d-flex align-items-center justify-content-center lang-left">
                                                    <img class="flag-en" src="../assets/icons/uk-flag.png">
                                                </a>
                                                <a href="https://boardgamecompendium.com/feed/general-fr.rss" target="_blank" id="general-lang-fr" class="col-6 text-center d-flex align-items-center justify-content-center lang-right">
                                                    <img class="flag-fr" src="../assets/icons/fr-flag.png">
                                                </a>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                HTML;

                    foreach($gamesInfos as $gameInfos){
                        if($gameInfos['banner_lang_difference']){
                            $gameBanner=$gameInfos['id'].'-'.$lang.'.webp';
                        }else{
                            $gameBanner=$gameInfos['id'].'.webp';
                        }

                        $xml=array(
                            'en'=>simplexml_load_file('../feed/'.$gameInfos['id'].'-en.rss'),
                            'fr'=>simplexml_load_file('../feed/'.$gameInfos['id'].'-fr.rss')
                        );

                        if(strtotime($xml['en']->channel->pubDate)!=0){
                            if($lang=='en'){
                                $lastUpdate['en'] = date('m/d/Y', strtotime($xml['en']->channel->pubDate));
                            }else{
                                $lastUpdate['en'] = date('d/m/Y', strtotime($xml['en']->channel->pubDate));
                            }
                        }else{
                            $lastUpdate['en']=$neverUpdatedText[$lang];
                        }

                        if(strtotime($xml['fr']->channel->pubDate)!=0){
                            if($lang=='en'){
                                $lastUpdate['fr'] = date('m/d/Y', strtotime($xml['fr']->channel->pubDate));
                            }else{
                                $lastUpdate['fr'] = date('d/m/Y', strtotime($xml['fr']->channel->pubDate));
                            }
                        }else{
                            $lastUpdate['fr']=$neverUpdatedText[$lang];
                        }

                        $nbItems['en'] = count($xml['en']->channel->item);
                        $nbItems['fr'] = count($xml['fr']->channel->item);

                        echo <<<HTML
                        <div class="col-lg-3 col-4 image-container">
                            <div class="image-container mt-2 mb-2">
                                <img src="../assets/rss/$gameBanner" class="img-fluid image rounded-3">
                                <div class="overlay rounded-3">
                                    <div class="d-flex flex-column justify-content-between align-items-center rss-infos">
                                        <div class="update-container">
                                            <div id="{$gameInfos['id']}-update-background-en" class="text-center rounded-top update-background-en">$rssUpdatedText[$lang]{$lastUpdate['en']}</div>
                                            <div id="{$gameInfos['id']}-update-background-fr" class="text-center rounded-top update-background-fr">$rssUpdatedText[$lang]{$lastUpdate['fr']}</div>
                                            <div id="{$gameInfos['id']}-update-en" class="text-center update-en">$rssUpdatedText[$lang]<span id="{$gameInfos['id']}-update-time-en" class="update-time-en">{$lastUpdate['en']}</span></div>
                                            <div id="{$gameInfos['id']}-update-fr" class="text-center update-fr">$rssUpdatedText[$lang]<span id="{$gameInfos['id']}-update-time-fr" class="update-time-fr">{$lastUpdate['fr']}</span></div>                                            
                                        </div>                                        
                                        <div class="items-container">
                                            <div id="{$gameInfos['id']}-items-en" class="items-en">{$nbItems['en']}{$itemsText[$lang]}</div>
                                            <div id="{$gameInfos['id']}-items-fr" class="items-fr">{$nbItems['fr']}{$itemsText[$lang]}</div>
                                        </div>                                        
                                        <div class="d-flex rounded-bottom lang-choice">
                                            <div class="row">
                                                <a href="https://boardgamecompendium.com/feed/{$gameInfos['id']}-en.rss" target="_blank" id="{$gameInfos['id']}-lang-en" class="col-6 text-center d-flex align-items-center justify-content-center lang-left">
                                                    <img class="flag-en" src="../assets/icons/uk-flag.png">
                                                </a>
                                                <a href="https://boardgamecompendium.com/feed/{$gameInfos['id']}-fr.rss" target="_blank" id="{$gameInfos['id']}-lang-fr" class="col-6 text-center d-flex align-items-center justify-content-center lang-right">
                                                    <img class="flag-fr" src="../assets/icons/fr-flag.png">
                                                </a>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        HTML;
                    }

                    echo <<<HTML
                    </div>
                </div>
                HTML;
?>