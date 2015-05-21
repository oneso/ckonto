<?php
namespace Oneso\Ckonto\Webservice\IbanCheck;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class IbanCheck
{
	/**
	 * @var string
	 */
	protected $iban;

	/**
	 * @var string
	 */
	protected $bic;

	/**
	 * @var boolean
	 */
	protected $sepa;

	/**
	 * @param null $bic
	 * @param null $iban
	 * @param bool $sepa
	 */
	function __construct($iban = null, $bic = null, $sepa = false)
	{
        $this->iban = $iban;
        $this->bic = $bic;
		$this->sepa = $sepa;
	}

	/**
	 * @param string $bic
	 * @return $this
	 */
	public function setBic($bic)
	{
		$this->bic = $bic;
		return $this;
	}

	/**
	 * @param string $iban
	 * @return $this
	 */
	public function setIban($iban)
	{
		$this->iban = $iban;
		return $this;
	}

	/**
	 * @param boolean $sepa
	 * @return $this
	 */
	public function setSepa($sepa)
	{
		$this->sepa = (bool) $sepa;
		return $this;
	}

	/**
	 * @return IbanCheckResponse
	 */
	public function check()
	{
		return IbanCheckRequest::request($this->iban, $this->bic, $this->sepa);
	}
} 