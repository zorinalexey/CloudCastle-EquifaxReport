<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о внесении платежей
 */
final class Payments
{
    /**
     * Дата последнего внесенного платежа
     * @var string|null
     */
    public ?string $last_payout_date = null;

    /**
     * Сумма последнего внесенного платежа
     * @var float|int
     */
    public float $last_payout_sum = 0;

    /**
     * Сумма последнего внесенного платежа по основному долгу
     * @var float|int
     */
    public float $last_payout_op_sum = 0;
    /**
     * Сумма последнего внесенного платежа по процентам
     * @var float|int
     */
    public float $last_payout_percent_sum = 0;

    /**
     * Сумма последнего внесенного платежа по иным требованиям
     * @var float|int
     */
    public float $last_payout_other_sum = 0;

    /**
     * Сумма всех внесенных платежей по обязательству
     * @var float|int
     */
    public float $paid_sum = 0;
    /**
     * Сумма внесенных платежей по основному долгу
     * @var float|int
     */
    public float $paid_op_sum = 0;

    /**
     * Сумма внесенных платежей по процентам
     * @var float|int
     */
    public float $paid_percent_sum = 0;

    /**
     * Сумма внесенных платежей по иным требованиям
     * @var float|int
     */
    public float $paid_other_sum = 0;

    /**
     * Код соблюдения размера платежей
     * @var int
     */
    public int $size_payments_type = 3;

    /**
     * Код соблюдения срока внесения платежей
     * @var int
     */
    public int $payments_deadline_type = 1;

    /**
     * Продолжительность просрочки
     * @var int
     */
    public int $overdue_day = 0;
}