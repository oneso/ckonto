<?php

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class IbanCheckRequestTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_a_bank_check_response_object()
    {
        $response = $this->createRequest();

        $this->assertTrue($response instanceof \Oneso\Ckonto\Webservice\IbanCheck\IbanCheckResponse);
    }

    /**
     * @param string $iban
     * @param string $bic
     * @param bool|false $sepa
     * @return \Oneso\Ckonto\Webservice\IbanCheck\IbanCheckResponse
     * @throws \Oneso\Ckonto\Webservice\IbanCheck\IbanCheckException
     */
    private function createRequest($iban = 'DE134567', $bic = '', $sepa = false)
    {
        return \Oneso\Ckonto\Webservice\IbanCheck\IbanCheckRequest::request(
            \Oneso\Ckonto\Webservice\Objects\Iban::fromIban($iban),
            \Oneso\Ckonto\Webservice\Objects\Bic::fromBic($bic),
            \Oneso\Ckonto\Webservice\Objects\Sepa::fromValue($sepa)
        );
    }
}
