<?php
namespace Oneso\Ckonto\Webservice\BankCheck;
use Oneso\Ckonto\Webservice\Objects\AccountNumber;
use Oneso\Ckonto\Webservice\Objects\BankCode;
use Oneso\Ckonto\Webservice\Objects\Sepa;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class BankCheck
{
    /**
     * @var AccountNumber
     */
    protected $accountNumber;

    /**
     * @var BankCode
     */
    protected $bankCode;

    /**
     * @var Sepa
     */
    protected $sepa;

    /**
     * @param AccountNumber $accountNumber
     * @param BankCode $bankCode
     * @param Sepa $sepa
     */
    function __construct(AccountNumber $accountNumber, BankCode $bankCode, Sepa $sepa)
    {
        $this->accountNumber = $accountNumber;
        $this->bankCode = $bankCode;
        $this->sepa = $sepa;
    }

    /**
     * @return BankCheckResponse
     */
    public function check()
    {
        return BankCheckRequest::request($this->accountNumber, $this->bankCode, $this->sepa);
    }
} 