<?php
    require_once(dirname(__FILE__) .'/../model/Character.php');
    require_once(dirname(__FILE__) .'/../model/Hero.php');
    require_once(dirname(__FILE__) .'/../model/Orc.php');

    $hero = new Hero(2000,0,'Excaliburne',250,'Bouleclier',600);
    $orc = new Orc(500,0);

    include(dirname(__FILE__) .'/../views/templates/headerPlay.php');
    include(dirname(__FILE__) .'/../views/play.php');
    include(dirname(__FILE__) .'/../views/templates/footerPlay.php');

