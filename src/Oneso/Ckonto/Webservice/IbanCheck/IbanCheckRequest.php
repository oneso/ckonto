<?php
namespace Oneso\Ckonto\Webservice\IbanCheck;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\RequestException;
use Oneso\Ckonto\Webservice\Ckonto;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class IbanCheckRequest
{
	/**
	 * @param string $iban
	 * @param string $bic
	 * @param boolean $sepa
	 * @throws IbanCheckException
	 * @return IbanCheckResponse
	 */
	public static function request($iban, $bic, $sepa)
	{
		$client = new Client();

		try {
			$response = $client->get('https://www.ckonto.de/webservice.cgi', [
				'query' => [
					'key' => Ckonto::getKey(),
					'iban' => $iban,
					'bic' => $bic,
					'sepa' => $sepa ? 1 : 0
				]
			])->send();

			return new IbanCheckResponse($response);
		} catch (RequestException $e) {
			throw new IbanCheckException('IbanCheckRequest error occurred');
		}
	}
}