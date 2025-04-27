<?php
    class Form_data {
                private $nom ;
                private $prenom ;
                private $password ;
                private $profession;
                private $paye ;
                private $sexe ;
                private $langues ;
                private $loisirs ;
                private $cv_nom ;
                private $cv_taille ;
                private $cv_location ;
                // Constructor
                public function __construct($nom,$prenom,$password,$profession,$paye,$sexe,$langues,$loisirs,$cv_nom,$cv_taille,$cv_location)
                {
                    $this->nom          = $nom;
                    $this->prenom       = $prenom;
                    $this->password     = $password;
                    $this->profession   = $profession;
                    $this->paye         = $paye;
                    $this->sexe         = $sexe;
                    $this->langues      = $langues;
                    $this->loisirs      = $loisirs;
                    $this->cv_nom       = $cv_nom;
                    $this->cv_taille    = $cv_taille;
                    $this->cv_location  = $cv_location;
                }
    
                // toString
                public function __toString()
                {
                    return "Form_data [nom=". $this->nom ." | prenom=" .$this->prenom . " | password=" .$this->password . " | profession="
                    .$this->profession." | paye=" . $this->paye . " | sexe=" . $this->sexe ." | langues=". implode(' ,' , $this->langues )
                    ." | loisirs=" .implode(' ,' , $this->loisirs ) ." | cv_nom=".$this->cv_nom . " | cv_taille=" .$this->cv_taille. " | cv_location=" .$this->cv_location ."]";
    
                }
                public function getNom() {
                    return $this->nom;
                }
                public function setNom ($nom) {
                    $this->nom = $nom;
                }
                public function getPrenom() {
                    return $this->prenom;
                }
                public function setPrenom ($prenom) {
                    $this->prenom = $prenom;
                }
                public function getPassword() {
                    return $this->password;
                }
                public function setPassword ($password) {
                    $this->password = $password;
                }
                public function getProfession() {
                    return $this->profession;
                }
                public function setProfession ($profession) {
                    $this->profession = $profession;
                }
    
                public function getPaye() {
                    return $this->paye;
                }
                public function setPaye ($paye) {
                    $this->paye = $paye;
                }
                public function getSexe() {
                    return $this->sexe;
                }
                public function setSexe ($sexe) {
                    $this->sexe = $sexe;
                }
                public function getLangue() {
                    return $this->langues;
                }
                public function setLangue ($langues) {
                    $this->langues = $langues;
                }
                public function getLoisirs() {
                    return $this->loisirs;
                }
                public function setLoisirs ($loisirs) {
                    $this->loisirs = $loisirs;
                }
                public function getCvNom() {
                    return $this->cv_nom;
                }
                public function setCvNom ($cv_nom) {
                    $this->cv_nom = $cv_nom;
                }
                public function getCvTaille() {
                    return $this->cv_taille;
                }
                public function setCvTaille ($cv_taille) {
                    $this->cv_taille = $cv_taille;
                }
                public function getCvLocation() {
                    return $this->cv_location;
                }
                public function setCvLocation ($cv_location) {
                    $this->cv_location = $cv_location;
                }
    
            }
    
?>