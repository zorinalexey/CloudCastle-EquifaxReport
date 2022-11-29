<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\EquifaxLibrary\CurrencyCodesOKW;

/**
 * Класс ContractAmount
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class ContractAmount
{

    /**
     * Сумма обязательства
     * @var int
     */
    public ?int $sum = null;

    /**
     * Валюта обязательства
     * @var int
     */
    public string $currency = 'RUB';

    /**
     * Сумма обеспечиваемого обязательства
     * @var int
     */
    public ?int $security_sum = null;

    public function __construct(array $contractAmount)
    {
        if (isset($contractAmount['sum'])) {
            $this->sum = (int)$contractAmount['sum'];
        }
        if (isset($contractAmount['security_sum'])) {
            $this->security_sum = (int)$contractAmount['security_sum'];
        }
        if (isset($contractAmount['currency'])) {
            $this->currency = (new CurrencyCodesOKW((string)$contractAmount['currency']))->code;
        }
    }

}
