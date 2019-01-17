<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class LoanLenderAmount
 * @package App\Entity
 *
 * @ORM\Entity
 */
class LoanLender
{
    /**
     * @var integer
     * @ORM\Id @ORM\Column(type="integer")
     */
    private $loanId;

    /**
     * @var string
     * @ORM\Id @ORM\Column(type="text")
     */
    private $lenderName;

    /**
     * @var integer
     * @ORM\Id @ORM\Column(type="integer")
     */
    private $amount;

    public function __construct($loanId, $lenderName, $amount)
    {
        $this->loanId = $loanId;
        $this->lenderName = $lenderName;
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getLoanId()
    {
        return $this->loanId;
    }

    /**
     * @param int $loanId
     */
    public function setLoanId($loanId)
    {
        $this->loanId = $loanId;
    }

    /**
     * @return string
     */
    public function getLenderName()
    {
        return $this->lenderName;
    }

    /**
     * @param string $lenderName
     */
    public function setLenderName($lenderName)
    {
        $this->lenderName = $lenderName;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}