<?php
namespace Oneso\Ckonto\Webservice\Search;

use GuzzleHttp\Message\Response;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class SearchResponse
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
				return 'Die Suche erzielte mit den genutzten Kriterien keine Suchtreffer';
			case 1:
				return 'Die Suche war erfolgreich und die Anzahl der Ergebnisse hat die maximale Anzahl nicht überschritten';
			case 2:
				return 'Fehler bei der Eingabe der Postleitzahl. Mindestens 2 Ziffern';
			case 3:
				return 'Fehler bei der Eingabe des Ortes. Mindestens 3 alphanummerische Zeichen';
			case 4:
				return 'Eingabefehler bei dem Namen der Bank. Mindestens 3 alphanummerische Zeichen';
			case 5:
				return 'Genereller Eingabefehler des Übergabeparameters - enthält evtl. Leerzeichen';
			case 6:
				return 'Fehler im Format des Übergabeparameters';
			case 7:
				return 'Fehler bei der Eingabe des Parameters max. Darf nur Ziffern enthalten. Standard=10';
			case 8:
				return 'Fehler bei der Eingabe der Bankleitzahl Mindestens 3 Ziffern';
			case 9:
				return 'Suche war erfolgreich. Ausgabe-Begrenzung (max) erreicht';
		}

		return false;
	}

	public function getResults()
	{
		return new SearchItemCollection((array)$this->response->results);
	}
}