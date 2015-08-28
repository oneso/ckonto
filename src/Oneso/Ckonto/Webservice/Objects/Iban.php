<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class Iban
{
    /**
     * @var string
     */
    protected $iban;

    /**
     * @param string $iban
     */
    public function __construct($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return Iban
     */
    public static function fromIban($iban)
    {
        return new self($iban);
    }

    /**
     * @return Iban
     */
    public static function getEmpty()
    {
        return new self('');
    }
}