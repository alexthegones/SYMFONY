<?php 

namespace App\Entity;


class EventSearch{

    private $nom;
    private $lieu;
    private $asc;
    private $dsc;


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
     * Get the value of asc
     */ 
    public function getAsc()
    {
        return $this->asc;
    }

    /**
     * Set the value of asc
     *
     * @return  self
     */ 
    public function setAsc($asc)
    {
        $this->asc = $asc;

        return $this;
    }

    /**
     * Get the value of dsc
     */ 
    public function getDsc()
    {
        return $this->dsc;
    }

    /**
     * Set the value of dsc
     *
     * @return  self
     */ 
    public function setDsc($dsc)
    {
        $this->dsc = $dsc;

        return $this;
    }
}