<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о просроченной задолженности
 */
class DebtOverdue
{
    /**
     * Дата возникновения просроченной задолженности
     * @var string|null
     */
    public ?string $date = null;
    /**
     * Сумма просроченной задолженности
     * @var float|int
     */
    public float $sum = 0;
    /**
     * Сумма просроченной задолженности по основному долгу
     * @var float|int
     */
    public float $op_sum = 0;
    /**
     * Сумма просроченной задолженности по процентам
     * @var float|int
     */
    public float $percent_sum = 0;
    /**
     * Сумма просроченной задолженности по иным требованиям
     * @var float|int
     */
    public float $other_sum = 0;
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
}