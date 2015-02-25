<?php
namespace Oneso\Ckonto\Webservice;

use Oneso\Ckonto\Webservice\BankCheck\BankCheck;
use Oneso\Ckonto\Webservice\IbanCheck\IbanCheck;
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
	 * @param string $key
	 */
	public static function setKey($key)
	{
		self::$key = (string) $key;
	}

	/**
	 * @return string
	 */
	public static function getKey()
	{
		return self::$key;
	}

	/**
	 * @param null $accountNumber
	 * @param null $bankCode
	 * @param bool $sepa
	 * @return BankCheck
	 */
	public static function checkBank($accountNumber = null, $bankCode = null, $sepa = false)
	{
		return new BankCheck($accountNumber, $bankCode, $sepa);
	}

	/**
	 * @param null $iban
	 * @param null $bic
	 * @param bool $sepa
	 * @return IbanCheck
	 */
	public static function checkIban($iban = null, $bic = null, $sepa = false)
	{
		return new IbanCheck($iban, $bic, $sepa);
	}

	/**
	 * @param null $bankCode
	 * @param null $location
	 * @param null $name
	 * @param null $zip
	 * @return Search
	 */
	public static function search($bankCode = null, $location = null, $name = null, $zip = null)
	{
		return new Search($bankCode, $location, $name, $zip);
	}
} 