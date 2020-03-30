<?php

namespace App\Entity;

class EventSearch{

    private $lieu;
    private $nom;
    private $ascDate; 
    private $descDate;

    

    /**
     * Get the value of ascDate
     */ 
    public function getAscDate()
    {
        return $this->ascDate;
    }

    /**
     * Set the value of ascDate
     *
     * @return  self
     */ 
    public function setAscDate($ascDate)
    {
        $this->ascDate = $ascDate;

        return $this;
    }

    /**
     * Get the value of descDate
     */ 
    public function getDescDate()
    {
        return $this->descDate;
    }

    /**
     * Set the value of descDate
     *
     * @return  self
     */ 
    public function setDescDate($descDate)
    {
        $this->descDate = $descDate;

        return $this;
    }

    /**
     * Get the value of lieu
     */ 
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set the value of lieu
     *
     * @return  self
     */ 
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}