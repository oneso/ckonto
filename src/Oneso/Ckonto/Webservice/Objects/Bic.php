<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class Bic
{
    /**
     * @var string
     */
    protected $bic;

    /**
     * @param string $bic
     */
    public function __construct($bic)
    {
        $this->bic = $bic;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     * @return Bic
     */
    public static function fromBic($bic)
    {
        return new self($bic);
    }

    /**
     * @return Bic
     */
    public static function getEmpty()
    {
        return new self('');
    }
}