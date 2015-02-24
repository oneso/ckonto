<?php
namespace Oneso\Ckonto\Webservice\BankCheck;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class BankCheck
{
	/**
	 * @var string
	 */
	protected $accountNumber;

	/**
	 * @var string
	 */
	protected $bankCode;

	/**
	 * @var bool
	 */
	protected $sepa;

	/**
	 * @param null $accountNumber
	 * @param null $bankCode
	 * @param bool $sepa
	 */
	function __construct($accountNumber = null, $bankCode = null, $sepa = false)
	{

		$this->accountNumber = $accountNumber;
		$this->bankCode = $bankCode;
		$this->sepa = $sepa;
	}

	/**
	 * @param string $accountNumber
	 * @return $this
	 */
	public function setAccountNumber($accountNumber)
	{
		$this->accountNumber = $accountNumber;
		return $this;
	}

	/**
	 * @param string $bankCode
	 * @return $this
	 */
	public function setBankCode($bankCode)
	{
		$this->bankCode = $bankCode;
		return $this;
	}

	/**
	 * @param boolean $sepa
	 * @return $this
	 */
	public function setSepa($sepa)
	{
		$this->sepa = (bool)$sepa;
		return $this;
	}

	/**
	 * @return BankCheckResponse
	 */
	public function check()
	{
		return BankCheckRequest::request($this->accountNumber, $this->bankCode, $this->sepa);
	}
} 