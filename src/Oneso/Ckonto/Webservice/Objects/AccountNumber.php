<?php
namespace Oneso\Ckonto\Webservice\Objects;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 27.08.2015
 */
class AccountNumber
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @param string $accountNumber
     */
    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return AccountNumber
     */
    public static function fromNumber($accountNumber)
    {
        return new self($accountNumber);
    }

    /**
     * @return AccountNumber
     */
    public static function getEmpty()
    {
        return new self('');
    }
}