<?php


    class Orc extends Character{

        // Définition des attributs de la classe Hero
        private int $damage;


        /**
         *  GETTER pour les attributs de Orc
         * @return int
         */

        public function getDamage():int{
            return $this->_damage;
        }

        
        /**
         * SETTER pour l'attribut privé _health
         * @param int $damage
         * 
         * @return void
         */

        public function setDamage(int $damage):void{
            $this->_damage = $damage;
        }

        // Création de la méthode magique construct 

        public function __construct(int $health,int $rage)
        {
            parent::__construct($health,$rage);
        }


        // Attacked Orc
        public function attackedOrc(int $attackValue){
                $this->_health = $this->_health - $attackValue;
        }

        // Création méthode attack
        
        public function attack():int{
            return  $this->_damage = rand(600,800);
        }


        public function  __toString(){
            return 'Votre Orc a '.$this->_health.' points de vie et '.$this->_rage.' points de rage.';
        }
    }



