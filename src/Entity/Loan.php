<?php
namespace App\Entity;

/**
 * Class Loan
 * @package App\Entity
 */
class Loan {

    /** @var  integer */
    private $id;

    /** @var  string */
    private $name;

    /** @var  string */
    private $activity;

    /** @var  string */
    private $sector;

    /** @var  string */
    private $use;

    /** @var  integer */
    private $loanAmount;
    
    /** @var  integer */
    private $lenderCount;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param string $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return string
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * @param string $sector
     */
    public function setSector($sector)
    {
        $this->sector = $sector;
    }

    /**
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * @param string $use
     */
    public function setUse($use)
    {
        $this->use = $use;
    }

    /**
     * @return float
     */
    public function getLoanAmount()
    {
        return $this->loanAmount;
    }

    /**
     * @param float $loanAmount
     */
    public function setLoanAmount($loanAmount)
    {
        $this->loanAmount = $loanAmount;
    }

    /**
     * @return int
     */
    public function getLenderCount()
    {
        return $this->lenderCount;
    }

    /**
     * @param int $lenderCount
     */
    public function setLenderCount($lenderCount)
    {
        $this->lenderCount = $lenderCount;
    }
}