<?php
namespace Oneso\Ckonto\Webservice\IbanCheck;

use GuzzleHttp\Message\Response;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class IbanCheckResponse
{
	/**
	 * @var \SimpleXMLElement
	 */
	protected $response;

	/**
	 * @param Response $response
	 */
	function __construct(Response $response)
	{
		$this->response = $response->xml();
	}

	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return (int)$this->response->status;
	}

	/**
	 * @return bool
	 */
	public function success()
	{
		return $this->getStatusCode() === 1;
	}

	/**
	 * @return string
	 */
	public function getStatusText()
	{
		switch ((int)$this->getStatusCode()) {
			case 0:
				return 'Die IBAN ist ungültig, sie kann von diesem Institut nicht vergeben werden';
			case 1:
				return 'Die IBAN ist gültig, sie kann von diesem Institut vergeben werden';
			case 2:
				return 'Fehler bei der Eingabe der BIC.';
			case 3:
				return 'Fehler bei der Eingabe der IBAN oder Kleinbuchstaben verwendet.';
			case 4:
				return 'Format falsch (z.B. zu kurz oder zu lang)';
			case 5:
				return 'Genereller Eingabefehler des Übergabeparameters- enthält evtl. Leerzeichen';
			case 6:
				return 'Fehler im Format des Übergabeparameters';
			case 7:
				return 'Die Bankleitzahl wurde in der Datenbank nicht gefunden (existiert nicht)';
			case 8:
				return 'Die von der Bank verwendete Prüfmethode ist im Demonstrations-Modus nicht verfügbar';
			case 9:
				return 'Die Kontonummer kann nicht geprüft werden, da die Bank entweder keine Prüfziffern verwendet oder es sich um eine spezielle Kontonummer handelt';
		}

		return false;
	}

	/**
	 * @return string
	 */
	public function getZip()
	{
		return (string)$this->response->zip;
	}

	/**
	 * @return string
	 */
	public function getLocation()
	{
		return (string)$this->response->location;
	}

	/**
	 * @return string
	 */
	public function getBank()
	{
		return (string)$this->response->bank;
	}

	/**
	 * @return string
	 */
	public function getAccountNumber()
	{
		return (string)$this->response->kto;
	}

	/**
	 * @return string
	 */
	public function getBankCode()
	{
		return (string)$this->response->blz;
	}

	/**
	 * @return string
	 */
	public function getIban()
	{
		return (string)$this->response->iban;
	}

	/**
	 * @return string
	 */
	public function getBic()
	{
		return (string)$this->response->bic;
	}
}