<?php

namespace App\Controller;

use App\Repository\LoanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class LoanController extends AbstractController
{
    public function listAction(Request $request)
    {
        $loanRepository = new LoanRepository();

        $page = $request->query->get('page', 1);

        $loanData = $loanRepository->findAll($page);
        
        return $this->render('loan/list.html.twig', [
            'funded_loans' => $loanData['loans'],
            'current_page' => $loanData['currentPage'],
            'page_count' => $loanData['pageCount']
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