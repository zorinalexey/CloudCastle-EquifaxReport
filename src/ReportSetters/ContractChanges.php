<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс ContractChanges
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class ContractChanges
{

    /**
     * Признак изменения договора
     * @var int
     */
    public ?int $sign = 1;

    /**
     * Дата изменения договора
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Код вида изменения договора
     * @var int|null
     */
    public ?int $type = null;

    /**
     * Код специального изменения договора
     * @var int|null
     */
    public ?int $special_type = null;

    /**
     * Описание иного изменения договора
     * @var string|null
     */
    public ?string $type_text = null;

    /**
     * Дата вступления изменения договора в силу
     * @var string|null
     */
    public ?string $apply_date = null;

    /**
     * Дата планового прекращения действия изменения договора
     * @var string|null
     */
    public ?string $end_date = null;

    /**
     * Дата фактического прекращения действия изменения договора
     * @var string|null
     */
    public ?string $finish_date = null;

    /**
     * Код причины прекращения действия изменения договора
     * @var int|null
     */
    public ?int $finish = null;

    /**
     * Курс конверсии валюты долга
     * @var int|null
     */
    public ?int $currency_price = null;

    public function __construct(array $contractChanges)
    {

    }

}
