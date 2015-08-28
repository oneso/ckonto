<?php
namespace Oneso\Ckonto\Webservice\Search;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Oneso\Ckonto\Webservice\Ckonto;
use Oneso\Ckonto\Webservice\Objects\BankCode;
use Oneso\Ckonto\Webservice\Objects\Location;
use Oneso\Ckonto\Webservice\Objects\Max;
use Oneso\Ckonto\Webservice\Objects\Name;
use Oneso\Ckonto\Webservice\Objects\Zip;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class SearchRequest
{
    /**
     * @param BankCode $bankCode
     * @param Location $location
     * @param Name $name
     * @param Zip $zip
     * @param Max $max
     * @return SearchResponse
     * @throws SearchException
     */
    public static function request(BankCode $bankCode, Location $location, Name $name, Zip $zip, Max $max)
    {
        $client = new Client();

        try {
            $query = [
                'key' => Ckonto::getKey(),
                'search' => 1,
                'zip' => $zip->getValue(),
                'bankleitzahl' => $bankCode->getValue(),
                'name' => $name->getValue(),
                'location' => $location->getCity()
            ];

            if ($max->getValue() > 0) {
                $query['max'] = $max->getValue();
            }

            $response = $client->get(Ckonto::$url, [
                'query' => $query
            ]);

            return new SearchResponse($response);
        } catch (RequestException $e) {
            throw new SearchException('SearchRequest error: ' . $e->getMessage());
        }
    }
}