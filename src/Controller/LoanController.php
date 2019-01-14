<?php

namespace App\Controller;

use App\Repository\LoanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoanController extends AbstractController
{
    public function findAll()
    {
        $loanRepository = new LoanRepository();
        $loans = $loanRepository->findAll();
        
        return $this->render('loan/list.html.twig', [
            'funded_loans' => $loans
        ]);
    }

    public function find($id)
    {
        $loanRepository = new LoanRepository();
        $loans = $loanRepository->find($id);

        return $this->render('loan/loan.html.twig', [
            'loan' => $loans
        ]);
    }
}