<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс PaymentTerms
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class PaymentTerms
{

    use Helper;

    /**
     * Сумма ближайшего следующего платежа по основному долгу
     * @var int
     */
    public ?int $op_next_payout_sum = null;

    /**
     * Дата ближайшего следующего платежа по основному долгу
     * @var string|null
     */
    public ?string $op_next_payout_date = null;

    /**
     * percent_next_payout_sum
     * @var int
     */
    public ?int $percent_next_payout_sum = null;

    /**
     * Дата ближайшего следующего платежа по процентам
     * @var string|null
     */
    public ?string $percent_next_payout_date = null;

    /**
     * Код частоты платежей
     * @var int
     */
    public ?int $regularity = null;

    /**
     * Сумма минимального платежа по кредитной карте
     * @var int
     */
    public ?int $min_sum_pay_cc = null;

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

    public function __construct(array $paymentTerms)
    {

    }

}
