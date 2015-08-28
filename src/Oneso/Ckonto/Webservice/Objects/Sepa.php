<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class Sepa
{
    /**
     * @var boolean
     */
    protected $value;

    /**
     * Sepa constructor.
     * @param boolean $enabled
     */
    public function __construct($enabled)
    {
        $this->value = (boolean)$enabled;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->value;
    }

    /**
     * @param boolean $value
     * @return Sepa
     */
    public static function fromValue($value)
    {
        return new self($value);
    }

    /**
     * @return Sepa
     */
    public static function getDefault()
    {
        return new self(false);
    }
}