<?php
namespace Oneso\Ckonto\Webservice\Search;
use Oneso\Ckonto\Webservice\Objects\BankCode;
use Oneso\Ckonto\Webservice\Objects\Location;
use Oneso\Ckonto\Webservice\Objects\Max;
use Oneso\Ckonto\Webservice\Objects\Name;
use Oneso\Ckonto\Webservice\Objects\Zip;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class Search
{
    /**
     * @var Zip
     */
    protected $zip;

    /**
     * @var BankCode
     */
    protected $bankCode;

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var Max
     */
    protected $max;

    /**
     * @param BankCode $bankCode
     * @param Location $location
     * @param Name $name
     * @param Zip $zip
     * @param Max $max
     */
    function __construct(BankCode $bankCode, Location $location, Name $name, Zip $zip, Max $max)
    {
        $this->bankCode = $bankCode;
        $this->location = $location;
        $this->name = $name;
        $this->zip = $zip;
        $this->max = $max;
    }

    /**
     * @return SearchResponse
     */
    public function search()
    {
        return SearchRequest::request($this->bankCode, $this->location, $this->name, $this->zip, $this->max);
    }
} 