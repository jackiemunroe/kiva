<?php
namespace App\Repository;

use App\Entity\Loan;
use GuzzleHttp\Client;

class LoanRepository
{
    /** @var  Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.kivaws.org/v1/'
        ]);
    }

    public function findAll()
    {
        $response = $this->client->get('loans/search.json', ['status' => 'funded']);

        $body = json_decode($response->getBody()->getContents(), true);

        $loans = [];

        foreach ($body['loans'] as $loan) {
            $loans[] = $this->hydrate($loan);
        }

        return $loans;
    }

    protected function hydrate($data)
    {
        $loan = new Loan();
        $loan->setId($data['id']);
        $loan->setName($data['name']);
        $loan->setActivity($data['activity']);
        $loan->setSector($data['sector']);
        $loan->setUse($data['use']);
        $loan->setLoanAmount($data['loan_amount']);

        return $loan;
    }
}