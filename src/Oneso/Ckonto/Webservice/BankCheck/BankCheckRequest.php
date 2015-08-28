<?php
namespace Oneso\Ckonto\Webservice\BankCheck;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Oneso\Ckonto\Webservice\Ckonto;
use Oneso\Ckonto\Webservice\Objects\AccountNumber;
use Oneso\Ckonto\Webservice\Objects\BankCode;
use Oneso\Ckonto\Webservice\Objects\Sepa;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class BankCheckRequest
{
    /**
     * @param AccountNumber $accountNumber
     * @param BankCode $bankCode
     * @param Sepa $sepa
     * @throws BankCheckException
     * @return BankCheckResponse
     */
    public static function request(AccountNumber $accountNumber, BankCode $bankCode, Sepa $sepa)
    {
        $client = new Client();

        try {
            $response = $client->get(Ckonto::$url, [
                'query' => [
                    'key' => Ckonto::getKey(),
                    'kontonummer' => $accountNumber->getValue(),
                    'bankleitzahl' => $bankCode->getValue(),
                    'sepa' => $sepa->isEnabled() ? 1 : 0
                ]
            ]);

            return new BankCheckResponse($response);
        } catch (RequestException $e) {
            throw new BankCheckException('BankCheckRequest error occurred');
        }
    }
}