<?php
    class Info_Discussion {
                private $nom ;
                private $prenom ;
                private $email ;
                private $paye ;
                private $ville ;
                private $message ;
                private $date;
                private $path;
                private $file_name;
                private $file_size;


                // Constructor
                public function __construct($nom,$prenom,$email,$ville,$paye,$message,$date,$path,$file_name,$file_size)
                {
                    $this->nom          = $nom;
                    $this->prenom       = $prenom;
                    $this->email        = $email;
                    $this->ville        = $ville;
                    $this->paye         = $paye;
                    $this->message      = $message;
                    $this->date         = $date;
                    $this->path         = $path;
                    $this->file_name    = $file_name;
                    $this->file_size    = $file_size;
                }
    
                // toString
                public function __toString()
                {
                    return "Enregistrement: [nom=". $this->nom 
                    . " | prenom=" .$this->prenom 
                    . " | email=" .$this->email 
                    . " | paye=" . $this->paye 
                    . " | ville=" . $this->ville 
                    . " | message=". $this->message 
                    . " | date=". $this->date 
                    . " | path=" . $this->path 
                    . " | file_name=" . $this->file_name 
                    . " | file_size=" . $this->file_size ." ];" ;    
                }

                // Getters && Setters
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
                public function getemail() {
                    return $this->email;
                }
                public function setemail ($email) {
                    $this->email = $email;
                }
                public function getville() {
                    return $this->ville;
                }
                public function setville ($ville) {
                    $this->ville = $ville;
                }
                public function getPaye() {
                    return $this->paye;
                }
                public function setPaye ($paye) {
                    $this->paye = $paye;
                }
                public function getMessage() {
                    return $this->message;
                }
                public function setMessage ($message) {
                    $this->message = $message;
                }
                public function getDate() {
                    return $this->date;
                }
                public function setDate ($date) {
                    $this->date = $date;
                }
                public function getPath() {
                    return $this->path;
                }
                public function setPath ($path) {
                    $this->path = $path;
                }
                public function getFileName() {
                    return $this->file_name;
                }
                public function setFileName ($file_name) {
                    $this->file_name = $file_name;
                }
                public function getFileSize() {
                    return $this->file_size;
                }
                public function setFileSize ($file_size) {
                    $this->file_size = $file_size;
                }
                
            }
    
?>