<?php

namespace CloudCastle\EquifaxReport\Libs;

class DebtOverdue
{
    public ?string $date = null;
    public ?float $sum = 0;
    public ?float $op_sum = 0;
    public ?float $percent_sum = 0;
    public ?float $other_sum = 0;
    public ?string $op_miss_payout_date = null;
    public ?string $percent_miss_payout_date = null;
}