<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;

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

    use Helper;

    public ?string $date = null;
    public int $sum = 0,
        $op_sum = 0,
        $percent_sum = 0,
        $other_sum = 0;
    public ?string $op_miss_payout_date = null;
    public ?string $percent_miss_payout_date = null;

    public function __construct(array $debtOverdue)
    {
        $this->setAttributes($debtOverdue);
    }

    private function __setOpMissPayoutDate(string $op_miss_payout_date): void
    {
        $this->op_miss_payout_date = Format::date($op_miss_payout_date);
    }

    private function __setPercentMissPayoutDate(string $percent_miss_payout_date): void
    {
        $this->percent_miss_payout_date = Format::date($percent_miss_payout_date);
    }

}
