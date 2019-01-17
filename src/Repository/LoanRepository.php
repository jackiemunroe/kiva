<?php
namespace App\Repository;

use App\Entity\Lender;
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

    public function findAll($page = 1)
    {
        $response = $this->client->get(
            'loans/search.json',
            ['query' => "status=funded&page=$page"]
        );
        $body = json_decode($response->getBody()->getContents(), true);
        
        $loans = [];
        foreach ($body['loans'] as $loan) {
            $loans[] = $this->hydrateLoan($loan);
        }
        $paging = $body['paging'];
        
        return [
            'currentPage' => $paging['page'],
            'pageCount' => $paging['pages'],
            'loans' => $loans
        ];
    }

    public function find($id)
    {
        $response = $this->client->get("loans/$id.json");
        
        $body = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        $loan = $this->hydrateLoan($body['loans'][0]);
        
        return $loan;
    }

    public function getLenders($loanId)
    {
        $response = $this->client->get("loans/$loanId/lenders.json");

        $body = json_decode($response->getBody()->getContents(), true);

        $lenders = [];
        foreach ($body['lenders'] as $lender) {
            $lenders[] = $this->hydrateLender($lender);
        }

        return $lenders;
    }

    protected function hydrateLoan($data)
    {
        $loan = new Loan();
        $loan->setId($this->getArrayValue('id', $data));
        $loan->setName($this->getArrayValue('name', $data));
        $loan->setActivity($this->getArrayValue('activity', $data));
        $loan->setSector($this->getArrayValue('sector', $data));
        $loan->setUse($this->getArrayValue('use', $data));
        $loan->setLoanAmount($this->getArrayValue('loan_amount', $data));
        $loan->setLenderCount($this->getArrayValue('lender_count', $data));

        return $loan;
    }

    protected function hydrateLender($data)
    {
        $lender = new Lender();
        $lender->setLenderId($this->getArrayValue('lender_id', $data));
        $lender->setName($this->getArrayValue('name', $data));
        $lender->setWhereabouts($this->getArrayValue('whereabouts', $data));
        $lender->setCountryCode($this->getArrayValue('country_code', $data));
        $lender->setUid($this->getArrayValue('uid', $data));

        return $lender;
    }

    protected function getArrayValue($key, $array, $default = null)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        return $default;
    }
}