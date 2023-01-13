<?php

namespace CloudCastle\EquifaxReport\Libs;

class DebtCurrent
{
    public ?string $date = null;
    public ?float $sum = 0;
    public ?float $op_sum = 0;
    public ?float $percent_sum = 0;
    public ?float $other_sum = 0;
}