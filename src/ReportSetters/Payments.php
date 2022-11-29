<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

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

    public function __construct(array $payments)
    {
        $this->setAttributes($payments);
    }

}
