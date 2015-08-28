<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class Zip
{
    /**
     * @var string
     */
    protected $zip;

    /**
     * @param string $zip
     */
    public function __construct($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return Zip
     */
    public static function fromZip($zip)
    {
        return new self($zip);
    }

    /**
     * @return Zip
     */
    public static function getEmpty()
    {
        return new self('');
    }
}