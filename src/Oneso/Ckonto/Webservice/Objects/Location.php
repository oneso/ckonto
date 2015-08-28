<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class Location
{
    /**
     * @var string
     */
    protected $city;

    /**
     * @param string $city
     */
    public function __construct($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Location
     */
    public static function fromCity($city)
    {
        return new self($city);
    }

    /**
     * @return Location
     */
    public static function getEmpty()
    {
        return new self('');
    }
}