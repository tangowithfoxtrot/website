<?php
namespace Destiny;
use Destiny\Common\Config;
use Destiny\Common\Utils\Tpl;
use Destiny\Common\Utils\Date;
?>
<section class="container">
    <div class="content content-dark">
        <div class="content-split row no-gutters">
            <div id="youtube" class="col-sm-12 col-md-6 stream">
                <h3 class="title clearfix">
                    <span>Videos</span> <a href="/youtube" class="youtube-title">youtube.com</a>
                </h3>
                <?php if(isset($this->playlist['items']) && !empty($this->playlist['items'])): ?>
                    <ul class="thumbnails">
                        <?php foreach($this->playlist['items'] as $vid ): ?>
                            <li>
                                <div class="thumbnail" data-placement="bottom" data-toggle="tooltip" title="<?=html_entity_decode(Tpl::out($vid['snippet']['title']))?>">
                                    <a href="https://www.youtube.com/watch?v=<?=$vid['id']['videoId']?>">
                                        <img src="<?=Config::cdnv()?>/img/320x240.gif" class="img_320x240" alt="<?=html_entity_decode(Tpl::out($vid['snippet']['title']))?>" data-src="<?=$vid['snippet']['thumbnails']['high']['url']?>" />
                                    </a>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php else: ?>
                    <div class="empty">
                        <p>We're still working on that playlist ...</p>
                    </div>
                <?php endif; ?>
            </div>
            <div id="broadcasts" class="col-sm-12 col-md-6 stream">
                <h3 class="title clearfix">
                    <span>Broadcasts</span> <a href="/twitch" class="twitch-title">twitch.tv</a>
                </h3>
                <?php if(isset($this->broadcasts) && !empty($this->broadcasts['videos'])):?>
                    <ul class="thumbnails">
                        <?php foreach( $this->broadcasts['videos'] as $broadcast ):?>
                            <li>
                                <div class="thumbnail" data-placement="bottom" data-toggle="tooltip" title="<?=Date::getElapsedTime(Date::getDateTime($broadcast['recorded_at']))?>">
                                    <a href="<?=$broadcast['url']?>">
                                        <img src="<?=Config::cdnv()?>/img/320x240.gif" class="img_320x240" alt="<?=Date::getElapsedTime(Date::getDateTime($broadcast['recorded_at']))?>" data-src="<?=$broadcast['preview']?>" />
                                    </a>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php else: ?>
                    <div class="empty">
                        <p>We're working on the latest broadcasts ...</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
