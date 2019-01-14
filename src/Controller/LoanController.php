<?php

namespace App\Controller;

use App\Repository\LoanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoanController extends AbstractController
{
    public function listAction()
    {
        $loanRepository = new LoanRepository();
        $loans = $loanRepository->findAll();
        
        return $this->render('loan/list.html.twig', [
            'funded_loans' => $loans
        ]);
    }

    public function getAction($id)
    {
        $loanRepository = new LoanRepository();
        /** @var Loan $loan */
        $loan = $loanRepository->find($id);
        /** @var Lender $lenders */
        $lenders = $loanRepository->getLenders($id);
        
        $totalAmountOwed = $loan->getLoanAmount();
        $numberOfLenders = $loan->getLenderCount();
        
        $amountOwedPerLender = 0;
        if ($totalAmountOwed > 0 && $numberOfLenders > 0) {
            $amountOwedPerLender = $totalAmountOwed/$numberOfLenders;
        }
        
        return $this->render('loan/loan.html.twig', [
            'loan' => $loan,
            'lenders' => $lenders,
            'amount_owed_per_lender' => $amountOwedPerLender
        ]);
    }
}