<?php

namespace CloudCastle\EquifaxReport\Libs;

class Debt
{
    public ?int $sign_calc_last_payout = null;
    public ?string $calc_date = null;
    public ?float $first_sum = 0;
    public ?float $sum = 0;
    public ?float $op_sum = 0;
    public ?float $percent_sum = 0;
    public ?float $other_sum = 0;
    public ?int $sign_unaccepted_grace_period = 0;
}