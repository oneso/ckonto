<?php
namespace Oneso\Ckonto\Webservice;

use Oneso\Ckonto\Webservice\BankCheck\BankCheck;
use Oneso\Ckonto\Webservice\IbanCheck\IbanCheck;
use Oneso\Ckonto\Webservice\Objects\AccountNumber;
use Oneso\Ckonto\Webservice\Objects\BankCode;
use Oneso\Ckonto\Webservice\Objects\Bic;
use Oneso\Ckonto\Webservice\Objects\Iban;
use Oneso\Ckonto\Webservice\Objects\Location;
use Oneso\Ckonto\Webservice\Objects\Max;
use Oneso\Ckonto\Webservice\Objects\Name;
use Oneso\Ckonto\Webservice\Objects\Sepa;
use Oneso\Ckonto\Webservice\Objects\Zip;
use Oneso\Ckonto\Webservice\Search\Search;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class Ckonto
{
    /**
     * @var null|string
     */
    protected static $key = null;

    /**
     * @var string
     */
    public static $url = 'https://www.ckonto.de/webservice.cgi';

    /**
     * @param string $key
     */
    public static function setKey($key)
    {
        self::$key = (string)$key;
    }

    /**
     * @return string
     */
    public static function getKey()
    {
        return self::$key;
    }

    /**
     * @param AccountNumber $accountNumber
     * @param BankCode $bankCode
     * @param Sepa $sepa
     *
     * @return BankCheck
     */
    public static function checkBank(AccountNumber $accountNumber, BankCode $bankCode, Sepa $sepa)
    {
        return new BankCheck($accountNumber, $bankCode, $sepa);
    }

    /**
     * @param Iban $iban
     * @param Bic $bic
     * @param Sepa $sepa
     *
     * @return IbanCheck
     */
    public static function checkIban(Iban $iban, Bic $bic, Sepa $sepa)
    {
        return new IbanCheck($iban, $bic, $sepa);
    }

    /**
     * @param BankCode $bankCode
     * @param Location $location
     * @param Name $name
     * @param Zip $zip
     * @param Max $max
     *
     * @return Search
     */
    public static function search(BankCode $bankCode, Location $location, Name $name, Zip $zip, Max $max)
    {
        return new Search($bankCode, $location, $name, $zip, $max);
    }
} 