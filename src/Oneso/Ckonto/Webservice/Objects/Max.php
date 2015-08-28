<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class Max
{
    /**
     * @var integer
     */
    protected $max;

    /**
     * @param integer $max
     */
    public function __construct($max)
    {
        $this->max = (int)$max;
    }

    /**
     * @return integer
     */
    public function getValue()
    {
        return $this->max;
    }

    /**
     * @param integer $max
     * @return Max
     */
    public static function fromValue($max)
    {
        return new self($max);
    }

    /**
     * @return Max
     */
    public static function getEmpty()
    {
        return new self(0);
    }
}