<?php

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class BankCheckRequestTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_a_bank_check_response_object()
    {
        $response = $this->createRequest();

        $this->assertTrue($response instanceof \Oneso\Ckonto\Webservice\BankCheck\BankCheckResponse);
    }

    /**
     * @param string $accountNumber
     * @param string $bankCode
     * @param bool|false $sepa
     * @return \Oneso\Ckonto\Webservice\BankCheck\BankCheckResponse
     * @throws \Oneso\Ckonto\Webservice\BankCheck\BankCheckException
     */
    private function createRequest($accountNumber = '123456789', $bankCode = '', $sepa = false)
    {
        return \Oneso\Ckonto\Webservice\BankCheck\BankCheckRequest::request(
            \Oneso\Ckonto\Webservice\Objects\AccountNumber::fromNumber($accountNumber),
            \Oneso\Ckonto\Webservice\Objects\BankCode::fromCode($bankCode),
            \Oneso\Ckonto\Webservice\Objects\Sepa::fromValue($sepa)
        );
    }
}
