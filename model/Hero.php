<?php


    class Hero extends Character{

        // Définition des attributs de la classe Hero
        private string $_weapon;
        private int $_weaponDamage;
        private string $_shield;
        private int $_shieldValue;

        
        /**
         * GETTER pour les attributs de Hero
         * @return array
         */
        public function getAttributes():array{
            return get_object_vars($this);
        }

        // OU

        public function getWeapon(){
            return $this->_weapon;
        }
        public function getWeaponDamage(){
            return $this->_weaponDamage;
        }
        public function getShield(){
            return $this->_shield;
        }
        public function getShieldValue(){
            return $this->_shieldValue;
        }

        // SETTER pour les attributs

        
        /**
         * @param string $weapon
         * @param int $weaponDamage
         * @param string $shield
         * @param int $shieldValue
         * 
         * @return void
         */
        public function setAttributes(string $weapon,int $weaponDamage, string $shield,int $shieldValue):void{
            $this->_weapon = $weapon;
            $this->_weaponDamage = $weaponDamage;
            $this->_shield = $shield;
            $this->_shieldValue = $shieldValue;
        }

        public function setHealth(int $health):void{
            $this->_health = $health;
        }

        public function setHRage(int $rage):void{
            $this->_rage = $rage;
        }

        // Création de la méthode magique construct 

        public function __construct(int $health,int $rage, string $weapon, int $weaponDamage, string $shield, int $shieldValue )
        {
            parent::__construct($health,$rage);
            $this->_weapon = $weapon;
            $this->_weaponDamage = $weaponDamage;
            $this->_shield = $shield;
            $this->_shieldValue = $shieldValue;
        }

        // Méthode attacked 

        public function attackedHero(int $attackValue){
            $damages = $attackValue - ($this->_shieldValue);
            if ( $damages > 0){
                $this->_health = $this->_health - $damages;
            }
            $this->_rage +=30;
        }


        public function  __toString(){
            return 'Votre personnage a '.$this->_health.' points de vie et '.$this->_rage.' points de rage. Son arme s\'appelle '.$this->_weapon.' et fait '.$this->_weaponDamage.' points 
            de dégats. Son bouclier s\'appelle '.$this->_shield.' et encaisse '.$this->_shieldValue.' dégats.' ;
        }
    }



    
    
