<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сумма и валюта обязательства
 */
class ContractAmount
{
    /**
     * Сумма обязательства
     * @var float|int
     */
    public float $sum = 0;

    /**
     * Валюта обязательства
     * @var string
     */
    public string $currency = 'RUB';

    /**
     * Сумма обеспечиваемого обязательства
     * @var float|int
     */
    public float $security_sum = 0;
}