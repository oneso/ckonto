<?php

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class CkontoTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_store_the_api_key()
    {
        \Oneso\Ckonto\Webservice\Ckonto::setKey('demo');

        $this->assertEquals('demo', \Oneso\Ckonto\Webservice\Ckonto::getKey());
    }

    /** @test */
    public function it_returns_a_bank_check_object()
    {
        $bankCheck = \Oneso\Ckonto\Webservice\Ckonto::checkBank(
            \Oneso\Ckonto\Webservice\Objects\AccountNumber::fromNumber('123456789'),
            \Oneso\Ckonto\Webservice\Objects\BankCode::fromCode('123123123'),
            \Oneso\Ckonto\Webservice\Objects\Sepa::fromValue(false)
        );

        $this->assertTrue($bankCheck instanceof \Oneso\Ckonto\Webservice\BankCheck\BankCheck);
    }

    /** @test */
    public function it_returns_a_iban_check_object()
    {
        $ibanCheck = \Oneso\Ckonto\Webservice\Ckonto::checkIban(
            \Oneso\Ckonto\Webservice\Objects\Iban::fromIban('DE123456789'),
            \Oneso\Ckonto\Webservice\Objects\Bic::fromBic('FDX13456'),
            \Oneso\Ckonto\Webservice\Objects\Sepa::fromValue(false)
        );

        $this->assertTrue($ibanCheck instanceof \Oneso\Ckonto\Webservice\IbanCheck\IbanCheck);
    }

    /** @test */
    public function it_returns_a_search_object()
    {
        $search = \Oneso\Ckonto\Webservice\Ckonto::search(
            \Oneso\Ckonto\Webservice\Objects\BankCode::fromCode('123456789'),
            \Oneso\Ckonto\Webservice\Objects\Location::fromCity('Berlin'),
            \Oneso\Ckonto\Webservice\Objects\Name::fromName(''),
            \Oneso\Ckonto\Webservice\Objects\Zip::fromZip(''),
            \Oneso\Ckonto\Webservice\Objects\Max::fromValue(0)
        );

        $this->assertTrue($search instanceof \Oneso\Ckonto\Webservice\Search\Search);
    }
}
