<?php

namespace App\Controller;

use App\Repository\LoanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoanController extends AbstractController
{
    public function getAll()
    {
        $loanRepository = new LoanRepository();
        $loans = $loanRepository->findAll();
        
        return $this->render('loan/index.html.twig', [
            'funded_loans' => $loans
        ]);
    }
}