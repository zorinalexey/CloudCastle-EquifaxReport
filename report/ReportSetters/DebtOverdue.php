<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс DebtOverdue
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class DebtOverdue
{

    /**
     * Дата возникновения срочной задолженности
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Сумма срочной задолженности
     * @var int|null
     */
    public ?int $sum = null;

    /**
     * Сумма просроченной задолженности по основному долгу
     * @var int|null
     */
    public ?int $op_sum = null;

    /**
     * Сумма срочной задолженности по процентам
     * @var int|null
     */
    public ?int $percent_sum = null;

    /**
     * Сумма срочной задолженности по иным требованиям
     * @var int|null
     */
    public ?int $other_sum = null;

    /**
     * Дата последнего пропущенного платежа по основному долгу
     * @var string|null
     */
    public ?string $op_miss_payout_date = null;

    /**
     * Дата последнего пропущенного платежа по процентам
     * @var string|null
     */
    public ?string $percent_miss_payout_date = null;

    public function __construct($debtOverdue)
    {

    }

}
