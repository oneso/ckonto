<?php
namespace Oneso\Ckonto\Webservice\IbanCheck;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Oneso\Ckonto\Webservice\Ckonto;
use Oneso\Ckonto\Webservice\Objects\Bic;
use Oneso\Ckonto\Webservice\Objects\Iban;
use Oneso\Ckonto\Webservice\Objects\Sepa;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class IbanCheckRequest
{
    /**
     * @param Iban $iban
     * @param Bic $bic
     * @param Sepa $sepa
     * @return IbanCheckResponse
     * @throws IbanCheckException
     */
    public static function request(Iban $iban, Bic $bic, Sepa $sepa)
    {
        $client = new Client();

        try {
            $response = $client->get(Ckonto::$url, [
                'query' => [
                    'key' => Ckonto::getKey(),
                    'iban' => $iban->getValue(),
                    'bic' => $bic->getValue(),
                    'sepa' => $sepa->isEnabled() ? 1 : 0
                ]
            ]);

            return new IbanCheckResponse($response);
        } catch (RequestException $e) {
            throw new IbanCheckException('IbanCheckRequest error occurred');
        }
    }
}