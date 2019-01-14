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
        $loans = $loanRepository->find($id);

        $lenders = $loanRepository->getLenders($id);
        
        return $this->render('loan/loan.html.twig', [
            'loan' => $loans,
            'lenders' => $lenders
        ]);
    }
}