<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxLibrary\FrequencyOfObligationPayments;

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

    /**
     * Дата ближайшего следующего платежа по основному долгу
     * @var string|null
     */
    public ?string $op_next_payout_date = null;

    /**
     * Дата ближайшего следующего платежа по процентам
     * @var string|null
     */
    public ?string $percent_next_payout_date = null;

    /**
     * Сумма ближайшего следующего платежа по основному долгу
     * @var int
     */
    public int $op_next_payout_sum = 0;

    /**
     * percent_next_payout_sum
     * @var int
     */
    public ?int $percent_next_payout_sum = null;

    /**
     * Код частоты платежей
     * @var int
     */
    public int $regularity = 3;

    /**
     * Сумма минимального платежа по кредитной карте
     * @var int
     */
    public ?int $min_sum_pay_cc = null;

    public function __construct(array $paymentTerms)
    {
        $this->setAttributes($paymentTerms);
    }

    private function __setRegularity(string $regularity): void
    {
        $this->regularity = (int)(new FrequencyOfObligationPayments($regularity))->code;
    }

    private function __setMinSumPayCc(string $min_sum_pay_cc): void
    {
        $this->min_sum_pay_cc = (int)$min_sum_pay_cc;
    }

    private function __setPercentNextPayoutSum(string $percent_next_payout_sum): void
    {
        $this->percent_next_payout_sum = (int)$percent_next_payout_sum;
    }

    private function __setOpNextPayoutSum(string $op_next_payout_sum): void
    {
        $this->op_next_payout_sum = (int)$op_next_payout_sum;
    }

    private function __setOpNextPayoutDate(string $op_next_payout_date): void
    {
        $this->op_next_payout_date = Format::date($op_next_payout_date);
    }

    private function __setPercentNextPayoutDate(string $percent_next_payout_date): void
    {
        $this->percent_next_payout_date = Format::date($percent_next_payout_date);
    }

    private function __setGraceDate(string $grace_date): void
    {
        $this->grace_date = Format::date($grace_date);
    }

    private function __setGraceEndDate(string $grace_end_date): void
    {
        $this->grace_end_date = Format::date($grace_end_date);
    }

    private function __setPercentEndDate(string $percent_end_date): void
    {
        $this->percent_end_date = Format::date($percent_end_date);
    }

}
