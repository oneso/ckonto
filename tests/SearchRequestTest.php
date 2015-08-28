<?php

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class SearchRequestTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_a_bank_check_response_object()
    {
        $response = $this->createRequest();

        $this->assertTrue($response instanceof \Oneso\Ckonto\Webservice\Search\SearchResponse);
    }

    /**
     * @param string $bankCode
     * @param string $city
     * @param string $name
     * @param string $zip
     * @param int $max
     * @return \Oneso\Ckonto\Webservice\Search\SearchResponse
     * @throws \Oneso\Ckonto\Webservice\Search\SearchException
     */
    private function createRequest($bankCode = '12345678', $city = 'Berlin', $name = '', $zip = '', $max = 0)
    {
        return \Oneso\Ckonto\Webservice\Search\SearchRequest::request(
            \Oneso\Ckonto\Webservice\Objects\BankCode::fromCode($bankCode),
            \Oneso\Ckonto\Webservice\Objects\Location::fromCity($city),
            \Oneso\Ckonto\Webservice\Objects\Name::fromName($name),
            \Oneso\Ckonto\Webservice\Objects\Zip::fromZip($zip),
            \Oneso\Ckonto\Webservice\Objects\Max::fromValue($max)
        );
    }
}
