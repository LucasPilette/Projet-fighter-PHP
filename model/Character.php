<?php

    class Character {

        // Définition des attributs de la classe Character
        protected int $_health;
        protected int $_rage;

        /**
         * GETTER pour l'attribut Health 
         * @return int
         */

        public function getHealth():int{
            return $this->_health;
        }

        /**
         * GETTER pour l'attribut Rage 
         * @return int
         */

        public function getRage():int{
            return $this->_rage;
        }


        /**
         * SETTER pour l'attribut privé _health
         * @param int $health
         * 
         * @return void
         */
        public function setHealth(int $health):void{
            $this->_health = $health;
        }


        /**
         * SETTER pour l'attribut privé _rage
         * @param int $rage
         * 
         * @return void
         */

        public function setRage(int $rage):void{
            $this->_rage = $rage;
        }


        /**
         * Création de la méthode magique construct visant à créer un personnage via les attributs _health et _rage
         * @param int $health
         * @param int $rage
         */

        public function __construct(int $health,int $rage){
            $this->_health = $health;
            $this->_rage = $rage;
        }

    }

    

