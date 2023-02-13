<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения об условиях платежей
 */
final class PaymentTerms
{
    /**
     * Сумма ближайшего следующего платежа по основному долгу
     * @var float
     */
    public float $op_next_payout_sum = 0;

    /**
     * Дата ближайшего следующего платежа по основному долгу
     * @var string|null
     */
    public ?string $op_next_payout_date = null;

    /**
     * Сумма ближайшего следующего платежа по процентам
     * @var float|int
     */
    public float $percent_next_payout_sum = 0;

    /**
     * Дата ближайшего следующего платежа по процентам
     * @var string|null
     */
    public ?string $percent_next_payout_date = null;

    /**
     * Код частоты платежей
     * @var int
     */
    public int $regularity = 2;

    /**
     * Сумма минимального платежа по кредитной карте
     * @var float|null
     */
    public ?float $min_sum_pay_cc = null;

    /**
     * Дата начала беспроцентного периода
     * @var string|null
     */
    public ?string $grace_date = null;

    /**
     * Дата окончания беспроцентного периода
     * @var string|null
     */
    public ?string $grace_end_date = null;

    /**
     * Дата окончания срока уплаты процентов
     * @var string|null
     */
    public ?string $percent_end_date = null;
}