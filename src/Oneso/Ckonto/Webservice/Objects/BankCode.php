<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class BankCode
{
    /**
     * @var string
     */
    protected $bankCode;

    /**
     * @param string $bankCode
     */
    public function __construct($bankCode)
    {
        $this->bankCode = $bankCode;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     * @return BankCode
     */
    public static function fromCode($bankCode)
    {
        return new self($bankCode);
    }

    /**
     * @return BankCode
     */
    public static function getEmpty()
    {
        return new self('');
    }
}