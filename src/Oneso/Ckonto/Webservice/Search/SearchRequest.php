<?php
namespace Oneso\Ckonto\Webservice\Search;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Oneso\Ckonto\Webservice\Ckonto;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class SearchRequest
{
	/**
	 * @param string $bankCode
	 * @param string $location
	 * @param string $name
	 * @param string $zip
	 * @param integer $max
	 * @throws SearchException
	 * @return SearchResponse
	 */
	public static function request($bankCode, $location, $name, $zip, $max)
	{
		$client = new Client();

		try {
			$query = [
				'key' => Ckonto::getKey(),
				'search' => 1,
				'zip' => $zip,
				'bankleitzahl' => $bankCode,
				'name' => $name,
				'location' => $location
			];

			if ($max > 0) {
				$query['max'] = $max;
			}

			$response = $client->get('https://www.ckonto.de/webservice.cgi', [
				'query' => $query
			]);

			return new SearchResponse($response);
		} catch (RequestException $e) {
			throw new SearchException('SearchRequest error occurred');
		}
	}
}