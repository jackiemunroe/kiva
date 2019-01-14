<?php
namespace App\Entity;


class Lender
{
    /** @var  string */
    private $lenderId;

    /** @var  string */
    private $name;

    /** @var  string */
    private $whereabouts;

    /** @var  string */
    private $countryCode;

    /** @var  string */
    private $uid;

    /**
     * @return string
     */
    public function getLenderId()
    {
        return $this->lenderId;
    }

    /**
     * @param string $lenderId
     */
    public function setLenderId($lenderId)
    {
        $this->lenderId = $lenderId;
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
    public function getWhereabouts()
    {
        return $this->whereabouts;
    }

    /**
     * @param string $whereabouts
     */
    public function setWhereabouts($whereabouts)
    {
        $this->whereabouts = $whereabouts;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
}