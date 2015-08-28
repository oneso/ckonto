<?php
namespace Oneso\Ckonto\Webservice\Search;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class SearchItem
{
    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $location;

    /**
     * @var string
     */
    protected $bank;

    /**
     * @var string
     */
    protected $bankCode;

    /**
     * @var string
     */
    protected $bic;

    function __construct(\SimpleXMLElement $item)
    {
        $this->zip = (string)$item->zip;
        $this->location = (string)$item->location;
        $this->bank = (string)$item->bank;
        $this->bankCode = (string)$item->bankCode;
        $this->bic = (string)$item->bic;
    }

    /**
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }
} 