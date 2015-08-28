<?php
namespace Oneso\Ckonto\Webservice\IbanCheck;
use Oneso\Ckonto\Webservice\Objects\Bic;
use Oneso\Ckonto\Webservice\Objects\Iban;
use Oneso\Ckonto\Webservice\Objects\Sepa;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class IbanCheck
{
    /**
     * @var Iban
     */
    protected $iban;

    /**
     * @var Bic
     */
    protected $bic;

    /**
     * @var boolean
     */
    protected $sepa;

    /**
     * @param Iban $iban
     * @param Bic $bic
     * @param Sepa $sepa
     */
    function __construct(Iban $iban, Bic $bic, Sepa $sepa)
    {
        $this->iban = $iban;
        $this->bic = $bic;
        $this->sepa = $sepa;
    }

    /**
     * @return IbanCheckResponse
     */
    public function check()
    {
        return IbanCheckRequest::request($this->iban, $this->bic, $this->sepa);
    }
} 