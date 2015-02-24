<?php
namespace Oneso\Ckonto\Webservice\BankCheck;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\RequestException;
use Oneso\Ckonto\Webservice\Ckonto;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class BankCheckRequest
{
	/**
	 * @param string $accountNumber
	 * @param string $bankCode
	 * @param boolean $sepa
	 * @throws BankCheckException
	 * @return BankCheckResponse
	 */
	public static function request($accountNumber, $bankCode, $sepa)
	{
		$client = new Client();

		try {
			$response = $client->get('https://www.ckonto.de/webservice.cgi', [
				'query' => [
					'key' => Ckonto::getKey(),
					'kontonummer' => $accountNumber,
					'bankleitzahl' => $bankCode,
					'sepa' => $sepa ? 1 : 0
				]
			])->send();

			return new BankCheckResponse($response);
		} catch (RequestException $e) {
			throw new BankCheckException('BankCheckRequest error occurred');
		}
	}
}