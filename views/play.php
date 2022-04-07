<?php

    // 0 -> init , 1 -> en cours , 2 -> gagné, 3-> perdu, 4-> draw
    $state = 0;

    if(empty($_COOKIE)){
        $nickname = $_POST['pseudo'] ?? 'Joueur 1';
        setcookie('nickname',$nickname,time()+60*60*24*30);
    } else {
        $nickname = $_COOKIE['nickname'];
    }
    

    



    if(!empty($_GET)){
        $hero->setHealth(intval($_GET['HP1']));
        $hero->setRage(intval($_GET['R1']));
        $orc->setHealth(intval($_GET['HP2']));
        
        

        $state = 1;
    $attackDmg = $orc->attack();
                $hero->attackedHero($attackDmg);
                $healthPoints = $hero->getHealth();
                $hero->setHealth($healthPoints);
                $absorbtion = $attackDmg - $hero->getShieldValue();
                if($hero->getRage() > 100 ){
                    $orc->attackedOrc($hero->getWeaponDamage());
                    $content = 'Le chevalier noir attaque le'.$nickname.', il inflige <span class ="red" >'.($orc->_damage).'</span> points de dégats à celui-ci.
                    Grâce à son armure, il reçoit <span class ="red" >'.$absorbtion.'</span> points de dégats.
                    Il reste <span class ="green" >'.$healthPoints.'</span> points de vie à '.$nickname.' et sa rage est de <span class ="deepRed" >'.$hero->getRage().'</span>.<br> D\'un excès de rage,
                    '.$nickname.' brandit son arme '.$hero->getWeapon().' et inflige <span class ="red" >'.$hero->getWeaponDamage().'</span> dégats au chevalier noir, il reste  <span class ="green" >'. $orc->getHealth().'</span> points de vie à l\'orc. <br>
                    '.$nickname.' se calme.. <br>';
                    $hero->setRage(0);
                } else {
                    $content =  'Le chevalier noir attaque le '.$nickname.', il inflige <span class ="red" >'.($orc->_damage).'</span> points de dégats à celui-ci.
                    Grâce à son armure, il reçoit <span class ="red" >'.$absorbtion.'</span> points de dégats.
                    Il reste  <span class ="green" >'.$healthPoints.'</span> points de vie à '.$nickname.' et sa rage est de <span class ="deepRed" >'.$hero->getRage().'</span>.<br>';
                }
                
                if($hero->getHealth()<=0 && $orc->getHealth()>0){
                    $content = $content.$nickname.' a perdu';
                    $state=3;
                    $loose = 'looseFall';
                } else if ($hero->getHealth()>0 && $orc->getHealth()<=0){
                    $content = $content.'Le chevalier noir a perdu';
                    $state=2;
                    $win = 'winFall';
                } else if ($hero->getHealth()<=0  && $orc->getHealth()<=0){
                    $content = $content.'Egalité';
                    $state=4;
                    $win='winFall';
                    $loose='looseFall';
                }
            }
            
?>




<div class="main">
    <div class="container">
        <div class="lifebars">
            <div class="healthFirst">
                <div class="health" id="healthFirstDiv">
                    <span> HP : <span id="healthFirst"><?=$hero->getHealth() ?></span></span>
                </div>
                <div class="rage">
                    <span> Rage : <span id="rageFirst"><?=$hero->getRage() ?></span></span>
                </div>
                <div class="name">
                    <div><h3><?=$nickname?></h3></div>
                    <div class="attack">
                        <img src="/public/src/sword-icon.jpg" alt="">
                        <p><?= $hero->getWeaponDamage()?></p>
                    </div>
                    <div class="shield">
                    <img src="/public/src/shields-icon.png" alt="">
                        <p><?= $hero->getShieldValue()?></p>
                    </div>
                </div>
            </div>
            <div class="logoVersus">
                <img src="/public/src/swords.svg" alt="">
            </div>
            <div class="healthSecond">
                <div class="health" id="healthSecondDiv">
                    <span>HP : <span id="healthSecond"><?=$orc->getHealth() ?></span></span> 
                </div>
                <div class="rage">
                    <span> Rage : <span id="rageSecond"><?=$orc->getRage() ?></span></span>
                </div>
                <div class="name">
                    <div><h3>Chevalier noir</h3></div>
                    <div class="attack">
                        <img src="/public/src/sword-icon.jpg" alt="" class="">
                        <p><?= $orc -> attack()?></p>
                    </div>
                    <div class="shield">
                    <img src="/public/src/shields-icon.png" alt="">
                        <p>0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="fighters">
            <div class="first character">
                <img src="/public/src/viking.gif" alt="" class="<?=$loose ?? ''?>">
            </div>
            <div class="second character">
                <img src="/public/src/chevalierBack.gif" alt="" class="<?=$win ?? ''?>">
            </div>
        </div>
    </div>
    <div class="sideText">
        <div class="textContent">
            <p><?php echo $content ?? ''?></p>
        </div>
        <div class="buttonsUser">
            <div><button class="previous">return</button></div>
            <div><button class="fight">
                <?php
                if($state>=2){
                    $linkURL = '/home';
                    $link = 'Rejouer !';
                } else {
                    $linkURL = '/play';
                    $link = 'Fight !';
                }
                ?>
                <a href="<?=$linkURL?>?HP1=<?= $hero->getHealth()??''?>&R1=<?=$hero->getRage()??''?>&HP2=<?=$orc->getHealth()??''?>"><?=$link?></a>
            </button></div>
        </div>
    </div>



</div>


