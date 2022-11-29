<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxLibrary\TypesOfPaymentCompliance;
use CloudCastle\EquifaxLibrary\TypesOfComplianceWithTheDeadlinePayments;

/**
 * Класс Payments
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Payments
{

    use Helper;

    public ?string $last_payout_date = null;
    public ?int $last_payout_sum = 0,
        $last_payout_op_sum = 0,
        $last_payout_percent_sum = 0,
        $last_payout_other_sum = 0,
        $paid_sum = 0,
        $paid_op_sum = 0,
        $paid_percent_sum = 0,
        $paid_other_sum = 0,
        $overdue_day = 0;
    public int $size_payments_type = 0;
    public int $payments_deadline_type = 0;

    public function __construct(array $payments)
    {
        $this->setAttributes($payments);
    }

    private function __setOverdueDay(string $overdue_day): void
    {
        $this->overdue_day = (int)$overdue_day;
    }

    private function __setSizePaymentsType(string $size_payments_type): void
    {
        $this->size_payments_type = (int)(new TypesOfPaymentCompliance($size_payments_type))->code;
    }

    private function __setPaymentsDeadlineType(string $payments_deadline_type): void
    {
        $this->payments_deadline_type = (int)(new TypesOfComplianceWithTheDeadlinePayments($payments_deadline_type))->code;
    }

    private function __setLastPayoutDate(string $last_payout_date): void
    {
        $this->last_payout_date = Format::date($last_payout_date);
    }

    private function __setLastPayoutPercentSum(string $last_payout_percent_sum): void
    {
        $this->last_payout_percent_sum = (int)$last_payout_percent_sum;
    }

    private function __setLastPayoutOpSum(string $last_payout_op_sum): void
    {
        $this->last_payout_op_sum = (int)$last_payout_op_sum;
    }

    private function __setLastPayoutOtherSum(string $last_payout_other_sum): void
    {
        $this->last_payout_other_sum = (int)$last_payout_other_sum;
    }

    private function __setPaidSum(string $paid_sum): void
    {
        $this->paid_sum = (int)$paid_sum;
    }

    private function __setPaidOpSum(string $paid_op_sum): void
    {
        $this->paid_op_sum = (int)$paid_op_sum;
    }

    private function __setPaidPercentSum(string $paid_percent_sum): void
    {
        $this->paid_percent_sum = (int)$paid_percent_sum;
    }

    private function __setPaidOtherSum(string $paid_other_sum): void
    {
        $this->paid_other_sum = (int)$paid_other_sum;
    }

    private function __setLastPayoutSum(string $last_payout_sum): void
    {
        $this->last_payout_sum = (int)$last_payout_sum;
    }

}
