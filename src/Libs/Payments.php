<?php

namespace CloudCastle\EquifaxReport\Libs;

class Payments
{
    public ?string $last_payout_date = null;
    public float $last_payout_sum = 0;
    public float $last_payout_op_sum = 0;
    public float $last_payout_percent_sum = 0;
    public float $last_payout_other_sum = 0;
    public float $paid_sum = 0;
    public float $paid_op_sum = 0;
    public float $paid_percent_sum = 0;
    public float $paid_other_sum = 0;
    public float $size_payments_type = 0;
    public ?string $payments_deadline_type = null;
    public int $overdue_day = 0;
}