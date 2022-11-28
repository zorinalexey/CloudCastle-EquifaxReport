<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

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
    public ?int $sum= null;

    /**
     * Валюта обязательства
     * @var int
     */
    public ?int $currency = 643;

    /**
     * Сумма обеспечиваемого обязательства
     * @var int
     */
    public ?int $security_sum= null;

    public function __construct(array $contractAmount)
    {

    }

}
